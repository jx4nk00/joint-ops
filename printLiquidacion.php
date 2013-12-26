<?php 
	session_start();
	include ('clases/usuario.php');
	include ('clases/proyecto.php');
	include ('clases/liquidacion.php');
	include ('clases/miscelaneo.php');
	if(!$_SESSION['login']){
		header('location:index.php');
	}

	require ('fpdf.php');

	$pdf = new FPDF('P','in','A4');
	$Usuario = new Usuario;
	$Proyecto = new Proyecto;
	$Liquidacion = new Liquidacion;
	$Miscelaneo = new Miscelaneo;

	$nombreCompleto = $Usuario->getUserName($_SESSION['Id_Usuario']);
	$idDeProyecto = $_GET['idProyecto'];
	$infoDeProyecto = $Proyecto->getInfoProyecto($idDeProyecto);

	//Sistema
	$fechaDeLiquidación=date('Y-m-d');

	//Tabla Liquidaciones
		$numeroDeLiquidacion=$Liquidacion->getNumLiquidacion();
		$infoLiquidacion = $Liquidacion->getInfoLiquidacion($idDeProyecto);
		$idLiquidacion = $infoLiquidacion[0];
		$idOtrosGastos = $infoLiquidacion[3];
		$idImpresiones = $infoLiquidacion[4];
		$idRendicionGasto = $infoLiquidacion[5];
		$idValoresFacturados = $infoLiquidacion[6];
		$idGCInforme = $infoLiquidacion[7];
		$referenciaCliente = $infoLiquidacion[10];
		$numContenedores = $infoLiquidacion[11]; 
		$turnosTrabajados = $infoLiquidacion[11];
		$tafifado = $infoLiquidacion[13];
		$totalInspector = $infoLiquidacion[14];

	// Tabla Valores Facturados
		$infoVF = $Liquidacion->getInfoVF($idValoresFacturados);
		//Factura Exenta
		$FENeto = $infoVF[1];
		$FETotal = $infoVF[5];
		//Factura Afecta
		$FANeto = $infoVF[2];
		$FAIva = $FANeto*0.19;
		$FATotal = $infoVF[6];
		//Boleta Honorario
		$BHNeto = $infoVF[3];
		$BHIva = $BHNeto * 0.10;
		$BHTotal = $infoVF[7];
		//Invoice
		$INeto = $infoVF[4];
		$ITotal = $infoVF[8];

	// Tabla Rendicion de Gastos
		$infoRG = $Liquidacion->getInfoRG($idRendicionGasto);
		$codigoRG = $infoRG[1];
		$totalRG = $infoRG[2];

	//Tabla Impresiones
		$infoImpresion = $Liquidacion->getInfoImpresiones($idImpresiones);
		$valorHoja = $infoImpresion[1];
		$cantHoja = $infoImpresion[2];
		$numCopias = $infoImpresion[3];
		$detalleImpresion = $infoImpresion[4];
		$totalImpresion = $infoImpresion[5];

	// Tabla gc_informes
		$infoGC = $Liquidacion->getInfoGC($idGCInforme);
		$detalleGC = $infoGC[1];
		$totalGC = $infoGC[2];


	// Tabla otros_gastos
		$infoOG = $Liquidacion->getInfoOG($idOtrosGastos);
		$detalleOG = $infoOG[1];
		$valorOG = $infoOG[2];

	//Tabla Proyectos
	$lugarDeServicio = $infoDeProyecto[1];
	$idMiembros = $infoDeProyecto[2];
	$IdcodigoDeInforme = $infoDeProyecto[3];
	$nombreDeLaNave = $infoDeProyecto[5];

	//Tabla Servicios
	$servicios = $Proyecto->getServiciosDeProyecto($idDeProyecto);

	//Tabla Lugares
	$nombreLugar = $Liquidacion->getLugar($lugarDeServicio);
	
	//Tabla Codigo
	$codigoDeInforme = $Proyecto->getCodigoProyecto($IdcodigoDeInforme);

	//Tabla inspectores_ayudantes
	$inspCargo = $Usuario->getUserName($idMiembros);
	$inspParticipantes;

	//mes
	$mes = $Miscelaneo->traductorMes(date("d F Y"));

