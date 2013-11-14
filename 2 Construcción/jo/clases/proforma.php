<?php 
include('conexion.php');
class Proforma{
	//Tabla proformas
	var $consulta;
	var $resultado;

	var $id_proyecto;
	var $fecha_creacion;
	var $total_proforma;


	//Tabla honorarios_proforma
	var $id_proforma;
	var $fecha;
	var $calificacion;
	var $unidad_cobro;
	var $cant_htd;
	var $total;



	function getIdProforma(){
		$this->consulta = mysql_query("SELECT id_proformas FROM proformas ORDER BY id_proformas DESC")
			or die("Error en la consulta getIdProforma");

		$this->resultado = mysql_fetch_array($this->query);

		if(!$this->resultado[0]){
			return 1;
		}else{
			return $this->resultado[0]+1;	
		}
		
	}

	function crearProforma($datosProforma){
		$this->id_proyecto=$datosProforma[0];
		$this->fecha_creacion=$datosProforma[1];
		$this->cliente=$datosProforma[2];
		$this->total_proforma=$datosProforma[3];

		$this->id_proformas=$datosProforma[4];
		$this->fecha=$datosProforma[5];
		$this->detalle_servicio=$datosProforma[6];
		$this->calificacion=$datosProforma[7];
		$this->unidad_cobro=$datosProforma[8];
		$this->cant_htd=$datosProforma[9];
		$this->total=$datosProforma[10];


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

		$this->consulta = mysql_query("INSERT INTO honorarios_proforma (
										id_proformas,
										fecha,
										detalle_servicio,
										calificacion,
										unidad_cobro,
										cant_htd,
										total)
										VALUES (
										'$this->id_proformas',
										'$this->fecha',
										'$this->detalle_servicio',
										'$this->calificacion',
										'$this->unidad_cobro',
										'$this->cant_htd',
										'$this->total')")
		or die("Error en la inserción de honorarios_proforma");


	}
}
?>