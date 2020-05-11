<?php
session_start();
require 'connection.php';
$conn = Connect();
if(!isset($_SESSION['login_user2'])){
header("location: customerlogin.php"); 
}




$hostname="localhost";
$user_name="root";
$password="stark";
$db="foodshala";
$con=mysqli_connect($hostname,$user_name,$password,$db);



if(isset($_GET['oid'])){


  $oid=$_GET['oid'];
  $q=mysqli_query($con,"select * from ORDERSS  where oid='$oid' ");
    $res=mysqli_fetch_assoc($q);
    $e=$res['rusername'];
    
  //unlink("image/restaurant/$e/foodimages/$img");
  if(mysqli_query($con,"delete  from  ORDERSS where oid='$oid' "))
     {
  
  
       ?>
       <script >alert(" cancelled :( ");</script>
       
 
<?php
//header("location:view_food_items.php");
  
     }
  else
    {
  echo "failed to delete";
     }
  
}

// if($_POST['submit'])
// {
  

// $hostname="localhost";
// $user_name="root";
// $password="stark";
// $db="foodshala";
// $con=mysqli_connect($hostname,$user_name,$password,$db);
// $q="delete * from orderss where username=".$_SESSION['login_user2']." ";

//   //echo $del;
//   if(mysqli_query($con,$q))
//   {
//     

//     header("location:orders.php");
//   }
  
// }
// unset($_SESSION["cart"]);
?>

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
           <li class="nav-item nav-link"><a href="foodlist.php"><span class="glyphicon glyphicon-cutlery"></span> Menu </a></li>
           
           
       
<?php
if(isset($_SESSION['login_user1'])){

?>


     <li class="nav-item nav-link">
  <a href="restaurantupdate.php"></span> Welcome <?php echo $_SESSION['login_user1']; ?> </a></li>
      <li class="nav-item nav-link"><a href="myrestaurant.php">MANAGER CONTROL PANEL</a></li>
       <li class="nav-item nav-link"><a href="logout_m.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
  
<?php
}
else if (isset($_SESSION['login_user2'])) {
  ?>

           <li class="nav-item nav-link"><a href="updateuser.php"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_user2']; ?> </a></li>
           <li class="nav-item nav-link active"><a href="orders.php"><span class="glyphicon glyphicon-user"></span> Orders </a></li>
              <li class="nav-item nav-link"><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart
              (<?php
              if(isset($_SESSION["cart"])){
              $count = count($_SESSION["cart"]); 
              echo "$count"; 
            }
              else
                echo "0";
              ?>)
             </a></li>
             <li class="nav-item nav-link"><a href="logout_u.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
          
  <?php        
}
else {

  ?>


        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Login
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="customerlogin.php">User Login</a>
          <a class="dropdown-item" href="restaurantlogin.php">Restaurant Login</a>
        </div>

        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Signup
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="customersignup.php">User Signup</a>
          <a class="dropdown-item" href="restaurantsignup.php">Restaurant Signup</a>
        </div>
          
          </ul>

<?php
}
?>
       </div>

      </div>
    </nav>


<div id="form">

        
            <h1 class="text-center" style="color: green;"><span class="glyphicon glyphicon-ok-circle"></span> Orders !! :)</h1>
         
        <br>

<h2 class="text-center pb-4"> Thank you for Ordering at FOODSHALA! The ordering process is now complete.</h2>


<table class="table table-striped" style="width: 80%;align-items: center; justify-content: center;padding: auto; margin:auto;">
  <thead class="thead-dark">
<tr>
  <th width="10%">Order ID</th>
<th width="20%">Food Name</th>
<th width="20%">Restaurant</th>

<th width="10%">Quantity</th>
<th width="15%">Price Details</th>
<th width="15%">Total</th>
<th width="20%">Date and Time</th>
<th width="10%">Cancel Order</th>



</tr>
</thead>

<?php

$sql = "SELECT * FROM ORDERSS WHERE username=' ".$_SESSION['login_user2']."' ORDER BY oid DESC";
$result = $con->query( $sql) or die($con->error);

$total=0;

  while($row = $result-> fetch_assoc()){
   
?>
<tr>
  <td><?php echo $row['oid']  ?></td>
<td><?php echo $row['fname'] ?></td>
<td><?php echo $row['rusername'] ?></td>

<td><?php echo $row['quantity'] ?></td>
<td>&#8377; <?php echo $row['fprice'] ?></td>
  <td>&#8377; <?php $total=$row['fprice']*$row['quantity']; echo $total  ?></td>
  <td><?php  echo $row['datwtime']  ?></td>

      <td>  <a href="orders.php?oid=<?php echo $row['oid'];?>"><button type="button" class="btn btn-warning" value="delete" name="delete">Cancel </button></a>
        </td>
</tr>


<?php
}

?>
</table>

</div>
<footer>
  <span><a href="https://kannav4199.github.io">kannav4199.github.io</a> © 2020.<br><span>
</footer>

   
        </body>

</html>