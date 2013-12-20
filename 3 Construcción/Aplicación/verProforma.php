<?php 
	session_start();
	include ('clases/usuario.php');
	include ('clases/proyecto.php');
	include ('clases/liquidacion.php');
	include ('clases/miscelaneo.php');
	include ('clases/proforma.php');

	if(!$_SESSION['login']){
		header('location:index.php');
	}

	$Usuario = new Usuario;
	$Proyecto = new Proyecto;
	$Liquidacion = new Liquidacion;
	$Miscelaneo = new Miscelaneo;
	$Proforma = new Proforma;

	$numeroProforma = $Proforma->getIdProforma();

	$nombreCompleto = $Usuario->getUserName($_SESSION['Id_Usuario']);
	$idDeProyecto = $_GET['idProyecto'];
	$infoDeProyecto = $Proyecto->getInfoProyecto($idDeProyecto);

	$IdcodigoDeInforme = $infoDeProyecto[3];
	$codigoDeInforme = $Proyecto->getCodigoProyecto($IdcodigoDeInforme);

	$nombreDeLaNave = $infoDeProyecto[5];

	$referenciaCliente= $Liquidacion->getReferenciaCliente($idDeProyecto);
	$referenciaCliente=$referenciaCliente[0];

	$lugarDeServicio = $infoDeProyecto[1];
	$nombreLugar = $Liquidacion->getLugar($lugarDeServicio);
	$nombreLugar = $nombreLugar[0];

	$descripcionServicio = $infoDeProyecto[8];

	$valorDolar = $Miscelaneo->obtenerDolar();
	$valorDolar = $valorDolar[1];

	$idResponsable=$infoDeProyecto[2];
	$nombreResponsable=$Usuario->getUserName($idResponsable);

	$getLugares = $Proyecto->getLugares();
	$getResponsables= $Proyecto->getResponsables();



	// Información Proforma
	$datosProforma = $Proforma->verProforma($idDeProyecto);

	$idProforma =$datosProforma[0];
	$idProyectos = $datosProforma[1];
	$fechaCreacion = $datosProforma[2];
	$cliente = $datosProforma[3];
	$totalProforma = $datosProforma[4];

	// Fin información proforma

	// Información honorario
	// Fin Información honorario
 ?>
