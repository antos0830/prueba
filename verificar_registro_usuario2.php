<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
} else {
	echo "Esta pagina es solo para usuarios registrados.<br>";
	echo "<br><a href='ingresar_administrador.html'>Ingresar</a>";
	echo "<br><br><a href='index.html'>principal</a>";
exit;
}
$now = time();
if($now > $_SESSION['expire']) {
	session_destroy();
	echo "Su sesion a terminado,
	<a href='ingresar_administrador.html'>Necesita Hacer Login</a>";
	exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>soporte tecnico</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />
<script src="prefixfree.min.js" type="text/javascript"></script>
<style type="text/css">
.auto-style1 {
	margin-bottom: 1;
}
</style>
</head>
<body id="top">
<div class="wrapper col1">
  <div style="position:absolute; top:-12px; left:63px" >
  	<img src="images/demo/logo5.png" width="110px" height="110px"/>
  </div>
  <div id="head">
    <h1><a href="" style="left: -15px; top: 15px">Soporte Tecnico JADE</a></h1>
    <p class="auto-style1" style="left: -15px; top: 65px">La Mejor Solucion a Tus Requerimienos Tecnicos </p>
    <div id="topnav">
      <ul>
          <li><a class="active" href="#">Registrar</a>
            <ul>
				<li><a  href="registrar_usuario.html">Usuario</a></li>
				<li><a href="registrar_administrador.html">Administrador</a></li>
            </ul>
          </li> 
          <li><a  href="index.html">Salir</a></li>		
      </ul>    </div>
    <div id="search">
     <!-- <form action="index.html" method="post">
        <fieldset>
          <legend>Site Search</legend>
          <input type="submit" name="ir" id="go" value="IR" />
          <input type="text" value="Buscar en el sitio&hellip;"  onfocus="this.value=(this.value=='Buscar en el sitio&hellip;')? '' : this.value ;" />
        </fieldset>
      </form>-->
    </div>
  </div>
</div>
<!--<div class="wrapper col2" >-->
<div class="wrapper col2" style="height: 678px" >
  <div id="gallery">
    <ul>
    
     <?php
 $host_db = "localhost";
 $user_db = "root";
 $pass_db = "";
 $db_name = "jade2";
 $tbl_name = "usuarios";
 $tbl_name2 = "administrador";
 $form_pass = $_POST["password"];
 $hash = password_hash($form_pass, PASSWORD_BCRYPT); 
 $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);
 if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}
	$buscarUsuario = "SELECT * FROM $tbl_name WHERE nombre_usuario = '$_POST[username]' ";
	$result = $conexion->query($buscarUsuario);
	$count = mysqli_num_rows($result);
	
	$buscarUsuario2 = "SELECT * FROM $tbl_name2 WHERE nombre_administrador = '$_POST[username]' ";
	$result2 = $conexion->query($buscarUsuario2);
	$count2 = mysqli_num_rows($result2);
	
if ($count == 1 || $count2 == 1) {
	echo "<br /><h2 style='color:black;'>". "El Nombre de Usuario ya a sido tomado." . "</h2><br />";
	echo "<h2 style='color:black;'><a href='registrar_usuario.html'>Por favor escoga otro Nombre</a></h2>";
	}
	else{
		$query = "INSERT INTO usuarios (nombre_usuario, password, departamento) VALUES ('$_POST[username]', '$hash','$_POST[tipo_usuario]')";
if ($conexion->query($query) === TRUE) {
	echo "<br />" . "<h2 style='color:black;'>" . "Usuario Creado Exitosamente!" . "</h2>";
	echo "<h4 style='color:black;'>" . "Bienvenido: " . $_POST['username'] . "</h4>" . "\n\n";
	echo "<h5 style='color:black;'>" . "Hacer Login: " . "<a href='ingresar_administrador.html'>Login</a>" . "</h5>"; 
 	}
	else {
		echo "Error al crear el usuario." . $query . "<br>" . $conexion->error; 
		}
	}
	mysqli_close($conexion);
?>
    </ul>
    <div class="clear"></div>
  </div>
</div> 
<div class="wrapper col4">
    <div id="column">
            </div>
      <div class="holder">
      </div>
    </div>
    <div class="clear"></div>
  <div class="wrapper col5">
  <div id="footer">
      <div id="copyright">
      <p class="fl_left">Copyright &copy;&nbsp; - Derechos Reservados - </p>
      <p class="fl_right">Realizado por&nbsp; Antonio Teran-V-ADS-1NG</p>
      <br class="clear" />
    </div>
    <div class="clear"></div>
  </div>
</div>
</body>
</html>