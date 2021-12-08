<?php
$db=new Database();
$sql1= "SELECT heartrate, systolic from icuadmissions where sex=0";
$sql2= "SELECT heartrate, systolic from icuadmissions where sex=1";
$sql3= "SELECT heartrate, systolic from icuadmissions where status=0";
$sql4= "SELECT heartrate, systolic from icuadmissions where status=1";


$male=$db->fetchAll($sql1);
$female=$db->fetchAll($sql2);
$dead=$db->fetchAll($sql3);
$alive=$db->fetchAll($sql4);

echo'<pre>';
//print_r($black);
//print_r($other);
echo'<pre>';

$summale=0;
$summale_s=0;
$countmale=0;

//male
foreach ($male as $maleindividual){
    $summale=$summale +$maleindividual->heartrate;
    $summale_s=$summale_s +$maleindividual->systolic;
    $countmale++;
}

$avgmale=$summale/$countmale;
$avgmale_s=$summale_s/$countmale;

//female

$sumfemale=0;
$sumfemale_s=0;
$countfemale=0;


foreach ($female as $femaleindividual){
    $sumfemale=$sumfemale +$femaleindividual->heartrate;
    $sumfemale_s=$sumfemale_s +$femaleindividual->systolic;
    $countfemale++;
}

$avgfemale=$sumfemale/$countfemale;
$avgfemale_s=$sumfemale_s/$countfemale;

//dead

$sumdead=0;
$sumdead_s=0;
$countdead=0;


foreach ($dead as $deadindividual){
    $sumdead=$sumdead +$deadindividual->heartrate;
    $sumdead_s=$sumdead_s +$deadindividual->systolic;
    $countdead++;
}

$avgdead=$sumdead/$countdead;
$avgdead_s=$sumdead_s/$countdead;

//alive

$sumalive=0;
$sumalive_s=0;
$countalive=0;


foreach ($alive as $aliveindividual){
    $sumalive=$sumalive +$aliveindividual->heartrate;
    $sumalive_s=$sumalive_s +$aliveindividual->systolic;
    $countalive++;
}

$avgalive=$sumalive/$countalive;
$avgalive_s=$sumalive_s/$countalive;

//percentages 
$total=$countfemale+$countmale;
$total2=$countdead+$countalive;
$perfemale=$countfemale/$total*100;
$permale= $countmale/$total*100;
$perdead=$countdead/$total2*100;
$peralive= $countalive/$total2*100;

?>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<figure class="highcharts-figure">
    <div id="container"></div>
    <p class="highcharts-description">
        Chart showing basic use of bubble series with a custom tooltip formatter.
        The chart uses plot lines to show safe intake levels for sugar and fat.
        Bubble charts are great for comparing three dimensions of data without
        relying on color or 3D charts.
    </p>
</figure>

<script>

Highcharts.chart('container', {

    chart: {
        type: 'bubble',
        plotBorderWidth: 1,
        zoomType: 'xy'
    },

    legend: {
        enabled: false
    },

    title: {
        text: 'Heartrate and Systolic Heart Rate by Gender and Status'
    },


    accessibility: {
        point: {
            valueDescriptionFormat: '{index}. {point.name}, heartrate: {point.x}, systolic: {point.y}, representation: {point.z}%.'
        }
    },

    xAxis: {
        gridLineWidth: 1,
        title: {
            text: 'Heart Rate'
        },
        labels: {
            format: ''
        },
        plotLines: [{
            color: 'black',
            dashStyle: 'dot',
            width: 2,
            value: 65,
            label: {
                rotation: 0,
                y: 15,
                style: {
                    fontStyle: 'italic'
                },
                text: 'Heartrate'
            },
            zIndex: 3
        }],
        accessibility: {
            rangeDescription: 'Range: 0 to 200.'
        }
    },

    yAxis: {
        startOnTick: false,
        endOnTick: false,
        title: {
            text: 'Systolic'
        },
        labels: {
            format: ''
        },
        maxPadding: 0.2,
        plotLines: [{
            color: 'black',
            dashStyle: 'dot',
            width: 2,
            value: 50,
            label: {
                align: 'right',
                style: {
                    fontStyle: 'italic'
                },
                text: 'Systolic',
                x: -10
            },
            zIndex: 3
        }],
        accessibility: {
            rangeDescription: 'Range: 0 to 200.'
        }
    },

     tooltip: {
        useHTML: true,
        headerFormat: '<table>',
        pointFormat: '<tr><th colspan="2"><h3>{point.country}</h3></th></tr>' +
            '<tr><th>Heart Rate:</th><td>{point.x}g</td></tr>' +
            '<tr><th>Systolic:</th><td>{point.y}g</td></tr>' +
            '<tr><th>Representation within data set (%):</th><td>{point.z}%</td></tr>',
        footerFormat: '</table>',
        followPointer: true
    },

    plotOptions: {
        series: {
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            }
        }
    },

    series: [{
        data: [
            { x: <?php echo $avgfemale; ?>, y: <?php echo $avgfemale_s; ?>, z: <?php echo $perfemale; ?>, name: 'F', sex: 'Female' },
            { x: <?php echo $avgmale; ?>, y: <?php echo $avgmale_s; ?>, z: <?php echo $permale; ?>, name: 'M', sex: 'Male' },
            { x: <?php echo $avgdead; ?>, y: <?php echo $avgdead_s; ?>, z: <?php echo $perdead; ?>, name: 'D', sex: 'Dead' },
            { x: <?php echo $avgalive; ?>, y: <?php echo $avgalive_s; ?>, z: <?php echo $peralive; ?>, name: 'A', sex: 'Alive' }
 
        ]
    }]

});

</script>
