<?php	

//Conexión con el Servidor Remoto 

	
	$conexion = mysql_connect ("localhost", "opizarro_jo2013", "alalito11");
	mysql_select_db ("opizarro_joint_ops", $conexion);
	


//Conexión con el Servidor Local 
/*
	$conexion = mysql_connect ("localhost", "root", "");
	mysql_select_db ("ops_joint_ops", $conexion);
*/

?>