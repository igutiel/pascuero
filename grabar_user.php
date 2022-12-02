<?php
	include "session.php";
?>
<html>
<head>
<title>GRABAR USUARIO</title>
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
<center><h1>GRABAR USUARIO</h1>
<p>Navidad <?php echo date("Y"); ?></p>
<?php
	include "conexion/conectar.php";
	$sql_grupo="select desc_grupo from grupo where id_grupo = ".@$_SESSION[id_grupo];
	//echo 'sql_grupo: '.$sql_grupo.'<br />';
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
		echo '<small><font color="blue">Recuerde que la cuota acordada es de</font> <font color="red">$ '.$valor_cuota.'</font><small></p>';
?>
</div>
<br />
<hr />
<br />
<div class="container">
<center><h1>GRABAR	 USUARIO</h1></center>
<?php
	echo '<form method="post">';
	if(@$_POST[boton] == "Grabar") {
		$sql_upd_usuario = "update usuarios set nombre = '".@$_POST[nombre]."', email = '".@$_POST[email]."', tipo_user = ".@$_POST[tipo_user].", estado = ".@$_POST[estado].", envia_correo = ".@$_POST[envia_correo]." where id_grupo = ".@$_SESSION[id_grupo]." and username = ".@$_POST[usuario];
		//echo 'sql_upd_usuario: '.$sql_upd_usuario.'<br />';
		if(!$conection->query($sql_upd_usuario))
			echo 'error '.mysqli_error($conection).'<br />';
		else
			echo 'Grabado exitoso<br />';
		/*echo 'Username: '.@$_POST[usuario].'<br />';
		echo 'Nombre: '.@$_POST[nombre].'<br />';
		echo 'E-Mail: '.@$_POST[email].'<br />';
		echo 'Tipo Usuario: '.@$_POST[tipo_user].'<br />';
		echo 'Estado: '.@$_POST[estado].'<br />';
		echo 'Envio Correo: '.@$_POST[envia_correo].'<br />';*/
	}
	echo '<input type="submit" class="btn btn-primary" value="Grabar" name="boton">&nbsp;&nbsp;&nbsp;<a href="lista.php" class="btn btn-primary">Salir</a><br /><br />';
	$sql_detalle_usuario="select username, usernamed, run, nombre, email, tipo_user, estado, envia_correo from usuarios where '".@$_GET[usuario]."' in (username, usernamed, run) and id_grupo = ".@$_SESSION[id_grupo];
	$execDetalleUsuario=$conection->query($sql_detalle_usuario);
	echo '<table style="cursor: pointer;" id="CursoActivo" class="table-stripped table table-hover table-bordered">'.chr(10);
	while($resDetalleUsuario=$execDetalleUsuario->fetch_object()) {
		echo '<tr>'.chr(10);
		echo '<th><span class="input-group-text" id="basic-addon1"><b>USUARIO</b></div></th><td><div class="input-group mb-3"><input type="text" name="usuario" value="'.$resDetalleUsuario->username.'" class="form-control" placeholder="Usuario" aria-describedby="basic-addon1"></div></td>';
		echo '<th><span class="input-group-text" id="basic-addon1"><b>RUN</b> <small>(99999999-X)</small></div></th><td><div class="input-group mb-3"><input type="text" name="usuariod" value="'.$resDetalleUsuario->usernamed.'" class="form-control" placeholder="Usuariod" aria-describedby="basic-addon1"></div></td>';
		echo '<th><span class="input-group-text" id="basic-addon1"><b>RUN</b> <small>(99.999.999-X)</small></div></th><td><div class="input-group mb-3"><input type="text" name="run" value="'.$resDetalleUsuario->run.'" class="form-control" placeholder="Run" aria-describedby="basic-addon1"></div></td></tr><tr>';
		echo '<th><span class="input-group-text" id="basic-addon1"><b>NOMBRE</b></div></th><td><div class="input-group mb-3"><input type="text" name="nombre" value="'.$resDetalleUsuario->nombre.'" class="form-control" placeholder="Nombre" aria-describedby="basic-addon1"></div></td>';
		echo '<th><span class="input-group-text" id="basic-addon1"><b>E-MAIL</b></div></th><td><div class="input-group mb-3"><input type="text" name="email" value="'.$resDetalleUsuario->email.'" class="form-control" placeholder="E-Mail" aria-describedby="basic-addon1"></div></td>'.chr(10);
		echo '<th><span class="input-group-text" id="basic-addon1"><b>TIPO USUARIO</b></div></th>';
		echo '<td>';
		echo '<div class="input-group mb-3">';
		echo '<select name="tipo_user" class="custom-select">';
		$sql_sel_tipo_user="select tipo_user, desc_tipo from tipo_user order by tipo_user";
		$execSelTipoUser=$conection->query($sql_sel_tipo_user);
		while($resSelTipoUser=$execSelTipoUser->fetch_object()) {
			echo '<option value="'.$resSelTipoUser->tipo_user.'"';
			if($resSelTipoUser->tipo_user === $resDetalleUsuario->tipo_user)
				echo ' selected';
			echo '>'.$resSelTipoUser->desc_tipo.'</option>'.chr(10);
		}
		echo '</select>';
		echo '</td></tr><tr>';
		echo '<th><span class="input-group-text" id="basic-addon1"><b>ESTADO</b></div></th>';
		echo '</div></td>';
		echo '<td>';
		echo '<div class="input-group mb-3">';
		echo '<select name="estado" class="custom-select">';
		$sel_sel_estado="select estado, desc_estado from estado order by estado";
		$execSelEstado=$conection->query($sel_sel_estado);
		while($resSelEstado=$execSelEstado->fetch_object()) {
			echo '<option value="'.$resSelEstado->estado.'"';
			if($resSelEstado->estado === $resDetalleUsuario->estado)
				echo ' selected';
			echo '>'.$resSelEstado->desc_estado.'</option>'.chr(10);
		}
		echo '</select>';
		echo '</div></td>';
		echo '<th><span class="input-group-text" id="basic-addon1"><b>ENVIO CORREO</b></div></th>';
		echo '<td>';
		echo '<div class="input-group mb-3">';
		echo '<select name="envia_correo" class="custom-select">';
		$sql_sel_envia_correo="select envio_correo, desc_envio from envio_correo order by envio_correo";
		$execSelEnviaCorreo=$conection->query($sql_sel_envia_correo);
		while($resSelEnviaCorreo=$execSelEnviaCorreo->fetch_object()) {
			echo '<option value="'.$resSelEnviaCorreo->envio_correo.'"';
			if($resSelEnviaCorreo->envio_correo === $resDetalleUsuario->envia_correo)
				echo ' selected';
			echo '>'.$resSelEnviaCorreo->desc_envio.'</option>'.chr(10);
		}
		echo '</select>';
		echo '</div></td>';
		echo '</tr>'.chr(10);
	}
	echo '</table>'.chr(10);
?>
</div>
</form>
</body>
</html>
