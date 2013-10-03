<?php 
include('conexion.php');
class Liquidacion{

	function getNumLiquidacion(){
		$query = mysql_query("SELECT numero_liq FROM liquidaciones");
		$result= mysql_fetch_array($query);
		
		if(!$result){return 1;}
		else{return $result;}
	}

	function getLugar($idLugar){
		$query = mysql_query("SELECT nombre_lugar FROM lugares WHERE id_lugares='$idLugar'");
		$result= mysql_fetch_array($query);
		return $result;

	}

	function verExistencia($idProyecto){
		$consulta = mysql_query("SELECT * FROM liquidaciones WHERE id_proyectos=$idProyecto")
					or die("Error en la consulta verExistencia");
		$verificador = mysql_fetch_array($consulta);

		return $verificador;

	}

}


/*	$miobj = new Liquidacion;
	//$array = array(1, "2013-08-21", "probar", 1, "Omito",1,1,2, "Muchas Gracias",0,5,"Omar Tarifado", 100,50,40,30,1, "RendicionCode", 50000,200,100,2,"Detalle de Impresion",100000,"Gastos de Informe",10000,1,0,"Estos son otros Gastos", 30000);
	echo $miobj->getNumLiquidacion();
*/
?>