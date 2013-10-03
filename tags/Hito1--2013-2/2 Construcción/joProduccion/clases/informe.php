<?php 
include('conexion.php');
class Informe{


	function subirInforme($idProyecto,$ruta){

		$consulta = mysql_query("INSERT INTO informes (id_proyectos,ruta) VALUES ('$idProyecto','$ruta')");
		return "Informe subido exitosamente";

	}

	function verExistencia($idProyecto){
		$consulta = mysql_query("SELECT * FROM informes WHERE id_proyectos=$idProyecto")
					or die("Error en la consulta verExistencia");
		$verificador = mysql_fetch_array($consulta);

		return $verificador;

	}


	function ultimoInforme(){
		$consulta = mysql_query("SELECT id_informes FROM informes ORDER BY id_informes DESC");
		$valor = mysql_fetch_array($consulta);

		return $valor[0];
	}

}
 ?>