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
$consulta= "SELECT nombre_usuario  FROM usuarios ORDER BY nombre_usuario ASC " ;
$resultado= mysql_query($consulta, $link);

/*$mysqli=new mysqli("localhost", "root","","jade2");
if(mysqli_connect_errno()){
	echo" conexion fallida: ", mysqli_connect_error();
	exit;
	}*/
/*$query="SELECT num_inc, tipo_incidecia FROM incidencias ORDER BY tipo_incidencias ASC  " ;
$resultado= $mysqli->query($query);*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>soporte tecnico</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />
<script src="prefixfree.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery/jquery.min.js"></script>
<script src="jquery/jquery-1.3.2.min"></script>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script> 
<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="https://code.jquery.com/jquery-migrate-3.1.1.min.js"></script>
<script>
function enviar_form1(){
	var sol=document.getElementById("seleccion").value
	
	var url="procesar_datos.php";
	
	$.ajax({
		type:"post",
		url:url,
		data:{seleccion:sol},
		
		success: function(datos){
			$("#mostrardatos").html(datos);
			
			}
		
		
		}
		)
	
	}
</script>
<script>

function enviar_form(){
	
	var mostrar=document.getElementById("form1").value
	var url="procesar_datos.php";
	
	$.ajax({
		type:"post",
		url:url,
		data:{form1:mostrar},
		
		success: function(datos){
			$("#mostrardatos").html(datos);
			
			}
		
		
		}
		)
	
	}
</script>
<script>

function enviar_form2(){
	
	var mostrar_us=document.getElementById("form2").value
	var url="procesar_datos.php";
	
	$.ajax({
		type:"post",
		url:url,
		data:{form2:mostrar_us},
		
		success: function(datos){
			$("#mostrardatos").html(datos);
			
			}
		
		
		}
		)
	
	}
	
	
</script>

<script>

function enviar_form3(){
	
	var mostrar_us=document.getElementById("form3").value
	var mostrar_inc=document.getElementById("n_incidencia").value
	var url="procesar_datos.php";
	
	$.ajax({
		type:"post",
		url:url,
		data:{form3:mostrar_us,n_incidencia:mostrar_inc },
		
		success: function(datos){
			$("#mostrardatos").html(datos);
			
			}
		
		
		}
		)
	
	}
	
	
</script>

<script>

function enviar_form4(){
	
	var mostrar_us=document.getElementById("form4").value
	var mostrar_inc=document.getElementById("seleccion2").value
	var url="procesar_datos.php";
	
	$.ajax({
		type:"post",
		url:url,
		data:{form4:mostrar_us,seleccion2:mostrar_inc },
		
		success: function(datos){
			$("#mostrardatos").html(datos);
			
			}
		
		
		}
		)
	
	}
	
	
</script>
<script>
function enviar_form5(){
	var sol=document.getElementById("seleccion3").value
	
	var url="procesar_datos.php";
	
	$.ajax({
		type:"post",
		url:url,
		data:{seleccion3:sol},
		
		success: function(datos){
			$("#mostrardatos").html(datos);
			
			}
		
		
		}
		)
	
	}
</script>
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
        <li><a class="active" href="#">Incidencias</a>
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
    <!--  <form action="index.html" method="post">
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
<div class="wrapper col2 "  >
<div class="wrapper col2" style="height: 678px" >
  <div id="gallery">
    <ul>
     <h2 class="login-header">registro de tipo de incidencia</h2>
     <div class="login-container" height="700" width"700"> 
     
     <form action="registrar_tipo_incidencia.php" method="post" >
     <label for="incidencia"><b>Ingrese el Tipo de Incidencia</b></label>
     <input type="text" name="t_incidencia" id="t_incidencia" required/>
     <input type="submit" name="enviar" value="Enviar"/>
     
     </form>
      
      <?php
if(isset($_POST["enviar"])){
	  $t_incidencia=$_POST["t_incidencia"];
	

$link=mysql_connect("localhost", "root","")or die("no se encuentra el servidor");;
$db=mysql_select_db("jade2",$link)or die("error en conexion ");
$consulta= "SELECT *FROM tipos_incidencias WHERE tipo_incidencia='$t_incidencia' " ;
$resultado= mysql_query($consulta, $link);
$existe_incidencia= mysql_num_rows($resultado);
 if($existe_incidencia<1){
	/* $query = "INSERT INTO tipos_incidencias VALUES ('','$t_incidencia')";*/
     echo" <b>Tipo de incidencia guardada</b>";
	 
	 mysql_query("insert into tipos_incidencias values('','$t_incidencia')",$link)or die("<br/>error del 1mer envio");
/*$mysqli=new mysqli("localhost", "root","","jade2");
if(mysqli_connect_errno()){
	echo" conexion fallida: ", mysqli_connect_error();
	exit;
	}*/
/*$query="SELECT num_inc, tipo_incidecia FROM incidencias ORDER BY tipo_incidencias ASC  " ;
$resultado= $mysqli->query($query);*/
 }
 else{
	 echo" <b>Ese Tipo de incidencia ya existe ingrese otra</b>";
	 
	 }
}
?>
     
     </ul>
     
         </div>
        </div>
      </div>
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