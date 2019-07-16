
<?php
session_start();
$link=mysql_connect("localhost", "root","")or die("no se encuentra el servidor");;
$db=mysql_select_db("jade2",$link)or die("error en conexion ");

if(isset($_POST["form1"])){
	
	$consulta= "SELECT *FROM incidencias WHERE 1 " ;
             $resultado= mysql_query($consulta, $link);
             $existe_incidencia= mysql_num_rows($resultado);

             if($existe_incidencia<1){
			echo"<h2 class=\"login-header\">resultados</h2> ";
			/*echo"<div class=\"login-container\" height=\"700\">";
            echo" <center><table border=\"2px\" width=\"700px\>";
			 echo"No hay Incidencias para Mostrar ";*/
			  
			echo"</table></center></div>";
             }
             else{ 
			 
			 echo" 
					   
						 <h2 class=\"login-header\">resultados</h2>
						 <div class=\"login-container\" height=\"700\">";
					 echo" <center><table border=\"2px\" width=\"700px\">
					  <tr bgcolor=\"#66CC99\"><td><b>N#</b></td><td><b>Fecha</b></td></b></td><td><b>Asunto</b></td></b></td><td><b>Descripcion</b></td><td><b>Imagen</b></td></td></tr>";
	               while($registro= mysql_fetch_assoc($resultado)) {
		                $numero_incidencia=$registro['num_inc'];
		 				$descripcion=$registro['descripcion'];
		 				$asunto=$registro['asunto'];
		 				$fecha=$registro['fecha'];	
						$imagen=$registro['imagen']; 
						 	$codigoHtml3='
			<textarea bgcolor=\"#FFFFFF\" readonly="readonly" name="descripcion" cols="70">'.$descripcion.'
    </textarea> 
		 ';
		
		    		  echo" 
					   
     <tr bgcolor=\"#FFFFFF\"><td>$numero_incidencia</td><td>$fecha</td><td>$asunto</td><td>$codigoHtml3</td><td><img src=\"$imagen\" width=\"50\" heigth=\"50\"></td></tr>
					  
		 				";
						} 
	              
	                     echo"</table></center></div>";
          		}
	
	}

if(isset($_POST["seleccion"])){

			 $tipo_incidencia=$_POST["seleccion"];
			 $consulta3= "SELECT *FROM soluciones WHERE tipo_incidencia= '$tipo_incidencia'" ;
             $resultado3= mysql_query($consulta3, $link);
             $existe_solucion= mysql_num_rows($resultado3);
			 if($existe_solucion<1){
				 echo" 
					     <h2 class=\"login-header\">resultados</h2>
						 <div class=\"login-container\" height=\"700\">";
					 
				 echo" No hay soluciones para Mostrar ";	
				  echo"</div>";
				 
			 }
			 else{
				 echo" 
					     <h2 class=\"login-header\">resultados</h2>
						 <div class=\"login-container\" height=\"700\">";
					     
					 echo" <center><table border=\"2px\" width=\"700px\">
					  <tr bgcolor=\"#66CC99\"><td ><b>Tipo de Solucion</b></td><td><b>solucion</b> </td><td><b>Archivo</b> </td><td width=\"200px\"><b>Fecha</b> </td><td><b>Administrador</b> </td></tr>";
	               while($registro= mysql_fetch_assoc($resultado3)) {
		                $categoria_incidencia=$registro['tipo_incidencia'];
		 				$solucion=$registro['solucion'];
						$arc_solucion=$registro['arc_solucion'];
						$fecha_solucion=$registro['fecha_solucion'];
						$administrador_sol=$registro['nombre_administrador'];
						
						
										 	$codigoHtml4='
			<textarea bgcolor=\"#FFFFFF\" readonly="readonly" name="solucion" cols="45">'.$solucion.'
            </textarea> 
		   ';
		   if($arc_solucion==""){
			                   $boton_descarga="";
			 }
			 else{
		   $boton_descarga='
		   <form action="bajando.php" method"POST" >
           <input type="submit" name="datos" value="'.$arc_solucion.'">
           </form>
		   ';
			 }		 				
		    		  echo" 
					  </tr>
					  <div id=\"mostrardatos\"><tr bgcolor=\"#FFFFFF\"><td>$categoria_incidencia</td><td>$codigoHtml4   </td><td>           $boton_descarga
		   </td><td>$fecha_solucion   </td><td>$administrador_sol   </td></tr>
			  			
		 				";
						} 
	                     echo"</table></center></div></div>";
				 }		
}
if(isset($_POST["form2"])){
			

             $consulta2= "SELECT *FROM usuarios WHERE 1 " ;
             $resultado2= mysql_query($consulta2, $link);
             $existe_usuario= mysql_num_rows($resultado2);

             if($existe_usuario<1){
             echo" No hay usuarios para Mostrar ";	
             }
             else{echo" 
					     <h2 class=\"login-header\">resultados</h2>
						 <div class=\"login-container\" height=\"700\">";
					 echo" <center><table border=\"2px\" width=\"700px\">
					  <tr bgcolor=\"#66CC99\"><td><b>Nombre del Usuario</b></td><td><b>Departamento</b></td></b></td></tr>";
	               while($registro= mysql_fetch_assoc($resultado2)) {
		                $nombre=$registro['nombre_usuario'];
		 				$departamento=$registro['departamento'];	
		    		  echo" 
					  </tr>
					  <tr bgcolor=\"#FFFFFF\"><td>$nombre</td><td>$departamento    </td></tr>
		 				";
						} 
	                     echo"</table></center></div>";
	
          	}
		

}

