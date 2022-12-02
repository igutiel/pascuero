<?php
	include "session.php";
	include "conexion/conectar.php";
	$sql_hab_usuario = "update usuarios set envia_correo = 0 where id_grupo = ".@$_SESSION[id_grupo];
	//echo 'sql_hab_usuario: '.$sql_hab_usuario.'<br />';
	$execHabUsu=$conection->query($sql_hab_usuario);
	echo '<script language="javascript">'.chr(10);
	echo ' window.location.href="lista.php";'.chr(10);
	echo '</script>'.chr(10);
?>
