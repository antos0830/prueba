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
       
       <!-- <li><a href="libros.html">Libros</a></li>
        <li><a href="solvencia.html">Solvencia</a></li>-->
        
          <li><a class="active" href="#">Incidencias</a>
          <ul>
            <li><a href="crear_insidencia.php">Crear Nueva</a></li>
            <li><a href="insidencia_actuales.php">Actual</a></li>
            <li><a href="historial_insidencias.php">Historial</a></li>
            <!--/*<li><a href="descargaEnfermeria.php">Enfermeria</a></li>
            <li><a href="descargaSistema.php">Analisis y diseño de sistemas</a></li>*/-->

          </ul>
        </li> 
          <li><a  href="index.html">Salir</a></li>		
      </ul>
    </div>
    <div id="search">
  <!--    <form action="index.html" method="post">
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
<!--<div class="wrapper col2" style="height: 678px" >
  <div id="gallery">
    <ul>
    <ul>
      <CENTER><h1Insindencia actuales</h1></CENTER>
      <div class="login-container">-->
      
     <div class="wrapper col2"  >
  <div id="gallery">
    <ul>
        </br></br><h2 class="login-header">Incindencia Actual</h2>
        <div class="login-container">
     <?php
	 
     //conexion a la base de datos
$link=mysql_connect("localhost", "root","")or die("no se encuentra el servidor");;
$db=mysql_select_db("jade2",$link)or die("error en conexion ");
 //session_start();
$_SESSION['variable'];
$username= $_SESSION['variable'];

$consulta= "SELECT *FROM incidencias WHERE nombre_usuario='$username' and estatus!='Finalizada' order by num_inc  desc" ;
/*$consulta= "SELECT *FROM incidencias GROUP BY fecha ASC WHERE nombre_usuario='$username' " ;*/


$resultado= mysql_query($consulta, $link);

$existe_usuario= mysql_num_rows($resultado);
if($existe_usuario<1){
	echo"Usted no tiene Insidencias actualmente";
	}
	else{
		while($registro= mysql_fetch_assoc($resultado)) {
	
		 $numero_incidencia=$registro['num_inc'];	
		 $descripcion=$registro['descripcion'];
		 $asunto=$registro['asunto'];
		 $fecha=$registro['fecha'];	
		 $imagen=$registro['imagen'];
		 $estatus=$registro['estatus'];
		 $codigoHtml3='
			<textarea readonly="readonly" name="descripcion" rows="7" cols="100">'.$descripcion.'
    </textarea>  
		 ';
		 echo" <strong>Incidencia Numero</strong>: $numero_incidencia ";
	     echo"</br>";
		 echo"<strong>Fecha y Hora del evento:</strong> $fecha";	
		 echo"</br>";   
	  	 echo"<strong>Asunto:</strong> $asunto";
	   	 echo"</br>";
	   	 echo"<strong>Descripcion:</br>$codigoHtml3</strong> ";
	     echo"</br>";
	   	 if  ($imagen!="fotos/"){
		    echo"<strong>Imagen:</br></strong><img src=\"$imagen\" width=\"200\" heigth=\"200\"> </br>";
		   }
		/*echo"<mark><strong>Usted sera atendido a la brevedad posible  por Soporte Tecnico.</strong></mark></br> ";   
	    echo"<mark><strong>El estatus de la Incidencias es: $estatus</strong></mark> ";
	   	echo"</br></br></br>";*/
	   echo"<div style=\"color:#070\" ><strong>Usted sera atendido a la brevedad posible  por Soporte Tecnico.</strong></br> ";   
	    echo"<strong>El estatus de la Incidencias es: $estatus</strong></div> ";
	   	echo"</br></br></br>";
	   
	/* $consulta2="SELECT fecha, nombre_usuario FROM `incidencias` GROUP BY fecha ASC";
 

           $resultado2= mysql_query($consulta2, $link);

           $existe_usuario2= mysql_num_rows($resultado2);
           if($existe_usuario2>0){
	       $turno=1;
	       while($registro2= mysql_fetch_assoc($resultado2)) {
		
		     
	         if($registro2['nombre_usuario']== $username){
				 
				 
				  echo" <strong>Su turno de espera es</strong>: $turno</br></br>";
				  
			 }
			 else{
				   $turno++;
				 }
		      
			  
		     
		     }
	      
	  
	
			}*/
		
			
		       
	       }
		  
		
		}
		
         
	
		
     ?>
    	
          </ul>
   <!-- </div>
    </div>
    </div>
    <div class="clear"></div>
  </div>
</div>-->

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