<!DOCTYPE html>
<html lang="es-ES">
<head>
	<meta charset="utf-8">
	<title>Proforma</title>
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
				<div class="row-fluid">		
					<div class="box span12">
						<div class="box-header well" data-original-title>
							<h2><i class="icon-user"></i> Proforma</h2>
							<div class="box-icon">
								<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							</div>
						</div>

						<div class="box-content">

							<form class="form-horizontal" method="POST" action="proforma.php?idProyecto=<?php echo $idDeProyecto; ?>">
							<fieldset>
							<div class="row-fluid">
								<div class="span12">
										<p class="center">
										   MARINE TECHNICAL SURVEYS – TECHNICAL ADVISORS – HULL & 
										   MACHINERY – ENGINEERING – LOSS & GENERAL AVERAGE ADJUSTERS - 
										   MARINE EXPERT APPRAISERS - SUPERINTENDENTS - PORT CAPTAIN – 
										   SUPERCARGO - CONTROL QUALITY – CERTIFICATIONS
										</p>
								</div> 
							</div> 

							<div class="row-fluid">
								<div class="span12">
									<p class="pull-left">Proforma N°: <?php echo ($idProforma)."/".date('y'); ?></p>
									<p class="pull-right"><?php echo date('F d, Y'); ?></p>
								</div>
							</div>
									
							<legend><p class="center">PROFORMA DE FACTURACIÓN</p></legend>

							<div class="row-fluid">
								<div class="span3">
									<p>INFORME N° :</p>
								</div>
								<div class="span8">
									<p class="pull-left"><?php echo $codigoDeInforme; ?></p>
								</div>
							</div>

							<div class="row-fluid">
								<div class="span3">
									<p>NAVE :</p>
								</div>
								<div class="span8">
									<p class="pull-left"><?php echo $nombreDeLaNave; ?></p>
								</div>
							</div>

							<div class="row-fluid">
								<div class="span3">
									<p>CLIENTE :</p>
								</div>
								<div class="span8">
									<?php echo $cliente; ?>
								</div>
							</div>

							<div class="row-fluid">
								<div class="span3">
									<p>REFERENCIA DEL CLIENTE :</p>
								</div>
								<div class="span8">
									<p class="pull-left"><?php echo $referenciaCliente; ?> </p>
								</div>
							</div>

							<div class="row-fluid">
								<div class="span3">
									<p>LUGAR :</p>
								</div>
								<div class="span8">
									<p class="pull-left"><?php echo $nombreLugar; ?> </p>
								</div>
							</div>

							<div class="row-fluid">
								<div class="span3">
									<p>SERVICIO :</p>
								</div>
								<div class="span8">
									<p class="pull-left"><?php echo $descripcionServicio; ?></p>
								</div>
							</div>

							<legend>Honorarios</legend>

							<table id="tablaHonorarios" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>FECHA <?php echo date('Y'); ?></th>
										<th>Detalle del servicio</th>
										<th>Ciudad</th>
										<th>Inspectores Participantes</th>
										<th>Calificación</th>
										<th>Unidad Cobro</th>
										<th>Valor USD</th>
										<th>Cantidad H/T/D</th>
										<th>Total USD</th>
									</tr>
							  	</thead>   
							 	<tbody>
							 		<?php echo $Proforma->verHonProforma($idProforma); ?>
								</tbody>
									<tfoot>
										<tr>
											<td colspan="7">
												<span class="pull-right">TOTAL</span>
											</td>
											<td colspan="2">
												$<span id="spanTotalProforma"> <?php echo $totalProforma ?></span>.-
												<input name="totalProforma" id="inputTotalProforma" type="hidden" value="0" />
											</td>
										</tr>
									</tfoot>
					  		</table>   

							<div class="row-fluid">
								<div class="span6">
									<p>P = Aplica valor Inspector Profesional.</p>
									<p>T = Aplica valor Inspector Técnico.</p>
									<p>M = Aplica valor mínimo segun tarifado establecido.</p>
									<p>S = Aplica Valor Según Servicio Previamente Establecido, Cotizado o Rendido.</p>
								</div>
							</div>	

							<legend>Participantes</legend>	

							<div class="row-fluid">
								<div class="span8">
									<p><?php echo $nombreResponsable; ?></p>
								</div>
							</div>				  		

							 <legend></legend>

							 <div class="row-fluid">
								<div class="span12">
									<p><b>Nota:</b></p>
									<p>Cabe señalar para todas vuestras consideraciones contables internas del presente servicio, que para efectos de su cobro se emitirá por nuestra parte en el momento que ustedes lo señalen, una factura de venta y servicios no afecta a IVA (Exenta), por lo tanto el (los) valor (es) del servicio antes indicado es el valor efectivo de cancelación, no existiendo otros cargos adicionales.</p>
								</div>
							</div>	
							
							<div class="row-fluid">
								<span class="span12 firmaGerente"></span>
							</div>

							<div class="row-fluid">
								<div class="span6 center">
									<p>Osvaldo Pizarro A.</p>
									<p>Marine Engineer & Cargo Surveyor</p>
									<p>Master of naval Engineering (APN)</p>
									<p>COORDINADOR DE SERVICIOS</p>
								</div>
							</div>	
							<div class="form-actions">
								<a class="btn btn-large btn-primary" href="#"><i class="icon-print icon-white"></i> Imprimir</a>
								<a class="btn btn-large btn-block" href="main.php"><i class="icon-home"></i> Volver</a>
							</div>
							</fieldset>
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

	<script>
	$(document).ready(function() {

		function calcular_total()
		{
		    var $filas = $('#tablaHonorarios tbody tr');
		    var total = 0;
		    
		    $filas.each(function(index, value) {

		    	if ( isNaN($(this).find('input.cantidadHTD').val()) ) {
		    		alert("Debe ingresar solo números");
		    		$(this).find('input.cantidadHTD').val(0);

		    		$(this).find('td.totales >span.totalHonorario').html(0);
		    		$(this).find('td.totales >input.textTotal').val(0);

		    		$('#inputTotalProforma').val(0);
		    		$('#spanTotalProforma').html(0);
		    	}else{
			        valor = parseFloat($(this).find('td.valorDolar>input').val(),10);
			        cantidad  = parseInt($(this).find('input.cantidadHTD').val(), 10);
			        subtotal = valor * cantidad;
			        total += subtotal;
			        $(this).find('td.totales >span.totalHonorario').html(subtotal);
			        $(this).find('td.totales >input.textTotal').val(subtotal);
		    	}	
		    });
		   // $('#total').html(total);
		    $('#inputTotalProforma').val(total);
			$('#spanTotalProforma').html(total);
		}

		$('#tablaHonorarios tbody').on('keyup', 'input.cantidadHTD', function(ev) {
		    calcular_total();
		});

		$('#quitarFila').click(function(){
			if ($('#tablaHonorarios >tbody >tr').length == 1){
	    		alert( "No se puede borrar toda la Tabla" );
			}else{
				$("#tablaHonorarios tbody>tr:last").remove();
			}
		});

		$('#agregarFila').click(function(){
			var nuevaFila="<tr>"+
							"<td><input name=\"fechaHonorario[]\" type=\"text\" class=\"input input-small datepicker\" id=\"date01\" required /></td>"+
							"<td><div class=\"row-fluid\"><textarea name=\"detalleServicio[]\" class=\"span12\" cols=\"30\" rows=\"2\" placeholder=\"Detalle de Servicio\"></textarea></div></td>"+
							"<td><select name=\"selectLugares[]\" class=\"span12\"><?php echo $getLugares; ?></select></td>"+
							"<td><select id=\"selectResponsable\" name=\"responsable[]\" class=\"span12\"><?php echo $getResponsables; ?></select></td>"+
							"<td><div class=\"row-fluid\"><select class=\"span8\" name=\"calificacion[]\" ><option value=\"P\">P</option><option value=\"T\">T</option><option value=\"M\">M</option><option value=\"S\">S</option></select></div></td>"+
							"<td><div class=\"row-fluid\"><select class=\"span11\" name=\"unidadCobro[]\" ><option value=\"Diario\">Diario</option><option value=\"Hora\">Hora</option><option value=\"Turno\">Turno</option><option value=\"Lump Sum\">Lump Sum</option></select></div></td>"+
							"<td class=\"valorDolar\"><input type=\"text\" class=\"input-small\" name=\"valorDolar[]\" placeholder=\"<?php echo $valorDolar; ?>\" required /></td>"+
							"<td><input name=\"cantidadHTD[]\" type=\"text\" class=\"cantidadHTD input-small\" placeholder=\"HTD\" /></td>"+
							"<td class=\"totales\">$<span class=\"totalHonorario\">0</span>.-<input class=\"textTotal\" type=\"hidden\" value=\"0\" name=\"totalHonorario[]\"></td>"+
						"</tr>";
			var objTabla=$(this).parents().get(4);
			$(objTabla).find('tbody').append(nuevaFila);
		});
	});
	</script>
</body>
</html>