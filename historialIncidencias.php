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
<!--<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script> 
<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script language="javascript" src="C:\xampp\htdocs\jade2\jsjquery-1.11.1.min.js" ></script>-->
<script language="javascript" src="js/jquery-1.3.2.js"></script>
<!--<script language="javascript" src="js/jquery-1.11.1.min.js"></script>
<script language="javascript" src="js/jquery-migrate-1.2.1.min.js"></script>-->

<!--<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />
<script src="prefixfree.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery/jquery.min.js"></script>
<script src="jquery/jquery-1.3.2.min"></script>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script> 
<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="https://code.jquery.com/jquery-migrate-3.1.1.min.js"></script>
<script>-->
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
<div class="wrapper col2""   >

  <div id="gallery">
    <ul>
     <h2 class="login-header">Historial de  Incindencia</h2>
     <div class="login-container" height="700" width"700"> 
     <center><table height="180" width="700" border="2px" > 
 
     <tr><td><form method="POST">
     <input type="button"  value="Mostrar Todas las Incidencias" id="form1" onclick="enviar_form();" />
     </form></td><td>
	
     <form   method="POST">
     <input type="button"  value="Mostrar Todos los Usuarios" id="form2" onclick="enviar_form2();"/>
     </form></td></tr>
	
	 <div id="tex1">
     <tr><td><form  method"post" >
     <label for"Buscar por N# de Incidencia "><b>Buscar N# de Incidencia &nbsp &nbsp</b> </label>
     <input type="text" name="n_incidencia" id="n_incidencia"  />
     <input type="button" name="" value="Mostrar"
     <input type="button"  value="Mostrar" id="form3" onclick="enviar_form3();" />
     </form>
	 </div>
	
	 <div id="tex2">
      </td><td><form   method"post" name"22222" id="b">
     <label for"mostrar todos los Usuarios"><b>Incidencias de un Usuario &nbsp &nbsp &nbsp &nbsp </b> </label>
     <select name="tipo_insidencia"  id="seleccion3"  />
     <option value="0" >Selecione un usuario</option>
     <?php while($registro= mysql_fetch_assoc($resultado)) {?>
              <option value="<?php echo $registro['nombre_usuario'];  ?>" ><?php echo $registro['nombre_usuario'];  ?></option>
     
      <?php  }?>
      
     		
   			</select>
      <?php
      
      $consulta2= "SELECT tipo_incidencia  FROM tipos_incidencias ORDER BY tipo_incidencia ASC " ;
      $resultado2= mysql_query($consulta2, $link);
      ?>
     <input type="button"  value="Mostrar" id="form5" onclick="enviar_form5();" />
     </form></td></tr>
     </div>
      
	 <div id="tex4"> 
     <tr><td><form   method"post" id="combo" >
     <label for"Buscar por Tipo de Incidencias"><b>Tipo de Incidencias &nbsp</b> </label>
	 <select name="tipo_insidencia"  id="seleccion2"  />
     <option value="0" >Selecciona el Tipo de Incidencia</option>
     <?php while($registro2= mysql_fetch_assoc($resultado2)) {?>
               <option value="<?php echo $registro2['tipo_incidencia'];  ?>" ><?php echo $registro2['tipo_incidencia'];  ?></option>
            
            <?php  }?>

     		
   			</select>
    
     <input type="button"  value="Mostrar" id="form4" onclick="enviar_form4();" />
     </form>
	  </div>
     
	 <!-- <div id="tex5">
     </td><td><form   method"post" name="4444" id="d">
     <label for"mostrar todos los Usuarios"><b>Buscar por Rango de Fechas</b> </label>
     <input type="text" name="nnnnn"   />
     <input type="button" name="" value="Mostrar"
     </form></td></tr>
	  </div>-->
	  
	<!-- <div id="tex7">
     <tr><td><form   method"post" name="5555" id="e">
     <label for"Buscar por Rango de Fechas"><b>Buscar Asunto Incidencias</b></label>
     <input type="text" name="55555"   />
     <input type="button" name="" value="Mostrar"
     </form>
	 </div>-->
	
	 <div id="tex8">
     </td><td><form method="post"  >
     <label for"mostrar todos los Usuarios"><b>Soluciones Guardadas</b></label>
	 <?php
      
      $consulta2= "SELECT tipo_incidencia  FROM tipos_incidencias ORDER BY tipo_incidencia ASC " ;
      $resultado2= mysql_query($consulta2, $link);
      ?>
        	<select name="tipo_insidencia"  id="seleccion"  />
     		<option value="0" >Selecciona el Tipo de Incidencia</option>
     		 <?php while($registro2= mysql_fetch_assoc($resultado2)) {?>
               <option value="<?php echo $registro2['tipo_incidencia'];  ?>" ><?php echo $registro2['tipo_incidencia'];  ?></option>
            
            <?php  }?>
   			</select>
    
     <input type="button"  value="Mostrar" id="form8" onclick="enviar_form1();" />
	 </form></td></tr>
	 </div>
     
	</table></center></div>
     
     <div id= "mostrardatos">
     
     
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
      <p class="fl_right" utf8>Realizado por&nbsp; Antonio Teran - Pasante de Analisis y Diseno de Sistema - Industrias Jade c.a</p>
      <br class="clear" />
    </div>
    <div class="clear"></div>
  </div>
</div>
</body>
</html>