if(isset($_POST["form3"])){
	      $n_incidencia=$_POST["n_incidencia"];
	      $consulta2= "SELECT *FROM incidencias WHERE num_inc='$n_incidencia' " ;
		  $resultado2= mysql_query($consulta2, $link);
             $existe_incidencia= mysql_num_rows($resultado2);

             if($existe_incidencia<1){
             echo"<h2 class=\"login-header\">resultados</h2>
			 <div class=\"login-container\" height=\"700\">
			  No hay Incidencias para Mostrar ";	
             }
             else{echo" 
					     <h2 class=\"login-header\">resultados</h2>
						 <div class=\"login-container\" height=\"700\">";
					 echo" <center><table border=\"2px\" width=\"700px\">
					  <tr bgcolor=\"#66CC99\"><td><b>N#</b></td><td><b>Fecha</b></td></b></td><td><b>Asunto</b></td></b></td><td><b>Descripcion</b></td><td><b>Imagen</b></td></td><td><b>Usuario</b></td></tr>";
	               while($registro= mysql_fetch_assoc($resultado2)) {
		                $num_inc=$registro['num_inc'];
						$fecha=$registro['fecha'];
		 				$asunto=$registro['asunto'];
						$tipo_incidencia=$registro['tipo_incidencia'];
						$descripcion=$registro['descripcion'];
						$imagen=$registro['imagen'];
						$nombre_usuario=$registro['nombre_usuario'];
						
						$codigoHtml3='
			            <textarea bgcolor=\"#FFFFFF\" readonly="readonly" name="descripcion" cols="70">'.$descripcion.'
                        </textarea> 
		 ';
							
		    		  echo" 
					  </tr>
					  				   
     <tr bgcolor=\"#FFFFFF\"><td>$num_inc</td><td>$fecha</td><td>$asunto</td><td>$codigoHtml3</td><td><img src=\"$imagen\" width=\"50\" heigth=\"50\"></td><td>$nombre_usuario</td></tr>
		 				";
						} 
	                     echo"</table></center></div>";
	
          	}
}

