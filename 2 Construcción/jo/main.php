<!DOCTYPE html>
<html lang="en">
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

					<div class="row-fluid">
				<a data-rel="tooltip" title="2 nuevos miembros." class="well span3 top-block" href="#">
					<span class="icon32 icon-red icon-user"></span>
					<div>Miembros Totales</div>
					<div>12</div>
					<span class="notification">2</span>
				</a>

				<a data-rel="tooltip" title="4 Nuevos proyectos." class="well span3 top-block" href="#">
					<span class="icon32 icon-color icon-star-on"></span>
					<div>Proyectos en Curso</div>
					<div>28</div>
					<span class="notification green">4</span>
				</a>

				<a data-rel="tooltip" title="56 Proyectos Terminados." class="well span3 top-block" href="#">
					<span class="icon32 icon-color icon-pin"></span>
					<div>Proyectos Terminados</div>
					<div>56</div>
					<span class="notification yellow">56</span>
				</a>
				
				<a data-rel="tooltip" title="12 nuevos mensajes." class="well span3 top-block" href="#">
					<span class="icon32 icon-color icon-envelope-closed"></span>
					<div>Mensajes</div>
					<div>25</div>
					<span class="notification red">12</span>
				</a>
			</div>
			<!-- content starts -->
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Proyectos</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						<div class="control-group">
							<a class="btn btn-success nuevoP" href="nuevoproyecto.php" target="_self">
								<i class="icon-plus icon-white"></i>  
								Nuevo Proyecto                                            
							</a>
						</div>
						  <thead>
							  <tr>
								  <th>Proyecto</th>
								  <th>Fecha de Inicio</th>
								  <th>Encargado</th>
								  <th>Estado</th>
								  <th>Acción</th>
							  </tr>
						  </thead>   
						  <tbody>
							<tr>
								<td>Bismark</td>
								<td class="center">2012/01/01</td>
								<td class="center">Jack Sparrow</td>
								<td class="center">
									<span class="label label-success">Finalizado</span>
								</td>
								<td class="center">
									<a class="btn btn-success" href="verproyecto.php">
										<i class="icon-zoom-in icon-white"></i>  
										Ver                                            
									</a>
									<a class="btn btn-info" href="#">
										<i class="icon-edit icon-white"></i>  
										Editar                                            
									</a>
									<a class="btn btn-danger" href="#">
										<i class="icon-trash icon-white"></i> 
										Borrar
									</a>
								</td>
							</tr>
							
							
							<tr>
								<td>Queen</td>
								<td class="center">2012/06/01</td>
								<td class="center">Juanito Perez</td>
								<td class="center">
									<span class="label">Cancelado</span>
								</td>
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="icon-zoom-in icon-white"></i>  
										Ver                                            
									</a>
									<a class="btn btn-info" href="#">
										<i class="icon-edit icon-white"></i>  
										Editar                                            
									</a>
									<a class="btn btn-danger" href="#">
										<i class="icon-trash icon-white"></i> 
										Borrar
									</a>
								</td>
							</tr>
							<tr>
								<td>Titanic</td>
								<td class="center">2012/03/01</td>
								<td class="center">Raul Mella</td>
								<td class="center">
									<span class="label label-important">Fuera de Plazo</span>
								</td>
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="icon-zoom-in icon-white"></i>  
										Ver                                            
									</a>
									<a class="btn btn-info" href="#">
										<i class="icon-edit icon-white"></i>  
										Editar                                            
									</a>
									<a class="btn btn-danger" href="#">
										<i class="icon-trash icon-white"></i> 
										Borrar
									</a>
								</td>
							</tr>
							<tr>
								<td>Nautilus</td>
								<td class="center">2012/03/01</td>
								<td class="center">Alvaro Salas</td>
								<td class="center">
									<span class="label label-warning">En Curso</span>
								</td>
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="icon-zoom-in icon-white"></i>  
										Ver                                            
									</a>
									<a class="btn btn-info" href="#">
										<i class="icon-edit icon-white"></i>  
										Editar                                            
									</a>
									<a class="btn btn-danger" href="#">
										<i class="icon-trash icon-white"></i> 
										Borrar
									</a>
								</td>
							</tr>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->	
			</div><!--/row-->
			<div class="row-fluid sortable">
				<div class="box span5">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-list-alt"></i> Ejemplo de Grafico de "pie"</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
							<div id="piechart" style="height:300px"></div>
					</div>
				</div>
		</div><!--/row-->
					<!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->				
		<hr>
		<div class="modal hide fade" id="myModal">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3>Settings</h3>
			</div>
			<div class="modal-body">
				<p>Here settings can be configured...</p>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal">Close</a>
				<a href="#" class="btn btn-primary">Save changes</a>
			</div>
		</div>
		<div class="modal hide fade" id="nuevoProyecto">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3>Nuevo Proyecto</h3>
			</div>
			<div class="modal-body">
				<form action="" class="form-horizontal">
					<div class="control-group">
						<label class="control-label">Nombre: </label>
						<div class="controls">
							<input type="text" placeholder="Nombre aquí"  required/> 				
							<a class="btn btn-success" href="#" onclick="$('#informacionProyecto').show('slow'); $('#botonesProyecto').show('slow');">
								<i class="icon-plus icon-white"></i>  
								Verificar                                            
							</a>
						</div>
					</div>
					<div class="control-group">
						<div class="verificador">
							<label class="control-label">Validación</label>
						</div>
					</div>				
					<div id="informacionProyecto">
					<legend>Información del Proyecto</legend>
					<div class="row-fluid">
						<div class="span6">
							<div class="control-group">
								<h3>Responsables</h3>
									<select id="insp">
										<option>Omar Pizarro</option>
										<option>Juan Carlos Garcés</option>
										<option>Juan Pablo Soto</option>
										<option>Sthephany Rojas</option>
										<option>Matias Alonso</option>
									</select>
							</div>
							<div class="control-group">
								<h3>Ayudantes</h3>
									<select id="insp">
										<option>Juan Pablo Soto</option>
										<option>Omar Pizarro</option>
										<option>Juan Carlos Garcés</option>
										<option>Sthephany Rojas</option>
										<option>Matias Alonso</option>
									</select>
							</div>
							<div class="control-group">
								<select id="insp">
										<option>Juan Carlos Garcés</option>
										<option>Omar Pizarro</option>
										<option>Juan Pablo Soto</option>
										<option>Sthephany Rojas</option>
										<option>Matias Alonso</option>
									</select>
							</div>
							<div class="control-group">
								<select id="insp">
										<option>Sthephany Rojas</option>
										<option>Omar Pizarro</option>
										<option>Juan Carlos Garcés</option>
										<option>Juan Pablo Soto</option>
										<option>Matias Alonso</option>
									</select>
							</div>							
						</div>
						<div class="span6">
							<div class="control-group">
							<h3>Descripción del Proyecto</h3>
								<textarea id="descP" rows="5" cols="50" placeholder="Descripción del Proyecto" required></textarea>
							</div>
						</div>
					</div>
					<div class="row-fluid">
						<div class="span6">
							<div class="control-group">
								<h3>Fecha de Inicio</h3>
									<input type="text" class="input datepicker" id="date01" value="02/16/12" required />
							</div>
						</div>
						<div class="span6">
							<div class="control-group">
								<h3>Fecha de Termino</h3>
									<input type="text" class="input datepicker" id="date02" value="02/16/12" required />
							</div>			
						</div>
					</div>		
				</div><!-- Cierre de informaciones -->
				</div><!-- Cierre del Modal Body -->
				<div id="botonesProyecto"class="modal-footer">
					<input type="submit" class="btn btn-info noty" data-noty-options='{"text":"Proyecto Creado con Éxito","layout":"top","type":"information"}' data-dismiss="modal" value="Crear Proyecto" />
				</div>
				</form>
		</div> <!-- Cierre del Modal -->
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
