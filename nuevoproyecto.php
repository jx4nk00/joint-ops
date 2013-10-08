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

	$Proyecto = new Proyecto;
	if( isset($_POST['CrearProyecto'])){

		$id_lugar=$_POST['selectLugares'];
		$id_miembro=$_POST['responsable'];
		$id_codigo=1;
		$nombre_proyecto=$_POST['textNombreProyecto'];
		$nombre_nave = $_POST['textNombreNave'];
		$fecha_inicio =  date("Y-m-d",strtotime($_POST['textFechaInicio']));
		$fecha_termino = date("Y-m-d",strtotime($_POST['textFechaTermino']));
		$descripcion = $_POST['textDescProyecto'];
		$DatosDelProyecto = array($id_lugar,$id_miembro,$id_codigo,$nombre_proyecto,$nombre_nave,$fecha_inicio,$fecha_termino,$descripcion);

		$Proyecto->crearProyecto($DatosDelProyecto);

		$id_proyectos = $Proyecto->getLastProjectId();
		
		if($_POST['textDescServicio1']!=""){
			$nombre_servicio = $_POST['textDescServicio1'];
			$DatosDelServicio = array($id_miembro,$id_proyectos,$nombre_servicio);
			$Proyecto->crearServicio($DatosDelServicio);
		}
		if($_POST['textDescServicio2']!=""){
			$nombre_servicio = $_POST['textDescServicio2'];
			$DatosDelServicio = array($id_miembro,$id_proyectos,$nombre_servicio);
			$Proyecto->crearServicio($DatosDelServicio);
		}
		if($_POST['textDescServicio3']!=""){
			$nombre_servicio = $_POST['textDescServicio3'];
			$DatosDelServicio = array($id_miembro,$id_proyectos,$nombre_servicio);
			$Proyecto->crearServicio($DatosDelServicio);
		}
		if($_POST['textDescServicio4']!=""){
			$nombre_servicio = $_POST['textDescServicio4'];
			$DatosDelServicio = array($id_miembro,$id_proyectos,$nombre_servicio);
			$Proyecto->crearServicio($DatosDelServicio);
		}
		if($_POST['textDescServicio5']!=""){
			$nombre_servicio = $_POST['textDescServicio5'];
			$DatosDelServicio = array($id_miembro,$id_proyectos,$nombre_servicio);
			$Proyecto->crearServicio($DatosDelServicio);
		}
	
	}

 ?>


