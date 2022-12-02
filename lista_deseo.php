<?php
	include "session.php";
?>
<html>
<head>
<title>LISTA DE DESEOS</title>
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="Generator" content="Control de Acceso CMLR">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
  <link rel="manifest" href="favicon/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
</head>
<body>
<div class="container">
<center><h1>LISTA DE DESEOS</h1>
<p>Navidad <?php echo date("Y"); ?><br />
<?php
	include "conexion/conectar.php";
	$sql_grupo="select desc_grupo from grupo where id_grupo = ".@$_SESSION[id_grupo];
	$execGrupo=$conection->query($sql_grupo);
	while($resGrupo=$execGrupo->fetch_object())
		echo $resGrupo->desc_grupo.'<br />';
	echo '</p>';
?>
<p>En esta Navidad, los buenos deseos y regalar para compartir entre amigos es necesario una buena lista de deseos.</p>
<p>Registrse para crear su lista de deseos</p>
<?php
	$sql_cuota = "select valor_cuota from cuota where id_grupo = ".@$_SESSION[id_grupo];
	//echo 'sql_cuota: '.$sql_cuota.'<br />';
	$execCuota=$conection->query($sql_cuota);
	$valor_cuota="";
	while($resCuota=$execCuota->fetch_object())
		$valor_cuota=$resCuota->valor_cuota;
	if($valor_cuota > 0)
		echo '<small><font color="blue">Recuerde que la cuota acordada es de</font> <font color="red">$ '.$valor_cuota.'</font></small></p>';
?>
</div>
<br />
<hr />
<br />
<div class="container">
<?php
	$sql_deseo_de="select nombre from usuarios where '".@$_GET[user]."' in (username, usernamed, run) and id_grupo = ".@$_SESSION[id_grupo];
	$execDeseo=$conection->query($sql_deseo_de);
	$nombre="";
	while($resDeseo=$execDeseo->fetch_object())
		$nombre=$resDeseo->nombre;
	echo '<center><h1>LISTA DE DESEOS DE '.$nombre.'</h1></center>';
	echo '<a href="lista.php" class="btn btn-primary">Volver</a><br /><br />';
	$sql_lista_deseos="select id, descripcion, url from deseos where username = '".@$_GET[user]."' and id_grupo = ".@$_SESSION[id_grupo];
	$execListaDeseos=$conection->query($sql_lista_deseos);
	echo '<table style="cursor: pointer;" id="CursoActivo" class="table-stripped table table-hover table-bordered">';
	echo '<tr>';
	echo '<th>ID</th><th>Descripci&oacute;n</th><th>URL</th>';
	echo '</tr>';
	while($resListaDeseos=$execListaDeseos->fetch_object()) {
		echo '<tr>';
		echo '<td>'.$resListaDeseos->id.'</td><td>'.$resListaDeseos->descripcion.'</td><td><a href="'.$resListaDeseos->url.'">'.$resListaDeseos->url.'</td>';
		echo '</tr>';
	}
	echo '</table>';
?>
</div>
</body>
</html>
