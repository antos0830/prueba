



<script type="text/javascript">


function cambiar_fecha_grafica(){

var anio_sel=$("#anio_sel").val();
var mes_sel=$("#mes_sel").val();

cargar_grafica_barras(anio_sel, mes_sel);


}
function cargar _grafica_barras(anio,mes){

var option={

    chart: {
	       renderTo: 'div_grafic_barras',
		   type: 'colum'
	},
	tile: {
	      text: 'Numero de registro del mes segun Antonio'
	     
	},
	subtitles:{
	      text: 'Source: plusis.net'
	},
	xAxis: {
	      categories: [],
		  title: {
		        text: 'dias del mes'
		  },
		  crosshair:true
	},
	yAxis: {
	      min: 0,
		  title: 'Registro al dia'
	},
	tooltip: {
	      headerFormat: '<span style="font-size: 10px">{point.key}</span><table>',
		  pointFormt: '<tr><td style="color:{series.color};padding=0">{series.name}: </td>+ '<td style="padding:0"><b>{point.y}</b></td></tr>',
		  footerForm: '</table>',
		  shared: true,
		  useHtml: true
	},
	plotOptions: {
	      colum: {
		        pointPadding: 0.2,
				borderWidth: 0
		  }
	},
	series: [{
	      name: 'registros',
		  data: []
	
	}]
}
$("#div_grafica_barras").html( $("#cargador_empresa").html())	
};
var url= "grafica_registros/"+anio+"/"+mes+"";

$.get(url,function(resul){
var datos=jquery.paserJSON(resul);
var totaldias=datos.totaldias;
var registrodia=datos.registrodia;


</script>