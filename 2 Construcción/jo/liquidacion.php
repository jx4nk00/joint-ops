<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Liquidación</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="Joint OPS">

	<!-- The styles -->
	<link id="bs-css" href="css/bootstrap-cerulean.css" rel="stylesheet">
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
				<a class="brand" href="index.html"> <img alt="Charisma Logo" src="img/logo20.png" /> <span>Joint Ops - OPServices</span></a>
				
				<!-- user dropdown starts -->
				<div class="btn-group pull-right" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user"></i><span class="hidden-phone"> Usted</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="#">Perfil</a></li>
						<li class="divider"></li>
						<li><a href="#">Salir</a></li>
					</ul>
				</div>
				<!-- user dropdown ends -->
				
				<div class="top-nav nav-collapse">
					<ul class="nav">
						<li><a href="#">Volver a la WEB</a></li>
						<li>
							<form class="navbar-search pull-left">
								<input placeholder="Buscar" class="search-query span2" name="query" type="text">
							</form>
						</li>
					</ul>
				</div><!--/.nav-collapse -->
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

						<li class="nav-header hidden-tablet">Administración</li>
						<li><a class="ajax-link" href="#"><i class="icon-home"></i><span class="hidden-tablet"> Inicio</span></a></li>
						<li><a class="ajax-link" href="#"><i class="icon-ok"></i><span class="hidden-tablet"> Estadisticas</span></a></li>
						<li><a class="ajax-link" href="#"><i class="icon-time"></i><span class="hidden-tablet"> Trabajos</span></a></li>

						<li class="nav-header hidden-tablet">Inspección</li>
						<li><a class="ajax-link" href="informe.php"><i class="icon-upload"></i><span class="hidden-tablet"> Importar Informe</span></a></li>
						<li><a class="ajax-link" href="liquidacion.php"><i class="icon-pencil"></i><span class="hidden-tablet"> Crear Liquidación</span></a></li>


						<li class="nav-header hidden-tablet">Gerencia</li>
						<li><a class="ajax-link" href="#"><i class="icon-list-alt"></i><span class="hidden-tablet"> Proformas</span></a></li>
						<li><a class="ajax-link" href="#"><i class="icon-list-alt"></i><span class="hidden-tablet"> Facturas</span></a></li>
						<li><a class="ajax-link" href="#"><i class="icon-check"></i><span class="hidden-tablet"> Termino de Servicio</span></a></li>
						<li><a class="ajax-link" href="#"><i class="icon-user"></i><span class="hidden-tablet"> Usuarios</span></a></li>
					</ul>
					<!-- <label id="for-is-ajax" class="hidden-tablet" for="is-ajax"><input id="is-ajax" type="checkbox"> Ajax on menu</label> -->

				</div><!--/.well -->
			</div><!--/span-->
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
						<form class="form-horizontal" method="POST" action="#">
						<fieldset>
						<div class="row-fluid">
							<legend>Plantilla de Liquidación de Servicios OPServices</legend>

							<div class="span12">Liquidación Numero: <span>12345</span></div>
							<div class="span12">Fecha: <?php echo date('d-m-Y'); ?></div>
							<div class="span12 center"><h2>Plantilla de Liquidación OPSERVICES</h2></div>
							<div class="span12"><h4>1.- Datos Generales de Servicio</h4></div>
							

							<div class="span3">Nombre de la Nave o Servicio</div>
							<div class="span8">
								<input type="text" name="nombreNave" placeholder="Nombre de la Nave o Servicio"/>
							</div>
							<div class="clear"></div>
							<div class="span3">N° de Informe</div>
							<div class="span8">
								<input type="text" name="numInforme" placeholder="N° de Informe"/>
							</div>
							<div class="span3">Referencia al Cliente</div>
							<div class="span8">
								<input type="text" name="referenciaCliente" placeholder="Referencia al Cliente"/>
							</div>
							<div class="span3">Lugar de Servicio</div>
							<div class="span8">
								<input type="text" name="lugarServicio" placeholder="Lugar de Servicio"/>
							</div>
							<div class="span3">Nombre de Inspector(es) a cargo</div>
							<div class="span8">
								<input type="text" name="InspCargo" placeholder="Insp cargo"/>
							</div>
							<div class="span3">Nombre de Inspector(es) Partcipantes</div>
							<div class="span8">
								<input type="text" name="InspParticipantes" placeholder="Insp part"/>
							</div>
							<div class="span3">Servicio Realizado</div>
							<div class="span8">
								<textarea name="servicioRealizado" cols="30" rows="3"></textarea>
							</div>
							<div class="span3">Numero de Contenedores</div>
							<div class="span8">
								<input type="number" min="0" name="numContenedores" value="0"/>
							</div>
							<div class="span3">Turnos Totales Trabajados</div>
							<div class="span8">
								<input type="number" min="0" name="turnosTrabajados" value="0"/>
							</div>
							<div class="span3">Tarifado</div>
							<div class="span8">
								<input type="text" name="tarifado" placeholder="Tarifado"/>
							</div>

							<div class="span6"></div>
							<div class="span5">
								<div class="span3">NETO</div>
								<div class="span3">IVA/RET</div>
								<div class="span3">TOTAL</div>
							</div>
						
							<div class="span3">Valor Facturado</div>
							
							<div class="span3">Factura Excenta</div>
							<div class="span5">
								<div class="span3">
									<input class="input-small" name="FENeto" min="0" type="number" value="0">
								</div>
								<div class="span3">
									<input class="input-small" name="FEIva" min="0" type="number" value="0">
								</div>
								<div class="span3">
									<input class="input-small" name="FETotal" type="text" value="0" disabled>
								</div>
							</div>

							<div class="span3"></div>
							
							<div class="span3">Factura Afecta</div>
							<div class="span5">
								<div class="span3">
									<input id="FANeto" class="input-small" name="FANeto" min="0" type="number" value="0">
								</div>
								<div class="span3">
									<input id="FAIva" class="input-small" name="FAIva" type="text" value="0" disabled>
								</div>
								<div class="span3">
									<input id="FATotal" class="input-small" name="FATotal" type="text" value="0" disabled>
								</div>
							</div>
							
							<div class="span3"></div>
							
							<div class="span3">Boleta Honorarios</div>
							<div class="span5">
								<div class="span3">
									<input class="input-small" name="BHNeto" min="0" type="number" value="0">
								</div>
								<div class="span3">
									<input class="input-small" name="BHIva" type="text" value="0" disabled>
								</div>
								<div class="span3">
									<input class="input-small" name="BHTotal" type="text" value="0" disabled>
								</div>
							</div>
							
							<div class="span3"></div>
							
							<div class="span3">Invoice</div>
							<div class="span5">
								<div class="span3">
									<input class="input-small" name="InNeto" min="0" type="number" value="0">
								</div>
								<div class="span3">
									<input class="input-small" name="InIva" min="0" type="number" value="0">
								</div>
								<div class="span3">
									<input class="input-small" name="InTotal" type="text" value="0" disabled>
								</div>
							</div>

							<div class="span3">Tasa de Cambio</div>
							<div class="span8">
								<input class="" type="text" placeholder="515,99" disabled />
							</div>

							<div class="span12"></div>

							<div class="span12"><h4>2.- Gastos Generales Incurridos</h4></div>
							<div class="span9"><h4>2.1- Gastos De Inspección</h4></div>
							<div class="span2">TOTAL</div>

							<div class="span3">Total Rend. Gastos</div>
							<div class="span6">Aquí debe ir un código</div>
							<div class="span2">
								<input class="input-small" name="totalRendicion" type="number" min="0" value="0">
							</div>

							<div class="span3"></div>
							<div class="span6">
								<div class="span2">Valor x Hoja</div>
								<div class="span2">Cant Hojas</div>
								<div class="span2">N° Copias</div>
								<div class="span4">Detalle</div>
							</div>
							<div class="span2"></div>

							<div class="span3">Impresión Informe</div>
							<div class="span6">
								<div class="span2">
									<input class="input-mini" name="IIValorHoja" type="number" min="0" value="0">
								</div>
								<div class="span2">
									<input class="input-mini" name="IICantHoja" type="number" min="0"  value="0">
								</div>
								<div class="span2">
									<input class="input-mini" name="IINumcopias" type="number" min="0"  value="0">
								</div>
								<div class="span4">
									<input class="" type="text" name="IIDetalle" placeholder="IIDetalle">
								</div>
							</div>
							<div class="span2">$123-</div>

							<div class="span3">Gastos Confección de Informes</div>
							<div class="span6">
								<textarea name="gastosConfeccion" cols="30" rows="3"></textarea>
							</div>
							<div class="span2">
								<input class="input-small" name="GastosConfTotal" type="number" min="0" value="0" />
							</div>
					
							<div class="span3">Pago Inspectores Ayudantes</div>
							<div class="span6">
								<?php // Nombre de Inspectores a Cargo ?>
								<div class="span2">INSP1</div>
								<div class="span2">INSP2</div>
								<div class="span2">INSP3</div>
								<div class="span2">INSP4</div>
								<div class="span2">INSP5</div> 
								<div class="span2">INSP6</div> 
							</div>
							<div class="span2"></div>

							<div class="span3"></div>
							<div class="span6">

								<?php // Valor a pagar Inspectores a Cargo ?>
								<div class="span2">
									<input class="input-mini" type="number" min="0" value="0">
								</div>
								<div class="span2">
									<input class="input-mini" type="number" min="0"  value="0">
								</div>
								<div class="span2">
									<input class="input-mini" type="number" min="0" value="0">
								</div>
								<div class="span2">
									<input class="input-mini" type="number" min="0"  value="0">
								</div>
								<div class="span2">
									<input class="input-mini" type="number" min="0"  value="0">
								</div> 
								<div class="span2">
									<input class="input-mini" type="number" min="0"  value="0">
								</div> 
							</div>
							<div class="span2">$123-</div>

							<div class="span3">Otros Gastos</div>
							<div class="span6">
								<textarea name="otrosGastos" cols="30" rows="3"></textarea>
							</div>
							<div class="span2">
								<input class="input-mini" name="OtrosGastosDetalle" type="number" min="0"  value="0">
							</div>

							<div class="span9"></div>
							<div class="span2"><b>$123.-</b></div>


						</div>    
						<div class="form-actions">
							<button type="submit" class="btn btn-primary">Enviar Liquidación</button>
							<button type="reset" class="btn">Limpiar </button>
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
			<p class="pull-left">&copy; <a href="#" target="_blank">OPServices</a> 2013</p>
			<!-- <p class="pull-right">Powered by: <a href="http://usman.it/free-responsive-admin-template">Charisma</a></p> -->
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


			$('#FANeto').keyup(function(){

				var faneto = $(this).val();
				var faiva = faneto * 0.19;
				var fatotal = parseInt(faiva) + parseInt(faneto);

				$('#FAIva').val(faiva);

				$('#FATotal').val(fatotal);

			});


		});
	</script>
	
		
</body>
</html>
