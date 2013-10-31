<?php 
include('conexion.php');
class Usuario{
	var $query;
	var $result;
	var $fila;
	var $idUser;
	var $nombre;

function verUsuario(){
	$this->query = mysql_query("SELECT * FROM miembros mi
							JOIN privilegios pri
							ON mi.id_privilegio = pri.id_privilegio
							JOIN datos_miembros dm
							ON mi.id_datos = dm.id_datos")
	or die ("Error en la consulta verUsuario");
	return $this->query;
}

function eliminarUsuario($id){
	$this->query = mysql_query("UPDATE miembros SET activo = 0 WHERE id_miembros = '$id'");
	return "Usuario Eliminado";

}


function validarUsuario($user,$pass){

		$this->query = mysql_query("SELECT * FROM usuarios us
								JOIN miembros mi
								ON us".'.'."id_usuarios = mi".'.'."id_usuarios
								WHERE username='$user' 
								AND pass ='$pass'
								AND activo = 1") or die ("Error en la consulta validar Usuario");
		$this->fila=mysql_fetch_array($this->query);
		$this->idUser = $this->fila['id_usuarios'];

		return $this->idUser;
		
	}

function getUserName($id){

	$this->query = mysql_query("SELECT * FROM miembros WHERE id_usuarios = '$id'");
	$this->fila = mysql_fetch_array($this->query);
	$this->nombre = ucfirst($this->fila['p_nombre'])." ".ucfirst($this->fila['apellido_p']);

	return $this->nombre;
}

	function verTipoUsuario($idUsuario){
		$this->query = mysql_query("SELECT tipo FROM privilegios pri
								JOIN miembros mi
								ON pri.id_privilegio = mi.id_privilegio
								WHERE mi.id_usuarios = '$idUsuario'") or die ("Error en la consulta ver TipoUsuario");
		$this->result = mysql_fetch_array($this->query);
		if ($this->result[0] == 2) {
			return 1;
		}else{
			return 0;
		}
	}

}//cierre de la clase

?>