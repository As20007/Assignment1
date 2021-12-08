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




$headers=array('race','heartrate','systolic');
$data=array(
    0 => array(
        0 => 'white',
        1 => $avgwhite,
        2 => $avgwhite_s
    ),
    1 => array(
        0 => 'black',
        1 => $avgblack,
        2 => $avgblack_s
    ),
    2 => array(
        0 => 'other',
        1 => $avgother,
        2 => $avgother_s
    )

);

include CLASS_PATH . 'UI.class.php';
$ui=new UI();
$table=$ui->simpleTable('Avg Heartrate and Systolic by Race',$headers,$data);
echo $table;



?>

<p>Explanation</p>
<p>This bar chart compared the average heartrate and average systolic for each race (white,black,other). 
The same data is reflected in the table above. 
Acccording the data, black's clearly had the highest heart rate along with the second hightest systolic (this is blood pressure).
Whites had the lowest heartrate and systolic. Since the other category grouped a lot of different races together,
more analysis is needed in to determine how systolic and heart rate are connected. 
</p>
