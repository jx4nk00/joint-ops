<?php 
	session_start();
	include ('clases/usuario.php');
	include ('clases/proyecto.php');
	include ('clases/liquidacion.php');
	include ('clases/miscelaneo.php');
	include ('clases/proforma.php');
	if(!$_SESSION['login']){
		header('location:index.php');
	}

	require ('fpdf.php');

	$pdf = new FPDF('P','in','A4');
	$Usuario = new Usuario;
	$Proyecto = new Proyecto;
	$Liquidacion = new Liquidacion;
	$Miscelaneo = new Miscelaneo;
	$Proforma = new Proforma;

	$numeroProforma = $Proforma->getIdProforma();

	$nombreCompleto = $Usuario->getUserName($_SESSION['Id_Usuario']);
	$idDeProyecto = $_GET['idProyecto'];
	$infoDeProyecto = $Proyecto->getInfoProyecto($idDeProyecto);

	$IdcodigoDeInforme = $infoDeProyecto[3];
	$codigoDeInforme = $Proyecto->getCodigoProyecto($IdcodigoDeInforme);

	$nombreDeLaNave = $infoDeProyecto[5];

	$referenciaCliente= $Liquidacion->getReferenciaCliente($idDeProyecto);
	$referenciaCliente=$referenciaCliente[0];

	$lugarDeServicio = $infoDeProyecto[1];
	$nombreLugar = $Liquidacion->getLugar($lugarDeServicio);
	$nombreLugar = $nombreLugar[0];

	$descripcionServicio = $infoDeProyecto[8];

	$valorDolar = $Miscelaneo->obtenerDolar();
	$valorDolar = $valorDolar[1];

	$idResponsable=$infoDeProyecto[2];
	$nombreResponsable=$Usuario->getUserName($idResponsable);

	$getLugares = $Proyecto->getLugares();
	$getResponsables= $Proyecto->getResponsables();



	// Información Proforma
	$datosProforma = $Proforma->verProforma($idDeProyecto);

	$idProforma =$datosProforma[0];
	$idProyectos = $datosProforma[1];
	$fechaCreacion = $datosProforma[2];
	$cliente = $datosProforma[3];
	$totalProforma = $datosProforma[4];

	$datosHonPro = $Proforma->getHonPrint($idProforma);

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////7

	$pdf->AddPage('L','Letter');
	$pdf->Image('img/Jointops.png',3.3,0,4,0);
	$pdf->SetFont('Arial','B',15);


	$pdf->SetY(0.6);
	$pdf->Cell(0,0.2,utf8_decode("Proforma de Facturación"),0,1,'C');
	$pdf->Cell(0,-0.2,utf8_decode("________________________________________________________________________________________"),0,1,'C');

	$pdf->SetY(0.9);
	$pdf->SetFont('Arial','',10);

	$pdf->Cell(0,0.2,utf8_decode("MARINE TECHNICAL SURVEYS - TECHNICAL ADVISORS - HULL & MACHINERY - ENGINEERING - PORT CAPTAIN"),0,1,'C');
	$pdf->Cell(0,0.2,utf8_decode("LOSS & GENERAL AVERAGE ADJUSTERS - MARINE EXPERT APPRAISERS"),0,1,'C');
	$pdf->Cell(0,0.2,utf8_decode("SUPERINTENDENTS - SUPERCARGO - CONTROL QUALITY"),0,1,'C');
	$pdf->Cell(0,0.2,utf8_decode("CERTIFICATIONS"),0,1,'C');

	$pdf->Cell(0,0.2,'',0	,1);

	//proforma
	$pdf->Cell(1.7,0.2,utf8_decode("PROFORMA N°: "),0,0);
	$pdf->Cell(1.7,0.2,utf8_decode($idProforma),0,0);
	$pdf->Cell(0,0.2,utf8_decode("FECHA: ".date('F d, Y')),0,1,'R');

	//datos
	$pdf->Cell(1.7,0.2,utf8_decode("INFORME N°: "),0,0);
	$pdf->Cell(1.7,0.2,utf8_decode($codigoDeInforme),0,1);
	$pdf->Cell(1.7,0.2,utf8_decode("NAVE: "),0,0);
	$pdf->Cell(1.7,0.2,utf8_decode($nombreDeLaNave),0,1);
	$pdf->Cell(1.7,0.2,utf8_decode("CLIENTE: "),0,0);
	$pdf->Cell(1.7,0.2,utf8_decode($cliente),0,1);
	$pdf->Cell(1.7,0.2,utf8_decode("REFERENCIA CLIENTE: "),0,0);
	$pdf->Cell(1.7,0.2,utf8_decode($referenciaCliente),0,1);
	$pdf->Cell(1.7,0.2,utf8_decode("LUGAR: "),0,0);
	$pdf->Cell(1.7,0.2,utf8_decode($nombreLugar),0,1);
	$pdf->Cell(1.7,0.2,utf8_decode("SERVICIO: "),0,0);
	$pdf->Cell(1.7,0.2,utf8_decode($descripcionServicio),0,1);

	//Titulo Horarios
	$pdf->SetFont('Arial','B',15);

	$pdf->Cell(0,0.2,utf8_decode(""),0,1);	
	$pdf->Cell(0,0.2,utf8_decode("Horarios"),0,1);
	$pdf->Cell(0,-0.2,utf8_decode("________________________________________________________________________________________"),0,1,'C');

	$pdf->SetY(3.8);
	$pdf->SetFont('Arial','',10);

	while($row = mysql_fetch_array($datosHonPro)){

	$n_lugar = $Proforma->getlugar($row[4]);
	$n_usuario = $Usuario->getUserName($row[5]);

	$pdf->Cell(2.267,0.2,utf8_decode("FECHA: ".$row[2]),1,0);
	$pdf->Cell(0,0.2,utf8_decode("DETALLE: ".$row[3]),1,1);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(1.459,0.2,utf8_decode("Ciudad: "),1,0);
	$pdf->Cell(1.459,0.2,utf8_decode("Inspector: "),1,0);
	$pdf->Cell(1.459,0.2,utf8_decode("Calificación: "),1,0);
	$pdf->Cell(1.459,0.2,utf8_decode("Unidad Cobro: "),1,0);
	$pdf->Cell(1.459,0.2,utf8_decode("Valor USD: "),1,0);
	$pdf->Cell(1.459,0.2,utf8_decode("Cantidad H/T/D: "),1,0);
	$pdf->Cell(1.459,0.2,utf8_decode("Total USD: "),1,1);

	$pdf->SetFont('Arial','',10);

	$pdf->Cell(1.459,0.2,utf8_decode($n_lugar[0]),1,0,'C');
	$pdf->Cell(1.459,0.2,utf8_decode($n_usuario),1,0,'C');
	$pdf->Cell(1.459,0.2,utf8_decode($row[6]),1,0,'C');
	
	$pdf->Cell(1.459,0.2,utf8_decode($row[7]),1,0,'C');
	$pdf->Cell(1.459,0.2,utf8_decode($row[8]),1,0,'C');
	$pdf->Cell(1.459,0.2,utf8_decode($row[9]),1,0,'C');
	$pdf->Cell(1.459,0.2,utf8_decode($row[10]),1,1,'C');
	$pdf->Cell(0,0.2,'',0,1,'C');
	}
	$pdf->Cell(0,0.2,utf8_decode("TOTAL:".$totalProforma."       "),1,1,'R');
	$pdf->Cell(0,0.1,'',0,1,'C');


	//Pagina nueva
	$pdf->AddPage('L','Letter');
	$pdf->Image('img/firma-ops.png',4.5,2.2,0,0);
	$pdf->Cell(0,0.2,utf8_decode('P = Aplica valor Inspector Profesional.'),0,1);
	$pdf->Cell(0,0.2,utf8_decode('T = Aplica valor Inspector Técnico.'),0,1);
	$pdf->Cell(0,0.2,utf8_decode('M = Aplica valor mínimo segun tarifado establecido.'),0,1);
	$pdf->Cell(0,0.2,utf8_decode('S = Aplica Valor Según Servicio Previamente Establecido, Cotizado o Rendido.'),0,1);
	$pdf->Cell(0,0.2,'',0,1,'C');

	$pdf->SetFont('Arial','B',15);
	$pdf->Cell(0,-0.2,utf8_decode("________________________________________________________________________________________"),0,1,'C');
	$pdf->Cell(0,0.2,'',0,1,'C');
	$pdf->SetFont('Arial','B',10);

	$pdf->Cell(0,0.2,'Nota:',0,1,'C');	
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(0,0.2,utf8_decode('Cabe señalar para todas vuestras consideraciones contables internas del presente servicio, que para efectos de su cobro se emitirá por nuestra parte'),0,1,'C');
	$pdf->Cell(0,0.2,utf8_decode('en el momento que ustedes lo señalen, una factura de venta y servicios no afecta a IVA (Exenta), por lo tanto el (los) valor (es) del servicio'),0,1,'C');
	$pdf->Cell(0,0.2,utf8_decode('antes indicado es el valor efectivo de cancelación, no existiendo otros cargos adicionales.'),0,1,'C');

	$pdf->Cell(0,0.2,'',0,1,'C');
	$pdf->Cell(0,0.2,'',0,1,'C');
	$pdf->Cell(0,0.2,'',0,1,'C');
	$pdf->Cell(0,0.2,'',0,1,'C');
	$pdf->Cell(0,0.2,'',0,1,'C');
	$pdf->Cell(0,0.2,'___________________',0,1,'C');
	$pdf->Cell(0,0.2,'Osvaldo Pizarro A.',0,1,'C');
	$pdf->Cell(0,0.2,'Marine Engineer & Cargo Surveyor',0,1,'C');
	$pdf->Cell(0,0.2,'Master of naval Engineering (APN)',0,1,'C');
	$pdf->Cell(0,0.2,'COORDINADOR DE SERVICIOS',0,1,'C');
	
	$pdf->Output();

 ?>