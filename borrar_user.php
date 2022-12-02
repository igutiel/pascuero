<?php
	include "session.php";
	include "conexion/conectar.php";
	$sql_del_usuario = "delete from usuarios where username = ".@$_GET[usuario]." and id_grupo = ".@$_SESSION[id_grupo];
	//echo 'sql_del_usuario: '.$sql_del_usuario.'<br />';
	$execDelUsu=$conection->query($sql_del_usuario);
	echo '<script language="javascript">'.chr(10);
	echo ' window.location.href="lista.php";'.chr(10);
	echo '</script>'.chr(10);
?>
