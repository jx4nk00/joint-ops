<?php 
include('conex.php');
class Informe{


	function subirInforme($ruta, $code){

		$consulta = mysql_query("INSERT INTO informes (ruta,cod_informe) VALUES ('$ruta','$code')");

	}


	function ultimoInforme(){
		$consulta = mysql_query("SELECT id_informes FROM informes ORDER BY id_informes DESC");
		$valor = mysql_fetch_array($consulta);

		return $valor[0];
	}

}
 ?>