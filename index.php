<?php 
   include ("oop.php");
   $oop=new jobs; 
   ?>
<!doctype html>
<html lang="fa" dir="rtl">
   <head>
      <!--header-->   
      <?php include ("master/header.php"); ?> 
      <!--header-->
   </head>
   <body>
	   <h1>hello</h1>
      <div class="container-fluid">
         <div class="row">
            <!--sidemenu-->   
            <?php include ("master/sidemenu.php"); ?> 
            <!--sidemenu--> 
            <main id="main" role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
               <div  class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                  <h1 class="h2">داشبورد</h1>
               </div>
               <div id="content1" class="alert alert-success text-right d-none" role="alert">
                  <h4 class="alert-heading">سوال </h4>
                  <p class="title"></p>
                  <hr>
                  <p class="mb-0 natije">نتیجه:<a class="alert-link"></a></p>
               </div>
               <?php
                  if(isset($_POST['test2'])){
                  	$sql="SELECT * FROM `users`";
                  	$res=$oop->Rowcount($sql,array());
                    ?>
               <div id="content2" class="alert alert-warning text-right active" role="alert">
                  <h4 class="alert-heading">سوال 2</h4>
                  <p>تعداد کل اعضا با استفاده از دستورات php:</p>
                  <hr>
                  <p class="mb-0 natije">نتیجه:<a id="test2" class="alert-link"><?php echo $res;?></a></p>
               </div>
               <?php }?>
               <?php
                  if(isset($_POST['test3'])){
                  	$sql3="SELECT * FROM `users` WHERE user_last_name like 'ب%'";
                  	$res3=$oop->Rowcount($sql3,array());
                  	?>
               <div id="content3" class="alert alert-info text-right active" role="alert">
                  <h4 class="alert-heading">سوال 3</h4>
                  <p>تعداد اعضایی که نام خانوادگی آنها با حرف "ب" شروع میشود با استفاده از دستورات mysql:</p>
                  <hr>
                  <p class="mb-0 natije">نتیجه:<a id="test3" class="alert-link"><?php echo $res3;?></a></p>
               </div>
               <?php }?>
               <?php
                  if(isset($_POST['test5'])){
                  	$sql5="SELECT * FROM `users` WHERE user_last_name like '____ی'";
                  	$res5=$oop->Rowcount($sql5,array());
                  	?>
               <div id="content5" class="alert alert-secondary text-right active" role="alert">
                  <h4 class="alert-heading">سوال 5</h4>
                  <p>تعداد اعضایی که نام خانوادگی آنها با حرف "ی" تمام میشود و 5 حرفی است با استفاده از دستورات mysql:</p>
                  <hr>
                  <p class="mb-0 natije">نتیجه:<a id="test5" class="alert-link"><?php echo $res5;?></a></p>
               </div>
               <?php }?>
               <?php
                  if(isset($_POST['test6'])){
                  	$sql="SELECT user_last_name FROM `users`";
                  	$res=$oop->select($sql,array());
                  	$count=0;
                  	foreach($res as $index=>$val){
                  		$length=mb_strlen($val['user_last_name']);
                  		$lasttStringCharacter = mb_substr($val['user_last_name'],-1);
                  		if($lasttStringCharacter=='ی' && $length==5){
                  		  $count++;
                  		}
                  	}
                  ?>
               <div id="content5" class="alert alert-dark text-right active" role="alert">
                  <h4 class="alert-heading">سوال 6</h4>
                  <p>تعداد اعضایی که نام خانوادگی آنها با حرف "ی" تمام میشود و 5 حرفی است با استفاده از دستورات php</p>
                  <hr>
                  <p class="mb-0 natije">نتیجه:<a id="test6" class="alert-link"><?php echo $count;?></a></p>
               </div>
               <?php }?>
               <?php if(isset($_POST['test8'])){ ?>
               <div id="content5" class="alert alert-secondary text-right active" role="alert">
                  <h4 class="alert-heading">سوال 8</h4>
                  <p>اسم مشاغلی که حداقل 50 نفر آن را دارا باشند به ترتیب حروف الفبا با استفاده از دستورات php</p>
                  <hr>
                  <table class="table table-striped table-dark">
                     <thead>
                        <tr>
                           <th scope="col">شغل</th>
                           <th scope="col">تعداد</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           $sql="SELECT jobs.j_name FROM users inner join jobs on users.user_job = jobs.j_code";
                           $res=$oop->select($sql,array());
                           $temp=[];
                           foreach($res as $row){
                           array_push($temp,$row['j_name']);
                           }
                           $count_of_each=array_count_values($temp);
                           ksort($count_of_each);
                           foreach($count_of_each as $index=>$val){
                           if($val>51){
                           ?>
                        <tr>
                           <td><?php echo $index; ?></td>
                           <td><?php echo $val; ?></td>
                        </tr>
                        <?php }
                           }
                                            ?> 
                     </tbody>
                  </table>
               </div>
               <?php }?>  
            </main>
         </div>
      </div>
      <?php include ("master/footer.php"); ?> 
   </body>
   <script>
      $('#sidebarMenu ul li').click(function(){
       $(this).parent().find('.active').removeClass('active');
       $(this).find('a').addClass('active');
      });	
   </script><!--active in sidebar-->
   <script>
      $('#test1').click(function(){
        $('#main').find('.active').addClass('d-none');
        $('#main').find('.active').removeClass('active');
        $('#content1').removeClass('d-none');
        $('#content1').addClass('active');
        $.ajax({
            url:'ajax.php',
            type:'post',
            data:{ajax:'test1'},
      	  dataType:"json", 
            success: function(data){
              $('#content1 .natije a').text(data);
      		$('#content1 .title').text('تعداد کل اعضا با استفاده از دستورات mysql (نمایش در صفحه با ایجکس):');
            }//success  
            });//ajax  
       });
   </script><!--test1-->
   <script>
      $('#test4').click(function(){
        $('#main').find('.active').addClass('d-none');
        $('#main').find('.active').removeClass('active');
        $('#content1').removeClass('d-none');
        $('#content1').addClass('active');
        $.ajax({
            url:'ajax.php',
            type:'post',
            data:{ajax:'test4'},
      	  dataType:"json", 
            success: function(data){
              $('#content1 .natije a').text(data);
      		$('#content1 .title').text(' تعداد اعضایی که نام خانوادگی آنها با حرف "ب" شروع میشود با استفاده از دستورات php (نمایش در صفحه با ایجکس):');
            }//success  
            });//ajax  
       });
   </script><!--test4-->
   <script>
      $('#test7').click(function(){
       $.ajax({
            url:'ajax.php',
            type:'post',
            data:{ajax:'test7'},
      	  dataType:"json", 
            success: function(data){
      	   $('#exampleModal table tbody').empty();
             $.each(data[1],function(index,value){
      		   $('#exampleModal table tbody').append('<tr><td>'+value[0]+'</td><td>'+value[2]+'</td></tr>')	
      		});//each
      	}//success  
            });//ajax  
       });
   </script><!--test7-->
</html>
//
