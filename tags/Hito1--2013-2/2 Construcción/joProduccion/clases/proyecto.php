<?php 
include('conexion.php');
class Proyecto{

function crearProyecto($DatosDelProyecto){
	
	$id_lugar = $DatosDelProyecto[0];
	$id_mimebro = $DatosDelProyecto[1];
	$id_codigo = $DatosDelProyecto[2];
	$nombre_proyecto = $DatosDelProyecto[3];
	$nombre_nave = $DatosDelProyecto[4];
	$fecha_inicio = $DatosDelProyecto[5];
	$fecha_termino = $DatosDelProyecto[6];
	$descripcion = $DatosDelProyecto[7];
	
	$consulta = mysql_query("INSERT INTO proyectos (
							id_lugares,
							id_miembros,
							id_codigo,
							nombre_proyecto,
							nombre_nave,
							fecha_inicio,
							fecha_termino,
							descripcion) 
							VALUES(
							'$id_lugar',
							'$id_mimebro',
							'$id_codigo',
							'$nombre_proyecto',
							'$nombre_nave',
							'$fecha_inicio',
							'$fecha_termino',
							'$descripcion'
							)") or die ("Error en la consulta");

	return "Proyecto Creado con éxito";
	
}

function verProyectos(){
	$query = "SELECT * FROM proyectos";
	$result = mysql_query($query);
	$proyectos="";
	while($row = mysql_fetch_array($result)){
		$proyectos = $proyectos. "<tr>"; // abro fila
		$proyectos = $proyectos. "<td>".$row['nombre_proyecto']."</td>"; //Nombre proyecto
		$proyectos = $proyectos. "<td class='center'>".$row['fecha_inicio']."</td>"; //Fecha de Inicio

			$idEncargado = $row['id_miembros'];
			$queryEncargado ="SELECT * FROM miembros WHERE id_miembros = $idEncargado";
			$resultEncargado = mysql_query($queryEncargado);
			$verNombreEncargado = mysql_fetch_array($resultEncargado);
			$nombreEncargado = ucfirst($verNombreEncargado['p_nombre'])." ".ucfirst($verNombreEncargado['apellido_p']);

		$proyectos = $proyectos. "<td class='center'>$nombreEncargado</td>"; //Responsable
		$proyectos = $proyectos. "<td class='center'>"; // Inicio de Etiqueta
		if(  strtotime($row['fecha_termino']) > strtotime(date('Y-m-d'))  )
		{$proyectos = $proyectos. "<span class='label label-warning'>En Cuerso</span>";}
		else{
		$proyectos = $proyectos. "<span class='label label-important'>Fuera de Plazo</span>";
		}
		$proyectos = $proyectos. "</td>"; // fin de etiqueta
		$proyectos = $proyectos. "<td class='center'>";

		$proyectos = $proyectos. "<a class='btn btn-success' target='_blank' href='verproyecto.php?idDeProyecto=".$row['id_proyectos']."'>";
		$proyectos = $proyectos. "<i class='icon-zoom-in icon-white'></i>Ver</a> ";
		$proyectos = $proyectos. "<a class='btn btn-info' href='#'>";
		$proyectos = $proyectos. "<i class='icon-edit icon-white'></i>Editar</a> ";

		/*echo "<a class='btn btn-danger' href='#'>";
		echo "<i class='icon-trash icon-white'></i>Borrar</a> ";*/
		$proyectos =$proyectos. "</td>";
		$proyectos =$proyectos. "</tr>";
	}

	return $proyectos;
}

function getResponsables(){
	$query = "SELECT * FROM miembros ORDER BY p_nombre ASC";
	$result = mysql_query($query);
	$responsables="";
	while($row = mysql_fetch_array($result)){
		$responsables = $responsables."<option value='".$row['id_miembros']."'>".ucfirst($row['p_nombre'])." ".ucfirst($row['apellido_p'])."</option>";
	}
	return $responsables;

}

function getLugares(){
	$query = "SELECT * FROM lugares ORDER BY nombre_lugar ASC";
	$result = mysql_query($query);
	$lugares="";
	while($row = mysql_fetch_array($result)){
		$lugares = $lugares."<option value='".$row['id_lugares']."'>".$row['nombre_lugar']."</option>";
	}
	return $lugares;

}

function getLastProjectId(){
	$query = "SELECT id_proyectos FROM proyectos ORDER BY id_proyectos DESC";
	$result = mysql_query($query);
	$ultimaID = mysql_fetch_array($result);
	return $ultimaID[0];
}

function crearServicio($DatosDelServicio){
	$id_miembro = $DatosDelServicio[0];
	$id_proyecto = $DatosDelServicio[1];
	$nombre_servicio = $DatosDelServicio[2];

	$query = mysql_query("INSERT INTO servicios (
						id_miembros,
						id_proyectos,
						nombre_servicio) 
						VALUES(
						'$id_miembro',
						'$id_proyecto',
						'$nombre_servicio'
						)")or die("Error en la Consulta");
	return "Servicio Creado con exito";
}

function getInfoProyecto($idDeProyecto){
	$query = mysql_query("SELECT * FROM proyectos WHERE id_proyectos= '$idDeProyecto'")or die ("Error en la consulta getInfoProyecto");
	$result= mysql_fetch_array($query);
	return $result;

}

function getCodigoProyecto($idDeCodigo){
	$query = mysql_query("SELECT codigo FROM codigos_servicio WHERE id_codigo = '$idDeCodigo'") or die("Error en la consulta getCodigoProyecto");
	$result = mysql_fetch_array($query);
	return $result[0];
}

function getServiciosDeProyecto($idDeProyecto){
	$query = mysql_query("SELECT id_miembros,nombre_servicio FROM servicios WHERE id_proyectos = '$idDeProyecto'") or die ("Error en la consulta getServiciosDeProyecto");
	$servicios="";
	while($row = mysql_fetch_array($query)){
		$servicios = $servicios. "<li>".$row[1]."</li>";
	}

	return $servicios;
}


}

/*
$proyecto = new Proyecto;
$m = $proyecto->getInfoProyecto(14);
echo $m[4];
echo $proyecto->getLastProjectId();

$array = array(1,1,1,'Juanka Proyecto','Titatic','2013-09-10','2013-09-25','Este es un Proyecto de Prueba');
echo $proyecto -> crearProyecto($array);
*/
?>