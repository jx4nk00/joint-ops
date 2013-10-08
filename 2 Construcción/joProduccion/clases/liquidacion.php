<?php 
include('conexion.php');
class Liquidacion{
	var $query;
	var $result;

	function getNumLiquidacion(){
		$this->query = mysql_query("SELECT numero_liq FROM liquidaciones");
		$this->result= mysql_fetch_array($this->query);
		
		if(!$this->result){return 1;}
		else{return $this->result;}
	}

	function getLugar($idLugar){
		$this->query = mysql_query("SELECT nombre_lugar FROM lugares WHERE id_lugares='$idLugar'");
		$this->result= mysql_fetch_array($this->query);
		return $this->result;

	}

	function verExistencia($idProyecto){
		$this->query = mysql_query("SELECT * FROM liquidaciones WHERE id_proyectos=$idProyecto")
					or die("Error en la consulta verExistencia");
		$this->result = mysql_fetch_array($this->query);

		return $this->result;

	}

}


/*	$miobj = new Liquidacion;
	//$array = array(1, "2013-08-21", "probar", 1, "Omito",1,1,2, "Muchas Gracias",0,5,"Omar Tarifado", 100,50,40,30,1, "RendicionCode", 50000,200,100,2,"Detalle de Impresion",100000,"Gastos de Informe",10000,1,0,"Estos son otros Gastos", 30000);
	echo $miobj->getNumLiquidacion();
*/
?>