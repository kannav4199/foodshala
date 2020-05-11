<?php
session_start();
require 'connection.php';
$conn = Connect();
if(!isset($_SESSION['login_user2'])){
header("location: customerlogin.php"); 
}

if(empty($_SESSION["cart"]))
{
 header("location:foodlist.php");
}
?>

<html>

<?php
$r="";
if(isset($_POST["add"]))
{
if(isset($_SESSION["cart"]))
{

	$r=$_POST["hidden_RID"];
$item_array_id = array_column($_SESSION["cart"], "food_id");
if(!in_array($_GET["id"], $item_array_id))
{
$count = count($_SESSION["cart"]);

$item_array = array(
'fid' => $_GET["id"],
'fname' => $_POST["hidden_name"],
'fprice' => $_POST["hidden_price"],
'rusername' => $_POST["hidden_RID"],
'quantity' => $_POST["quantity"]
);
$_SESSION["cart"][$count] = $item_array;
echo '<script>window.location="cart.php"</script>';
}
else
{
echo '<script>alert("Products already added to cart")</script>';
echo '<script>window.location="cart.php"</script>';
}
}
else
{
$item_array = array(
'fid' => $_GET["id"],
'fname' => $_POST["hidden_name"],
'fprice' => $_POST["hidden_price"],
'rusername' => $_POST["hidden_RID"],
'quantity' => $_POST["quantity"]
);
$_SESSION["cart"][0] = $item_array;
}
}


if(!empty($_SESSION['cart'])){
if(isset($_POST['checkout']))
{

$hostname="localhost";
$user_name="root";
$password="stark";
$db="foodshala";
$con=mysqli_connect($hostname,$user_name,$password,$db);


$total=0;
foreach($_SESSION["cart"] as $keys => $values)
{


$q="INSERT  INTO ORDERSS (fid,username,rusername,fname,fprice,quantity,datwtime) VALUES ( '".$values['fid'] ."', ' ".$_SESSION['login_user2']." ', '" .$values['rusername'] ." ', ' " .$values['fname']."','". $values['fprice']."', ' ".$values['quantity']."',now()  )";

if(mysqli_query($con,$q)){

unset($_SESSION["cart"][$keys]);
echo "<script>alert(Order placed);</script>" ;
echo '<script>window.location="orders.php"</script>';
}

else
	echo "<script>alert(Order not placed);</script>";

$total = $total + ($values["quantity"] * $values["fprice"]);

 }

}

}

if(isset($_GET["action"]))
{
if($_GET["action"] == "delete")
{
foreach($_SESSION["cart"] as $keys => $values)
{
if($values["fid"] == $_GET["id"])
{
unset($_SESSION["cart"][$keys]);
echo '<script>alert("Food has been removed")</script>';
echo '<script>window.location="cart.php"</script>';
}
}
}
}

if(isset($_GET["action"]))
{
if($_GET["action"] == "empty")
{
foreach($_SESSION["cart"] as $keys => $values)
{

unset($_SESSION["cart"]);
echo '<script>alert("Cart is made empty!")</script>';
echo '<script>window.location="cart.php"</script>';

}
}
}


?>

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
           <li class="nav-item nav-link"><a href="orders.php"><span class="glyphicon glyphicon-user"></span> Orders </a></li>
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


    
<?php
if(!empty($_SESSION["cart"]))
{
  ?>
  <div id="form">
  <div class="container">
      
        <h1>Your Shopping Cart</h1>
        <p>Looks tasty...!!!</p>
        
      
      
    </div>
    <div class="table-responsive" style="padding-left: 100px; padding-right: 100px;" >
<table class="table table-striped">
  <thead class="thead-dark">
<tr>
<th width="20%">Food Name</th>
<th width="20%">Restaurant</th>

<th width="10%">Quantity</th>
<th width="20%">Price Details</th>
<th width="15%">Order Total</th>
<th width="5%">Action</th>
</tr>
</thead>


<?php  
$rr="";
$total = 0;
foreach($_SESSION["cart"] as $keys => $values)
{
?>
<tr>
<td><?php echo $values["fname"]; ?></td>
<td><?php $rr=$values["rusername"]; echo $values["rusername"]; ?></td>

<td><?php echo $values["quantity"] ?></td>
<td>&#8377; <?php echo $values["fprice"]; ?></td>
<td>&#8377; <?php echo number_format($values["quantity"] * $values["fprice"], 2); ?></td>
<td><a href="cart.php?action=delete&id=<?php echo $values["fid"]; ?>"><span class="text-danger">Remove</span></a></td>
</tr>

<?php 
$total = $total + ($values["quantity"] * $values["fprice"]);

}

?>
<tr>
<td colspan="3" align="right">Total :</td>
<td align="right">&#8377; <?php echo number_format($total, 2); ?></td>
<td></td>
</tr>
</table>
<?php
  echo '<a href="cart.php?action=empty"><button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Empty Cart</button></a>&nbsp;<a href="foodlist.php"><button class="btn btn-warning">Continue Shopping</button></a>&nbsp;
<form method="POST" action="">
  <button class="btn btn-success pull-right" type="submit" value="checkout" name="checkout"><span class="glyphicon glyphicon-share-alt"></span> Check Out</button></a>
  </form>';
?>
</div>
<br><br><br><br><br><br><br>
<?php

}


?>


</div>


<footer>
  <span><a href="https://kannav4199.github.io">kannav4199.github.io</a> © 2020.<br><span>
</footer>



    </body>
</html>