<?php 

include('conexion.php');

class Proforma{

	
	var $consulta;
	var $resultado;

	//Tabla proformas
	var $id_proyecto;
	var $fecha_creacion;
	var $cliente;
	var $total_proforma;

	//Tabla honorarios_proforma
	var $id_proformas;
	var $fecha;
	var $detalle_servicio;
	var $id_lugar;
	var $id_participante;
	var $calificacion;
	var $unidad_cobro;
	var $valor_dolar;
	var $cant_htd;
	var $total;

	function getIdProforma(){
		$this->consulta = mysql_query("SELECT id_proformas FROM proformas ORDER BY id_proformas DESC")
			or die("Error en la consulta getIdProforma");
		$this->resultado = mysql_fetch_array($this->consulta);

		if(!$this->resultado[0]){
			return 1;
		}else{
			return $this->resultado[0]+1;	
		}
	}

	function crearHonorario($datosHonorario){

		$this->id_proformas = $datosHonorario[0];
		$this->fecha = $datosHonorario[1];
		$this->detalle_servicio = $datosHonorario[2];
		$this->id_lugar = $datosHonorario[3];
		$this->id_participante = $datosHonorario[4];
		$this->calificacion = $datosHonorario[5];
		$this->unidad_cobro = $datosHonorario[6];
		$this->valor_dolar = $datosHonorario[7];
		$this->cant_htd = $datosHonorario[8];
		$this->total = $datosHonorario[9];



		$this->consulta = mysql_query("INSERT INTO honorarios_proforma (
										id_proformas,
										fecha,
										detalle_servicio,
										id_lugar,
										id_participante,
										calificacion,
										unidad_cobro,
										valor_dolar,
										cant_htd,
										total)
										VALUES (
										'$this->id_proformas',
										'$this->fecha',
										'$this->detalle_servicio',
										'$this->id_lugar',
										'$this->id_participante',
										'$this->calificacion',
										'$this->unidad_cobro',
										'$this->valor_dolar',
										'$this->cant_htd',
										'$this->total')")
		or die("Error en la inserción de honorarios_proforma");

	}

	function crearProforma($datosProforma){
		$this->id_proyecto=$datosProforma[0];
		$this->fecha_creacion=$datosProforma[1];
		$this->cliente=$datosProforma[2];
		$this->total_proforma=$datosProforma[3];

		$this->consulta = mysql_query("INSERT INTO proformas (
										id_proyectos,
										fecha_creacion,
										cliente,
										total_proforma) 
										VALUES (
										'$this->id_proyecto',
										'$this->fecha_creacion',
										'$this->cliente',
										'$this->total_proforma')") 
		or die("Error en la Inserción de Proforma");
	}
}
?>