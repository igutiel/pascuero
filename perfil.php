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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!--<link rel="stylesheet" href="css/bootstrap.min.css">-->
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <style>
  a.disabled {
   pointer-events: none;
   cursor: default;
  }
  </style>
<script type="text/javascript">
function mostrarPassword(){
		var cambio = document.getElementById("txtPassword");
		if(cambio.type == "password"){
			cambio.type = "text";
			$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		}else{
			cambio.type = "password";
			$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		}
	} 
	
	$(document).ready(function () {
	//CheckBox mostrar contraseña
	$('#show_password').click(function () {
		$('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
	});
});
function mostrarPassword2(){
		var cambio = document.getElementById("Password");
		if(cambio.type == "password"){
			cambio.type = "text";
			$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		}else{
			cambio.type = "password";
			$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		}
	} 
	
	$(document).ready(function () {
	//CheckBox mostrar contraseña
	$('#ShowPassword').click(function () {
		$('#txtPassword').attr('type', $(this).is(':checked') ? 'text' : 'password');
	});
});
</script>
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
<p>Navidad <?php echo date("Y"); ?></p>
<p>En esta Navidad, los buenos deseos y regalar para compartir entre amigos es necesario una buena lista de deseos.</p>
<p>Registrse para crear su lista de deseos</p>
<?php
	include "conexion/conectar.php";
	$sql_cuota = "select valor_cuota from cuota where id_grupo = ".@$_SESSION[id_grupo];
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
<form method="post">
<?php
	$resUpdUsu="";
	if(@$_POST[comando] == "Modificar perfil") {
		if(@$_POST[password] == @$_POST[password2]) {
			if(@$_POST[nombre] != "") {
				$sql_upd_usuario="update usuarios set nombre = '".@$_POST[nombre]."', password='".@$_POST[password]."', email = '".@$_POST[email]."' where '".@$_GET[user]."' in (username, usernamed, run) and id_grupo = ".@$_SESSION[id_grupo];
				//echo '<br />sql_upd_usuario: '.$sql_upd_usuario.'<br />';
				if(!$conection->query($sql_upd_usuario))
					echo 'Error '.mysqli_error($conection).'<br />';
				else
					echo 'Actualizaci&oacute;n exitosa<br />';
			}
		}
		else
			echo 'Contrase&ntilde;as ingresadas no son iguales';
	}
	$sql_usuario="select run, nombre, password, email, tipo_user from usuarios where '".@$_GET[user]."' in (username, usernamed, run) and id_grupo = ".@$_SESSION[id_grupo];
	$execUser=$conection->query($sql_usuario);
	echo '<table style="cursor: pointer;" id="CursoActivo" class="table-stripped table table-hover table-bordered">';
	while($resUser=$execUser->fetch_object()) {
		echo '<tr><td>Run</td><td><input type="text" name="user" value="'.$resUser->run.'" size=105 disabled></td><td></td></tr>';
		echo '<tr><td>Nombre</td><td><input type="text" name="nombre" value="'.$resUser->nombre.'" size=105></td><td></td></tr>';
		echo '<tr><td>Password</td><td><input type="password" name="password" value="'.$resUser->password.'" size=105 id="txtPassword"></td>
            <td><button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
          </td></tr>';
		echo '<tr><td>Repita Password</td><td><input type="password" name="password2" value="'.$resUser->password.'" size=105 id="Password"></td>';
		echo '<td><button id="ShowPassword" class="btn btn-primary" type="button"><span class="fa fa-eye-slash icon" onClick="mostrarPassword2()"></span> </button>
        </td></tr>';
		echo '<tr><td>E-Mail</td><td><input type="text" name="email" value="'.$resUser->email.'" size=105></td><td></td></tr>';
		$tipo_usuario=$resUser->tipo_user;
	}
	echo '</table>';
	echo '<input type="submit" name="comando" value="Modificar perfil" class="btn btn-primary">&nbsp;&nbsp;&nbsp;<a href="lista.php" name="comando" value="Volver" class="btn btn-primary">Volver</a>';
	if(@$_GET[user] == @$_SESSION[user]) {
		echo '&nbsp;&nbsp;&nbsp;<a';
		$sql_tiene_lista="select count(1) as contar from pareja where id_grupo = ".@$_SESSION[id_grupo];
		$execTieneLista=$conection->query($sql_tiene_lista);
		while($resTieneLista=$execTieneLista->fetch_object())
			$tiene_lista=$resTieneLista->contar;
		if($tiene_lista == 0)
			echo ' href="crea_deseos.php" name="comando" value="Lista de deseos" class="btn btn-primary">Crear Lista de deseos</a>';
		else
			echo ' name="comando" value="Lista de deseos" class="btn btn-primary">Crear Lista de deseos</a>';
	}
	if($tipo_usuario == 1)
		echo '&nbsp;&nbsp;&nbsp;<a href="administrar.php" name="comando" value="Administrar" class="btn btn-primary">Administrar</a>';
	if($resUpdUsu != "")
		echo '<br />Resultado: '.$resUpdUsu.' registros actualizados</br >';
?>
</form>
</div>
</body>
</html>
