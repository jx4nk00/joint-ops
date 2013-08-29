<?php 
include('conex.php');
class RevisarUsuario{

	function rUsuario($user,$pass){

		$consulta = mysql_query("SELECT * FROM usuarios us
								JOIN miembros mi
								ON us".'.'."id_usuarios = mi".'.'."id_usuarios
								WHERE username='$user' 
								AND pass ='$pass'
								AND activo = 1") or die ("Error en la consulta");

		$fila=mysql_fetch_array($consulta);
		$username = $fila['username'];

		return $username;
		
	}




}

 ?>