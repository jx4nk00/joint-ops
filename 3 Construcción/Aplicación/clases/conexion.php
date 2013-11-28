<?php	
	
	/*
	$conexion = mysql_connect ("localhost", "opizarro_jo2013", "alalito11"); //--> Desarrollo
	mysql_select_db ("opizarro_jo_produccion", $conexion);
	*/

	$conexion = mysql_connect ("localhost","opservic_jo", "jointops2013"); //--> Produccion
	mysql_select_db ("opservic_jo_desarrollo", $conexion);

?>