if(isset($_POST["form4"])){
	      $t_incidencia=$_POST["seleccion2"];
	      $consulta2= "SELECT *FROM incidencias WHERE tipo_incidencia='$t_incidencia' " ;
		  $resultado2= mysql_query($consulta2, $link);
             $existe_incidencia= mysql_num_rows($resultado2);

             if($existe_incidencia<1){
             echo"<h2 class=\"login-header\">resultados</h2>
			 <div class=\"login-container\" height=\"700\">
			  No hay Incidencias para Mostrar ";	
             }
             else{echo" 
					     <h2 class=\"login-header\">resultados</h2>
						 <div class=\"login-container\" height=\"700\">";
					 echo" <center><table border=\"2px\" width=\"700px\">
					  <tr bgcolor=\"#66CC99\"><td><b>N#</b></td><td><b>Fecha</b></td></b></td><td><b>Asunto</b></td></b></td><td><b>Descripcion</b></td><td><b>Imagen</b></td></td><td><b>Usuario</b></td></tr>";
	               while($registro= mysql_fetch_assoc($resultado2)) {
		                $num_inc=$registro['num_inc'];
						$fecha=$registro['fecha'];
		 				$asunto=$registro['asunto'];
						$tipo_incidencia=$registro['tipo_incidencia'];
						$descripcion=$registro['descripcion'];
						$imagen=$registro['imagen'];
						$nombre_usuario=$registro['nombre_usuario'];
						
						$codigoHtml3='
			            <textarea bgcolor=\"#FFFFFF\" readonly="readonly" name="descripcion" cols="70">'.$descripcion.'
                        </textarea> 
		 ';
							
		    		  echo" 
					  </tr>
					  				   
     <tr bgcolor=\"#FFFFFF\"><td>$num_inc</td><td>$fecha</td><td>$asunto</td><td>$codigoHtml3</td><td><img src=\"$imagen\" width=\"50\" heigth=\"50\"></td><td>$nombre_usuario</td></tr>
		 				";
						} 
	                     echo"</table></center></div>";
	
          	}
}
if(isset($_POST["seleccion3"])){

			 $nombre=$_POST["seleccion3"];
			 $consulta= "SELECT *FROM incidencias WHERE nombre_usuario= '$nombre'" ;
             $resultado= mysql_query($consulta, $link);
             $existe_solucion= mysql_num_rows($resultado);
			 if($existe_solucion<1){
				 echo" 
					     <h2 class=\"login-header\">resultados</h2>
						 <div class=\"login-container\" height=\"700\">";
					 
				 echo" No hay Incidencias  para Mostrar ";	
				  echo"</div>";
				 
			 }
			 else{
				 echo" 
					     <h2 class=\"login-header\">resultados</h2>
						 <div class=\"login-container\" height=\"700\">";
					 echo" <center><table border=\"2px\" width=\"700px\">
					  <tr bgcolor=\"#66CC99\"><td><b>N#</b></td><td><b>Fecha</b></td></b></td><td><b>Asunto</b></td></b></td><td><b>Descripcion</b></td><td><b>Imagen</b></td></td><td><b>Usuario</b></td></tr>";
	               while($registro= mysql_fetch_assoc($resultado)) {
		                $num_inc=$registro['num_inc'];
						$fecha=$registro['fecha'];
		 				$asunto=$registro['asunto'];
						$tipo_incidencia=$registro['tipo_incidencia'];
						$descripcion=$registro['descripcion'];
						$imagen=$registro['imagen'];
						$nombre_usuario=$registro['nombre_usuario'];
						
						$codigoHtml3='
			            <textarea bgcolor=\"#FFFFFF\" readonly="readonly" name="descripcion" cols="70">'.$descripcion.'
                        </textarea> 
		 ';
							
		    		  echo" 
					  </tr>
					  				   
     <tr bgcolor=\"#FFFFFF\"><td>$num_inc</td><td>$fecha</td><td>$asunto</td><td>$codigoHtml3</td><td><img src=\"$imagen\" width=\"50\" heigth=\"50\"></td><td>$nombre_usuario</td></tr>
		 				";
						} 
	                     echo"</table></center></div>";
	
          	}
}
?>