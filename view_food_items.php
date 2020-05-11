 <?php
include('session_m.php');

// Storing Session
$user_check=$_SESSION['login_user1'];


$hostname="localhost";
$user_name="root";
$password="stark";
$db="foodshala";
$con=mysqli_connect($hostname,$user_name,$password,$db);


if(!isset($login_session)){
header('Location: restaurantlogin.php'); 
}


if(isset($_GET['fid'])){


	$id=$_GET['fid'];
	$q=mysqli_query($con,"select * from RESTAURANT inner join FOOD on RESTAURANT.username=FOOD.rusername where RESTAURANT.username='$user_check'  ");
    $res=mysqli_fetch_assoc($q);
    $e=$res['rusername'];
    $img=$res['fimg'];
	//unlink("image/restaurant/$e/foodimages/$img");
	if(mysqli_query($con,"delete  from  FOOD where fid='$id' "))
     {
	
	
       ?>
       <script >alert("<?php $res['fname'] ?> deleted");</script>
       
 
<?php
//header("location:view_food_items.php");
	
     }
  else
    {
	echo "failed to delete";
     }
	
}




?>
<!DOCTYPE html>
<html>

  <head>
    <title>FOODSHALA</title>

    <?php include 'links.php' ?>
   <link rel="stylesheet" type="text/css" href="style.css">
  </head>

  
  <body>



    <nav class="navbar navbar-expand-lg navbar-light bg-light mynav" >
       <div class="container-fluid">
        <a href="index.php" class="navbar-brand">FOODSHALA</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMenu">
         <ul class="nav navbar-nav text-center ml-auto">
           <li class="nav-item  nav-link active" ><a href="index.php" >Home</a></li>       
           <li class="nav-item nav-link"><a href="contact.php">Contact Us</a></li>
         <li class="nav-item nav-link"><a href="foodlist.php">Menu</a></li>
         
           <li class="nav-item nav-link">
        <a href="index.php"></span> Welcome <?php echo $_SESSION['login_user1']; ?> </a></li>
            <li class="nav-item nav-link"><a href="myrestaurant.php">MANAGER CONTROL PANEL</a></li>
             <li class="nav-item nav-link"><a href="logout_m.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
           </ul>
        </div>

      </div>
    </nav>


<div id="form">
 <div class="container"> 
			 <table border="1" bordercolor="#F0F0F0" cellpadding="20px">
			 <th>food Image</th>
			 <th>food name</th>
			 <th>food Price</th>
			 <th>food Description </th>
			 <th>Food Category </th>
			 <th>Delete Item   </th>
			 
			   <?php

					  if($query=mysqli_query($con,"select * from RESTAURANT inner join FOOD on RESTAURANT.username=FOOD.rusername where RESTAURANT.username='$user_check' "))
					  {
						  if(mysqli_num_rows($query))
						  {
						 while($row=mysqli_fetch_array($query))
						 {
							 
							 ?>
			     <tr>
				 				 
				<td><img src="<?php echo 'image/restaurant/'.$user_check.'/foodimages/'.$row['fimg'];?>" height="100px" width="150px"></td>
				<td style="width:150px;"><?php  echo $row['fname']."<br>";?></td>
				<td align="center" style="width:150px;"><?php  echo $row['fprice']."<br>";?></td>
				<td  align="center" style="width:150px;"><?php  echo $row['fdescription']."<br>";?></td>
				<td align="center" style="width:150px;"><?php  echo $row['fcat']."<br>";?></td>
				
				<td align="center" style="width:150px;">
				
				<a href="view_food_items.php?fid=<?php echo $row['fid'];?>"><button type="button" class="btn btn-warning" value="delete" name="delete">Delete </button></a>
				
				</td>
				
				</tr>
				
				<?php 
					
                    $foodname="";
                    $foodprice="";
                    $foodcategory="";					
                    $fooddecription="";					
						 
						 }
					  }
					  else 
						  
						  {
							   $msg="please add some Items";
						  }
					  }
					  else 
					  {
						  echo "failed";
					  }
					  
					  ?>
			 </table>
			 </div>    	 

			</div>


<footer>
  <span><a href="https://kannav4199.github.io">kannav4199.github.io</a> © 2020.<br><span>
</footer>

  </body>
</html>