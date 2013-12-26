<?php 
include('conexion.php');
class Usuario{
	var $query;
	var $result;

	var $fila;
	var $nombre;

	var $idUser;
	var $user;
	var $password;

	var $idDatos;
	var $telefono;
	var $correo;
	var $cCoriente;

	var $idBanco;
	var $idPrivilegio;
	var $idUsuarios;
	var $pNombre;
	var $sNombre;
	var $aPaterno;
	var $aMaterno;
	var $rut;
	var $fNac;
	var $fCrac;
	var $activo;

function verUsuario(){
	$this->query = mysql_query("SELECT * FROM miembros mi
							JOIN privilegios pri
							ON mi.id_privilegio = pri.id_privilegio
							JOIN datos_miembros dm
							ON mi.id_datos = dm.id_datos
							JOIN usuarios us
							ON mi.id_usuarios = us.id_usuarios")
	or die ("Error en la consulta verUsuario");
	return $this->query;
}

function creaUsuario($datosUsuario){
	$this->username = $datosUsuario[0];
	$this->password = $datosUsuario[1];

	$this->query = mysql_query("INSERT INTO usuarios (username,pass) VALUES ('$this->username','$this->password')")
		or die("Error al ingresar Usuario");

	$this->query = mysql_query("SELECT id_usuarios FROM usuarios ORDER BY id_usuarios DESC")
		or die("Error al obtener Id de Usuario");

	$this->result = mysql_fetch_array($this->query);

	return $this->result[0];


}

function crearDatosMiembro($datosMiembro){
	$this->telefono = $datosMiembro[0];
	$this->correo = $datosMiembro[1];
	$this->cCoriente = $datosMiembro[2];

	$this->query = mysql_query("INSERT INTO datos_miembros (telefono,correo,cta_corriente) VALUES ('$this->telefono','$this->correo','$this->cCoriente')")
		or die("Error al ingresar datos miembro");

	$this->query = mysql_query("SELECT id_datos FROM datos_miembros ORDER BY id_datos DESC")
		or die("Error al abtener id_miembros");

	$this->result = mysql_fetch_array($this->query);

	return $this->result[0];


}

function crearMiembro($datosMiembro){

	$this->idBanco = $datosMiembro[0];
	$this->idPrivilegio = $datosMiembro[1];
	$this->idUsuarios = $datosMiembro[2];
	$this->idDatos = $datosMiembro[3];
	$this->pNombre = $datosMiembro[4];
	$this->sNombre = $datosMiembro[5];
	$this->aPaterno = $datosMiembro[6];
	$this->aMaterno = $datosMiembro[7];
	$this->rut = $datosMiembro[8];
	$this->fNac = $datosMiembro[9];
	$this->fCrac = $datosMiembro[10];
	$this->activo = $datosMiembro[11];

	$this->query = mysql_query("INSERT INTO miembros (
											id_banco,
											id_privilegio,
											id_usuarios,
											id_datos,
											p_nombre,
											s_nombre,
											apellido_p,
											apellido_m,
											rut,
											f_nac,
											f_creacion,
											activo
											)VALUES(
											'$this->idBanco',
											'$this->idPrivilegio',
											'$this->idUsuarios',
											'$this->idDatos',
											'$this->pNombre',
											'$this->sNombre',
											'$this->aPaterno',
											'$this->aMaterno',
											'$this->rut',
											'$this->fNac',
											'$this->fCrac',
											'$this->activo'
											)")
		or die("Error al crear nuevo miembro");

	return "Miembro Ingresado con Éxito";
}

function verBancos(){
	$this->query = mysql_query("SELECT * FROM bancos") or die("Error al obtener Bancos");
	return $this->query;
}

function verPrivilegios(){
	$this->query = mysql_query("SELECT * FROM privilegios") or die("Error al obtener Bancos");
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

	return utf8_encode($this->nombre);
}

	function verTipoUsuario($idUsuario){
		$this->query = mysql_query("SELECT tipo FROM privilegios pri
								JOIN miembros mi
								ON pri.id_privilegio = mi.id_privilegio
								WHERE mi.id_usuarios = '$idUsuario'") or die ("Error en la consulta ver TipoUsuario");
		$this->result = mysql_fetch_array($this->query);

		return $this->result[0];
	}

}//cierre de la clase
?>