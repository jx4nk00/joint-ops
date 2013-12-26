<?php 
	include ('clases/usuario.php');
	include ('clases/proyecto.php');
	include ('clases/proforma.php');
	include ('clases/liquidacion.php');
	include ('clases/miscelaneo.php');
	include ('clases/cliente.php');
	include ('Numbers/Words.php');

	require ('fpdf.php');

	$pdf = new FPDF('P','in','A4');
	$Usuario = new Usuario();
	$Proyecto = new Proyecto();
	$Proforma = new Proforma();
	$Cliente = new Cliente;
	$Liquidacion = new Liquidacion();
	$Miscelaneos = new Miscelaneo();
	$Palabra = new Numbers_Words();

	$idDeProyecto = $_GET['idProyecto'];

	$infoCliente = $Cliente->getDatosCliente($idDeProyecto);
	$infoDeProyecto = $Proyecto->getInfoProyecto($idDeProyecto);
	$clienteRef = $Liquidacion->getReferenciaCliente($idDeProyecto);
	$infoLiquidacion = $Liquidacion->getInfoLiquidacion($idDeProyecto);
	$infoVF = $Liquidacion->getInfoVF($idDeProyecto);
	$valorDolar = $Miscelaneos->obtenerDolar();
	$infoHonProforma = $Proforma->verProforma($idDeProyecto);
	$FechaProf = $Proforma->getDiasProforma($infoHonProforma[0]);

	//Variables Reales
	$nombreDeNave = $infoDeProyecto[5];
	$codigoInforme = $Proyecto->getCodigoProyecto($infoDeProyecto[3]);
	$refcliente = $clienteRef[0];
	$sres = $infoCliente[2];
	$rut = $infoCliente[3]; 
	$direccion = $infoCliente[4];
	$comuna = $infoCliente[5];
	$ciudad = $infoCliente[6];
	$giro = $infoCliente[7];
	$tarifa = $infoLiquidacion[13]; 
	$valorDolar = $valorDolar[1];
	$TotalProforma = $infoHonProforma[4];
	$direccion = $Proyecto->getDirLugar($infoDeProyecto[1]);
	$totalPalabras = strtoupper($Palabra->toWords($TotalProforma,'es').' PESOS');
	$fechaInicio = date("d F Y",strtotime($FechaProf[1]));
	$fechaFin = date("d F Y",strtotime($FechaProf[(count($FechaProf)-1)]));
	$dia = date("d");
	$mesFactura = $Miscelaneos->traductorMes(date("d F Y"));
	$anno = date("Y");

	//traduciendo mes
	if(count($FechaProf)>2){
	$mes = $Miscelaneos->traductorMes($fechaInicio);
	$mesF = $Miscelaneos->traductorMes($fechaFin);

	$fechaI = date("d ",strtotime($fechaInicio))." ".$mes." ".date("Y",strtotime($fechaInicio));
	$fechaF = date("d",strtotime($fechaFin))." ".$mesF." ".date("Y",strtotime($fechaFin));
	}
	else{
	$mes = $Miscelaneos->traductorMes($fechaInicio);
	$fechaI = date("d ",strtotime($fechaInicio))." ".$mes." ".date("Y",strtotime($fechaInicio));
	}

////////////////////////////////////////////////////////////////////////////////////////////////

	//armado del printer_delete_font(font_handle)
	$pdf->AddPage('P','Letter');
	$pdf->Image('img/factura.png',0,-0.6,8.5,11);
	$pdf->SetFont('Arial','B',10);

	//Dia
	$pdf->SetY(1.73);
	$pdf->SetX(0.9);
	$pdf->Cell(0,0,$dia);

	//Mes
	$pdf->SetY(1.73);
	$pdf->SetX(1.7);
	$pdf->Cell(0,0,$mesFactura);

	//anno
	$pdf->SetY(1.73);
	$pdf->SetX(3.75);
	$pdf->Cell(0,0,$anno);

	//sres
	$pdf->SetY(2.04);
	$pdf->SetX(1.1);
	$pdf->Cell(0,0,$sres);

	//rut
	$pdf->SetY(2.04);
	$pdf->SetX(5.7);
	$pdf->Cell(0,0,$rut);

	//direccion
	$pdf->SetY(2.33);
	$pdf->SetX(1.1);
	$pdf->Cell(0,0,$direccion[0]);

	//Comuna
	$pdf->SetY(2.33);
	$pdf->SetX(5.9);
	$pdf->Cell(0,0,$comuna);

	//Ciudad
	$pdf->SetY(2.62);
	$pdf->SetX(0.9);
	$pdf->Cell(0,0,$ciudad);

	//giro
	$pdf->SetY(2.62);
	$pdf->SetX(3);
	$pdf->Cell(0,0,$giro);

	//detalle
	$pdf->SetX(0);
	$pdf->SetY(3.95);

	$pdf->Cell(0.85,0.2,'01',0,0,'C');
	$pdf->Cell(4.67,0.2,'GENERAL CONDITION SURVEY (H&M)',0,1);
	$pdf->Cell(0.85,0.25,'',0,0);
	$pdf->Cell(4.67,0.25,$nombreDeNave,0,1);
	$pdf->Cell(0.83,0.25,'',0,0);
	$pdf->Cell(4.67,0.25,$direccion[0],0,1);

	//Espacio//
	$pdf->Cell(0.85,0.25,'',0,0);
	$pdf->Cell(4.67,0.25,'',0,1);
	//////////

	if(count($FechaProf)>2){
	$pdf->Cell(0.85,0.25,'',0,0);
	$pdf->Cell(4.67,0.25,'('.$fechaI.' & '.$fechaF.')',0,1);
	$pdf->Cell(0.85,0.25,'',0,0);
	$pdf->Cell(4.67,0.25,$codigoInforme,0,1);
	$pdf->Cell(0.85,0.25,'',0,0);
	$pdf->Cell(4.67,0.25,$refcliente,0,1);
	}
	else{
	$pdf->Cell(0.85,0.25,'',0,0);
	$pdf->Cell(4.67,0.25,'('.$fechaI.')',0,1);
	$pdf->Cell(0.85,0.25,'',0,0);
	$pdf->Cell(4.67,0.25,$codigoInforme,0,1);
	$pdf->Cell(0.85,0.25,'',0,0);
	$pdf->Cell(4.67,0.25,$refcliente,0,1);	
	}


	//Espacio//
	$pdf->Cell(0.79,0.25,'',0,0);
	$pdf->Cell(4.67,0.25,'',0,1);
	///////////

	$pdf->Cell(0.85,0.25,'',0,0);
	$pdf->Cell(4.67,0.25,'TARIFA: USD '.$tarifa,0,1);
	$pdf->Cell(0.85,0.25,'',0,0);
	$pdf->Cell(4.67,0.25,'(Tasa de cambio: $'.$valorDolar.')',0,0);
	$pdf->Cell(2.1,0.25,'$'.$TotalProforma,0,1,'R');

	//Total en palabras
	$pdf->SetY(8.65);
	$pdf->SetX(0.8);	
	$pdf->Cell(4.67,0.2,$totalPalabras,0,0);


	//Total
	$pdf->SetY(9.6);
	$pdf->SetX(7.32);	
	$pdf->Cell(0,0.2,'$'.$TotalProforma,0,0);

	$nombreArchivo="FACTURA-".str_replace('-','',str_replace('/', '', $codigoInforme)).".pdf";

	$pdf->Output($nombreArchivo,"I");

 ?>