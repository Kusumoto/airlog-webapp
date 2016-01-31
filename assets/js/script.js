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
            categories: category
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
        series: data
    });
}

