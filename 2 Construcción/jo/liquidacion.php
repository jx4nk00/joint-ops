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


	//submit liquidacion
	if (isset($_POST['submitCrearLiquidacion'])) {
		$ReferenciaCliente = $_POST["textReferenciaCliente"];
		$FechaCreacion =  date('Y-m-d');
		$NumeroContenedores = $_POST["textNumeroContenedores"];
		$textTurnosTotales = $_POST["textTurnosTotales"];
		$Tarifado = $_POST["textTarifado"];
		
		
		//$idPorceAcuerdo = $Liquidacion->verIdPorceAcuerdo();

		//Comienzo de Impresion

		$valorHoja = $_POST["textValorHoja"];
		$cantHojas = $_POST["textCantHoja"];
		$numCopias = $_POST["textNumCopias"];
		$detalle = $_POST["textDetalleImpresion"];
		$validarInspector = $Usuario->verTipoUsuario($_SESSION['Id_Usuario']);
		$DatosImpresion = array($valorHoja,$cantHojas,$numCopias,$detalle,$validarInspector);
		$Liquidacion->crearImpresion($DatosImpresion);
		$idImpresiones = $Liquidacion->getIdImpresion();

		//=======================

		$idDolar = $Miscelaneo->obtenerDolar();

		//=======================

		$detalleOtrosGastos = $_POST["textDetalleOtrosGastos"];
		$valorOtrosGastos =$_POST["textTotalOtrosGastos"]; 
		$datosOtrosGastos = array($detalleOtrosGastos,$valorOtrosGastos,$validarInspector);
		$Liquidacion->crearOtrosGastos($datosOtrosGastos);
		$idOtrosGastos = $Liquidacion->getIdOtrosGastos();

		//-----------------------

		$codigoRend = $_POST["textRendicionDeGasto"];
		$totalRend = $_POST["textTotalRendicion"];
		$datosRendiciones = array($codigoRend,$totalRend,$validarInspector);
		$Liquidacion->crearRenGastos($datosRendiciones);
		$idRenGastos = $Liquidacion->getIdRendicion();

		//-----------------------

		$facExcenta = $_POST["textFENeto"];
		$facAfecta = $_POST["textFANeto"];
		$bol_honorarios = $_POST["textBHNeto"];
		$invoice = $_POST["textIVNeto"];
		$datosValoresFacturados = array ($facExcenta,$facAfecta,$bol_honorarios,$invoice,$validarInspector);
		$Liquidacion->crearValoresFacturados($datosValoresFacturados);
		$idValoresFacturados = $Liquidacion->getIdValoresFacturados();

		//-----------------------

		$detalleCF = $_POST["textDetalleConfeccion"];
		$totalGastosCF = $_POST["textTotalConfeccion"];
		$datosConfeccionInf = array($detalleCF,$totalGastosCF,$validarInspector);
		$Liquidacion->crearConfInforme($datosConfeccionInf);
		$idConfeccionInf = $Liquidacion->getIdConfeccionInf();

		$totalInspectores =$_POST['textTotalGastosInsp'];

		$datosLiquidacion = array(
								$idDeProyecto,
								$idDolar[0],
								$idOtrosGastos,
								$idImpresiones,
								$idRenGastos,
								$idValoresFacturados,
								$idConfeccionInf,
								$numeroDeLiquidacion,
								$FechaCreacion,
								$ReferenciaCliente,
								$NumeroContenedores,
								$textTurnosTotales,
								$Tarifado,
								$totalInspectores,
								1);
		$Liquidacion->crearLiquidacion($datosLiquidacion);

		header('location:main.php');

	}

	//=====================
	


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
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="main.php"> 
					<img alt="Charisma Logo" src="img/logo20.png" /> 
					<span>Joint Ops</span>
				</a>
				
				<!-- user dropdown starts -->
				<div class="btn-group pull-right" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user"></i><span class="hidden-phone"> <?php echo $nombreCompleto; ?></span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="#">Perfil</a></li>
						<li class="divider"></li>
						<li><a href="#">Salir</a></li>
					</ul>
				</div>
				<!-- user dropdown ends -->
			</div>
		</div>
	</div>
	<!-- topbar ends -->
		<div class="container-fluid">
		<div class="row-fluid">
				
			<!-- left menu starts -->
			<div class="span2 main-menu-span">
				<div class="well nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li class="nav-header hidden-tablet">Tareas</li>
						<li><a class="ajax-link" href="main.php"><i class="icon-home"></i><span class="hidden-tablet"> Dashboard</span></a></li>
						<li><a class="ajax-link" href="#"><i class="icon-user"></i><span class="hidden-tablet"> Usuarios</span></a></li>
						<li><a class="ajax-link" href="#"><i class="icon-remove"></i><span class="hidden-tablet"> Cerrar Sesión</span></a></li>
					</ul>
					<!-- <label id="for-is-ajax" class="hidden-tablet" for="is-ajax"><input id="is-ajax" type="checkbox"> Ajax on menu</label> -->
				</div>
			</div>
			<!-- left menu ends -->	
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>Necesita tener <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> activado para usar este sitio.</p>
				</div>
			</noscript>
			
			<div id="content" class="span10">
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
									<input type="text" name="textReferenciaCliente" placeholder="Referencia Cliente" required/>
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
									<input type="text" name="textNumeroContenedores" placeholder="Número de Contenedores" required />
								</div>
							</div>  

							<div class="row-fluid">
								<div class="span3">
									<div class="control-group">
										<label> Turnos totales trabajados:</label>
									</div>
								</div> 
								<div class="span6 pull-left">
									<input type="text" name="textTurnosTotales" placeholder="Turnos totales trabajados" required />
								</div>
							</div> 

							<div class="row-fluid">
								<div class="span3">
									<div class="control-group">
										<label> Tarifado:</label>
									</div>
								</div> 
								<div class="span6 pull-left">
									<input type="text" name="textTarifado" placeholder="Tarifado" required />
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
										<input id="FENeto" class="input-small" name="textFENeto" type="text" placeholder="FE NETO" required />
									</div>
								</div>
								<div class="span2">
									<div class="control-group">
										<input id="FEIva" class="input-small" name="textFEIva" type="text" placeholder="FE IVA/RET" disabled />
									</div>
								</div>
								<div class="span2">
									<div class="control-group">
										<label>USD$ <span id="FETotal"></span> .-</label>
										<input id="textFETotal" type="hidden" name="textFETotal" value="0" />
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
										<input id="FANeto" class="input-small" name="textFANeto" type="text" placeholder="FA NETO" required />
									</div>
								</div>
								<div class="span2">
									<div class="control-group">
										<label>USD$ <span id="FAIva"></span>.-</label>
										<input id="textFAIva" type="hidden" name="textFAIva" value="0" />
									</div>
								</div>
								<div class="span2">
									<div class="control-group">
										<label>USD$ <span id="FATotal"></span>.-</label>
										<input id="textFATotal" type="hidden" name="textFATotal" value="0" />
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
										<input id="textBHNeto" class="input-small" name="textBHNeto" type="text" placeholder="BH NETO" required />
									</div>
								</div>
								<div class="span2">
									<div class="control-group">
										<label>USD$ <span id="BHIva"></span>.-</label>
										<input id="textBHIva" type="hidden" name="textBHIva" value="0" />
									</div>
								</div>
								<div class="span2">
									<div class="control-group">
										<label>USD$ <span id="BHTotal" ></span>.-</label>
										<input id="textBHTotal" type="hidden" name="textBHTotal" value="0" />
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
										<input id="textIVNeto" class="input-small" name="textIVNeto" type="text" placeholder="IV NETO" required />
									</div>
								</div>
								<div class="span2">
									<div class="control-group">
										<input class="input-small" name="textIVIva"type="text" placeholder="IV IVA/RET" disabled />
									</div>
								</div>
								<div class="span2">
									<div class="control-group">
										<label>USD$ <span id="IVTotal"></span>.-</label>
										<input id="textIVTotal" type="hidden" name="textIVTotal"value="0" />
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
										<input class="input-xxlarge" name="textRendicionDeGasto" type="text" placeholder="N° de rendición de gasto" />
									</div>
									
								</div>
								<div class="span2">
									<div class="control-group">
										<input id="textTotalRendicion" class="input-small TGI" name="textTotalRendicion" type="text" placeholder="0.-" required />
									</div>
								</div>
							</di

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
										<input id="textValorHoja" class="ii input-small" name="textValorHoja" type="text" placeholder="VxH" value="0" required />
									</div>
								</div>
								<div class="span2">
									<div class="control-group">
										<input id="textCantHoja" class="ii input-small" name="textCantHoja" type="text" placeholder="CantH" value="0" required />
									</div>
								</div>
								<div class="span2">
									<div class="control-group">
										<input id="textNumCopias" class="ii input-small" name="textNumCopias" type="text" placeholder="NC" value="0" required />
									</div>
								</div>
								<div class="span2">
									<div class="control-group">
										<input class="input-small" name="textDetalleImpresion" type="text" placeholder="detalle" required />
									</div>
								</div>
								<div class="span2">
									<label>$ <span id="spanTotalImpresion"></span> .-</label>
									<input class="TGI" id="textTotalImpreison" type="hidden" name="textTotalImpreison" value="0" />
								</div>
							</div>

							<div class="row-fluid">
								<div class="span2">
									<label>GASTOS CONF INFORM</label>
								</div>
								<div class="span8">
									<div class="control-group">
										<input type="text" name="textDetalleConfeccion" class="input-xxlarge" placeholder="CARPETA/SEPARADORES/ETC" required />
									</div>
								</div>
								<div class="span2">
									<div class="control-group">
										<input id="textTotalConfeccion" class="input-small TGI" type="text" name="textTotalConfeccion" value="0" />	
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
										<input class="input-xxlarge" name="textDetalleOtrosGastos" type="text" placeholder="Otros Gastos" required />
									</div>
								</div>
								<div class="span2">
									<div class="control-group">
										<input id="textTotalOtrosGastos" class="input-small TGI" type="text" name="textTotalOtrosGastos" value="0" />	
									</div>
								</div>
							</div>

							<div class="row-fluid">
								<div class="span10">
								</div>
								<div class="span2">
									<label id="spanTotalGastosInsp">$0</label>
									<input id="textTotalGastosInsp" type="hidden" name="textTotalGastosInsp" value="0" />
								</div>
							</div>

							<div class="form-actions">
								<input name="submitCrearLiquidacion" type="submit" class="btn btn-primary" value="Enviar Liquidación" />
								<input type="reset" class="btn " value="limpiar" />
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

	<!-- Nuestros Scripts -->
	<script>
		$(document).ready(function() {


			$('#FENeto').keyup(function(){

				if(isNaN($(this).val())){
					alert('Debe Ingresar un Valor numérico');
					$('#FENeto').val(0);
					$('#FETotal').html(0);
				}
				else{

					var feneto = $(this).val();
					var fetotal = parseInt(feneto);

					if (fetotal>0 || fetotal!=null) {
						$('#textFETotal').val(fetotal);
						$('#FETotal').html(fetotal);	
					}
					else{
						$('#textFETotal').val(0);
						$('#FETotal').html('0');
					}
				
				}
			});


			$('#FANeto').keyup(function(){

				if(isNaN($(this).val())){
					alert('Debe Ingresar un Valor numérico');
					$('#FANeto').val(0);
					$('#FAIva').html(0);
					$('#textFAIva').val(0);
					$('#FATotal').html(0);
					$('#textFATotal').val(0);

				}
				else{
					var faNeto = $(this).val();
					var faIva = faNeto * 0.19;
					var faTotal = parseInt(faNeto) + faIva;

					$('#FAIva').html(Math.round(faIva));
					$('#textFAIva').val(Math.round(faIva));

					$('#FATotal').html(Math.round(faTotal));
					$('#textFATotal').val(Math.round(faTotal));

				}

			});

 
			$('#textBHNeto').keyup(function(){

				if(isNaN($(this).val())){
					alert('Debe Ingresar un Valor numérico');
					$('#textBHNeto').val(0);

					$('#BHIva').html(0);
					$('#textBHIva').val(0);

					$('#BHTotal').html(0);
					$('#textBHTotal').val(0);

				}
				else{
					var bhNeto = $(this).val();
					var bhIva = bhNeto * 0.10;
					var bhTotal = parseInt(bhNeto) - bhIva;

					$('#BHIva').html(Math.round(bhIva));
					$('#textBHIva').val(Math.round(bhIva));

					$('#BHTotal').html(Math.round(bhTotal));
					$('#textBHTotal').val(Math.round(bhTotal));

				}

			});

			$('#textIVNeto').keyup(function(){

				if(isNaN($(this).val())){
					alert('Debe Ingresar un Valor numérico');
					$('#textIVNeto').val(0);
					$('#IVTotal').html(0);
				}
				else{

					var feneto = $(this).val();
					var fetotal = parseInt(feneto);

					if (fetotal>0 || fetotal!=null) {
						$('#textIVTotal').val(fetotal);
						$('#IVTotal').html(fetotal);	
					}
					else{
						$('#textIVTotal').val(0);
						$('#IVTotal').html('0');
					}
				
				}
			});


			$('.ii').keyup(function(){
				var valoXHoja = $('#textValorHoja').val();
				var valorCantHojas = $('#textCantHoja').val();
				var textNumCopias = $('#textNumCopias').val();
				var total;

				if ( isNaN( $(this).val() ) ){
					alert('Debe Ingresar un Valor numérico');
					$(this).val(1);
				}else{
					total = parseInt(valoXHoja)*parseInt(valorCantHojas)*parseInt(textNumCopias);
					$('#textTotalImpreison').val(total);
					$('#spanTotalImpresion').html(total);
				}					
				
			});


			$('.TGI').change(function(){
				var totalRendicion = $('#textTotalRendicion').val();
				var totalImpresion = $('#textTotalImpreison').val();
				var totalGastoInforme = $('#textTotalConfeccion').val();
				var totalOtrosGastos = $('#textTotalOtrosGastos').val();
				var totalGastosInspector = parseInt(totalRendicion)+parseInt(totalImpresion)+parseInt(totalGastoInforme)+parseInt(totalOtrosGastos);

				$('#textTotalGastosInsp').val(totalGastosInspector);
				$('#spanTotalGastosInsp').html(totalGastosInspector);

			});

		});
	</script>
	
		
</body>
</html>
