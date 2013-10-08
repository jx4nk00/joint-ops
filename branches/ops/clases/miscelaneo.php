<?php 
include('conexion.php');
class Miscelaneo{
	var $consulta;
	var $valor;

	function getFecha(){
		return date('Y-m-d');
	}


	function obtenerDolar(){
		$this->consulta = mysql_query("SELECT id_valor_dolar,valor FROM valor_dolar ORDER BY id_valor_dolar DESC");
		$this->valor = mysql_fetch_array($this->consulta);

		return $this->valor[1];
	}



}
?>