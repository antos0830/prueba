
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
          <li><a href="#">Registrar</a>
          <ul>
            <li><a href="registrar_usuario.html">Usuario</a></li>
            <li><a href="registrar_administrador.html">Administrador</a></li>
            <li><a href="registrar_tipo_incidencia.php">Tipo de Incidencia</a></li>
          </ul>
        </li>
        <li><a href="#">Incidencias</a>
          <ul>
             <li><a href="mis_incidencias_pendientes.php">Pendientes Mias</a></li>
             <li><a href="no_asignadas.php">Pendientes Sin asignar</a></li>
             <li><a href="asignadas.php">Pendientes Asignadas</a></li>
             <li><a href="pendientes_transferidas.php">Pendientes Transferidas</a></li>
             <li><a href="historialIncidencias.php">Historial</a></li>
             <li><a href="estadisticasIncidencias.php">Estadisticas</a></li>
          </ul>
        </li>  
          <li><a  href="index.html">Salir</a></li>		
      </ul>
    </div>
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
    
      <li class="placeholder" style="background-image:url(images/demo/gallery_2.gif);">Image Holder</li>
      <li><a class="swap" style="background-image:url(images/demo/portada1.jpg);" href="#gallery;images/demo/portada2.jpg"><strong>Services</strong><span><img src="images/demo/portada1.jpg" alt="" width="640px" height="350px"/></span></a></li>
      <li><a class="swap" style="background-image:url(images/demo/portada3.jpg);" href="#gallery;images/demo/portada3.jpg"><strong>Products</strong><span><img src="images/demo/portada3.jpg" alt="" width="640px" height="350px"  /></span></a></li>
      <li class="last"><a class="swap" style="background-image:url(images/demo/portada4.jpg);" href="#gallery;images/demo/portada4.jpg"><strong>Company</strong><span><img src="images/demo/portada4.jpg" alt="" width="640px" height="350px" /></span></a></li>
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
