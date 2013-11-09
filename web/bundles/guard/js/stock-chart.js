 var mychart = function(container, urlAnimalWeight, urlGamelleWeight) {
 	console.log("Building of the chart.");
	var seriesOptions = [],
		yAxisOptions = [],
		seriesCounter = 0,
		urls = [urlAnimalWeight, urlGamelleWeight],
		names = ['Animal Weight', 'Gamelle Weight'],
		colors = Highcharts.getOptions().colors;

	console.log("Vars initialized.");

	for (var i = 0; i < names.length ; i++) {
		console.log("POST: " + urls[i]);
		$.ajax({
			type: 'POST',
			url: 'http://guardgamelle.local/' + urls[i],
			success: function(data, textStatus, jqXHR){
				console.log(textStatus);
				seriesOptions[i] = {
					name: names[i],
					data: data
				};
				seriesCounter++;

				if (seriesCounter == names.length) {
					createChart();
				}
			},
			error: function(jqXHR, textStatus, errorThrown){
				console.log('ERROR: ' + errorThrown + ', STATUS: ' + textStatus);
			}
		});
	};



	// create the chart when all data is loaded
	function createChart(container) {

		$(container).highcharts('StockChart', {
		    chart: {
		    },

		    rangeSelector: {
		        selected: 4
		    },

		    yAxis: {
		    	labels: {
		    		formatter: function() {
		    			return (this.value > 0 ? '+' : '') + this.value + '%';
		    		}
		    	},
		    	plotLines: [{
		    		value: 0,
		    		width: 2,
		    		color: 'silver'
		    	}]
		    },
		    
		    plotOptions: {
		    	series: {
		    		compare: 'percent'
		    	}
		    },
		    
		    tooltip: {
		    	pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.change}%)<br/>',
		    	valueDecimals: 2
		    },
		    
		    series: seriesOptions
		});
	}

};