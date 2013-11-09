var mychart = function(container, urlAnimalWeight, urlGamelleWeight) {
    console.log("Building of the chart.");
    var seriesOptions = [],
            yAxisOptions = [],
            seriesCounter = 0,
            urls = [urlAnimalWeight, urlGamelleWeight],
            names = ['Animal Weight', 'Gamelle Weight'],
            colors = Highcharts.getOptions().colors;

// create the chart when all data is loaded
    function createChart(container) {
        console.debug(seriesOptions);
        $(container).highcharts('StockChart', {
            chart: {
            },
            rangeSelector: {
                selected: 4
            },
            yAxis: {
                labels: {
                    formatter: function() {
                        return (this.value);
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

    console.log("Vars initialized.");
    $.ajax({
        type: 'GET',
        url: 'http://guardgamelle.local' + urls[0],
        success: function(data, textStatus, jqXHR) {
            console.log(textStatus);
            seriesOptions[0] = {
                name: names[0],
                data: JSON.parse(data)
            };
            seriesCounter++;

            if (seriesCounter == names.length) {
                console.debug(seriesOptions);
                createChart(container);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log('ERROR: ' + errorThrown + ', STATUS: ' + textStatus);
        }
    });
    $.ajax({
        type: 'GET',
        url: 'http://guardgamelle.local' + urls[1],
        success: function(data, textStatus, jqXHR) {
            console.log(textStatus);
            seriesOptions[1] = {
                name: names[1],
                data: JSON.parse(data)
            };
            seriesCounter++;

            if (seriesCounter == names.length) {
                console.debug(seriesOptions);
                createChart(container);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log('ERROR: ' + errorThrown + ', STATUS: ' + textStatus);
        }
    });
};