////////////////////////////////////////////////////////////////////////////////

	$pdf->AddPage('P','Letter');
	$pdf->Image('img/Jointops.png',2,0,4,0);
	$pdf->SetFont('Arial','',11);


	//N° liquidación
	$pdf->SetY(1);
	$pdf->Cell(0,0.2,utf8_decode("Liquidación N: ".$numeroDeLiquidacion),0,1);
	$pdf->Cell(0,0.2,utf8_decode("Fecha: ").date("Y-m-d"),0,1);

	//espacio
	$pdf->Cell(0,0.2,"",0,1);

	//titulo
	$pdf->SetFont('Arial','B',15);
	$pdf->Cell(0,0.2,utf8_decode("Liquidación de Servicio OPServices"),0,1,'C');

	//espacio
	$pdf->Cell(0,0.2,"",0,1);

	//Datos Generales
	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(0,0.2,"1.- Datos Generales",0,1);
	$pdf->SetFont('Arial','',11);

	//espacio
	$pdf->Cell(0,0.2,"",0,1);


	$pdf->Cell(2,0.2,"Nombre de la nave: ",0,0);
	$pdf->Cell(2,0.2,$nombreDeLaNave,0,1);
	$pdf->Cell(2,0.2,utf8_decode("Código de informe: "),0,0);
	$pdf->Cell(2,0.2,$codigoDeInforme,0,1);
	$pdf->Cell(2,0.2,"Referencia Cliente: ",0,0);
	$pdf->Cell(2,0.2,$referenciaCliente,0,1);
	$pdf->Cell(2,0.2,"Lugar de Servicio: ",0,0);
	$pdf->Cell(2,0.2,$nombreLugar[0],0,1);
	$pdf->Cell(2,0.2,"Inspector/es a Cargo: ",0,0);
	$pdf->Cell(2,0.2,utf8_decode($inspCargo),0,1);
	$pdf->Cell(2,0.2,"Inspector/es Participantes:",0,0);
	$pdf->Cell(2,0.2,"--",0,1);
	$pdf->Cell(2,0.2,"Servicio(s) Realizado: ",0,0);
	$pdf->Cell(2,0.2,str_replace("</li>",' / ',str_replace("<li>",'',utf8_decode($servicios))),0,1);
	$pdf->Cell(2,0.2,utf8_decode("Número de Contenedores: "),0,0);
	$pdf->Cell(2,0.2,$numContenedores,0,1);
	$pdf->Cell(2,0.2,"Turnos totales trabajados: ",0,0);
	$pdf->Cell(2,0.2,$turnosTrabajados,0,1);
	$pdf->Cell(2,0.2,"Tarifado: ",0,0);
	$pdf->Cell(2,0.2,$tafifado,0,1);

	//espacio
	$pdf->Cell(0,0.2,"",0,1);

	$pdf->Cell(2,0.2,"Valor Facturado",1,0,'C');
	$pdf->Cell(2,0.2,"Neto",1,0,'C');
	$pdf->Cell(2,0.2,"IVA/RETEN",1,0,'C');
	$pdf->Cell(1.715,0.2,"Total",1,1,'C');

	//Factura Excenta
	$pdf->Cell(2,0.2,"Factura excenta",1,0,'C');
	$pdf->Cell(2,0.2,$FENeto,1,0,'C');
	$pdf->Cell(2,0.2,"--",1,0,'C');
	$pdf->Cell(1.715,0.2,"$ ".$FETotal,1,1,'C');
	//Factura Afecta
	$pdf->Cell(2,0.2,"Factura afecta",1,0,'C');
	$pdf->Cell(2,0.2,$FANeto,1,0,'C');
	$pdf->Cell(2,0.2,$FAIva,1,0,'C');
	$pdf->Cell(1.715,0.2,"$ ".$FATotal,1,1,'C');
	//Boleta de Honorarios
	$pdf->Cell(2,0.2,"Boleta de honorarios",1,0,'C');
	$pdf->Cell(2,0.2,$BHNeto,1,0,'C');
	$pdf->Cell(2,0.2,$BHIva,1,0,'C');
	$pdf->Cell(1.715,0.2,"$ ".$BHTotal,1,1,'C');
	//Invoice
	$pdf->Cell(2,0.2,"Invoice",1,0,'C');
	$pdf->Cell(2,0.2,$INeto,1,0,'C');
	$pdf->Cell(2,0.2,"--",1,0,'C');
	$pdf->Cell(1.715,0.2,"$ ".$ITotal,1,1,'C');

	//espacio
	$pdf->Cell(0,0.2,"",0,1);


	//Gastos Generales 2
	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(0,0.2,"2.- Gastos generales incurridos",0,1);
	$pdf->SetFont('Arial','',11);	


	//Texto Total
	$pdf->Cell(6.5696,0.2," ",0,0);
	$pdf->Cell(1.1424,0.2,"Total",0,1,'C');

	//Rendicion
	$pdf->Cell(2,0.2,utf8_decode("Rendición de gastos: "),1,0,'C');
	$pdf->Cell(4.5696,0.2,utf8_decode($codigoRG),1,0);
	$pdf->Cell(1.1424,0.2,"$ ".$totalRG,1,1,'C');

	//Gastos inspector
	$pdf->Cell(2,0.2,"",1,0,'C');
	$pdf->Cell(1.1424,0.2,"Valor Hoja",1,0,'C');
	$pdf->Cell(1.1424,0.2,"Cant Hoja",1,0,'C');
	$pdf->Cell(1.1424,0.2,utf8_decode("N° Copias"),1,0,'C');
	$pdf->Cell(1.1424,0.2,"Detalle",1,0,'C');
	$pdf->Cell(1.1424,0.2,"",1,1,'C');

	//impresion informe
	$pdf->Cell(2,0.2,utf8_decode("Impresión informe"),1,0,'C');
	$pdf->Cell(1.1424,0.2,$valorHoja,1,0,'C');
	$pdf->Cell(1.1424,0.2,$cantHoja,1,0,'C');
	$pdf->Cell(1.1424,0.2,$numCopias,1,0,'C');
	$pdf->Cell(1.1424,0.2,utf8_decode($detalleImpresion),1,0,'C');
	$pdf->Cell(1.1424,0.2,"$ ".$totalImpresion,1,1,'C');

	//Gastos Confeccion informe
	$pdf->Cell(2,0.2,utf8_decode("Gastos confección informe"),1,0,'C');
	$pdf->Cell(4.5696,0.2,utf8_decode($detalleGC),1,0);
	$pdf->Cell(1.1424,0.2,"$ ".$totalGC,1,1,'C');

	//Otros Gastos
	$pdf->Cell(2,0.2,"Otros Gastos",1,0,'C');
	$pdf->Cell(4.5696,0.2,utf8_decode($detalleOG),1,0);
	$pdf->Cell(1.1424,0.2,"$ ".$valorOG,1,1,'C');

	//total
	$pdf->Cell(6.5696,0.2,"Total: ",1,0,'R');
	$pdf->Cell(1.1424,0.2,"$ ".$totalInspector,1,1,'C');


	$pdf->SetY(9);
	$pdf->Cell(0,0.4,"______________________________________________________________",0,1,'C');
	$pdf->Cell(0,0,"Documentos generado el ".date("d")." de ".$mes." del ".date("Y"),0,1,'C');


	

	$nombreArchivo = "LIQUIDACION-".str_replace("-","",str_replace("/","",$codigoDeInforme)).".pdf";

	$pdf->Output($nombreArchivo,"I");

 ?>