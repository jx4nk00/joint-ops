<?php 
include('conexion.php');
class Miscelaneo{
	var $consulta;
	var $valor;

	function getFecha(){
		return date('Y-m-d');
	}


	function obtenerDolar(){
		$this->consulta = mysql_query("SELECT id_valor_dolar,valor FROM valor_dolar ORDER BY id_valor_dolar DESC")
		or die("Error en la consulta obtenerDolar");
		$this->valor = mysql_fetch_array($this->consulta);
		return $this->valor;
	}
	
	function traductorMes($Fecha){

		$mes=date("F", strtotime($Fecha));

		if ($mes=="January") $mes="Enero";
		if ($mes=="February") $mes="Febrero";
		if ($mes=="March") $mes="Marzo";
		if ($mes=="April") $mes="Abril";
		if ($mes=="May") $mes="Mayo";
		if ($mes=="June") $mes="Junio";
		if ($mes=="July") $mes="Julio";
		if ($mes=="August") $mes="Agosto";
		if ($mes=="September") $mes="Setiembre";
		if ($mes=="October") $mes="Octubre";
		if ($mes=="November") $mes="Noviembre";
		if ($mes=="December") $mes="Diciembre";

		return $mes;
	}


}
?>