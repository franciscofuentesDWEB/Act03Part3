<?php
/*====================================================================+
|| # Formulario PHP - Desarrollo Web 2016 - Universidad de Valparaíso
|+====================================================================+
|| # Copyright © 2016 Miguel González Aravena. All rights reserved.
|| # https://github.com/MiguelGonzalezAravena/FormularioPHP
|+====================================================================*/
// Función para evitar inyecciones
function Filtro($texto) {
  return htmlspecialchars(trim($texto), ENT_QUOTES);
}
// Variables
$directorio = '/Applications/XAMPP/htdocs/FE3';
$enviado = isset($_POST['enviado']) ? (int) $_POST['enviado'] : 0;
$anio = isset($_POST['anio']) ? (int) $_POST['anio'] : 0;
$alcalde = isset($_POST['alcalde']) ? Filtro($_POST['alcalde']) : '';
$concejal= isset($_POST['concejal']) ? Filtro($_POST['concejal']) : '';
$nombre = isset($_POST['nombre']) ? Filtro($_POST['nombre']) : '';
$direccion = isset($_POST['direccion']) ? Filtro($_POST['direccion']) : '';
$sexo = isset($_POST['sexo']) ? Filtro($_POST['sexo']) : '';
$error = '';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="description" content="Proyecto para enseñar el funcionamiento de un formulario en PHP">
  <meta name="keywords" content="html, bootstrap, php, formulario, desarrollo, web">
  <meta name="author" content="Nolazko">
  <title>Formulario enviado</title>
  <!-- CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">



    
</head>
<body>
<div class="container">
  <span style="padding-top: 10px;"></span>
<?php
// Mostrar contenido
if($enviado == 1 && $contenido == 1) {
  echo '<pre>';
  print_r($_POST);
  echo '</pre>';
  exit;
} else if(empty($nombre)) {
  $error = 'Por favor, ingrese su nombre.';
} else if(empty($alcalde)) {
  $error = 'Por favor, seleccione su alcalde';
}else if(empty($sexo)) {
  $error = 'Por favor, ingrese su sexo.';
} else if(empty($direccion)) {
  $error = 'Por favor, ingrese su direccion.';
} else if(empty($concejal)) {
  $error = 'Por favor, ingrese su concejalito.';
}
// Vista de error
if(!empty($error)) {
?>
<div class="alert alert-info">
  <i class="glyphicon glyphicon-info-sign"></i>
  <?php echo $error; ?>
</div>
<a href="./" class="btn btn-warning">
  <i class="glyphicon glyphicon-chevron-left"></i>
  Volver
</a>
<?php
// Vista de éxito
} else {
  // Subir imagen
  
?>
  <h3>¡Formulario enviado satisfactoriamente!</h3>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Datos enviados</h3>
    </div>
    <div class="panel-body">
      <p>Bienvenido(a) <b><?php echo $nombre; ?></b>,</p>   
      <p>
        Tu alcalde es: <b><?php echo $alcalde; ?></b>
      </p>
      <p>
        Tu concejal es es: <b><?php echo $concejal; ?></b>
      </p>
      <p>
        Tu sexo es: <b><?php echo ($sexo == 'm' ? 'Masculino' : 'Femenino'); ?></b>
      </p>
    </div>
    <div class="panel-footer">
      <div class="text-right">
        <a href="./" class="btn btn-primary">
          <i class="glyphicon glyphicon-chevron-left"></i>
          Volver
        </a>
      </div>
    </div>
  </div>
<?php } ?>
  <!-- Pie de página -->
  <footer>
    <div class="text-center">
      <i class="glyphicon glyphicon-leaf"></i>
      Desarrollado por <a href="https://github.com/franciscofuentesDWEB" target="_blank">Francisco Fuentes Schreiber</a>
    </div>
  </footer>
</div>
</body>
</html>