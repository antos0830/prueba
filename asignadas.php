<?php
session_start();
/*if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
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
}*/
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script>
function enviar(){
	var sol=document.getElementById('asignar').value
	
	var dataen='asignar='+sol;
	
	<!--var url="procesar_asignacion.php";-->
	
	$.ajax({
		type:"post",
		url:"procesar_asignacion.php",
		data:dataen,
		
		success: function(resp){
			$("#mostrardatos").html(resp);
			
			}
		
		
		});
	 return false;
	}

</script>

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
 <div class="wrapper col2" auto-style="height: 678px" >
  <div id="gallery">
    <ul>
       </br></br><h2 class="login-header">Incindencias Pendientes Asignadas</h2>
         <div class="login-container">
    
     
<?php
//conexion a la base de datos
$link=mysql_connect("localhost", "root","")or die("no se encuentra el servidor");;
$db=mysql_select_db("jade2",$link)or die("error en conexion ");

$x=0;
$y=0;
$turno=0;
$html=NULL;
$administrador=NULL;


 
$administrador =$_SESSION['username'] ;

/*if(isset( $_GET["variable"])){
		$numero_incidencia=$_GET['variable'];	  
		  $consulta2= "SELECT *FROM incidencias WHERE estatus='no asignada' and num_inc='$numero_incidencia' " ;
$resultado2= mysql_query($consulta2, $link);


$existe_usuario2= mysql_num_rows($resultado2);
if($existe_usuario2<1){
	 echo"
<p style=\"color:red\"><strong>No Existe la Incidencia Numero $numero_incidencia en Incidencias no asignadas</strong></p></br></br>";
	}
	else{				 
					  
					  $fecha_asina=date("Y,m,d");
					  echo"<mark><strong>La incidencia Numero $numero_incidencia ha sido asignada a $administrador</strong></mark></br></br>";
					  
	
			             
		  		  mysql_query("insert into asignaciones values('','$fecha_asina','$numero_incidencia','$administrador')",$link)or die("<br/>error del 1mer envio");
				  mysql_query("UPDATE incidencias set estatus='Asignada' WHERE num_inc='$numero_incidencia'",$link)or die("<br/>error del 2do envio");
			        
			
			    
			    				
	}
								 
		  }*/
$consulta2= "SELECT *FROM incidencias WHERE estatus='Asignada' " ;
$resultado2= mysql_query($consulta2, $link);


$existe_usuario2= mysql_num_rows($resultado2);
if($existe_usuario2<1){
	 echo"
<strong>No hay Incidencias Asignadas</strong> </br>";
	}
else{
	
	
	
	while($registro= mysql_fetch_assoc($resultado2)) {
	 	 $numero_incidencia=$registro['num_inc'];	
		 $descripcion=$registro['descripcion'];
		 $asunto=$registro['asunto'];
		 $fecha=$registro['fecha'];	
		 $imagen=$registro['imagen'];
		 $username=$registro['nombre_usuario'];
		 $tipo_insidencia=$registro['tipo_incidencia'];
		  $estatus=$registro['estatus'];
		  $_SESSION['num_incidencia']=$numero_incidencia ;
		   $_SESSION['administrador']=$administrador;
		  
		  	$codigoHtml3='
			<textarea readonly="readonly" rows="7" name="descripcion" cols="100">'.$descripcion.'
           </textarea>  
		 ';
		 
	   		 if  ($imagen!="fotos/"){
	       $codigoHtml='
		 <strong>Imagen:</br></strong><img src="'.$imagen.'" width="200" heigth="200">';
		    }
			else{
				$codigoHtml=NULL;
				}
				
					 $codigoHtml2='
           <!-- <form  method="post" action"no_asignadas.php" >
			<
			<input type="submit" name="'.$numero_incidencia.'"  value="Asignarme esta Incidencia"/>
			</form></br>
			<div id="mostrardatos">
			</div>-->
			<!--<a href="no_asignadas.php?variable='.$numero_incidencia.'"><button>asignarme esta incidencia</button></a></br></br>-->
			';
			
				$consulta3= "SELECT *FROM asignaciones WHERE num_inc='$numero_incidencia' " ;
$resultado3= mysql_query($consulta3, $link);


$existe_usuario3= mysql_num_rows($resultado3);
if($existe_usuario3>0){
			while($registro3= mysql_fetch_assoc($resultado3)) {
				 $administrador_inc=$registro3['nombre_administrador'];
			}
}
			echo"
			
			

<strong>Incidencia Nro</strong>: $numero_incidencia</br><strong>Asignada a</strong>: $administrador_inc</br><strong>Fecha y Hora del evento:</strong> $fecha</br><strong> Asunto:</strong> $asunto</br><strong>  Descripcion:</br>$codigoHtml3</strong> </br>$codigoHtml</br></br>$codigoHtml2</br>";

      
		  
	}

	
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