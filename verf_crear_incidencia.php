
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
          <li><a class="active" href="#">Insidencias</a>
          <ul>
            <li><a href="crear_incidencia.php">Crear Nueva</a></li>
            <li><a href="incidencia_actuales.php">actual</a></li>
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
      
            <?php //conexion a la base de datos
$link=mysql_connect("localhost", "root","")or die("no se encuentra el servidor");;
$db=mysql_select_db("jade2",$link)or die("error en conexion ");



// valores del formulario

//if($_POST) {
/*$username= $_REQUEST['nombre_usuario'];*/
 //session_start();
$_SESSION['variable'];
$_SESSION['tipo_incidencia'];
$username= $_SESSION['variable'];

$asunto=($_REQUEST['asunto']);
$tipo_incidencia=$_REQUEST['tipo_insidencia'];
$descripcion=$_REQUEST['descripcion'];
$foto=$_FILES['foto']['name'];
$ruta=$_FILES['foto']['tmp_name'];
$destino="fotos/".$foto;
if($foto!=""){
copy($ruta,$destino);}
if($descripcion!="" && $asunto!="" && $tipo_incidencia!="0"){
$consulta= "SELECT *FROM incidencias WHERE nombre_usuario='$username' " ;

$resultado= mysql_query($consulta, $link);

$existe_usuario= mysql_num_rows($resultado);
if($existe_usuario<50){
	

$fecha2=time()-21600;
$fecha= date("Y-m-d H:i:s",$fecha2);

mysql_query("insert into incidencias values('','$fecha','$asunto','$tipo_incidencia','$descripcion','$destino','No Asignada','$username')",$link)or die("<br/>error del 1mer envio");
echo"<br/>";
 
echo" <div style=\"color:#070\" ><strong>Su insidencia fue guardada con exito, </strong>";
echo" <strong>Puede Verificar sus Incidencias En Incidencias Actuales</strong></div>";
echo "<br><br><a href=incidencias_actuales.php> Verificar mis Incidencias</a>"; 

}
else{
	echo" <h2>Usted ya posee 20 insidencia actualmente espere a ser atendido para informar de otra falla</h2>";
	echo "<br><br><a href=panel-control2.php>volver a Usuario</a>"; 
	}
}else{
	echo" <h2>no se pude dejar el Asunto, la Descripcion en blanco o  escojer el Tipo de Incidencia de referencia</h2>";
	echo "<br><br><a href=panel-control2.php>volver a Usuario</a>";
	}
	
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
