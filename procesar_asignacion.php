<?php

$link=mysql_connect("localhost", "root","")or die("no se encuentra el servidor");;
$db=mysql_select_db("jade2",$link)or die("error en conexion ");

if(isset($_POST["asignar"])){
	$asignar=$_POST["asignar"];
	
	
		$fecha_asig=date("Y,m,d");
	mysql_query("insert into asignaciones values('','$fecha_asig','$num_incidencia','$adminstrador')",$link)or die("<br/>error del 1mer envio");
echo"  asignacion guardada<br/>";
	

}
?>