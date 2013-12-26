<?php 
	session_start();
	include ('clases/usuario.php');
	include ('clases/proyecto.php');
	include ('clases/liquidacion.php');
	include ('clases/miscelaneo.php');
	if(!$_SESSION['login']){
		header('location:index.php');
	}
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
		$turnosTrabajados = $infoLiquidacion[12];
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

 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Liquidación</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="Joint OPS">

	<!-- The styles -->
	<link id="bs-css" href="css/bootstrap-spacelab.css" rel="stylesheet">
	<style type="text/css">
	  body {
		padding-bottom: 40px;
		margin-top: 70px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>
	<link href="css/bootstrap-responsive.css" rel="stylesheet">
	<link href="css/charisma-app.css" rel="stylesheet">
	<link href="css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
	<link href='css/fullcalendar.css' rel='stylesheet'>
	<link href='css/fullcalendar.print.css' rel='stylesheet'  media='print'>
	<link href='css/chosen.css' rel='stylesheet'>
	<link href='css/uniform.default.css' rel='stylesheet'>
	<link href='css/colorbox.css' rel='stylesheet'>
	<link href='css/jquery.cleditor.css' rel='stylesheet'>
	<link href='css/jquery.noty.css' rel='stylesheet'>
	<link href='css/noty_theme_default.css' rel='stylesheet'>
	<link href='css/elfinder.min.css' rel='stylesheet'>
	<link href='css/elfinder.theme.css' rel='stylesheet'>
	<link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
	<link href='css/opa-icons.css' rel='stylesheet'>
	<link href='css/uploadify.css' rel='stylesheet'>

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- The fav icon -->
	<link rel="shortcut icon" href="img/favicon.ico">
		
</head>

<body>
				<!-- topbar starts -->
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="main.php"> <img alt="OPServices LOGO" src="img/Jointops.png" /></a>

				<ul class="nav nav-inner main-menu">
					<li class="divider-vertical"></li>
					<li><a class="ajax-link" href="main.php"><i class="icon-home"></i><span class="hidden-tablet"> Inicio</span></a></li>
					<li class="divider-vertical"></li>
					<li><a class="ajax-link" href="nuevoproyecto.php"><i class="icon-plus"></i><span class="hidden-tablet"> Nuevo Proyecto</span></a></li> 	
					<li class="divider-vertical"></li>
					<li><a class="ajax-link" href="crud.php"><i class="icon-user"></i><span class="hidden-tablet"> Usuarios</span></a></li>
					<li class="divider-vertical"></li>
				</ul>
				
				
				<!-- user dropdown starts -->
				<div class="btn-group pull-right" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user"></i><span class="hidden-phone"> <?php echo $_SESSION['Nombre_completo']; ?></span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="#">Perfil</a></li>
						<li class="divider"></li>
						<li><a href="logout.php">Salir</a></li>
					</ul>
				</div>
				<!-- user dropdown ends -->
				
			</div>
		</div>
	</div>
	<!-- topbar ends -->
		<div class="container-fluid">
		<div class="row-fluid">			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>Necesita tener <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> activado para usar este sitio.</p>
				</div>
			</noscript>
			
			<div id="content" class="span11">
			<!-- content starts -->
		

				<div class="row-fluid sortable">
					<div class="box span12">
						<div class="box-header well" data-original-title>
							<h2><i class="icon-pencil"></i> Liquidación</h2>
						</div>
					<div class="box-content">
						<form class="form-horizontal" method="POST" action="liquidacion.php?idProyecto=<?php echo $idDeProyecto; ?>">
						<fieldset>
							<div class="row-fluid">
								<div class="span6">
									<div class="control-group">
										<p>Liquidación Numero: <?php echo $numeroDeLiquidacion; ?></p>
										<p>Fecha: <?php echo date("Y-m-d"); ?></p>
									</div>
								</div> 
								<legend>PLANTILLA DE LIQUIDACIÓN DE SERVICIOS OPSERVICES</legend>
							</div> 

							<div class="row-fluid">
								<div class="span6">
									<div class="control-group">
										<h4>1.- DATOS GENERALES DEL SERVICIO.</h4>
									</div>
								</div> 
							</div> 

							<div class="row-fluid">
								<div class="span3">
									<div class="control-group">
										<label> Nombre de la Nave:</label>
									</div>
								</div> 
								<div class="span6 pull-left">
									<label><?php echo $nombreDeLaNave; ?></label>
									<input type="hidden" name="textNombreNave"value="Nave Dummi" />
								</div>
							</div> 

							<div class="row-fluid">
								<div class="span3">
									<div class="control-group">
										<label> Código de Informe:</label>
									</div>
								</div> 
								<div class="span6 pull-left">
									<label><?php echo $codigoDeInforme; ?></label>
									<input type="hidden" name="textCodigoInforme" value="OPS-BLABLALBA" />
								</div>
							</div> 

							<div class="row-fluid">
								<div class="span3">
									<div class="control-group">
										<label> Referencia Cliente:</label>
									</div>
								</div> 
								<div class="span6 pull-left">
									<?php echo $referenciaCliente; ?>
								</div>
							</div> 

							<div class="row-fluid">
								<div class="span3">
									<div class="control-group">
										<label> Lugar del Servicio:</label>
									</div>
								</div> 
								<div class="span6 pull-left">
									<label><?php echo $nombreLugar[0]; ?></label>
									<input type="hidden" name="textLugarServicio" value="Valparaiso" />
								</div>
							</div> 

							<div class="row-fluid">
								<div class="span3">
									<div class="control-group">
										<label>Inspector/es a Cargo:</label>
									</div>
								</div> 
								<div class="span6 pull-left">
									<ul>
										<li><?php echo $inspCargo; ?></li>
									</ul>
									<input type="hidden" name="listaInspCargo" value="1-2-13" />
								</div>
							</div> 

							<div class="row-fluid">
								<div class="span3">
									<div class="control-group">
										<label> Inspector/es Participantes:</label>
									</div>
								</div> 
								<div class="span6 pull-left">
									<ul>
										<li>Sin Ayudantes asignados.</li>
									</ul>
									<input type="hidden" name="listaInspParticipantes" value="4-5" />
								</div>
							</div> 

							<div class="row-fluid">
								<div class="span3">
									<div class="control-group">
										<label> Servicio Realizado: </label>
									</div>
								</div> 
								<div class="span6 pull-left">
									<ul>
										<?php 
											if($servicios == ""){
												echo "<li>Sin Servicios</li>";
											}
											else{
												echo $servicios; 
											}	
										?>
									</ul>
								</div>
							</div>

							<div class="row-fluid">
								<div class="span3">
									<div class="control-group">
										<label> Número de Contenedores:</label>
									</div>
								</div> 
								<div class="span6 pull-left">
									<?php echo $numContenedores; ?>
								</div>
							</div>  

							<div class="row-fluid">
								<div class="span3">
									<div class="control-group">
										<label> Turnos totales trabajados:</label>
									</div>
								</div> 
								<div class="span6 pull-left">
									<?php echo $turnosTrabajados; ?>
								</div>
							</div> 

							<div class="row-fluid">
								<div class="span3">
									<div class="control-group">
										<label> Tarifado:</label>
									</div>
								</div> 
								<div class="span6 pull-left">
									<?php echo $tafifado; ?>
								</div>
							</div> 

							<div class="row-fluid">
								<div class="span6">
								</div> 
								<div class="span2">
									<label>NETO</label>
								</div>
								<div class="span2">
									<label>IVA /RETEN</label>
								</div>
								<div class="span2">
									<label>TOTAL</label>
								</div>
							</div> 

							<div class="row-fluid">
								<div class="span3">
									<label>VALOR FACTURADO</label>
								</div> 
								<div class="span3">
									<label>FACTURA EXCENTA</label>
								</div>
								<div class="span2">
									<div class="control-group">
										<?php echo $FENeto;  ?>
									</div>
								</div>
								<div class="span2">
									<div class="control-group">
										<input id="FEIva" class="input-small" name="textFEIva" type="text" placeholder="FE IVA/RET" disabled />
									</div>
								</div>
								<div class="span2">
									<div class="control-group">
										<?php echo $FETotal; ?>
									</div>
								</div>
							</div>

							<div class="row-fluid">
								<div class="span3">
								</div> 
								<div class="span3">
									<label>FACTURA AFECTA</label>
								</div>
								<div class="span2">
									<div class="control-group">
										<?php echo $FANeto; ?>
									</div>
								</div>
								<div class="span2">
									<div class="control-group">
										<?php echo $FAIva; ?>
									</div>
								</div>
								<div class="span2">
									<div class="control-group">
										<?php echo $FATotal; ?>
									</div>
								</div>
							</div> 

							<div class="row-fluid">
								<div class="span3">
								</div> 
								<div class="span3">
									<label>BOLETA HONORARIO</label>
								</div>
								<div class="span2">
									<div class="control-group">
										<?php echo $BHNeto; ?>
									</div>
								</div>
								<div class="span2">
									<div class="control-group">
										<?php echo $BHIva; ?>
									</div>
								</div>
								<div class="span2">
									<div class="control-group">
										<?php echo $BHTotal; ?>
									</div>
								</div>
							</div>

							<div class="row-fluid">
								<div class="span3">
								</div> 
								<div class="span3">
									<label>INVOICE</label>
								</div>
								<div class="span2">
									<div class="control-group">
										<?php echo $INeto; ?>
									</div>
								</div>
								<div class="span2">
									<div class="control-group">
										<input class="input-small" name="textIVIva"type="text" placeholder="IV IVA/RET" disabled />
									</div>
								</div>
								<div class="span2">
									<div class="control-group">
										<?php echo $ITotal; ?>
									</div>
								</div>
							</div>

							<div class="row-fluid">
								<div class="span3">
									<div class="control-group">
										<label> TASA DE CAMBIO: </label>
									</div>
								</div> 
								<div class="span6 pull-left">
									<p>$520,12.-</p>
									<input type="hidden" name="idTasaDeCambio" value="1" />
								</div>
							</div>

							<div class="row-fluid">
								<div class="span6">
									<div class="control-group">
										<h4>2.- GASTOS GENERALES INCURRIDOS.</h4>
									</div>
								</div> 
							</div> 

							<div class="row-fluid">
								<div class="span10">
									<div class="control-group">
										<h5>2.1.- GASTOS DE INSPECTORES.</h5>
									</div>
								</div> 

								<div class="span2">
									<label>TOTAL</label>
								</div>
							</div> 

							<div class="row-fluid">
								<div class="span2">
									<label>RENDICION DE GASTOS</label>
								</div>
								<div class="span8">
									<div class="control-group">
										<?php echo $codigoRG; ?>
									</div>
									
								</div>
								<div class="span2">
									<div class="control-group">
										<?php echo $totalRG; ?>
									</div>
								</div>
							</div>
							<div class="row-fluid">
								<div class="span2">
								</div>
								<div class="span2">
									<label>VALOR X HOJA</label>
								</div>
								<div class="span2">
									<label>CANT. HOJAS</label>
								</div>
								<div class="span2">
									<label>N° COPIAS</label>
								</div>
								<div class="span2">
									<label>DETALLE</label>
								</div>
								<div class="span2">
								</div>
							</div>

							<div class="row-fluid">
								<div class="span2">
									<label>IMPRESIÓN INFORME</label>
								</div>
								<div class="span2">
									<div class="control-group">
										<?php echo $valorHoja; ?>
									</div>
								</div>
								<div class="span2">
									<div class="control-group">
										<?php echo $cantHoja; ?>
									</div>
								</div>
								<div class="span2">
									<div class="control-group">
										<?php echo $numCopias; ?>
									</div>
								</div>
								<div class="span2">
									<div class="control-group">
										<?php echo $detalleImpresion; ?>
									</div>
								</div>
								<div class="span2">
									<?php echo $totalImpresion; ?>
								</div>
							</div>

							<div class="row-fluid">
								<div class="span2">
									<label>GASTOS CONF INFORM</label>
								</div>
								<div class="span8">
									<div class="control-group">
										<?php echo $detalleGC; ?>
									</div>
								</div>
								<div class="span2">
									<div class="control-group">
										<?php echo $totalGC; ?>
									</div>
									
								</div>
							</div>
							<!--
							<div class="row-fluid">
								<div class="span2">
									<label>PAGO AYUDANTES</label>
								</div>
								<div class="span2">
									<label>INSP1</label>
								</div>
								<div class="span2">
									<label>INSP2</label>
								</div>
								<div class="span2">
									<label>INSP3</label>
								</div>
								<div class="span2">
									<label>INSP4</label>
								</div>
								<div class="span2">
								</div>
							</div>

							<div class="row-fluid">
								<div class="span2">
								</div>
								<div class="span2">
									<div class="control-group">
										<input type="text" name="textPagoInsp1" class="input-small" placeholder="INSP1" required />
									</div>
								</div>
								<div class="span2">
									<div class="control-group">
										<input type="text" name="textPagoInsp2" class="input-small" placeholder="INSP2" required />
									</div>
								</div>
								<div class="span2">
									<div class="control-group">
										<input type="text" name="textPagoInsp3" class="input-small" placeholder="INSP3" required />
									</div>
								</div>
								<div class="span2">
									<div class="control-group">
										<input type="text" name="textPagoInsp4" class="input-small" placeholder="INSP4" required />
									</div>
								</div>
								<div class="span2">
									<label>$0.-</label>
									<input type="hidden" name="textTotalPagoInsp" value="0" />
								</div>
							</div>
							-->
							<div class="row-fluid">
								<div class="span2">
									<label>OTROS GASTOS</label>
								</div>
								<div class="span8">
									<div class="control-group">
										<?php echo $detalleOG; ?>
									</div>
								</div>
								<div class="span2">
									<div class="control-group">
										<?php echo $valorOG; ?>
									</div>
								</div>
							</div>

							<div class="row-fluid">
								<div class="span10">
								</div>
								<div class="span2">
									<?php echo $totalInspector; ?>
								</div>
							</div>
							<div class="form-actions">
								<a class="btn btn-large btn-primary" href="printLiquidacion.php?idProyecto=<?php echo $idDeProyecto; ?>"><i class="icon-print icon-white"></i> Imprimir</a>
								<a class="btn btn-large btn-block" href="main.php"><i class="icon-home"></i> Volver</a>
							</div>
						 </fieldset>
						</form>   
					</div>
					</div><!--/span-->
				</div><!--/row-->

					<!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->	
		<hr>
		<footer>
			<p class="pull-right">&copy; 2010-2013 OPServices Ltda.</p>
		</footer>	
		
	</div><!--/.fluid-container-->

	<!-- external javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->

	<!-- jQuery -->
	<script src="js/jquery-1.7.2.min.js"></script>
	<!-- jQuery UI -->
	<script src="js/jquery-ui-1.8.21.custom.min.js"></script>
	<!-- transition / effect library -->
	<script src="js/bootstrap-transition.js"></script>
	<!-- alert enhancer library -->
	<script src="js/bootstrap-alert.js"></script>
	<!-- modal / dialog library -->
	<script src="js/bootstrap-modal.js"></script>
	<!-- custom dropdown library -->
	<script src="js/bootstrap-dropdown.js"></script>
	<!-- scrolspy library -->
	<script src="js/bootstrap-scrollspy.js"></script>
	<!-- library for creating tabs -->
	<script src="js/bootstrap-tab.js"></script>
	<!-- library for advanced tooltip -->
	<script src="js/bootstrap-tooltip.js"></script>
	<!-- popover effect library -->
	<script src="js/bootstrap-popover.js"></script>
	<!-- button enhancer library -->
	<script src="js/bootstrap-button.js"></script>
	<!-- accordion library (optional, not used in demo) -->
	<script src="js/bootstrap-collapse.js"></script>
	<!-- carousel slideshow library (optional, not used in demo) -->
	<script src="js/bootstrap-carousel.js"></script>
	<!-- autocomplete library -->
	<script src="js/bootstrap-typeahead.js"></script>
	<!-- tour library -->
	<script src="js/bootstrap-tour.js"></script>
	<!-- library for cookie management -->
	<script src="js/jquery.cookie.js"></script>
	<!-- calander plugin -->
	<script src='js/fullcalendar.min.js'></script>
	<!-- data table plugin -->
	<script src='js/jquery.dataTables.min.js'></script>

	<!-- chart libraries start -->
	<script src="js/excanvas.js"></script>
	<script src="js/jquery.flot.min.js"></script>
	<script src="js/jquery.flot.pie.min.js"></script>
	<script src="js/jquery.flot.stack.js"></script>
	<script src="js/jquery.flot.resize.min.js"></script>
	<!-- chart libraries end -->

	<!-- select or dropdown enhancer -->
	<script src="js/jquery.chosen.min.js"></script>
	<!-- checkbox, radio, and file input styler -->
	<script src="js/jquery.uniform.min.js"></script>
	<!-- plugin for gallery image view -->
	<script src="js/jquery.colorbox.min.js"></script>
	<!-- rich text editor library -->
	<script src="js/jquery.cleditor.min.js"></script>
	<!-- notification plugin -->
	<script src="js/jquery.noty.js"></script>
	<!-- file manager library -->
	<script src="js/jquery.elfinder.min.js"></script>
	<!-- star rating plugin -->
	<script src="js/jquery.raty.min.js"></script>
	<!-- for iOS style toggle switch -->
	<script src="js/jquery.iphone.toggle.js"></script>
	<!-- autogrowing textarea plugin -->
	<script src="js/jquery.autogrow-textarea.js"></script>
	<!-- multiple file upload plugin -->
	<script src="js/jquery.uploadify-3.1.min.js"></script>
	<!-- history.js for cross-browser state change on ajax -->
	<script src="js/jquery.history.js"></script>
	<!-- application script for Charisma demo -->
	<script src="js/charisma.js"></script>		
</body>
</html>