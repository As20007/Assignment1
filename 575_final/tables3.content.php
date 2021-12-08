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

//table 3 

$headers=array('category','percentage','heartrate','systolic');
$data=array(
    0 => array(
        0 => 'female',
        1 => $perfemale,
        2 => $avgfemale,
        3 => $avgfemale_s,

    ),
    1 => array(
        0 => 'male',
        1 => $permale,
        2 => $avgmale,
        3 => $avgmale_s,

    ),
    2 => array(
        0 => 'dead',
        1 => $perdead,
        2 => $avgdead,
        3 => $avgdead_s,

    ),
    3 => array(
        0 => 'alive',
        1 => $peralive,
        2 => $avgalive,
        3 => $avgalive_s,

    )

);

include CLASS_PATH . 'UI.class.php';
$ui=new UI();
$table=$ui->simpleTable('Heartrate and Systolic Heart Rate by Gender and Status',$headers,$data);
echo $table;


?>


<p>Explanation</p>
<p>This scatterplot compared the average heartrate and average systolic by gender and status (whether they died or lived). 
The same data is reflected in the table above. 
Acccording the data, over 80% who were admitted into the ICU died. Further more, they seemed to have lowest systolic. 
This indicates that there is perhaps a connection between having a low systolic and death. 
</p>
