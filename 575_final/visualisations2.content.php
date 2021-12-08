<?php
$db=new Database();
$sql1= "SELECT heartrate from icuadmissions where race=1";
$sql2= "SELECT heartrate from icuadmissions where race=2";
$sql3= "SELECT heartrate from icuadmissions where race=3";


$white=$db->fetchAll($sql1);
$black=$db->fetchAll($sql2);
$other=$db->fetchAll($sql3);

echo'<pre>';
//print_r($white);
//print_r($black);
//print_r($other);


$countwhite=0;

foreach ($white as $whiteindividual){
    $countwhite++;
}



//

$countblack=0;

foreach ($black as $blackindividual){
    $countblack++;
}


//

$countother=0;

foreach ($other as $otherindividual){
    $countother++;
}

$total=$countwhite+$countother+$countblack;
$perwhite=$countwhite/$total*100;
$perblack= $countblack/$total*100;
$perother= $countother/$total*100;



echo'<pre>';
//print_r($total);
//print_r($countwhite);
//print_r($countblack);
//print_r($countother);

print_r($perwhite);

//print_r($perblack);

//print_r($perother);




//Viz 2  

?>

<script>
Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Breakdown by Race (in percent) from ICU Admissions'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    series: [{
        name: 'Races',
        colorByPoint: true,
        data: [{
            name: 'White',
            y: <?php echo $perwhite; ?>,
            sliced: true,
            selected: true
        }, {
            name: 'Black',
            y: <?php echo $perblack; ?>
        }, {
            name: 'Other',
            y: <?php echo $perother; ?>
        }]
    }]
});
</script>
