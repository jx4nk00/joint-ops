<?php 
include('conex.php');
class Misc{


	function getFecha(){
		return date('d-m-Y');
	}


	function obtenerDolar(){
		$consulta = mysql_query("SELECT id_valor_dolar,valor FROM valor_dolar ORDER BY id_valor_dolar DESC");
		$valor = mysql_fetch_array($consulta);

		return $valor[1];
	}



}
?>