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
<!--<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script> 
<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script language="javascript" src="C:\xampp\htdocs\jade2\jsjquery-1.11.1.min.js" ></script>-->
<!--/*<script language="javascript" src="js/jquery-1.3.2.js"></script>
<script language="javascript" src="js/jquery-1.3.js"></script>*/-->
<script language="javascript" src="js/jquery-1.11.1.js"></script>
<script language="javascript" src="js/jquery-migrate-1.2.1.min.js"></script>
<!--<script language="javascript" src="js/jquery-1.3.2.min.js"></script>
<script language="javascript" src="C:\xampp\htdocs\jade2\js\jquery-1.3.js"></script>-->





<script>
       	$(document).ready(function(){ 
        $('.alternar-respuesta').on('click',function(e){
            $(this).parent().next().toggle('slow');
            e.preventDefault();
        });
        $('#alternar-todo').on('click',function(e){
            $('.respuesta').toggle('slow');
            e.preventDefault();
        });
    });
	
	
    
</script>

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

      
 <div class="wrapper col2"  >
  <div id="gallery">
    <ul>
     </br></br><h2 class="login-header">Historial de Incidencias</h2>
        <div class="login-container">
<?php
	 
     //conexion a la base de datos
$link=mysql_connect("localhost", "root","")or die("no se encuentra el servidor");;
$db=mysql_select_db("jade2",$link)or die("error en conexion ");
//session_start();
$_SESSION['variable'];
$username= $_SESSION['variable'];
$_SESSION['numero_insidencia']=NULL;
 
$codigoHtml=NULL;
$codigoHtml2=NULL;
$x=0;
/*$consulta2=0;
$resultado2=0;
$existe_usuario2=0;*/
$consulta= "SELECT *FROM incidencias WHERE nombre_usuario='$username' and estatus='Finalizada'  GROUP BY fecha ORDER BY fecha DESC " ;

$resultado= mysql_query($consulta, $link);

$existe_usuario= mysql_num_rows($resultado);
if($existe_usuario<1){
	echo"Usted no tiene Insidencias actualmente";
	}
	else{
		
		echo"<a href=\"#\" id=\"alternar-todo\"><button><strong>Mostrar y ocultar todas las Incidencias</strong></button></a></br></br>";
		while($registro= mysql_fetch_assoc($resultado)) {
			
			
	     $numero_incidencia=$registro['num_inc']; 
		 $descripcion=$registro['descripcion'];
		 $asunto=$registro['asunto'];
		 $fecha=$registro['fecha'];	
		 $imagen=$registro['imagen']; 
		 $usuario=$registro['nombre_usuario'];
		 /*$opinion=$registro['opinion'];*/
		 
		 
		 $codigoHtml2='
<form action="historial_incidencias.php" method="post">
 <label><strong>Danos tu Opinion con respecto a la solucion de esta incidencia</strong></label></br>
 <select name="opinion"  id="opinion"  />
     		<p><option value="Excelente trabajo" >Excelente trabajo</option></p>
     		<option value="Buen Trabajo">Buen Trabajo</option>
     		<option value="Resolvieron el problema">Resolvieron el problema</option>
     		<option value="No estoy conforme con su trabajo">No estoy conforme con su trabajo</option>
     		<option value="mal trabajo">mal trabajo</option> 
   			</select></p>
			<input type="submit" name="'.$x.'" value="VOTAR">
			</form></br>';
		    
		 if  ($imagen!="fotos/"){
	       $codigoHtml='
		 <strong>Imagen:</br></strong><img src="'.$imagen.'" width="200" heigth="200">';
		    }
			else{
				$codigoHtml=NULL;
				}
						
	   if(isset( $_POST["$x"])){
				$opinion=$_POST['opinion'];
				$num_incidencia=$numero_incidencia;
				
					$reconsulta= "SELECT *FROM opinion WHERE num_inc ='$numero_incidencia'"; 
		 $delresultado= mysql_query($reconsulta, $link);
		 $tiene_voto= mysql_num_rows($delresultado);
         if($tiene_voto<1){
			 
		 
            mysql_query("insert into opinion values('','$opinion','$num_incidencia','$username')",$link)or die("<br/>error de envio");    
			  echo"<strong>Gracias por tu Opinion</strong></br>";
			  
				}
	   
	   }
	   
		 $reconsulta= "SELECT *FROM opinion WHERE num_opinion ='$numero_incidencia'"; 
		 $delresultado= mysql_query($reconsulta, $link);
		 $tiene_voto= mysql_num_rows($delresultado);
         if($tiene_voto>0){
			 $codigoHtml2=NULL;
			}
			$codigoHtml3='
			<textarea readonly="readonly" rows="7" name="descripcion" cols="100">'.$descripcion.'
    </textarea>  
		 ';
				
echo"
<p> <a href=\"#\" class=\"alternar-respuesta\"><button><strong>Incidencia Nro</strong>: $numero_incidencia</button></a></p>
<div class=\"respuesta\" style=\"display:none\"><strong>  Fecha y Hora del evento:</strong> $fecha</br><strong> Asunto:</strong> $asunto</br><strong>  Descripcion:</br></strong> $codigoHtml3</br>$codigoHtml</br>$codigoHtml2</div></br>";
    
			$x++;
		     
			}			
			
	}
	
?>
    	</div>
      </ul>
  </div>
</div> 

<div class="clear"></div>
 
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