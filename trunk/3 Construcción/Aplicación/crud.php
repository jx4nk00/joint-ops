<?php 
	session_start();
	include ('clases/usuario.php');
	if(!$_SESSION['login']){
		header('location:index.php');
	}

	$Usuario = new Usuario;

	$datosUsuarios = $Usuario->verUsuario();
	$bancos = $Usuario->verBancos();
	$privilegios = $Usuario->verPrivilegios();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Miembros</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
	<meta name="author" content="Muhammad Usman">
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
					<li><a class="ajax-link" href="#"><i class="icon-plus"></i><span class="hidden-tablet"> Nuevo Proyecto</span></a></li> 	
					<li class="divider-vertical"></li>
					<li><a class="ajax-link" href="#"><i class="icon-user"></i><span class="hidden-tablet"> Usuarios</span></a></li>
					<li class="divider-vertical"></li>
				</ul>
				<!-- user dropdown starts -->
				<div class="btn-group pull-right" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user"></i><span class="hidden-phone"> <?php echo utf8_encode($_SESSION['Nombre_completo']); ?></span>
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
					<p>Necesitas tener <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> activado para utilizar este sitio.</p>
				</div>
			</noscript>
			<div id="content" class="span11">
			<!-- content starts -->
			<div class="row-fluid">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Miembros</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">




					<div class="tabbable"> <!-- Only required for left/right tabs -->
					  <ul class="nav nav-tabs">
					    <li class="active"><a href="#create" data-toggle="tab">Agregar Miembro</a></li>
					    <li><a href="#read" data-toggle="tab">Ver Miembro</a></li>
					  </ul>

					  <div class="tab-content">
					    <div class="tab-pane active" id="create">
					    	<form action="">
					      	<legend>Datos Personales</legend>
							<div class="row-fluid">
								<div class="span3">
									<label>Primer nombre</label>
									<input type="text" class="input-large" placeholder="Primer Nombre" required/>
								</div>

								<div class="span3">
									<label>Segundo nombre</label>
									<input type="text" class="input-large" placeholder="Segundo Nombre" required/>
								</div>

								<div class="span3">
									<label>Apellido Paterno</label>
									<input type="text" class="input-large" placeholder="Apellido Paterno" required/>
								</div>

								<div class="span3">
									<label>Apellido Materno</label>
									<input type="text" class="input-large" placeholder="Apellido Materno" required/>
								</div>

							</div>

							<div class="row-fluid">
								<div class="span3">
									<label>RUT</label>
									<input type="text" class="input-large" placeholder="RUT" required/>

								</div>
								<div class="span3">
									<label>Fecha de Nacimiento</label>
									<input type="text" class="input-large" placeholder="Fecha de Nacimiento" required/>
								</div>
								<div class="span3">
									<label>Teléfono</label>
									<input type="text" class="input-large" placeholder="Teléfono" required>
								</div>
								<div class="span3"></div>
							</div>

							<legend>Datos para OPServices</legend>
							<div class="row-fluid">
								<div class="span3">
									<label>Entidad bancaria</label>
									<select>
										<?php 
											while ($fila = mysql_fetch_array($bancos)) {
												echo utf8_encode("<option value=".$fila['id_banco'].">".$fila['nombre_banco']."</option>");
											}

										 ?>
										
									</select>
								</div>
								<div class="span3">
									<label>Cuenta corriente</label>
									<input class="input-large" type="text" placeholder="Cuenta Corriente" required />
									
								</div>
								<div class="span3">
									<label data-rel="popover" data-content="Debe registrar el correo con anterioridad." title="¡Atención!">Correo electrónico *</label>
									<input class="input-large" type="text" placeholder="Correo Electrónico" required />
								</div>
								<div class="span3"></div>
							</div>

							<legend>Datos de acceso</legend>
							<div class="row-fluid">
								<div class="span3">
									<label>Nombre de usuario</label>
									<input class="input-large" type="text" placeholder="Nombre de Usuario" required />
								</div>
								<div class="span3">
									<label>Contraseña</label>
									<input class="input-large" type="text" placeholder="Contraseña" required />
								</div>
								<div class="span3">
									<label>Privilegio</label>
									<select>
										<?php 

											while($fila = mysql_fetch_array($privilegios)){
												echo utf8_encode("<option value=".$fila['id_privilegio'].">".$fila['nombre_privilegio']."</option>");

											}

										 ?>
									</select>
								</div>
							</div>

					    </div>

					    <div class="tab-pane" id="read">
					      	<div class="box-content">
					      		<table class="table table-striped table-bordered bootstrap-datatable datatable">
					      			<thead>
					      				<tr>
					      					<th>Nombre Completo</th>
					      					<th>RUT</th>
					      					<th>Correo</th>
					      					<th>Fecha de Nacimiento</th>
					      					<th>Cargo</th>
					      					<th>Nombre de usuario</th>
					      					<th>Acción</th>
					      				</tr>
					      		  	</thead>   
					      		 	<tbody>

					      		 	<?php 

					      		 	while ($fila = mysql_fetch_array($datosUsuarios)) {
					      		 		$nombreCompleto = $fila['p_nombre']." ".$fila['s_nombre']." ".$fila['apellido_p']." ".$fila['apellido_m'];
					      		 		echo "<tr>";
						      		 		echo "<td>".utf8_encode($nombreCompleto)."</td>";
						      		 		echo "<td>".utf8_encode($fila['rut'])."</td>";
						      		 		echo "<td>".utf8_encode($fila['correo'])."</td>";
						      		 		echo "<td>".utf8_encode($fila['f_nac'])."</td>";
						      		 		echo "<td>".utf8_encode($fila['nombre_privilegio'])."</td>";
						      		 		echo "<td>".utf8_encode($fila['username'])."</td>";
						      		 		echo "<td><a class='btn btn-info btn-small' href='#''><i class='icon-edit icon-white'></i> Editar</a> <a class='btn btn-danger btn-small' href='#''><i class='icon-trash icon-white'></i> Borrar</a></td>";
					      		 		echo "</tr>";
					      		 	}
					      		 	 ?>
					      		  	
					      		 	</tbody>
					        		</table>            
					      	</div>
					    </div>
					  </div>

					</div>    					
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-primary">Crear miembro</button>
						<button type="button" class="btn btn-block">Volver</button>
					</form>
					</div>
				</div><!--/span-->
			</div><!--/row-->
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