<!DOCTYPE html>
<html lang="es-ES">
<head>
	<meta charset="utf-8">
	<title>Estado de Proyectos</title>
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
					<p>Necesitas tener <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> activado para utilizar este sitio.</p>
				</div>
			</noscript>

			<div id="content" class="span10">
				<!-- content starts -->
				<div class="row-fluid sortable">		
					<div class="box span12">
						<div class="box-header well" data-original-title>
							<h2><i class="icon-user"></i> Nuevo Proyecto</h2>
							<div class="box-icon">
								<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							</div>
						</div>

						<div class="box-content">
							<form action="nuevoproyecto.php" method="POST" class="form-horizontal">

								<div class="control-group">
									<label class="control-label">Nombre: </label>
									<div class="controls">
										<input id="textNombreProyecto" name="textNombreProyecto" type="text" placeholder="Nombre aquí"  required /> 				
										<a id="btnNuevoProyecto" class="btn btn-success" href="#" >
											<i class="icon-plus icon-white"></i>  
											Verificar                                            
										</a>
									</div>
								</div>

								<div class="control-group">
									<div id="alertaError"class="alert alert-error hide">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>OOPS!</strong> Debe especificar un nombre.
									</div>
									<div id="alertaSuccess" class="alert alert-success hide">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Válido!</strong> Ese nombre es aceptado.
									</div>
								</div>
								
								<div id="informacionProyecto" class="hide">
									<legend>Información del Proyecto</legend>
									<div class="row-fluid">
										<div class="span6">
											<div class="control-group">
												<h3>Nombre de la Nave</h3>
												<input type="text" name="textNombreNave" placeholder="Nombre de la nave" required />
											</div>
										</div> <!-- Cierre Span6 -->

										<div class="span6">
											<div class="control-group">
												<h3>Responsable del proyecto</h3>
												<select id="selectResponsable" name="responsable">
													<?php echo $Proyecto->getResponsables(); ?>
												</select>
											</div>
										</div>
									</div><!-- Cierre Cierre Row Fluid -->

									<div class="row-fluid">
										<div class="span6">
											<div class="control-group">
												<h3>Fecha de Inicio</h3>
												<input type="text" name="textFechaInicio" class="input datepicker" id="date01" required />
											</div>
										</div>

										<div class="span6">
											<div class="control-group">
												<h3>Fecha de Termino</h3>
												<input type="text" name="textFechaTermino" class="input datepicker" id="date02" required />
											</div>
										</div>
									</div>

									<div class="row-fluid">
										<div class="span6">
											<h3>Servicios</h3>
											<div id="ser1" class="servicio1">
												<div class="control-group">
													<h4>Descripción del Servicio</h4>
													<input type="text" name="textDescServicio1" placeholder="Descripción del Servicio"/>
													<a class="btn btn-success" href="#" onclick="$('#ser2').show('slow')" >
														<i class="icon-plus icon-white"></i>                                         
													</a>
												</div>
											</div>
											<div id="ser2" class="servicio2 hide">
												<div class="control-group">
													<h4>Descripción del Servicio</h4>
													<input type="text" name="textDescServicio2" placeholder="Descripción del Servicio"/>
													<a class="btn btn-success" href="#" onclick="$('#ser3').show('slow')" >
														<i class="icon-plus icon-white"></i>                                         
													</a>
													<a class="btn btn-danger" href="#" onclick="$('#ser2').hide('slow')" >
														<i class="icon-minus icon-white"></i>                                         
													</a>
												</div>
											</div>

											<div id="ser3" class="servicio3 hide">
												<div class="control-group">
													<h4>Descripción del Servicio</h4>
													<input type="text" name="textDescServicio3" placeholder="Descripción del Servicio"/>
													<a class="btn btn-success" href="#" onclick="$('#ser4').show('slow')" >
														<i class="icon-plus icon-white"></i>                                         
													</a>
													<a class="btn btn-danger" href="#" onclick="$('#ser3').hide('slow')" >
														<i class="icon-minus icon-white"></i>                                         
													</a>
												</div>
											</div>
											
											<div id="ser4" class="servicio4 hide">
												<div class="control-group">
													<h4>Descripción del Servicio</h4>
													<input type="text" name="textDescServicio4" placeholder="Descripción del Servicio"/>
													<a class="btn btn-success" href="#" onclick="$('#ser5').show('slow')" >
														<i class="icon-plus icon-white"></i>                                         
													</a>
													<a class="btn btn-danger" href="#" onclick="$('#ser4').hide('slow')" >
														<i class="icon-minus icon-white"></i>                                         
													</a>
												</div>
											</div>
											
											<div id="ser5" class="servicio5 hide">
												<div class="control-group">
													<h4>Descripción del Servicio</h4>
													<input type="text" name="textDescServicio5" placeholder="Descripción del Servicio"/>
													<a class="btn btn-danger" href="#" onclick="$('#ser5').hide('slow')" >
														<i class="icon-minus icon-white"></i>                                         
													</a>
												</div>
											</div>
										</div>
												
										<div class="span6">
											<div class="control-group">
												<h3>Lugar del Proyecto</h3>
												<select name="selectLugares">
													<?php echo $Proyecto->getLugares(); ?>
												</select>
											</div>
										</div>
									</div>

									<div class="row-fluid">
										<div class="span12">
											<div class="control-group">
												<h3>Descripción del Proyecto</h3>
												<textarea id="descP" name="textDescProyecto" rows="5" cols="100" placeholder="Descripción del Proyecto" required></textarea>
											</div>
										</div>
									</div>	
									<input name="CrearProyecto" type="submit" class="btn btn-info " data-noty-options='{"text":"Proyecto Creado con Éxito","layout":"top","type":"information"}' value="Crear Proyecto" />
								</div><!-- Cierre de informaciones -->
							</form>
						</div>
					</div>
				</div>
			</div>
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