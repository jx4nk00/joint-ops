<?php 
include('conexion.php');
class Liquidacion{
	var $query;
	var $result;

	var $id_proyectos;
	var $id_porce_acuerdos;
	var $id_valor_dolar;
	var $id_otros_gastos;
	var $id_impresiones;
	var $id_rediciones_de_gastos;
	var $id_valores_facturados;
	var $id_gc_informes;
	var $numero_liq;
	var $fecha_creacion;
	var $ref_cliente;
	var $num_cont;
	var $turnos_trabajados;
	var $tarifado;
	var $totalInspectores;
	var $activo;

	function getReferenciaCliente($idProyecto){
		$this->query = mysql_query("SELECT ref_cliente FROM liquidaciones WHERE id_proyectos='$idProyecto'") 
		or die("Error en la consulta getReferenciaClinete");
		$this->result= mysql_fetch_array($this->query);
		return $this->result;

	}

	function getInfoGC($idGC){
		$this->query = mysql_query("SELECT * FROM gc_informes WHERE id_gc_informes = '$idGC'")
		or die("Error en la consulta getInfoGC");
		$this->result = mysql_fetch_array($this->query);
		return $this->result;
	}

	function getInfoOG($idOG){
		$this->query = mysql_query("SELECT * FROM otros_gastos WHERE id_otros_gastos = '$idOG'")
		or die("Error en la consulta getInfoGC");
		$this->result = mysql_fetch_array($this->query);
		return $this->result;
	}

	function getInfoRG($idRG){
		$this->query = mysql_query("SELECT * FROM rendiciones_de_gastos WHERE id_rendiciones_de_gastos = '$idRG'")
		or die("Error en la consulta getInfoRG");
		$this->result = mysql_fetch_array($this->query);
		return $this->result;
	}

	function getInfoImpresiones($idImpresion){
		$this->query = mysql_query("SELECT * FROM impresiones WHERE id_impresiones = '$idImpresion'")
		or die("Error en la consulta getInfoImpreisones");
		$this->result = mysql_fetch_array($this->query);
		return $this->result;
	}

	function getInfoLiquidacion($idProyecto){
		$this->query = mysql_query("SELECT * FROM liquidaciones WHERE id_proyectos = '$idProyecto'")
		or die("Error en la consulta getInfoLiquidacion");
		$this->result = mysql_fetch_array($this->query);
		return $this->result;
	}

	function getInfoVF($idVF){
		$this->query = mysql_query("SELECT * FROM valores_facturados WHERE id_valores_facturados = '$idVF'")
		or die("Error en la consulta getInfoVF");

		$this->result = mysql_fetch_array($this->query);
		return $this->result;

	}

	function getNumLiquidacion(){
		$this->query = mysql_query("SELECT numero_liq FROM liquidaciones ORDER BY numero_liq DESC");
		$this->result= mysql_fetch_array($this->query);
		
			return $this->result[0]+1;
	}

	function getLugar($idLugar){
		$this->query = mysql_query("SELECT nombre_lugar FROM lugares WHERE id_lugares='$idLugar'");
		$this->result= mysql_fetch_array($this->query);
		return $this->result;

	}


	function verExistencia($idProyecto){
		$this->query = mysql_query("SELECT * FROM liquidaciones WHERE id_proyectos=$idProyecto")
					or die("Error en la consulta verExistencia");
		$this->result = mysql_fetch_array($this->query);

		return $this->result;

	}

	function verIdPorceAcuerdo(){
		$this->query = mysql_query("SELECT id_porce_acuerdos FROM porce_acuerdos")
			or die("Error en la consulta verIdPorceAcuerdo");
		$this->result = mysql_fetch_array($this->query);

		if (!$this->result) {return 1;}
		else{return $this->result;}

	}

	function crearImpresion($DatosImpresiones){
		$this->query = mysql_query("INSERT INTO impresiones (
										valor_hoja,
										cant_hojas,
										num_copias,
										detalle,
										total_impresion,
										inspector) 
								VALUES ('$DatosImpresiones[0]',
										'$DatosImpresiones[1]',
										'$DatosImpresiones[2]',
										'$DatosImpresiones[3]',
										'$DatosImpresiones[4]',
										'$DatosImpresiones[5]')")
								or die("Error en la consulta crearImpresion");
		return "Impresión creada con exito";

	}

	function getIdImpresion(){
		$this->query = mysql_query("SELECT id_impresiones FROM impresiones ORDER BY id_impresiones DESC")
			or die("Error en la consulta getIdImpresion");

		$this->result = mysql_fetch_array($this->query);

		return $this->result[0];

	}

	function crearOtrosGastos($datosOtrosGasto){
		$this->query = mysql_query("INSERT INTO	otros_gastos (
										detalle,
										valor,
										inspector)
									VALUES (
										'$datosOtrosGasto[0]',
										'$datosOtrosGasto[1]',
										'$datosOtrosGasto[2]')") or die ("Error en la consulta crearOtrosGastos")
							or die ("Error en la consulta crearOtrosGastos");;	

		return "Otros Gastos creada con exito";

	}

