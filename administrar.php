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
<?php
	function rellena($largo) {
		$szRetorno="";
		for($iPos=0; $iPos < $largo; $iPos++)
			$szRetorno.="*";
		return($szRetorno);
	}
?>
<div class="container">
<center><h1>LISTA DE DESEOS</h1>
<p>Navidad <?php echo date("Y"); ?><br />
<?php
	include "conexion/conectar.php";
	include "../PHPMailer/mailer_correo.php";
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
</center></div>
<br />
<hr />
<br />
<div class="container">
<center><h1>LISTA DE USUARIOS</h1></center>
<?php
	echo '<form method="post" name="form1" id="form1" action="">'.chr(10);
	if(@$_POST[graba_cuota] == "Grabar Cuota" && is_numeric(@$_POST[cuota])) {
		$sql_existe_cuota_grupo="select count(1) as contar from cuota where id_grupo = ".@$_SESSION[id_grupo];
		$execExisteGrupo=$conection->query($sql_existe_cuota_grupo);
		while($resExisteGrupo=$execExisteGrupo->fetch_object())
			$existe_grupo=$resExisteGrupo->contar;
		if($existe_grupo == 0)
			$sql_accion_cuota="insert into cuota(id_grupo, valor_cuota) values(".@$_SESSION[id_grupo].", ".@$_POST[cuota].")";
		else
			$sql_accion_cuota="update cuota set valor_cuota = ".@$_POST[cuota]." where id_grupo = ".@$_SESSION[id_grupo];
		$execAccionCuota=$conection->query($sql_accion_cuota);
	}
	$sql_lee_cuota="select valor_cuota from cuota where id_grupo = ".@$_SESSION[id_grupo];
	$execLeeCuota=$conection->query($sql_lee_cuota);
	$valor_cuota="";
	while($resLeeCuota=$execLeeCuota->fetch_object())
		$valor_cuota=$resLeeCuota->valor_cuota;
	echo '<div class="form-group row">';
	echo '<div class="col-sm-10">';
	echo '<input type="text" name="cuota" class="form-control" placeholder="Cuota acordada" value="'.$valor_cuota.'" />';
	echo '</div>';
	echo '<input type="submit" name="graba_cuota" class="btn btn-primary" value="Grabar Cuota" />';
	echo '</div>';
	if(@$_POST[asignar] == "Limpiar") {
		$sql_del_parejas="delete from pareja where id_grupo = ".@$_SESSION[id_grupo];
		$resDelPareja=$conection->query($sql_del_parejas);
	}
	$sql_asignados="select count(1) as contar from pareja where estado = 1 and id_grupo = ".@$_SESSION[id_grupo];
	$num_asignados=0;
	$execAsignados=$conection->query($sql_asignados);
	while($resAsignados=$execAsignados->fetch_object())
		$num_asignados = $resAsignados->contar;
	$sql_usuarios="select count(1) as contar from usuarios where estado = 0 and id_grupo = ".@$_SESSION[id_grupo];
	$execCount=$conection->query($sql_usuarios);
	while($resCount=$execCount->fetch_object())
		$num_usuarios=$resCount->contar;
	$sql_lista_usuarios="select username, nombre, email from usuarios where estado = 0 and id_grupo = ".@$_SESSION[id_grupo];
	$execUsers=$conection->query($sql_lista_usuarios);
	if(@$_POST[asignar] == "Asignar") {
		$ArrayUsuarios=Array();
		$iCount=0;
		while($resUsers=$execUsers->fetch_object()) {
			$ArrayUsuarios[]=array($resUsers->username, $iCount++, '', $resUsers->email);
		}
		$iElementos = count($ArrayUsuarios);
		for($i=0; $i < count($ArrayUsuarios); $i++) {
			do {
				$numero=rand(0, count($ArrayUsuarios) - 1);
				$flag=0;
				for($j=0; $j < count($ArrayUsuarios); $j++ ) {
					if($ArrayUsuarios[$j][2] == $ArrayUsuarios[$numero][0]) {
						$flag=1;
					}
				}
			}while($ArrayUsuarios[$i][0] == $ArrayUsuarios[$numero][0] || $flag == 1 /*|| $j == count($ArrayUsuarios)*/);
			$ArrayUsuarios[$i][2]=$ArrayUsuarios[$numero][0];
			$iElementos--;
			//echo 'ArraySearch['.$i.']: '.$ArrayUsuarios[$i][0].'-->'.$ArrayUsuarios[$i][2].'='.array_search($ArrayUsuarios[$numero][0], $ArrayUsuarios[2]).'<br />';
		}
	}
	//echo 'Boton Asignar: '.@$_POST[asignar].'<br />'.chr(10);
	$flag_num_commit=0;
	if(@$_POST[asignar] == "Salir") {
		echo '<script language="javascript">'.chr(10);
		echo ' window.location.href="perfil.php?user='.@$_SESSION[user].'";'.chr(10);
		echo '</script>'.chr(10);
		exit;
	}
	elseif(@$_POST[asignar] == "Asignar") {
		if($num_asignados == 0) {
			$sql_del_parejas="delete from pareja where id_grupo = ".@$_SESSION[id_grupo];
			$resDelPareja=$conection->query($sql_del_parejas);
		}
		for($i=0; $i < count($ArrayUsuarios); $i++) {
			$sql_inserta_parejas="insert into pareja(id_grupo, username1, username2, email_destino, fecha) values(".@$_SESSION[id_grupo].", '".$ArrayUsuarios[$i][0]."', '".$ArrayUsuarios[$i][2]."', '".$ArrayUsuarios[$i][3]."', now())";
			//echo 'sql_inserta_parejas: '.$sql_inserta_parejas.'<br />';
			$resInsPareja=$conection->query($sql_inserta_parejas);
			$flag_num_commit++;
		}
	}
	//var_dump($ArrayUsuarios);
	$sql_asignados="select count(1) as contar from pareja where estado = 1 and id_grupo = ".@$_SESSION[id_grupo];
	$num_asignados=0;
	$execAsignados=$conection->query($sql_asignados);
	while($resAsignados=$execAsignados->fetch_object())
		$num_asignados = $resAsignados->contar;
	echo '<input type="submit" class="btn btn-primary" name="asignar" value="Asignar"';
	if($num_asignados > 0 || $flag_num_commit > 0)
		echo ' disabled';
	echo '>'.chr(10);
	echo '&nbsp;&nbsp;&nbsp;'.chr(10);
	echo '<input type="submit" class="btn btn-primary" name="asignar" value="Limpiar" />';
	echo '&nbsp;&nbsp;&nbsp;'.chr(10);
	echo '<input type="submit" name="asignar" value="Salir" class="btn btn-primary"><br /><br />'.chr(10);
	$sql_count_parejas="select count(1) as contar from pareja where id_grupo = ".@$_SESSION[id_grupo];
	$execCountPareja=$conection->query($sql_count_parejas);
	$num_parejas = 0;
	while($resCountPareja=$execCountPareja->fetch_object())
		$num_parejas = $resCountPareja->contar;
	$sql_lista_usuarios_asignado="select usu.username, usu.nombre, usu.email, par.username2, usu2.nombre as nombre2, usu.envia_correo, par.estado from usuarios usu left join pareja par on par.username1 = usu.username and par.id_grupo = usu.id_grupo left join usuarios usu2 on usu2.username = par.username2 where usu.estado = 0 and usu.id_grupo = ".@$_SESSION[id_grupo];
	$execUsersAsignado=$conection->query($sql_lista_usuarios_asignado);
	//echo 'sql_lista_usuarios_asignado: '.$sql_lista_usuarios_asignado.'<br />';
	echo '<table style="cursor: pointer;" id="CursoActivo" class="table-stripped table table-hover table-bordered">'.chr(10);
	echo '<tr>'.chr(10);
	echo '<th>Usuario</th><th>Nombre</th><th>E-Mail</th><th>Pareja</th><th>Nombre Pareja</th><th>Envia Correo</th><th>Resultado</th>'.chr(10);
	echo '</tr>'.chr(10);
	while($resUsersAsignado=$execUsersAsignado->fetch_object()) {
		echo '<tr>'.chr(10);
		echo "<td>".$resUsersAsignado->username."</td><td>".$resUsersAsignado->nombre."</td><td>".$resUsersAsignado->email.'</td><td>'.rellena(strlen($resUsersAsignado->username2)).'</td><td>'.rellena(strlen($resUsersAsignado->nombre2)).'</td><td>'.($resUsersAsignado->envia_correo==0?'NO':'SI').'</td>'.chr(10);
		$retorno = "No Enviado";
		if($resUsersAsignado->envia_correo == 1 && $num_parejas > 0 && $resUsersAsignado->estado == 0) {
			$remitente='seade@seade.cl';
			$asunto = 'Amigo Secreto [DEFINITIVO]';
			$headers = "MIME-Version: 1.0\r\n";
			$headers .= "Content-type:text/html; charset=iso-8859-1\r\n";
			$headers .= "From: seade@seade.cl\r\n";
			$headers .= "To: ".$resUsersAsignado->email."\r\n";
			$headers .= "Reply-to: $remitente\r\n";
			$cuerpo   = "Estimado<br />";
			$cuerpo  .= "<br />";
			$cuerpo  .="Su amigo secreto es: ".utf8_encode($resUsersAsignado->nombre2)."<br />";
			$cuerpo  .= "<br />";
			$cuerpo  .= "Su lista de deseo es la siguiente:<br />";
			$cuerpo  .= "<table border=1>";
			$cuerpo  .= "<tr><th>Descripci&oacute;n</th><th>URL</th></tr>";
			$sql_lista_deseo="select descripcion, url from deseos where username = '".$resUsersAsignado->username2."' and id_grupo = ".@$_SESSION[id_grupo];
			$execListaDeseo=$conection->query($sql_lista_deseo);
			while($resListaDeseo=$execListaDeseo->fetch_object())
				$cuerpo.="<tr><td>".utf8_encode($resListaDeseo->descripcion)."</td><td>".$resListaDeseo->url."</td></tr>";
			$cuerpo.="</table>";
			$cuerpo  .= "<br />";
			$cuerpo  .= "Atte Pascuero<br /><br />";
			$cuerpo  .= "Donde los sue&ntilde;os se hacen realidad<br />";
			$cuerpo  .= "NO OLVIDEN LLENAR SU LISTA DE DESEOS<br />";
			$retorno=mailer($resUsersAsignado->email, $asunto, $cuerpo);
			//mail($resUsersAsignado->email, $asunto, $cuerpo, $headers);
			$sql_enviado="update pareja set estado = 1, fecha = now() where username1 = '".$resUsersAsignado->username."' and id_grupo = ".@$_SESSION[id_grupo];
			$execEnviado=$conection->query($sql_enviado);
		}
		echo '<td>'.$retorno.'</td>'.chr(10);
		echo '</tr>'.chr(10);
	}
	echo '</table>'.chr(10);
	echo '</form>'.chr(10);
	//echo 'Elementos: '.count($ArrayUsuarios).'<br />';
?>
</div>
</body>
</html>
