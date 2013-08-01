<?php 
include ('string.php');

function logear ($user, $pass){

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

function ver_usuarios(){
	$consulta = mysql_query("SELECT * FROM miembros mi
							 JOIN privilegios pri
							 ON mi".'.'."id_privilegio = pri".'.'."id_privilegio
							 JOIN datos_miembros dm
							 ON mi".'.'."id_datos = dm".'.'."id_datos") 

	or die ("Error en la consulta");
	return $consulta;
}

function eliminar_usuario($id){
	$consulta = mysql_query("UPDATE miembros SET activo = 0 WHERE id_miembros = '$id'");
	return "Usuario Eliminado";
	
}

function editar_usuario(){

}

function crear_usuario(){
	
}


function get_fecha(){
	return date('d-m-Y');
}


function subir_informe($ruta, $code){

	$consulta = mysql_query("INSERT INTO informes (ruta,cod_informe) VALUES ('$ruta','$code')");

}

function ultimo_dolar(){
	$consulta = mysql_query("SELECT id_valor_dolar,valor FROM valor_dolar ORDER BY id_valor_dolar DESC");
	$valor = mysql_fetch_array($consulta);

	return $valor[1];
}

function ultimo_informe(){
	$consulta = mysql_query("SELECT id_informes FROM informes ORDER BY id_informes DESC");
	$valor = mysql_fetch_array($consulta);

	return $valor[0];
}

function liquidacion_insp($ejecutor,$array){

// === Otros Gastos ===
$detalle = $array[28];
$valor = $array[29];

$otrosGastos = mysql_query("INSERT INTO otros_gastos (detalle,valor,inspector)VALUES ('$detalle','$valor',1)");

$aux = mysql_query("SELECT id_otros_gastos FROM otros_gastos ORDER BY id_otros_gastos DESC");
$idUltimoOtrosGastos = mysql_fetch_array($aux);
$idUltimoOtrosGastos = $idUltimoOtrosGastos[0];


// === Impresiones ===
$valorHoja = $array[19];
$cantHojas = $array[20];
$numCopias = $array[21];
$detalle = $array[22];

$impresiones = mysql_query("INSERT INTO impresiones (valor_hoja,cant_hojas,num_copias,detalle,inspector)VALUES('$valorHoja','$cantHojas','$numCopias','$detalle',1)");

$aux = mysql_query("SELECT id_impresiones FROM impresiones ORDER BY id_impresiones DESC");
$idUltimaImpresion = mysql_fetch_array($aux);
$idUltimaImpresion = $idUltimaImpresion[0];

// === Rendiciones de Gastos ===
$codigoRend = $array[17];
$totalRend = $array[18];

$rendiciones = mysql_query("INSERT INTO rendiciones_de_gastos (codigo_rend,total_rend,inspector)VALUES('$codigoRend','$totalRend',1)");

$aux = mysql_query("SELECT id_rendiciones_de_gastos FROM rendiciones_de_gastos ORDER BY id_rendiciones_de_gastos DESC");
$idUltimaRG = mysql_fetch_array($aux);
$idUltimaRG = $idUltimaRG[0];


// === Valores Facturados ===
$factExenta = $array[12];
$factAfecta = $array[13];
$BolHono = $array[14];
$invoice = $array[15];

$valoresFacturados = mysql_query("INSERT INTO valores_facturados (fact_exenta,fact_afecta,bol_honorario,invoice,inspector) VALUES ('$factExenta','$factAfecta','$BolHono','$invoice',1)");

$aux = mysql_query("SELECT id_valores_facturados FROM valores_facturados ORDER BY id_valores_facturados DESC");
$idUltimoVF = mysql_fetch_array($aux);
$idUltimoVF = $idUltimoVF[0];


// === Gastos Confección de Informes ===

$detalle= $array[24];
$totalGastos= $array[25];

$gcInformes = mysql_query("INSERT INTO gc_informes (detalle,total_gastos,inspector)VALUES('$detalle','$totalGastos',1)");

$aux = mysql_query("SELECT id_gc_informes FROM gc_informes ORDER BY id_gc_informes DESC");
$idUltimoGCI = mysql_fetch_array($aux);
$idUltimoGCI = $idUltimoGCI[0];



$numLiq= $array[0];
$fechaCreacion = $array[1];
$nombreServicio = $array[2];
$refCliente = $array[4];
$servicio = $array[8];
$numCont = $array[9];
$TTrabajados = $array[10];
$tarifado = $array[11];


$consulta = mysql_query("INSERT INTO liquidaciones (id_informes,id_porce_acuerdos,id_valor_dolar,id_lugares,id_otros_gastos,id_impresiones,id_rendiciones_de_gastos,id_valores_facturados,id_gc_informes,numero_liq,fecha_creacion,nombre_servicio,ref_cliente,servicio,num_cont,turnos_trabajados,tarifado) VALUES (1,1,1,2,'$idUltimoOtrosGastos','$idUltimaImpresion','$idUltimaRG','$idUltimoVF','$idUltimoGCI','$numLiq','$fechaCreacion','$nombreServicio','$refCliente','$servicio','$numCont','$TTrabajados','$tarifado')");

$log = mysql_query("INSERT INTO registros (id_miembro,detalle) VALUES ('$ejecutor','Liquidacion insertada el dia: ".$fechaCreacion.".')");
}

/* 
	[0]num_liquidacion X
	[1]fecha X
	[2]nombreNave X
	[3]numInforme X
	[4]refCliente X
	[5]Lugar X Agregar Lugar
	[6]inspAC X Agregar inspector
	[7]isnppart X Agregar Inspector
	[8]servicio X
	[9]contenedores X
	[10]turnos X
	[11]tarifado X

	[12]factExe X
	[13]factAfe X
	[14]Bolhon X
	[15]invoi X
	[16]tasaDeCambio X

	[17]codigoRendicion  X    || [18]totalRendicion X
	[19]valorxHoja        X   || [20]cantHojas X              || [21]numCopia X|| [22]detalleImprecion X|| [23]totalImpresion X
	[24]GastosConfinfo    X   || [25]TotalGastosConfInforme X
	[26]inspectoresAyudantes X|| [27]pagoInspectoresAyudantes X
	[28]otrosGastos       X   || [29]TotalotrosGastos X
*/

/*
$array = array(1, "1988-09-21", "NaveOmar", 1, "Omito",1,1,2, "NoTeDuermas omi",0,5,"Omar Tarifado", 100,50,40,30,1, "RendicionCode", 50000,200,100,2,"Detalle de Impresion",100000,"Gastos de Informe",10000,1,0,"Estos son otros Gastos", 30000);
echo liquidacion_insp(2,$array);
*/
 ?>