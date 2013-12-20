<?php 
include('conexion.php');

class Cliente {
	var $query;
	var $result;

	var $nombreEmpresa;
	var $rut;
	var $direccion;
	var $comuna;
	var $ciudad;
	var $giro;

	function subirDatos ($datosCliente,$idDeProyecto){

	$this->nombreEmpresa=$datosCliente[0];
	$this->rut=$datosCliente[1];
	$this->direccion=$datosCliente[2];
	$this->comuna=$datosCliente[3];
	$this->ciudad=$datosCliente[4];
	$this->giro=$datosCliente[5];

	$this->query= mysql_query("INSERT INTO clientes (id_proyectos,
												nombre_cliente,
												rut,
												direccion,
												comuna,
												ciudad,
												giro)
						    			VALUES ('$idDeProyecto',
						    					'$this->nombreEmpresa',
						    					'$this->rut',
						    					'$this->direccion',
						    					'$this->comuna',
						    					'$this->ciudad',
						    					'$this->giro')")
										or die("Error en la consulta DatosCliente");	
	return "Datos Guardados Correctamente";
	}

	function getDatosCliente ($idDeProyecto){
		$this->query = mysql_query("SELECT * FROM clientes WHERE id_proyectos = $idDeProyecto" )or die('');
		$this->result = mysql_fetch_array($this->query);

		return $this->result;
	}
}
?>