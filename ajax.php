<?php 
   include ("oop.php");
   $oop=new jobs;
   $ajax=$_POST['ajax'];
   
   if($ajax=="test1"){
   
   $sql="SELECT count(user_first_name) FROM `users`";
   $res=$oop->select($sql,array());
    //var_dump();
    echo json_encode($res[0]['count(user_first_name)']);
   }//TEST1
   if($ajax=="test4"){
   
   $sql="SELECT user_last_name FROM `users`";
   $res=$oop->select($sql,array());
   $count=0;
   foreach($res as $index=>$val){
   	$firstStringCharacter = mb_substr($val['user_last_name'], 0, 1,'UTF-8');
   	//echo $firstStringCharacter;
   	if($firstStringCharacter=='ب'){
   		//echo $val['user_last_name'];
   		$count++;
   	}
   }
   	echo $count;
   } //TEST4
   if($ajax=="test7"){
   
   $sql="SELECT jobs.j_name ,`user_job`, COUNT(*) FROM users inner join jobs on users.user_job = jobs.j_code GROUP by `user_job` HAVING COUNT(*) > 51 order by j_name ASC";
   $res=$oop->select($sql,array(),PDO::FETCH_NUM);
   
   $p=array(sizeof($res),$res,$sql);
   echo json_encode($p); 
   } //TEST7
   ?>