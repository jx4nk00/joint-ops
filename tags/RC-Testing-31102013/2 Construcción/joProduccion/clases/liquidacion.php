<?php 
include('conexion.php');
class Liquidacion{
	var $query;
	var $result;

	function getNumLiquidacion(){
		$this->query = mysql_query("SELECT numero_liq FROM liquidaciones");
		$this->result= mysql_fetch_array($this->query);
		
		if(!$this->result){return 1;}
		else{return $this->result;}
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
										inspector) 
								VALUES ('$DatosImpresiones[0]',
										'$DatosImpresiones[1]',
										'$DatosImpresiones[2]',
										'$DatosImpresiones[3]',
										'$DatosImpresiones[4]')")
								or die("Error en la consulta crearImpresion");
		return "Impresión creada con exito";

	}

	function getIdImpresion(){
		$this->query = mysql_query("SELECT id_impresiones FROM impresiones ORDER BY id_impresiones DESC")
			or die("Error en la consulta getIdImpresion");

		$this->result = mysql_fetch_array($this->query);

		return $this->result;

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

		return $this->result;

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
		
		return $this->result;	
	}

	function crearValoresFacturados($datosValoresFacturados){
		$this->query = mysql_query("INSERT INTO valores_facturados (
										fact_exenta,
										fact_afecta,
										bol_honorario,
										invoice,
										inspector) 
									VALUES (
										'$datosValoresFacturados[0]',
										'$datosValoresFacturados[1]',
										'$datosValoresFacturados[2]',
										'$datosValoresFacturados[3]',
										'$datosValoresFacturados[4]')") or die ("Error en la consulta crearValoresFacturados");

		return "Valores Facturados creada con exito";

	}

	function getIdValoresFacturados (){

		$this->query = mysql_query("SELECT id_valores_facturados FROM valores_facturados ORDER BY id_valores_facturados DESC")
			or die("Error en la consulta getIdValoresFacturados");

		$this->result = mysql_fetch_array($this->query);

		return $this->result;
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

		return $this->result;

	 }

	 function CrearLiquidacion ($datosLiquidacion){

	 	$this->query = mysql_query("INSERT INTO liquidaciones (
	 									id_proyectos,
	 									id_porce_acuerdos,
	 									id_valor_dolar,
	 									id_otros_gastos,
	 									id_impresiones,
	 									id_rediciones_de_gastos,
	 									id_valores_facturados,
	 									id_gc_informes,
	 									numero_liq,
	 									fecha_creacion,
	 									ref_cliente,
	 									num_cont,
	 									turnos_trabajados,
	 									tarifado,
	 									activo) 
	 								VALUES (
										'$datosLiquidacion[0]',
										'$datosLiquidacion[1]',
										'$datosLiquidacion[2]',
										'$datosLiquidacion[3]',
										'$datosLiquidacion[4]',
										'$datosLiquidacion[5]',
										'$datosLiquidacion[6]',
										'$datosLiquidacion[7]',
										'$datosLiquidacion[8]',
										'$datosLiquidacion[9]',
										'$datosLiquidacion[10]',
										'$datosLiquidacion[11]',
										'$datosLiquidacion[12]',
										'$datosLiquidacion[13]',
										'$datosLiquidacion[14]')") or die ("Error en la consulta CrearLiquidacion");

	 }





}


/*	$miobj = new Liquidacion;
	//$array = array(1, "2013-08-21", "probar", 1, "Omito",1,1,2, "Muchas Gracias",0,5,"Omar Tarifado", 100,50,40,30,1, "RendicionCode", 50000,200,100,2,"Detalle de Impresion",100000,"Gastos de Informe",10000,1,0,"Estos son otros Gastos", 30000);
	echo $miobj->getNumLiquidacion();
*/
?>