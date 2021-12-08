<?php
$db=new Database();
$sql1= "SELECT heartrate, systolic from icuadmissions where race=1";
$sql2= "SELECT heartrate, systolic from icuadmissions where race=2";
$sql3= "SELECT heartrate, systolic from icuadmissions where race=3";


$white=$db->fetchAll($sql1);
$black=$db->fetchAll($sql2);
$other=$db->fetchAll($sql3);

echo'<pre>';
//print_r($white);
//print_r($black);
//print_r($other);
echo'<pre>';
$sumwhite=0;
$sumwhite_s=0;
$countwhite=0;

foreach ($white as $whiteindividual){
    $sumwhite=$sumwhite +$whiteindividual->heartrate;
    $sumwhite_s=$sumwhite_s +$whiteindividual->systolic;
    $countwhite++;
}
$avgwhite=$sumwhite/$countwhite;
$avgwhite_s=$sumwhite_s/$countwhite;




$sumblack=0;
$sumblack_s=0;
$countblack=0;

foreach ($black as $blackindividual){
    $sumblack=$sumblack +$blackindividual->heartrate;
    $sumblack_s=$sumblack_s +$blackindividual->systolic;
    $countblack++;
}
$avgblack=$sumblack/$countblack;
$avgblack_s=$sumblack_s/$countblack;



$sumother=0;
$sumother_s=0;
$countother=0;

foreach ($other as $otherindividual){
    $sumother=$sumother +$otherindividual->heartrate;
    $sumother_s=$sumother_s +$otherindividual->systolic;
    $countother++;
}
$avgother=$sumother/$countother;
$avgother_s=$sumother_s/$countother;




//$table=$ui->simpleTable('ICU Admissions',$headers,$data);
//echo $table;


//echo'<pre>';
//print_r($admissions);
//echo'<pre>';

//transfer this for viz
//viz 1 
?>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<figure class="highcharts-figure">
    <div id="container"></div>
    <p class="highcharts-description">
        Bar chart showing horizontal columns. This chart type is often
        beneficial for smaller screens, as the user can scroll through the data
        vertically, and axis labels are easy to read.
    </p>
</figure>

<script>
Highcharts.chart('container', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Comparison of Heartrate and Systolic by Race'
    },
    xAxis: {
        categories: ['White', 'Black', 'Other'],
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Heartrate and Systolic',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
   
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -40,
        y: 80,
        floating: true,
        borderWidth: 1,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'Heartrate',
        data: [<?php echo $avgwhite; ?>, <?php echo $avgblack; ?>, <?php echo $avgother; ?>]
    }, {
        name: 'Systolic',
        data: [<?php echo $avgwhite_s; ?>, <?php echo $avgblack_s; ?>, <?php echo $avgother_s; ?>]
 
 
    }]
});
</script>
<?php

//Viz 2  

?>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<figure class="highcharts-figure">
    <div id="container"></div>
    <p class="highcharts-description">
        Chart showing use of rotated axis labels and data labels. This can be a
        way to include more labels in the chart, but note that more labels can
        sometimes make charts harder to read.
    </p>
</figure>

<script>
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'World\'s largest cities per 2017'
    },
    subtitle: {
        text: 'Source: <a href="http://en.wikipedia.org/wiki/List_of_cities_proper_by_population">Wikipedia</a>'
    },
    xAxis: {
        type: 'category',
        labels: {
            rotation: -45,
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Population (millions)'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: 'Population in 2017: <b>{point.y:.1f} millions</b>'
    },
    series: [{
        name: 'Population',
        data: [
            ['Shanghai', 24.2],
            ['Beijing', 20.8],
            ['Karachi', 14.9],
            ['Shenzhen', 13.7],
            ['Guangzhou', 13.1],
            ['Istanbul', 12.7],
            ['Mumbai', 12.4],
            ['Moscow', 12.2],
            ['São Paulo', 12.0],
            ['Delhi', 11.7],
            ['Kinshasa', 11.5],
            ['Tianjin', 11.2],
            ['Lahore', 11.1],
            ['Jakarta', 10.6],
            ['Dongguan', 10.6],
            ['Lagos', 10.6],
            ['Bengaluru', 10.3],
            ['Seoul', 9.8],
            ['Foshan', 9.3],
            ['Tokyo', 9.3]
        ],
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            align: 'right',
            format: '{point.y:.1f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});

</script>
