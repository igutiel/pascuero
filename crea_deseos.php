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
<center><h1>CREA LISTA DE DESEOS</h1></center>
<?php
	//echo 'ejecuta: '.@$_POST[ejecuta].'<br />';
	//echo 'DEL: '.@$_GET[del].'<br />';
	echo '<form method="post">';
	echo '<table style="cursor: pointer;" id="DetalleDeseo" class="table-stripped table table-hover table-bordered">';
	if(@$_GET[id]=="" && @$_GET[del]=="") {
		$sql_max_id="select max(id) as id from deseos where username = '".@$_SESSION[user]."' and id_grupo = ".@$_SESSION[id_grupo];
		$execMaxId=$conection->query($sql_max_id);
		$vMax=0;
		while($resId=$execMaxId->fetch_object())
			$vMax=$resId->id;
		if($vMax=="")
			$vMax=0;
		$vMax++;
		$descripcion="";
		$url="";
		$id=$vMax;
		$flag="INS";
	}
	elseif(@$_GET[del] != "") {
		//echo 'Reconozco el del<br />';
		$flag="DEL";
		$id=@$_GET[del];
		$descripcion="";
		$url="";
	}
	else {
		$sql_edita="select id, descripcion, url from deseos where username = '".@$_SESSION[user]."' and id = ".@$_GET[id]." and id_grupo = ".@$_SESSION[id_grupo];
		$execEdita=$conection->query($sql_edita);
		while($resEdita=$execEdita->fetch_object()) {
			$descripcion=$resEdita->descripcion;
			$url=$resEdita->url;
			$id=@$_GET[id];
		}
		$flag="UPD";
	}
	if($flag=="INS")
		$texto="Agregar a Lista de deseos";
	else
		$texto="Actualizar Lista de deseos";
	//echo 'flag: '.$flag.'<br />';
	//echo 'ejecuta: '.@$_POST[ejecuta].'<br />';
	if(@$_POST[ejecuta] != "") {
		//echo 'Entrada...<br />';
		if($flag=="INS") {
			if($descripcion=="")
				$descripcion=@$_POST[descripcion];
			if($url=="")
				$url=@$_POST[url];
			$sql_ins_deseo="insert into deseos(id_grupo, username, id, descripcion, url) values(".@$_SESSION[id_grupo].", '".@$_SESSION[user]."', ".$id.", '".$descripcion."', '".$url."');";
			//echo 'sql_ins_deseo: '.$sql_ins_deseo.'<br />';
			if(!($res_ins=$conection->query($sql_ins_deseo)))
				echo 'Error '.mysqli_error($conection).'<br />';
			else
				echo 'Deseo agregado '.$res_ins->num_rows.' registros<br />';
		}
		else {
			if($descripcion!=@$_POST[descripcion])
				$descripcion=@$_POST[descripcion];
			if($url!=@$_POST[url])
				$url=@$_POST[url];
			$sql_upd_deseo="update deseos set descripcion = '".$descripcion."', url = '".$url."' where id_grupo = ".@$_SESSION[id_grupo]." and username = '".@$_SESSION[user]."' and id = ".$id;
			//echo 'sql_upd_deseo: '.$sql_upd_deseo.'<br />';
			if(!$rowUpd=$conection->query($sql_upd_deseo))
				echo 'Error '.mysqli_error($conection).'<br />';
			else
				echo 'Deseo agregado '.$rowUpd->num_rows.' registros<br />';
		}
	}
	elseif($flag=="DEL") {
		$sql_del_deseo="delete from deseos where id_grupo = ".@$_SESSION[id_grupo]." and username = '".@$_SESSION[user]."' and id = ".$id;
		//echo 'sql_del_deseo: '.$sql_del_deseo.'<br />';
		if(!$rowDel=$conection->query($sql_del_deseo))
				echo 'Error '.mysqli_error($conection).'<br />';
			else
				echo 'Deseo eliminado '.$rowDel->num_rows.' registros<br />';
	}
	echo '<tr><th>id deseo</th><th><input type="text" name="id_deseo" value="'.$id.'" disabled></th></tr>';
	echo '<tr><th>Descripci&oacute;n</th><th><input type="text" name="descripcion" value="'.$descripcion.'" size=105></th></tr>';
	echo '<tr><th>URL</th><th><input type="text" name="url" value="'.$url.'" size=105></th></tr>';
	echo '</table>';
	echo '<br /><a href="crea_deseos.php" class="btn btn-primary">Limpiar Lista de deseos</a>&nbsp;&nbsp;&nbsp;<input type="submit" class="btn btn-primary" value="'.$texto.'" name="ejecuta">&nbsp;&nbsp;&nbsp;<a href="lista.php" class="btn btn-primary">Volver</a><br /><br />';
	$sql_lista_deseos="select id, descripcion, url from deseos where username = '".@$_SESSION[user]."' and id_grupo = ".@$_SESSION[id_grupo];
	$execDeseos=$conection->query($sql_lista_deseos);
	echo '<table style="cursor: pointer;" id="ListaDeseo" class="table-stripped table table-hover table-bordered">';
	echo '<tr>';
	echo '<th>A</th><th>ID</th><th>Descripci&oacute;n</th><th>URL</th>';
	echo '</tr>';
	while($resDeseos=$execDeseos->fetch_object()) {
		echo '<tr>';
		echo '<td><a href=crea_deseos.php?del='.$resDeseos->id.'><img src="img/menos.jpg" width=10% height=10%></a></td><td><a href=crea_deseos.php?id='.$resDeseos->id.'>'.$resDeseos->id.'</td><td>'.$resDeseos->descripcion.'</td><td><a href="'.$resDeseos->url.'">'.$resDeseos->url.'</td>';
		echo '</tr>';
	}
	echo '</table>';
	echo '</form>';
?>
</div>
</body>
</html>
