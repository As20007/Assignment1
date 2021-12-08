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

//table 2 


$headers=array('race','percentage');
$data=array(
    0 => array(
        0 => 'white',
        1 => $perwhite,

    ),
    1 => array(
        0 => 'black',
        1 => $perblack,

    ),
    2 => array(
        0 => 'other',
        1 => $perother,

    )

);

include CLASS_PATH . 'UI.class.php';
$ui=new UI();
$table=$ui->simpleTable('Breakdown by Race (in percent) from ICU Admissions',$headers,$data);
echo $table;

?>

<p>Explanation</p>
<p>This pie chart breaks down the number of people admitted into the ICU by race (white, black, other). 
The same data is reflected in the table above. 
Acccording the data, whites clearly out number all other races. While this could be due to the size of the data set,
given that they make up 85% of admissions, one should really invesitage further as to why that may be. 
One possible hypothesis is that whites are more likely to trust americas medical system. 
Another hypothesis however could aslo indicate that medical bias has skwede who gets admitted to the ICU> 
</p>
