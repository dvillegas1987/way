//Una vez que cargue el documento se cargara la funcion
	$(document).ready(function() {
		Highcharts.setOptions({
			lang: {
				decimalPoint: ',',
				thousandsSep: '.'
			}
		});
		var options = {
			chart: {
	            renderTo: 'container5',
	            plotBackgroundColor: null,
	            plotBorderWidth: null,
	            plotShadow: false
	        },
	        title: {
	           text: ''
	        },
	        tooltip: {
	            pointFormat: '{series.name}: <b>{point.percentage: .2f} %</b>'
	        },
	        plotOptions: {
	            pie: {
	               allowPointSelect: true,
	               cursor: 'pointer',
	               dataLabels: {
	                  enabled: true,
	                  color: '#000000',
	                  connectorColor: '#000000',
	                  format: '$ {point.y:,.2f}'
	               },
				   showInLegend: true
	           }
	       },
	       series: [{
	           type: 'pie',
	           name: 'Mis ventas',
	           data: []
	       }]
	    }
	    // Aqui la seccion del archivo del cual obtendremos los datos
	   $.getJSON("highCharts/data3.php", function(json) {
			options.series[0].data = json;
	        chart = new Highcharts.Chart(options);
	    });
	        
	     
		
			   $('#comboVend').on('change', function(){
				
				var name = $('#comboVend').val();
				var url= "highCharts/data3.php";
					$.ajax ({
						type: "POST",
						url: url,
						data: $("#formulario").serialize() + "&par1="+name ,
						success: function(json)
						{
							options.series[0].data= json;
							chart = new Highcharts.Chart(options);
						}
					});

			  });
		
		 
		
		
	        
      	});  