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
<script language="javascript" src="js/jquery-1.3.2.js"></script>
<script language="javascript" src="js/jquery-1.11.1.js"></script>
<script language="javascript" src="js/jquery-migrate-1.2.1.min.js"></script>

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
 <div class="wrapper col2" auto-style="height: 678px" >
  <div id="gallery">
    <ul>
       </br></br><h2 class="login-header">Mis Incidencias pendientes</h2>
         <div class="login-container">
         
         <?php
//conexion a la base de datos
$link=mysql_connect("localhost", "root","")or die("no se encuentra el servidor");
$db=mysql_select_db("jade2",$link)or die("error en conexion ");
$administrador=$_SESSION['username'] ;
$x=0;
$y=0;
$html=NULL;

$consulta= "SELECT incidencias.num_inc, incidencias.descripcion, incidencias.asunto, incidencias.tipo_incidencia,
incidencias.fecha, incidencias.imagen, incidencias.nombre_usuario, 
asignaciones.nombre_administrador FROM incidencias
INNER JOIN asignaciones ON incidencias.num_inc = asignaciones.num_inc
WHERE asignaciones.nombre_administrador='$administrador' and incidencias.estatus!='Finalizada'

ORDER BY num_inc ASC 
 " ;

/*$consulta= "SELECT *FROM incidencias WHERE estatus='Asignada' " ;*/
$resultado= mysql_query($consulta, $link);


