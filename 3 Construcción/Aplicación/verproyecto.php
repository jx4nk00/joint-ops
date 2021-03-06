<?php 
	session_start();
	include ('clases/usuario.php');
	include ('clases/proyecto.php');
	include ('clases/informe.php');
	include ('clases/liquidacion.php');
	include ('clases/proforma.php');
	include ('clases/cliente.php');
	if(!$_SESSION['login']){
		header('location:index.php');
	}

	$progreso = 0;
	$idDeProyecto=$_GET['idDeProyecto'];
	$Proyecto = new Proyecto;
	$Usuario = new Usuario;
	$informe = new Informe;
	$Liquidacion = new Liquidacion;
	$Proforma = new Proforma;
	$Cliente = new Cliente;
	//Abrir y Cerrar Proyecto 
	if (isset($_POST['cerrarProyecto'])) {
		$Proyecto->activoProyecto('c',$idDeProyecto);
	}
	if (isset($_POST['abrirProyecto'])) {
		$Proyecto->activoProyecto('a',$idDeProyecto);
	}
	$InformacionDelProyecto = $Proyecto->getInfoProyecto($idDeProyecto);
	$idDeLugar = $InformacionDelProyecto[1];
	$idResponsable = $InformacionDelProyecto[2];
	$idCodigoProyecto = $InformacionDelProyecto[3];
	$nombreDeProyecto = $InformacionDelProyecto[4];
	$nombreDeLaNave = $InformacionDelProyecto[5];
    $fechaInicio = $InformacionDelProyecto[6];
	$fechaTermino = $InformacionDelProyecto[7];
	$DescripcionDeProyecto = $InformacionDelProyecto[8];
	$proyectoActivo = $InformacionDelProyecto[9];
	$CodigoDeProyecto = $Proyecto->getCodigoProyecto($idCodigoProyecto);
	$serviciosDeProyecto = $Proyecto->getServiciosDeProyecto($idDeProyecto);
	$inspectorACargo = $Usuario->getUserName($idResponsable);

	$proyectoFinalizado = $InformacionDelProyecto[10];


	if ($proyectoActivo==0) {
		$estadoDeProyecto = "<span class='label label-inverse'>Cerrado</span>";
	}else{

		if($proyectoFinalizado==1){
			$estadoDeProyecto = "<span class='label label-success'>Finalizado</span>";
		}else{

			if(  strtotime($fechaTermino) > strtotime(date('Y-m-d'))  ){
				$estadoDeProyecto = "<span class='label label-info'>En Curso</span>";}
			else{
				$estadoDeProyecto = "<span class='label label-important'>Fuera de Plazo</span>";
			}

		}
	}
	//
	// Subir Informe
	if( isset($_POST['btnSubirInforme'])){
		$carpeta ="informes/";
		opendir($carpeta);
		$ruta = $carpeta.mt_rand(0,999)."-".date("d-m-Y")."-".utf8_decode($_FILES['informe']['name']);
		copy($_FILES['informe']['tmp_name'], $ruta);
		$resultadoSubida=$informe->subirInforme($idDeProyecto,$ruta);
	}
	// Crear Factura
	if(isset($_POST['btnEnviar'])){
		$empresa =  $_POST['textEmpresa'];
		$rut = $_POST['textRut'];
		$direccion = $_POST['textDireccion'];
		$comuna =  $_POST['textComuna'];
		$ciudad = $_POST['textCiudad'];
		$giro =  $_POST['textGiro'];
		$datosCliente= array($empresa,$rut,$direccion,$comuna,$ciudad,$giro); 
		$Cliente->subirDatos($datosCliente,$idDeProyecto);
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Ver Proyectos</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Joint OPs, Sistema de Procesos integrados, OPServices">
	<meta name="author" content="Joint Ops">
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
					<p>Necesitas tener <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> activado para utilizar este sitio.</p>
				</div>
			</noscript>
			<div id="content" class="span11">
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
							<div class="span3">
								<div class="control-group">
									<h3>Nombre del Proyecto</h3> 
									<?php echo $nombreDeProyecto;  ?>
								</div>
							</div>
							<div class="span3">
								<div class="control-group">
									<h3>Código</h3>
									 <?php echo $CodigoDeProyecto; ?>
								</div>
							</div>
							<div class="span3">
                                <div class="control-group">
                                    <h3>Estado</h3>
                                    <?php echo $estadoDeProyecto; ?>
                                </div>
                            </div>
                            <div class="span3">
                                <div class="control-group">
                                    <h3>Fechas</h3>
                                    <div class="row-fluid">
                                        <div class="span12">Inicio: <?php echo date("d-M-Y",strtotime($fechaInicio)); ?></div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span12">Término: <?php echo date("d-M-Y",strtotime($fechaTermino)); ?></div>
                                    </div>
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
						<?php if($proyectoActivo==1){ ?>
						<div class="row-fluid">
							<div class="span6">
								<div class="control-group">
										<legend>Documentación del Inspector</legend>
										<h3>Liquidación</h3>
										<?php 
											$existeLiquidacion = $Liquidacion->verExistencia($idDeProyecto);
											if($existeLiquidacion){
										?>
										<a class="btn btn-success" href="verLiquidacion.php?idProyecto=<?php echo $idDeProyecto; ?>" >
											<i class="icon-zoom-in icon-white"></i>  
											Ver Liquidación                                            
										</a>
										<?php 
											$progreso+=25;}
											else{
										 ?>
										<a class="btn btn-info"  href="liquidacion.php?idProyecto=<?php echo $idDeProyecto; ?>">
											<i class="icon-edit icon-white"></i>  
											Crear Liquidación                                           
										</a>
										<?php } ?>
								</div>

								<div class="control-group">
									<h3>Informe	</h3>
									<?php 
										$existeInforme = $informe->verExistencia($idDeProyecto);
										if ($existeInforme) { 
									?>
									<a class="btn btn-success" target="_blank" href="<?php echo utf8_encode($existeInforme[2]); ?>">
										<i class="icon-zoom-in icon-white"></i>  
										Ver Informe                                            
									</a>
									<?php 
											$progreso+=25;
										}
										else{ 
									?>
									<a data-toggle="modal" href="#subirInforme" class="btn btn-info">
										<i class="icon-upload icon-white"></i>  
										Subir Informe                                            
									</a>
									<?php }	?>
										
								</div>
							</div>
							<div class="span6">
								<div class="control-group">
									<legend>Documentación del Gerente</legend>
									<h3>Proforma</h3>
									<?php 
										if($existeInforme && $existeLiquidacion){
										$existeProforma = $Proforma->verExistencia($idDeProyecto);
										if($existeProforma){
									?>
									<a class="btn btn-success" href="verProforma.php?idProyecto=<?php echo $idDeProyecto; ?>">
										<i class="icon-zoom-in icon-white"></i>  
										Ver Proforma                                            
									</a>
									<?php 
											$progreso+=25;
										}
										else{ 
									?>
									<a class="btn btn-info" href="proforma.php?idProyecto=<?php echo $idDeProyecto; ?>">
										<i class="icon-edit icon-white"></i>  
										Crear Proforma                                           
									</a>
									<?php 
											} 
										}else{ ?>
											<div class="alert alert-block">
											  <h4>AVISO!</h4>
											  Para continuar ingrese la Liquidación y el Informe.
											</div>
										<?php }	?>
								</div>

								<div class="control-group">
										<h3>Factura	</h3>
										<?php if($existeProforma){ ?>
										<?php 
											$existeFactura = $Cliente->getDatosCliente($idDeProyecto);
											if($existeFactura){
										 ?>
										<a class="btn btn-success" href="verFactura.php?idProyecto=<?php echo $idDeProyecto; ?>">
											<i class="icon-zoom-in icon-white"></i>  
											Ver Factura                                           
										</a>
										<?php 
											$progreso+=25;
											}else{ 
										?>
										<a data-toggle="modal" class="btn btn-info" href="#crearFactura">
											<i class="icon-edit icon-white"></i>  
											Crear Factura                                            
										</a>
										<?php } ?>
										<?php }else{ ?>
										<div class="alert alert-block">
											  <h4>AVISO!</h4>
											  Para continuar ingrese Proforma.
											</div>
										<?php } ?>
								</div>

								<?php 
									if($progreso==100){
										$Proyecto->finalizarProyecto($idDeProyecto);
									}
								?>
							</div>
						</div>
						<legend>Estado de Avance</legend>
						<div class="progress progress-success" style="margin-bottom: 9px;">
							<div class="bar" style="width: <?php echo $progreso; ?>%"><?php echo $progreso; ?>%</div>
						</div>
						<?php } ?>

						<legend>Cerrar Proyecto</legend>
							<form action="verproyecto.php?idDeProyecto=<?php echo $idDeProyecto; ?>" method="POST">
								<?php if($proyectoActivo==1){?>
									<input type="submit" class="btn btn-large btn-danger" value="Cerrar Proyecto" name="cerrarProyecto" />
								<?php }else{ ?>
									<input type="submit" class="btn btn-large btn-success" value="Abrir Proyecto" name="abrirProyecto" />
								<?php } ?>
							</form>
							

						<!-- Modal -->
						  <div class="modal hide fade" id="subirInforme">
						    <div class="modal-dialog">
						      <div class="modal-content">
						        <div class="modal-header">
						          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						          <h4 class="modal-title">Subir Informe</h4>
						        </div>
						        <div class="modal-body">
						          <form action="verproyecto.php?idDeProyecto=<?php echo $idDeProyecto; ?>" method="post" enctype="multipart/form-data">
						          	<input name="informe" class="input-file uniform_on" id="fileInput" type="file" required />
						          	<input class="btn btn-info" type="submit" value="Subir" name="btnSubirInforme">
						          </form>
						        </div>
						        <div class="modal-footer">
						          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						        </div>
						      </div>
						    </div>
						  </div>
						 <!-- /.modal -->

						 <!-- Modal -->
						   <div class="modal hide fade" id="crearFactura">
						     <div class="modal-dialog">
						       <div class="modal-content">
						         <div class="modal-header">
						           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						           <h4 class="modal-title">Factura</h4>
						         </div>
						         <div class="modal-body">
						           <form action='verproyecto.php?idDeProyecto=<?php echo $idDeProyecto; ?>' method="post">
						           <div class="row-fluid">
						           		<div class="span6">
						           			<strong>Empresa</strong>
						           			<input name="textEmpresa" type="text" class="input-large" required>
						           		</div>
						           		<div class="span6">
						           			<strong>Rut</strong><br>
						           			<input name="textRut" type="text" class="input-large" required>			           			
						           		</div>
						           </div>
						           <div class="row-fluid">
						           		<div class="span6">
						           			<strong>Dirección</strong>
						           			<input name="textDireccion" type="text" class="input-large" required>
						           		</div>
						           		<div class="span6">
						           			<strong>Comuna</strong><br>
						           			<input name="textComuna" type="text" class="input-large" required>	           			
						           		</div>
						           </div>
						           <div class="row-fluid">
						           		<div class="span6">
						           			<strong>Ciudad</strong>
						           			<input name="textCiudad" type="text" class="input-large" required>
						           		</div>
						           		<div class="span6">
						           			<strong>Giro</strong><br>
						           			<input name="textGiro" type="text" class="input-large" required>
						           		</div>
						           </div>
						         </div>
						         <div class="modal-footer">
						           <input name="btnEnviar" type="submit" class="btn btn-inverse pull-left" value="Enviar">
						           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>						           
						         </div>
						         </form>
						       </div>
						     </div>
						   </div>
						  <!-- /.modal -->
						</div>
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