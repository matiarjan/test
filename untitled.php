<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
include ("oop.php");
$oop=new jobs; 
$sql="SELECT jobs.j_name FROM users inner join jobs on users.user_job = jobs.j_code";
$res=$oop->select($sql,array());
$temp=[];
foreach($res as $row){
	array_push($temp,$row['j_name']);
}
$count_of_each=array_count_values($temp);
//print_r($count_of_each);
ksort($count_of_each);
var_dump($count_of_each);
foreach($count_of_each as $index=>$val){
	if($val>51){
		echo $index.' '.$val;
	}
}
?>
</body>
</html>