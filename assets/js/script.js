/*** Javascript for SAMF 2.0 ***/
/********* By Kusumoto *********/


/*
Function for generate column chart for highchart

category = Category xAxis
text = Text in yAxis
data = dataset
dom = dom for render
title = title for chart
subtitle = subtitle for chart
*/

function graph_column_generate(category,text,data,dom,title,subtitle)
{
	$('#' + dom).highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: title
        },
        subtitle: {
            text: subtitle
        },
        xAxis: {
            categories: category,
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: text
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        colors: ['#A2000F', '#00C8C6', '#008106'],
        series: data
    });
}

/*
Function for generate line chart for highchart

category = Category xAxis
text = Text in yAxis
data = dataset
dom = dom for render
title = title for chart
subtitle = subtitle for chart
*/
function graph_line_generate(category,text,data,dom,title,subtitle)
{
    $('#' + dom).highcharts({
        title: {
            text: title
        },
        subtitle: {
            text: subtitle
        },
        xAxis: {
            categories: category,
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: text
            }
        },
         legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        colors: color,
        
        series: [data]
    });
}

/*
Function for generate pie3d chart for highchart

category = Category xAxis
text = Text in yAxis
data = dataset
dom = dom for render
title = title for chart
subtitle = subtitle for chart
name = chart name
*/
function graph_pie_generate(data,dom,title,subtitle,name,color)
{
    $('#' + dom).highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: title
        },
        subtitle: {
            text: subtitle
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                }
            }
        },
        colors: color,
        series: [{
            name: name,
            data: data
        }]
    });
}

