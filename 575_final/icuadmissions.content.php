<?php
$db=new Database();
$sql= "SELECT  i.id, i.age, g.gender_names, r.racenames, s.status_name, i.heartrate, i.systolic, c.consciousness_names
   FROM icuadmissions as i 
   LEFT JOIN gender_new as g
   ON i.sex = g.gender_id
   LEFT JOIN race_new as r
   ON i.race = r.race_id
   LEFT JOIN status_new as s
   ON i.status = s.status_id
   LEFT JOIN consciousness as c
   ON i.consciousness = c.consciousness_id";

$headers=array('ID','Age','Gender','Race','Status','Heartrate','Systolic','Consciousness',);
include CLASS_PATH . 'UI.class.php';
$ui=new UI();

$admissions=$db->fetchAll($sql);
$data=$admissions;
$table=$ui->simpleTable('ICU Admissions',$headers,$data);
echo $table;

//echo'<pre>';
//print_r($admissions);
//echo'<pre>';
?>