	function getIdOtrosGastos(){
		$this->query = mysql_query("SELECT id_otros_gastos FROM otros_gastos ORDER BY id_otros_gastos DESC")
									or die ("Error en la consulta getIdOtrosGastos");

		$this->result = mysql_fetch_array($this->query);

		return $this->result[0];

	}

	function crearRenGastos($datosRendiciones){

		$this->query = mysql_query("INSERT INTO rendiciones_de_gastos (
										codigo_rend,
										total_rend,
										inspector)
									VALUES (
										'$datosRendiciones[0]',
										'$datosRendiciones[1]',
										'$datosRendiciones[2]')") or die ("Error en la consulta crearRenGastos");

		return "Rendicion de Gastos creada con exito";
	}

	function getIdRendicion(){
		$this->query = mysql_query("SELECT id_rendiciones_de_gastos FROM rendiciones_de_gastos ORDER BY id_rendiciones_de_gastos DESC")
			or die ("Error en la consulta getIdRendicion");

		$this->result = mysql_fetch_array($this->query);
		
		return $this->result[0];	
	}

	function crearValoresFacturados($datosValoresFacturados){
		$this->query = mysql_query("INSERT INTO valores_facturados (
										fact_exenta,
										fact_afecta,
										bol_honorario,
										invoice,
										inspector,
										total_fact_exenta,
										total_fact_afecta,
										total_bol_honorario,
										total_invoice) 
									VALUES (
										'$datosValoresFacturados[0]',
										'$datosValoresFacturados[1]',
										'$datosValoresFacturados[2]',
										'$datosValoresFacturados[3]',
										'$datosValoresFacturados[4]',
										'$datosValoresFacturados[5]',
										'$datosValoresFacturados[6]',
										'$datosValoresFacturados[7]',
										'$datosValoresFacturados[8]')") or die ("Error en la consulta crearValoresFacturados");

		return "Valores Facturados creada con exito";

	}

	function getIdValoresFacturados (){

		$this->query = mysql_query("SELECT id_valores_facturados FROM valores_facturados ORDER BY id_valores_facturados DESC")
			or die("Error en la consulta getIdValoresFacturados");

		$this->result = mysql_fetch_array($this->query);

		return $this->result[0];
	}

	function crearConfInforme($datosConfeccionInf){

		$this->query = mysql_query("INSERT INTO gc_informes (
										detalle,
										total_gastos,
										inspector) 
									VALUES (
										'$datosConfeccionInf[0]',
										'$datosConfeccionInf[1]',
										'$datosConfeccionInf[2]')") or die ("Error en la consulta crearImpresion");

	}

	function getIdConfeccionInf() {

		$this->query = mysql_query("SELECT id_gc_informes FROM gc_informes ORDER BY id_gc_informes DESC") 
			or die ("Error en la consulta getIdConfeccionInf");

		$this->result = mysql_fetch_array($this->query);

		return $this->result[0];

	 }

	 function crearLiquidacion($datosLiquidacion){


	 	$this->id_proyectos= $datosLiquidacion[0];
	 	$this->id_valor_dolar= $datosLiquidacion[1];
	 	$this->id_otros_gastos= $datosLiquidacion[2];
	 	$this->id_impresiones= $datosLiquidacion[3];
	 	$this->id_rediciones_de_gastos= $datosLiquidacion[4];
	 	$this->id_valores_facturados= $datosLiquidacion[5];
	 	$this->id_gc_informes= $datosLiquidacion[6];
	 	$this->numero_liq= $datosLiquidacion[7];
	 	$this->fecha_creacion= $datosLiquidacion[8];
	 	$this->ref_cliente= $datosLiquidacion[9];
	 	$this->num_cont= $datosLiquidacion[10];
	 	$this->turnos_trabajados= $datosLiquidacion[11];
	 	$this->tarifado= $datosLiquidacion[12];
	 	$this->totalInspectores = $datosLiquidacion[13];
	 	$this->activo= $datosLiquidacion[14];


	 	$this->query = mysql_query("INSERT INTO liquidaciones (
	 									id_proyectos,
	 									id_valor_dolar,
	 									id_otros_gastos,
	 									id_impresiones,
	 									id_rendiciones_de_gastos,
	 									id_valores_facturados,
	 									id_gc_informes,
	 									numero_liq,
	 									fecha_creacion,
	 									ref_cliente,
	 									num_cont,
	 									turnos_trabajados,
	 									tarifado,
	 									total_inspectores,
	 									activo) 
	 								VALUES (
										'$this->id_proyectos',
										'$this->id_valor_dolar',
										'$this->id_otros_gastos',
										'$this->id_impresiones',
										'$this->id_rediciones_de_gastos',
										'$this->id_valores_facturados',
										'$this->id_gc_informes',
										'$this->numero_liq',
										'$this->fecha_creacion',
										'$this->ref_cliente',
										'$this->num_cont',
										'$this->turnos_trabajados',
										'$this->tarifado',
										'$this->totalInspectores',
										'$this->activo')") or die ("Error en la consulta CrearLiquidacion");
	 	return "exito";
	 }
}
?>