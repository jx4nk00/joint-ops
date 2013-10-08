<?php 
include('conexion.php');
class Informe{

	var $consulta;
	var $valor;
	var $verificador;

	function subirInforme($idProyecto,$ruta){

		$this->consulta = mysql_query("INSERT INTO informes (id_proyectos,ruta) VALUES ('$idProyecto','$ruta')");
		return "Informe subido exitosamente";

	}

	function verExistencia($idProyecto){
		$this->consulta = mysql_query("SELECT * FROM informes WHERE id_proyectos=$idProyecto")
					or die("Error en la consulta verExistencia");
		$this->verificador = mysql_fetch_array($this->consulta);

		return $this->verificador;

	}


	function ultimoInforme(){
		$this->consulta = mysql_query("SELECT id_informes FROM informes ORDER BY id_informes DESC");
		$this->valor = mysql_fetch_array($this->consulta);

		return $this->valor[0];
	}

}
 ?>