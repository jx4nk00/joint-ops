	<?php 
include('conex.php');
class GestionarUsuario{

function verUsuarios(){
	$consulta = mysql_query("SELECT * FROM miembros mi
							JOIN privilegios pri
							ON mi".'.'."id_privilegio = pri".'.'."id_privilegio
							JOIN datos_miembros dm
							ON mi".'.'."id_datos = dm".'.'."id_datos")

	or die ("Error en la consulta");
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

}//cierre de la clase

?>