<?php 
	session_start();
	include ('clases/usuario.php');
	include ('clases/proyecto.php');
	if(!$_SESSION['Id_Usuario']){
		header('location:index.php');
	}
	$Usuario = new Usuario;
	$nombreCompleto = $Usuario->getUserName($_SESSION['Id_Usuario']);

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
				<a class="brand" href="index.html"> 
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
						<form class="form-horizontal" method="POST" action="#">
						<fieldset>
							<div class="row-fluid">
								<div class="span6">
									<div class="control-group">
										<p>Liquidación Numero: 123</p>
										<p>Fecha: <?php echo date("d-m-Y"); ?></p>
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
									<label>Nave Dummi</label>
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
									<label>OPS-BLA BLA BLA</label>
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
									<label>Valparaíso</label>
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
										<li>Inspector1</li>
										<li>Inspector2</li>
										<li>Inspector3</li>
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
										<li>Participante1</li>
										<li>Participante2</li>
										<li>Participante3</li>
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
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, vero cupiditate perferendis eligendi vitae iusto dolores sed nihil. Deleniti, nam voluptate ad consequatur error ea odio facilis quidem id vitae.</p>
									<input type="hidden" name="textServicioRealizado" value="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
																							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
																							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
																							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
																							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
																							proident, sunt in culpa qui officia deserunt mollit anim id est laborum." />
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
										<input class="input-small" name="textFENeto" type="text" placeholder="FE NETO" required />
									</div>
								</div>
								<div class="span2">
									<div class="control-group">
										<input class="input-small" name="textFEIva" type="text" placeholder="FE IVA/RET" required />
									</div>
								</div>
								<div class="span2">
									<div class="control-group">
										<label>FE$0.-</label>
										<input type="hidden" name="textFETotal" value="0" />
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
										<input class="input-small" name="textFANeto" type="text" placeholder="FA NETO" required />
									</div>
								</div>
								<div class="span2">
									<div class="control-group">
										<label>FA$0.-</label>
										<input type="hidden" name="textFAIva" value="0" />
									</div>
								</div>
								<div class="span2">
									<div class="control-group">
										<label>FA$0.-</label>
										<input type="hidden" name="textFATotal" value="0" />
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
										<input class="input-small" name="textBHNeto" type="text" placeholder="BH NETO" required />
									</div>
								</div>
								<div class="span2">
									<div class="control-group">
										<label>BH$0.-</label>
										<input type="hidden" name="textBHIva" value="0" />
									</div>
								</div>
								<div class="span2">
									<div class="control-group">
										<label>BH$.-</label>
										<input type="hidden" name="textBHTotal" value="0" />
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
										<input class="input-small" name="textIVNeto" type="text" placeholder="IV NETO" required />
									</div>
								</div>
								<div class="span2">
									<div class="control-group">
										<input class="input-small" name="textIVIva"type="text" placeholder="IV IVA/RET" required />
									</div>
								</div>
								<div class="span2">
									<div class="control-group">
										<label>IV$0.-</label>
										<input type="hidden" name="textIVTotal"value="0" />
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
									<label>RENDICION N°....</label>
									<input type="hidden" name="textRendicionDeGasto" value="rendicion bla bla" />
								</div>
								<div class="span2">
									<div class="control-group">
										<input class="input-small" name="textTotalRendicion" type="text" placeholder="0.-" required />
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
										<input class="input-small" name="textValorHoja" type="text" placeholder="VxH" required />
									</div>
								</div>
								<div class="span2">
									<div class="control-group">
										<input class="input-small" name="textCantHoja" type="text" placeholder="CantH" required />
									</div>
								</div>
								<div class="span2">
									<div class="control-group">
										<input class="input-small" name="textNumCopias" type="text" placeholder="NC" required />
									</div>
								</div>
								<div class="span2">
									<div class="control-group">
										<input class="input-small" name="textDetalleImpresion" type="text" placeholder="detalle" required />
									</div>
								</div>
								<div class="span2">
									<label>$0.-</label>
									<input type="hidden" name="textTotalImpreison" value="0" />
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
									<label>$0.-</label>
									<input type="hidden" name="textTotalConfeccion" value="0" />
								</div>
							</div>

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
									<label>$0</label>
									<input type="hidden" name="textTotalotrosGastos" value="0" />
								</div>
							</div>

							<div class="row-fluid">
								<div class="span10">
								</div>
								<div class="span2">
									<label>$0</label>
									<input type="hidden" name="textTotalLiqInsp" value="0" />
								</div>
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
