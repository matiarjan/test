<?php
Class jobs{
public  $connect;
private $username="root";
private $password="";
private $dsn="mysql:host=localhost;dbname=dbnew";
private $method=array(PDO::MYSQL_ATTR_INIT_COMMAND=>"set names utf8");   

public function conection(){
 $connect=new PDO($this->dsn,$this->username,$this->password,$this->method); 
 return $connect;
}//Method-conection

public function __construct(){
 $this->connect=new PDO($this->dsn,$this->username,$this->password,$this->method); 
 }                           // dar surat moshkel dar connection in method ejra shavad   
 
public function Idu($query,$data){
  $pre=$this->connect->prepare($query);
   foreach($data as $index=>$val){
    $pre->bindvalue($index+1,$val);  
    }
  $pre->execute();    
}//Method-insert-Delete-Update-Idu   
    
public function Rowcount($query,$data){
  $pre=$this->connect->prepare($query);
  foreach($data as $index=>$val){
  $pre->bindvalue($index+1,$val);                         
  }
 
  $pre->execute();
  $res=$pre->rowcount();             
  return $res;     
}//Method-Rowcount
    
public function select($query,$data,$methodd=PDO::FETCH_ASSOC){
  $pre=$this->connect->prepare($query);
  foreach($data as $index=>$val){
  $pre->bindvalue($index+1,$val);                       //برای مسایل امنیتی   
  }
 
  $pre->execute();
  $res=$pre->fetchALL($methodd);             
  return $res;     
}//Method-select
    
public function layout($v,$other="order by id DESC"){
 $sql="SELECT * FROM `layout_tbl`where `layout`='".$v."' $other ";
 $result=$this->select($sql,array()); 
 $item=array();   
 foreach($result as $res){
   $sql2="SELECT * FROM `mahsool_tbl`where `id`=?";
   $result2=$this->select($sql2,array($res['item']));
    if($result2[0]['taeeid']!='0'){
     array_push($item,$result2[0]);  
    }
   } //foreach  
    
 return $item;    
}//layout


    
}//Class-Digikala-etesal be DB