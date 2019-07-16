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
<?php

$link=mysql_connect("localhost", "root","")or die("no se encuentra el servidor");;
$db=mysql_select_db("jade2",$link)or die("error en conexion ");
$consulta= "SELECT tipo_incidencia  FROM tipos_incidencias ORDER BY tipo_incidencia ASC " ;
$resultado= mysql_query($consulta, $link);

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
option value{ font:Verdana, Geneva, sans-serif30px}
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
          <li><a class="active" href="#">Incidencias</a>
          <ul>
              <li><a href="crear_incidencia.php">Crear Nueva</a></li>
           <li><a href="incidencias_actuales.php">Actuales</a></li>
             <li><a href="historial_incidencias.php">Historial</a></li>
          </ul>
        </li> 
          <li><a  href="index.html">Salir</a></li>		
      </ul>
    </div>
    <div id="search">
      <!--<form action="index.html" method="post">
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
      <!--<CENTER><h1>Crea tu Insindencia</h1></CENTER>-->
     <!-- <div class="login-container">-->
        </br></br><h2 class="login-header">Crea tu Incindencia</h2>
     
    	<form action="verf_crear_incidencia.php" method="post" enctype="multipart/form-data" class="login-container"/>
         	<label><b>Asunto</b></label></br>
         	<input type="text" name="asunto" value"" required /></br></br>
         	<label><strong>Tipo de Incidencia</strong></label></br>
        	<select name="tipo_insidencia"  id="seleccion"  /></br></br>
     		 <option value="0" >Selecione un Tipo de Problema</option>
             <?php while($registro= mysql_fetch_assoc($resultado)) {?>
              <option value="<?php echo $registro['tipo_incidencia'];  ?>" ><?php echo $registro['tipo_incidencia'];  ?></option>
              
              <?php  } ?> 
   			</select></p></br>
   			<label><strong>Descripcion</strong></label></br>
            <textarea name="descripcion"  rows="7" cols="100"  maxlength="700" placeholder="Escriba aqui lo que quiere hacer y el problema o error que le genera" required></textarea></br></br>
            <label><strong>Si desea puede insertar un capture de pantalla!</strong></label></br>
            <label><strong>Se recomienda copiar el capture en el programa  paint, guardalo y luego buscar desde aqui</strong> </label></br>
            <input type="file" name="foto" id="foto" value="Insertar"/><br /> <br /> 
                       
            <p><input type="submit" name="enviar " value="ENVIAR" /></p>
        </form>
    </ul>
   <!-- </div>-->
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
