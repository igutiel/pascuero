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
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
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
	if(@$_SESSION[password] == 1234) {
		echo '<script language="javascript">';
		echo '   alert("Cambie su clave en mantencion de perfil");';
		echo '</script>';
	}
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
		echo '<small><font color="blue">Recuerde que la cuota acordada es de</font> <font color="red">$ '.$valor_cuota.'</font></small></p>';
?>
</div>
<br />
<hr />
<br />
<div class="container">
<center><h1>LISTA DE USUARIOS</h1></center>
<?php
	//echo 'user: '.@$_SESSION[user].'<br />';
	echo '<form id="formName" method="post">';
	if(@$_POST[grupo] == "")
		@$_POST[grupo] = @$_SESSION[id_grupo];
	$sql_count_grupos="select count(1) as contar FROM `usuarios` WHERE username = ".@$_SESSION[user];
	$execCountGrupo=$conection->query($sql_count_grupos);
	$iFila=0;
	while($resCountGrupo=$execCountGrupo->fetch_object())
		$iFila=$resCountGrupo->contar;
	if($iFila > 1) {
		echo ' <div class="form-group">';
		echo '    <label for="exampleFormControlSelect1">Grupo</label>';
		echo '<select name="grupo" class="form-control" aria-label="Elija grupo" onChange="submit()">';
		$sql_grupos="SELECT usu.id_grupo, grp.desc_grupo FROM `usuarios` usu join grupo grp on grp.id_grupo = usu.id_grupo WHERE usu.username = ".@$_SESSION[user]." ORDER BY usu.`id_grupo` ASC ";
		$execGrupos=$conection->query($sql_grupos);
		while($resGrupos=$execGrupos->fetch_object()) {
			echo '<option value="'.$resGrupos->id_grupo.'"';
			if($resGrupos->id_grupo === @$_POST[grupo]) {
				echo ' selected';
				@$_SESSION[id_grupo] = @$_POST[grupo];
			}
			echo '>'.$resGrupos->desc_grupo.'</option>';
		}
		echo '</select>';
		echo '</div>';
	}
	echo '<a href="perfil.php?user='.@$_SESSION[user].'" class="btn btn-primary">Mantenci&oacute;n Perfil</a>'.(@$_SESSION[tipo_user]==1?'&nbsp;&nbsp;&nbsp;<a href="agregar_user.php" class="btn btn-primary">Agregar</a>':'').'&nbsp;&nbsp;&nbsp;<a href="index.php" class="btn btn-primary">Salir</a>';
	$flag_habilitado=0;
	if(@$_SESSION[tipo_user] == 1) {
		echo '<div class="form-check">';
		echo '<input class="form-check-input" type="checkbox" name="habilitado" onChange="document.getElementById(\'formName\').submit()" value="" id="flexCheckDefault"';
		if(@$_POST[habilitado] === "") {
			echo ' checked';
			$flag_habilitado = 1;
		}
		echo '>';
		echo '  <label class="form-check-label" for="flexCheckDefault">';
		echo 'Habilitados / Inhabilitados';
		echo '</label>';
		echo '</div>';
	}
	echo '<br /><br />';
	//echo 'Estado habilitado: '.$flag_habilitado.'<br />';
	$sql_lista_usuarios="select usu.username, usu.nombre, usu.email, est.desc_estado, eco.desc_envio from usuarios usu join estado est on est.estado = usu.estado join envio_correo eco on eco.envio_correo = usu.envia_correo where usu.id_grupo = ".@$_SESSION[id_grupo];
	if($flag_habilitado === 0)
		$sql_lista_usuarios.=" and usu.estado = 0";
	$execUsers=$conection->query($sql_lista_usuarios);
	echo '<table style="cursor: pointer;" id="CursoActivo" class="table-stripped table table-hover table-bordered">'.chr(10);;
	echo '<tr>'.chr(10);;
	echo '<th>';
	echo '</th>';
	echo '<th>Usuario</th><th>Nombre</th><th>E-Mail</th><th>';
	echo 'Estado<br />';
	if(@$_SESSION[tipo_user] == 1) {
		echo '<a href="habilitar_todos.php"><ion-icon src="img/checkmark-outline.svg"></ion-icon></a>';
		echo '<a href="deshabilitar_todos.php"><ion-icon src="img/close-outline.svg"></ion-icon></a>';
	}
	echo '</th><th>';
	//echo 'Envio Correo<br />';
	if(@$_SESSION[tipo_user] == 1) {
		echo '<a href="envia_correo_todos.php"><ion-icon src="img/mail-outline.svg"></ion-icon></a>&nbsp;';
		echo '<a href="no_envia_correo_todos.php"><ion-icon src="img/send-outline.svg"></ion-icon></a>';
	}
	echo '</th></tr>'.chr(10);
	while($resUsers=$execUsers->fetch_object()) {
		echo '<tr>'.chr(10);
		if(@$_SESSION[tipo_user] == 1) {
			echo '<td>';
			echo '<a href="grabar_user.php?usuario='.$resUsers->username.'"><ion-icon src="img/save-outline.svg"></ion-icon></a>';
			echo '<a href="borrar_user.php?usuario='.$resUsers->username.'"><ion-icon src="img/trash-outline.svg"></ion-icon></a>';
			echo '<a href="agregar_user.php?usuario='.$resUsers->username.'"><ion-icon src="img/add-outline.svg"></ion-icon></a>';
			echo '</td>';
		}
		echo "<td><a href='lista_deseo.php?user=".$resUsers->username."'>".$resUsers->username."</a></td><td>".$resUsers->nombre."</td><td>".$resUsers->email.'</td><td>';
		if(@$_SESSION[tipo_user] == 1)
			echo '<a href="cambio_estado.php?username='.$resUsers->username.'">';
		echo $resUsers->desc_estado;
		if(@$_SESSION[tipo_user] == 1)
			echo '</a>';
		echo '</td><td>';
		if(@$_SESSION[tipo_user] == 1)
			echo '<a href="cambio_correo.php?username='.$resUsers->username.'">';
		echo $resUsers->desc_envio;
		if(@$_SESSION[tipo_user] == 1)
			echo '</a>';
		echo '</td></tr>'.chr(10);
	}
	echo '</table>'.chr(10);
	echo '</form>';
?>
</div>
</body>
</html>
