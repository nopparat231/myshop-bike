<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php include('h.php');?>
  </head>
  <body>
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <div class="col-md-12">
         <?php include('banner.php');?>
 <br>
</div>
  	
    
        	<?php include('navbar.php');?>
      
  
 
 <!--start show  product-->
 
 	
    <br>
    	<!-- categories-->
    	<div class="col-md-3">
        	<?php include('category.php');?>
        </div>
        <!-- product-->
        <div class="col-md-9">
         	<?php  include('prd-detail.php');?>
        </div>
        </div>
   </div>
</div> 
 <!--end show  product-->
 
 
 
 
 
  </body>
</html>
<?php include('f.php');?>