$existe_usuario= mysql_num_rows($resultado);
if($existe_usuario<1){
	 echo"
<strong>No Tienes Incidencias Asignadas</strong> </br>";
	}
	else{

	
	
	
	while($registro= mysql_fetch_assoc($resultado)) {
	 	 $numero_incidencia=$registro['num_inc'];	
		 $descripcion=$registro['descripcion'];
		 $asunto=$registro['asunto'];
		 $tipo_incidencia=$registro['tipo_incidencia'];
		 $fecha=$registro['fecha'];	
		 $imagen=$registro['imagen'];
		 $username=$registro['nombre_usuario'];
		 $tipo_insidencia=$registro['tipo_incidencia'];
		 /*$estatus=$registro['estatus'];*/
		 
		 if  ($imagen!="fotos/"){
			    $html='
		        <strong>Imagen:</br></strong><img src="'.$imagen.'" width="200px" heigth="150px" ></br>';	
		    }
				$reconsulta="SELECT departamento FROM usuarios WHERE nombre_usuario='$username' ";
		$deresultado= mysql_query($reconsulta, $link);
		$existe_usuario3= mysql_num_rows($deresultado);
            if($existe_usuario3>0){
		       while($registro= mysql_fetch_assoc($deresultado)) {
			         $departamento=$registro['departamento'];
			   }
			}
		  
		 $consulta2= "SELECT *FROM asignaciones WHERE nombre_administrador='$administrador' " ;
         $resultado2= mysql_query($consulta2, $link); 
		 $existe_usuario2= mysql_num_rows($resultado2);
        if($existe_usuario2>0){
			 while($registro= mysql_fetch_assoc($resultado2)) {
				 
				 
				 $codigoHtml3='
			<textarea readonly="readonly"  name="descripcion" cols="100">'.$descripcion.'
        </textarea>  
		 ';
			    
	     $boton='
		 <form action="mis_incidencias_pendientes.php "method="post">
		 <input type="submit" name="'.$x.'" value="Finalizar esta Incidencia">
		 </form>';
		 
		 $boton2='
		 <form action="mis_incidencias_pendientes.php "method="post" enctype="multipart/form-data">
		<!-- <form action="verf_crear_insidencia.php" method="post" enctype="multipart/form-data" class="login-container"/>-->
       <!-- <label>Nombre de Usuario</label></br>
            <!--<input type="text" name="nombre_usuario" value="" required /></br></br>-->
         <!--	<label><b>Asunto</b></label></br>
         	<input type="text" name="asunto" value"" required /></br></br>
         	<label><strong>Tipo de Incidencia</strong></label></br>
        	<select name="tipo_insidencia"  id="seleccion"  /></br></br>
     		<p><option value="problemas de correo" >problemas de correo</option></p>
     		<option value="problemas con jade mercadeo">problemas con jade mercadeo</option>
     		<option value="problemas de conexion a internet">problemas de conexion a internet</option>
     		<option value="problemas de inicio de seccion">problemas de inicio de seccion</option>
     		<option value="problemas con oracle">problemas con oracle</option> 
   			</select></p></br>-->
   			<label><strong>Solucion:</strong></label></br>
            <textarea name="solucion"  rows="7" cols="100"  maxlength="700" placeholder="Escriba aqui la manera que soluciono esta Incidencia" required></textarea></br></br>
            <label><strong>Si desea puede insertar algun archivo Word o Pdf que contenga la solucion a la Incidencia !</strong></label></br>
                         <input type="file" name="archivo" id="archivo" value="Insertar"/><br /> <br /> 
                       
            <p><input type="submit" name="'.$y.'" value="ENVIAR" /></p>
        </form>
	
		';
		 
		$boton3='
		 <form action="mis_incidencias_pendientes.php "method="post">
		 <input type="submit" name="'.$x.'" value="Tranferir esta Incidencia">
		 </form>';
				 
	 }
		  
	}
	 echo"	<p> <a href=\"#\" class=\"alternar-respuesta\"><button><strong>Insidencia Nro</strong>: $numero_incidencia         </button></a></p>
         <div class=\"respuesta\" style=\"display:none\"><strong>  Fecha y Hora del evento:</strong> $fecha</br><strong> Asunto:         </strong> $asunto</br><strong> Tipo Problema:</strong> $tipo_insidencia</br><strong>  Descripcion:</br></strong>$codigoHtml3 </br>$html<strong>Usuario:</strong> $username</br>         <strong>Del Departamento de</strong>: $departamento</br>$boton<p> <a href=\"#\" class=\"alternar-respuesta\"><button>Agregar Solucion de estas Incidencia</button></a></p>
         <div class=\"respuesta\" style=\"display:none\">$boton2</div>         </br></div>         </br>";
		 
/*		 echo"	<p> <a href=\"#\" class=\"alternar-respuesta\"><button><strong>Solucion de estas Incidencia</strong></button></a></p>
         <div class=\"respuesta\" style=\"display:none\">$boton2</div>         </br>";*/
		 
		
		  if(isset( $_POST["$y"])){
				   $solucion2= $_POST["$y"];
				   
				   if( $solucion2=="ENVIAR"){
				   $des_solucion= $_POST["solucion"];
				   $arc_solucion=$_FILES["archivo"]["name"];
                   $ruta=$_FILES['archivo']['tmp_name'];
                   $destino="archivos/".$arc_solucion;
				   if($arc_solucion!=""){
                   copy($ruta,$destino);}
				   
				   if($destino!="archivos/"){
					   $destino_guardar=$destino;
					   }
					   else{
						   $destino_guardar="";
						   }
                 
				   
				   
				   $fecha_sol= date("Y,m,d");
				   
				 //  if($solucion2=="ENVIAR"){
					   echo" se guardo la solucion";
					   
		/*		          mysql_query("insert into solucioness values('','$tipo_insidencia','$des_solucion','$destino','$fecha','$administrador','$numero_incidencia')",$link)or die("<br/>error del 1mer envio");*/
						  mysql_query("insert into soluciones values('','$tipo_insidencia','$des_solucion','$destino_guardar','$fecha','$administrador','$numero_incidencia')",$link)or die("<br/>error del 1mer envio");
			             
						// $y++;
			       // }
				   }
			$y="";
			     
			    				
								
								 
		  }
		    
		   if(isset( $_POST["$x"])){
				   $eliminar2= $_POST["$x"];
				   
				   
				   
				
				   if($eliminar2=="Finalizar esta Incidencia"){
				        /*  mysql_query("DELETE FROM  insidencias WHERE num ='$numero_incidencia' ;",$link) or die("error de envio                          no se elimino el prestamo");*/
						  
						  mysql_query("UPDATE incidencias set estatus='Finalizada' WHERE num_inc='$numero_incidencia'",$link)or die                          ("<br/>error del 2do envio");
			             header("mis_incidencias_pendientes.php");
						  $x++;
						  $eliminar2="";
						
						  echo" Incidencia finalida";
						  // $x="";
						    
			        }
			 
			   
			    				
								
								 
		  }
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