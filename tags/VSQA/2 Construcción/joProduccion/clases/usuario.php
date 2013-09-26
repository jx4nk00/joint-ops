<?php 
include('conexion.php');
class Usuario{

function verUsuario(){
	$consulta = mysql_query("SELECT * FROM miembros mi
							JOIN privilegios pri
							ON mi.id_privilegio = pri.id_privilegio
							JOIN datos_miembros dm
							ON mi.id_datos = dm.id_datos")
	or die ("Error en la consulta verUsuario");
	return $consulta;
}

function eliminarUsuario($id){
	$consulta = mysql_query("UPDATE miembros SET activo = 0 WHERE id_miembros = '$id'");
	return "Usuario Eliminado";

}

function editarUsuario(){

}

function crearUsuario(){

}

function validarUsuario($user,$pass){

		$consulta = mysql_query("SELECT * FROM usuarios us
								JOIN miembros mi
								ON us".'.'."id_usuarios = mi".'.'."id_usuarios
								WHERE username='$user' 
								AND pass ='$pass'
								AND activo = 1") or die ("Error en la consulta validar Usuario");
		$fila=mysql_fetch_array($consulta);
		$idUser = $fila['id_usuarios'];

		return $idUser;
		
	}

function getUserName($id){

	$consulta = mysql_query("SELECT * FROM miembros where id_usuarios = $id") or die ("Error en la consulta getUserName");
	$fila=mysql_fetch_array($consulta);
	$nombre = $fila['p_nombre']." ".$fila['apellido_p'];

	return $nombre;
}

}//cierre de la clase

?>