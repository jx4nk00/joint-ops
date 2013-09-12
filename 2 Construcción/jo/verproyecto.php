<?php 
session_start();
include ('clases/usuario.php');
include ('clases/proyecto.php');
if(!$_SESSION['Id_Usuario']){
	header('location:index.php');
}else{
	$Usuario = new Usuario;
	$nombreCompleto = $Usuario->getUserName($_SESSION['Id_Usuario']);
}
$idDeProyecto=$_GET['idDeProyecto'];

$Proyecto = new Proyecto;
$Usuario = new Usuario;
$InformacionDelProyecto = $Proyecto->getInfoProyecto($idDeProyecto);

$idDeLugar = $InformacionDelProyecto[1];
$idResponsable = $InformacionDelProyecto[2];
$idCodigoProyecto = $InformacionDelProyecto[3];
$nombreDeProyecto = $InformacionDelProyecto[4];
$nombreDeLaNave = $InformacionDelProyecto[5];
$fechaTermino =$InformacionDelProyecto[7];
$DescripcionDeProyecto = $InformacionDelProyecto[8];

$CodigoDeProyecto = $Proyecto->getCodigoProyecto($idCodigoProyecto);

$serviciosDeProyecto = $Proyecto->getServiciosDeProyecto($idDeProyecto);

$inspectorACargo = $Usuario->getUserName($idResponsable);

if(  strtotime($fechaTermino) > strtotime(date('Y-m-d'))  ){
	$estadoDeProyecto = "<span class='label label-warning'>En Cuerso</span>";}
else{
	$estadoDeProyecto = "<span class='label label-important'>Fuera de Plazo</span>";
}


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Ver Proyectos</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
	<meta name="author" content="Muhammad Usman">

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
				<a class="brand" href="index.html"> <img alt="Charisma Logo" src="img/logo20.png" /> <span>Joint Ops</span></a>
				
				
				<!-- user dropdown starts -->
				<div class="btn-group pull-right" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user"></i><span class="hidden-phone"> Usted</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="#">Perfil</a></li>
						<li class="divider"></li>
						<li><a href="login.html">Salir</a></li>
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
						<li class="nav-header hidden-tablet">Administración</li>
						<li><a class="ajax-link" href="main.php"><i class="icon-home"></i><span class="hidden-tablet"> Inicio</span></a></li>
						<li><a class="ajax-link" href="nuevoproyecto.php"><i class="icon-ok"></i><span class="hidden-tablet"> Nuevo Proyecto</span></a></li>
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
					<p>Necesitas tener <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> activado para utilizar este sitio.</p>
				</div>
			</noscript>


			
			<div id="content" class="span10">
			<!-- content starts -->
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Ver Proyecto</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<legend>Información del Proyecto</legend>



						<div class="row-fluid">
							<div class="span4">
								<div class="control-group">
									<h3>Nombre del Proyecto</h3> 
									<?php echo $nombreDeProyecto;  ?>
								</div>
							</div>

							<div class="span4">
								<div class="control-group">
									<h3>Código</h3>
									 <?php echo $CodigoDeProyecto; ?>
								</div>
							</div>

							<div class="span4">
								<div class="control-group">
									<h3>Estado</h3>
									<?php echo $estadoDeProyecto; ?>
								</div>
							</div>
						</div>




						<br>
						<div class="row-fluid">
							<div class="span12">
								<div class="control-group">
									<legend>Descripción del proyecto</legend>
									<span><?php echo $DescripcionDeProyecto; ?></span>
								</div>
							</div>
						</div>
							<br>
						<legend>Responsabilidades</legend>
						<div class="row-fluid">
							<div class="span6">
								<div class="control-group">
									<h3>Inspector a Cargo</h3>
									<label><?php echo $inspectorACargo; ?></label>
								</div>
								<div class="control-group">
									<h3>Inspectores ayudantes</h3>
									<!--<ul>
										<li>Juan Pablo Soto</li>
										<li>Sthephany Rojas</li>
										<li>Matias Hernandez</li>
										<li>Juan Carlos Garces</li>
									</ul> -->
									Sin ayudantes.
								</div>
							</div>

							<div class="span6">
								<div class="control-group">
									<h3>Servicios a Realizar</h3>
									<ul>
										<!-- <li>Inspección de Nave</li>-->
										<?php 
											echo $serviciosDeProyecto;
										 ?>
									</ul>
								</div>
								<div class="control-group">
									<h3>Servicios a Realizar por Ayudantes</h3>
									<!-- <ul>
										<li>Inspección de Nave</li>
										<li>Reparación de Ancla</li>
										<li>Capacitación de Tripulación</li>
										<li>Asesoría de montaje</li>
									</ul> --> Sin Servicios Asignados.
								</div>
							</div>
						</div>
						<br>
						<div class="row-fluid">
							<div class="span6">
								<div class="control-group">
										<legend>Documentación del Inspector</legend>
										<h3>Liquidación</h3>
										<a class="btn btn-success" href="#">
											<i class="icon-zoom-in icon-white"></i>  
											Ver                                            
										</a>
										<a class="btn btn-info" href="#">
											<i class="icon-edit icon-white"></i>  
											Crear                                            
										</a>
								</div>

								<div class="control-group">
										<h3>Informe	</h3>
										<a class="btn btn-success" href="#">
											<i class="icon-zoom-in icon-white"></i>  
											Ver                                            
										</a>
										<input name="archivo"class="input-file uniform_on" id="fileInput" type="file" required />
								</div>
							</div>
							<div class="span6">
								<div class="control-group">
										<legend>Documentación del Gerente</legend>
										<h3>Proforma</h3>
										<a class="btn btn-success" href="#">
											<i class="icon-zoom-in icon-white"></i>  
											Ver                                            
										</a>
										<a class="btn btn-info" href="#">
											<i class="icon-edit icon-white"></i>  
											Crear                                            
										</a>
								</div>

								<div class="control-group">
										<h3>Factura	</h3>
										<a class="btn btn-success" href="#">
											<i class="icon-zoom-in icon-white"></i>  
											Ver                                            
										</a>
										<a class="btn btn-info" href="#">
											<i class="icon-edit icon-white"></i>  
											Crear                                            
										</a>
								</div>
							</div>
						</div>
						<legend>Estado de Avance</legend>
						<div class="progress progress-success" style="margin-bottom: 9px;">
							<div class="bar" style="width: 50%">50%</div>
						</div>




						</div>




					</div>
				</div><!--/span-->
			</div><!--/row-->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->				
		<hr>
		<footer>
			<p class="pull-left">&copy; <a href="#" target="_blank">OPServices</a> 2013</p>
			<p class="pull-right">Soportado por: <a href="#">Joint-Ops</a></p>
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
