<?php 
include('conexion.php');
class Proyecto{

	var $id_lugar; 
	var $id_codigo; 
	var $nombre_proyecto; 
	var $nombre_nave; 
	var $fecha_inicio; 
	var $fecha_termino; 
	var $descripcion; 
	var $query;
	var $result;
	var $proyectos;
	var $idEncargado;
	var $queryEncargado;
	var $resultEncargado;
	var $verNombreEncargado;
	var $nombreEncargado;
	var $responsables;
	var $lugares;
	var $ultimaID;
	var $id_miembro;
	var $id_proyecto;
	var $nombre_servicio;
	var $servicios;
	var $activo;

function crearProyecto($DatosDelProyecto){
	$this->id_lugar = $DatosDelProyecto[0];
	$this->id_miembro = $DatosDelProyecto[1];
	$this->id_codigo = $DatosDelProyecto[2];
	$this->nombre_proyecto = $DatosDelProyecto[3];
	$this->nombre_nave = $DatosDelProyecto[4];
	$this->fecha_inicio = $DatosDelProyecto[5];
	$this->fecha_termino = $DatosDelProyecto[6];
	$this->descripcion = $DatosDelProyecto[7];
	$this->activo = $DatosDelProyecto[8];

	$this->query = mysql_query("INSERT INTO proyectos (
							id_lugares,
							id_miembros,
							id_codigo,
							nombre_proyecto,
							nombre_nave,
							fecha_inicio,
							fecha_termino,
							descripcion,
							activo) 
							VALUES(
							'$this->id_lugar',
							'$this->id_miembro',
							'$this->id_codigo',
							'$this->nombre_proyecto',
							'$this->nombre_nave',
							'$this->fecha_inicio',
							'$this->fecha_termino',
							'$this->descripcion',
							'$this->activo'
							)") or die ("Error en la consulta");
	return "Proyecto Creado con éxito";
}


function verUltimoCodigo(){
	$this->query = mysql_query("SELECT id_codigo FROM codigos_servicio ORDER BY id_codigo DESC");
	$this->result = mysql_fetch_array($this->query);

		return $this->result[0]+1;
}

function crearCodigoServicio($codigo){
	$fecha_creacion = date('Y-m-d');
	$this->query = mysql_query("INSERT INTO codigos_servicio (codigo,f_creacion) VALUES ('$codigo','$fecha_creacion')");
	return "exito";
}


function verProyectos(){
	$this->query = "SELECT * FROM proyectos";
	$this->result = mysql_query($this->query);
	$this->proyectos="";
	while($row = mysql_fetch_array($this->result)){
		$this->proyectos = $this->proyectos. "<tr>"; // abro fila
		$this->proyectos = $this->proyectos. "<td>".$row['nombre_proyecto']."</td>"; //Nombre proyecto
		$this->proyectos = $this->proyectos. "<td class='center'>".$row['fecha_inicio']."</td>"; //Fecha de Inicio

			$this->idEncargado = $row['id_miembros'];
			$this->queryEncargado ="SELECT * FROM miembros WHERE id_miembros = $this->idEncargado";
			$this->resultEncargado = mysql_query($this->queryEncargado);
			$this->verNombreEncargado = mysql_fetch_array($this->resultEncargado);
			$this->nombreEncargado = ucfirst($this->verNombreEncargado['p_nombre'])." ".ucfirst($this->verNombreEncargado['apellido_p']);

		$this->proyectos = $this->proyectos. "<td class='center'>$this->nombreEncargado</td>"; //Responsable
		$this->proyectos = $this->proyectos. "<td class='center'>"; // Inicio de Etiqueta


		if($row['activo']==0){
			$this->proyectos = $this->proyectos. "<span class='label label-inverse'>Cerrado</span>";
		}else{
		
			if($row['finalizado']==1){
				$this->proyectos = $this->proyectos. "<span class='label label-success'>Finalizado</span>";
			}else {

				if(  strtotime($row['fecha_termino']) > strtotime(date('Y-m-d'))  ){
					$this->proyectos = $this->proyectos. "<span class='label label-info'>En Curso</span>";
				}
				else{
					$this->proyectos = $this->proyectos. "<span class='label label-important'>Fuera de Plazo</span>";
				}
			}

		}



		$this->proyectos = $this->proyectos. "</td>"; // fin de etiqueta
		$this->proyectos = $this->proyectos. "<td class='center'>";

		$this->proyectos = $this->proyectos. "<a class='btn btn-success' target='_blank' href='verproyecto.php?idDeProyecto=".$row['id_proyectos']."'>";
		$this->proyectos = $this->proyectos. "<i class='icon-zoom-in icon-white'></i>Ver</a> ";
		//$this->proyectos = $this->proyectos. "<a class='btn btn-info' href='#'>";
		//$this->proyectos = $this->proyectos. "<i class='icon-edit icon-white'></i>Editar</a> ";

		/*echo "<a class='btn btn-danger' href='#'>";
		echo "<i class='icon-trash icon-white'></i>Borrar</a> ";*/
		$this->proyectos =$this->proyectos. "</td>";
		$this->proyectos =$this->proyectos. "</tr>";
	}
	return $this->proyectos;
}

function getResponsables(){
	$this->query = "SELECT * FROM miembros ORDER BY p_nombre ASC";
	$this->result = mysql_query($this->query);
	$this->responsables="";
	while($row = mysql_fetch_array($this->result)){
		$this->responsables = $this->responsables."<option value='".$row['id_miembros']."'>".ucfirst($row['p_nombre'])." ".ucfirst($row['apellido_p'])."</option>";
	}
	return $this->responsables;

}

function getLugares(){
	$this->query = "SELECT * FROM lugares ORDER BY nombre_lugar ASC";
	$this->result = mysql_query($this->query);
	$this->lugares="";
	while($row = mysql_fetch_array($this->result)){
		$this->lugares = $this->lugares."<option value='".$row['id_lugares']."'>".$row['nombre_lugar']."</option>";
	}
	return $this->lugares;

}

function getLastProjectId(){
	$this->query = "SELECT id_proyectos FROM proyectos ORDER BY id_proyectos DESC";
	$this->result = mysql_query($this->query);
	$this->ultimaID = mysql_fetch_array($this->result);
	return $this->ultimaID[0];
}

function crearServicio($DatosDelServicio){
	$this->id_miembro = $DatosDelServicio[0];
	$this->id_proyecto = $DatosDelServicio[1];
	$this->nombre_servicio = $DatosDelServicio[2];

	$this->query = mysql_query("INSERT INTO servicios (
						id_miembros,
						id_proyectos,
						nombre_servicio) 
						VALUES(
						'$this->id_miembro',
						'$this->id_proyecto',
						'$this->nombre_servicio'
						)")or die("Error en la Consulta");
	return "Servicio Creado con exito";
}

function getInfoProyecto($idDeProyecto){
	$this->query = mysql_query("SELECT * FROM proyectos WHERE id_proyectos= '$idDeProyecto'")or die ("Error en la consulta getInfoProyecto");
	$this->result = mysql_fetch_array($this->query);
	return $this->result;

}

function getCodigoProyecto($idDeCodigo){
	$this->query = mysql_query("SELECT codigo FROM codigos_servicio WHERE id_codigo = '$idDeCodigo'") or die("Error en la consulta getCodigoProyecto");
	$this->result = mysql_fetch_array($this->query);
	return $this->result[0];
}

function getServiciosDeProyecto($idDeProyecto){
	$this->query = mysql_query("SELECT id_miembros,nombre_servicio FROM servicios WHERE id_proyectos = '$idDeProyecto'") or die ("Error en la consulta getServiciosDeProyecto");
	$this->servicios="";
	while($row = mysql_fetch_array($this->query)){
		$this->servicios = $this->servicios. "<li>".$row[1]."</li>";
	}

	return $this->servicios;
}

function activoProyecto($accion,$idDeProyecto){

	switch ($accion) {
		case 'a':
			$this->query = mysql_query("UPDATE proyectos set activo=1 WHERE id_proyectos = $idDeProyecto") or die ("Error al abrir el proyecto");
			break;
		case 'c':
			$this->query = mysql_query("UPDATE proyectos set activo=0 WHERE id_proyectos = $idDeProyecto") or die ("Error al cerrar el proyecto");
			break;
		default:
			return "Acción no válida";
			break;
	}

}

function getDirLugar($id_lugar){

	$this->query = mysql_query("SELECT direccion FROM lugares where id_lugares = $id_lugar");

	$this->result = mysql_fetch_array($this->query);

	return $this->result;
}

function finalizarProyecto($idProyecto){
	$this->query = mysql_query("UPDATE proyectos set finalizado=1 WHERE id_proyectos = $idProyecto") or die ("Error en finalziar proyecto");
	return "Proyecto Finalizado";
}


}
?>