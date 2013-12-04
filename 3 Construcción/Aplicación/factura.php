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
	// Obtenemos y traducimos el nombre del mes
	$mes=date("F");
	if ($mes=="January") $mes="Enero";
	if ($mes=="February") $mes="Febrero";
	if ($mes=="March") $mes="Marzo";
	if ($mes=="April") $mes="Abril";
	if ($mes=="May") $mes="Mayo";
	if ($mes=="June") $mes="Junio";
	if ($mes=="July") $mes="Julio";
	if ($mes=="August") $mes="Agosto";
	if ($mes=="September") $mes="Setiembre";
	if ($mes=="October") $mes="Octubre";
	if ($mes=="November") $mes="Noviembre";
	if ($mes=="December") $mes="Diciembre";
 ?>
 <!DOCTYPE html>
<html lang="es-ES">
<head>
	<meta charset="utf-8">
	<title>Factura</title>
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
	  .ver{
	  	background-color: #1d1d1d;
	  }
	  .tf{
	  	width:21.59cm ;
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
					<li><a class="ajax-link" href="#"><i class="icon-plus"></i><span class="hidden-tablet"> Nuevo Proyecto</span></a></li> 	
					<li class="divider-vertical"></li>
					<li><a class="ajax-link" href="#"><i class="icon-user"></i><span class="hidden-tablet"> Usuarios</span></a></li>
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
						<div class="tf">
						<div class="row-fluid">
							<span class="span12 factura">
								<div class="row-fluid"> 
									<div class="span12"></div>
									<div class="span12"></div>
									<div class="span12"></div>
									<div class="span12"></div>
									<div class="span12"></div>
									<div class="span12"></div>
									<div class="span12"></div>
								</div>
								<div class="row-fluid">
									<div class="span1"></div>
									<div class="span1">FECHA: <?php echo date('d'); ?></div>
									<div class="span3">DE <?php echo $mes; ?></div>
									<div class="span2">DEL<?php echo date('Y'); ?></div>
									<div class="span3"></div>
								</div>
								<div class="row-fluid">
									<div class="span1"></div>
									<div class="span7">
										<div class="row-fluid">
											<div class="span1"></div>
											<div class="span10">
												<input type="text" placeholder="Señores" />
											</div>
										</div>
									</div>
									<div class="span3"><input type="text" placeholder="RUT Empresa" /></div>
									<div class="span1"></div>
								</div>
								<div class="row-fluid">
									<div class="span1"></div>
									<div class="span7">
										<div class="row-fluid">
											<div class="span1"></div>
											<div class="span11">ALMIRANTE SEÑORET 70, PISO N°11</div>
										</div>
									</div>
									<div class="span3">
										<div class="row-fluid">
											<div class="span1"></div>
											<div class="span3">VALPARAISO</div>
										</div>
									</div>
								</div>
								<div class="row-fluid">
									<div class="span1"></div>
									<div class="span3">
										<div class="row-fluid">
											<div class="span1"></div>
											<div class="span4">VALPARAISO</div>
										</div> 
									</div>
									<div class="span1">
										<div class="row-fluid">
											<div class="span4"></div>
											<div class="span2">CORRESPONSAL</div>
										</div>
									</div>
									<div class="span7"></div>
								</div>
								<div class="row-fluid"> 
									<div class="span12"></div>
									<div class="span12"></div>
									<div class="span12"></div>
								</div>
								<div class="row-fluid">
									<div class="span1"></div>
									<div class="span1"><br>01</div>
									<div class="span6 ">
										<br>GENERAL CONDITION SURVEY (H&M) <br> 
										B/F UNIONSUR Dique <br> 
										Seco N°2 Astilleros de ASMAR / Puerto de Talcahuano - Chile 
										<br><br>
										(FEBRERO 17 & 18, 2009) <br> 
										OPS REF.: OPS-0909-OPA <br> 
										REF. CAVE: 2009/0060/JMB 
										<br><br>
										TARIFA: USD 1.562 <br> 
										(Tasa de cambio: $560.58)
									</div>
								</div>
								<div class="row-fluid">
									<div class="span9"></div>
									<div class="span3">
										<div class="row-fluid">
											<div class="span3"></div>
											<div class="span9">$875.626.-</div>
										</div>
									</div>
								</div>
								<div class="row-fluid"><div class="span12"></div></div>
								<div class="row-fluid"><div class="span12"></div></div>
								<div class="row-fluid"><div class="span12"></div></div>
								<div class="row-fluid"><div class="span12"></div></div>
								<div class="row-fluid"><div class="span12"></div></div>
								<div class="row-fluid"><div class="span12"></div></div>
								<div class="row-fluid"><div class="span12"></div></div>
								<div class="row-fluid"><div class="span12"></div></div>
								<div class="row-fluid">
									<div class="span1"></div>
									<div class="span7">OCHOCIENTOS SETENTA Y CINCO MIL SEISCIENTOS VEINTE Y SEIS</div>
								</div>
								<div class="row-fluid"><div class="span12"></div></div>
								<div class="row-fluid"><div class="span12"></div></div>
								<div class="row-fluid">
									<div class="span9"></div>
									<div class="span2">
										<div class="row-fluid">
											<div class="span3"></div>
											<div class="span2">$875.626.-</div>
										</div> 
									</div>
								</div> 
							</span>
						</div>
					</div>
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
</body>
</html>