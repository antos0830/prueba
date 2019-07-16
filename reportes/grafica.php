<?php

$link=mysql_connect("localhost", "root","")or die("no se encuentra el servidor");;
$db=mysql_select_db("jade2",$link)or die("error en conexion ");

?>

<!DOCTYPE HTML>
<html>
	<head>
	    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8">-->
		<title>soporte tecnico</title>
        <link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />
		<!--/*<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>*/-->
		<!--<script src="prefixfree.min.js" type="text/javascript"></script>-->
		<style type="text/css">
		.auto-style1 {
	margin-bottom: 1;
}
${demo.css}

		</style>
   <script src="Highcharts-4.1.5/js/jquery-1.8.2.min.js"></script>
  <script src="Highcharts-4.1.5/js/highcharts.js"></script>
 <!-- <script src= "Highcharts-4.1.5/js/modules/exporting.js"></script>-->
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Estadisticas de las Incidencias'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            data: [
			<?php

$consulta= "SELECT * FROM incidencias " ;
$resultado= mysql_query($consulta, $link);
while($registro= mysql_fetch_assoc($resultado)) {

?>
                ['<?php echo $registro['estatus'];  ?>',   45.0],
				
              <?php }  ?>  
            ]
        }]
    });
});


		</script>
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
        <li><a class="active" href="#">Principal</a></li>
       
        <li><a href="ingresar_administrador.html">Ingresar</a>
          
        </li>
           
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
<div class="wrapper col2" style="height: 678px" >
  <div id="gallery">
 
<!-- <script src= "Highcharts-4.1.5/js/jquery-3.3.1.min.js"></script>
 <script src= "Highcharts-4.1.5/js/jquery-1.3.2.js"></script>
 <script src= "Highcharts-4.1.5/js/jquery-1.3.js"></script>
 <script src= "Highcharts-4.1.5/js/jquery-1.11.1.js"></script>
 <script src= "Highcharts-4.1.5/js/jquery-migrate-1.2.1.min.js"></script> 
 <script src= "Highcharts-4.1.5/js/jquery-1.3.2.min.js"></script>-->


<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>

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