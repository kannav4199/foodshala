<?php
session_start();



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


     

<div id="form">
  <div class="container text-center">
    <h1 style="padding-bottom: 30px;">Welcome To FOODSHALA :)</h1>      
    </div>





<div class="container" style="width:95%;">

<!-- Display all Food from food table -->
<?php

require 'connection.php';
$conn = Connect();

$sql = "SELECT * FROM FOOD INNER JOIN RESTAURANT ON FOOD.rusername=RESTAURANT.username ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) != 0)
{
  $count=0;
  if($count==0)
    echo "<div class='row'>";

  while($row = mysqli_fetch_assoc($result)){
   

  
     $food_pic= "image/restaurant/".$row['rusername']."/foodimages/".$row['fimg'];

?>


<div class="col-lg-6 col-sm-12 justify-content-center  content-center" style="height: 45%;padding-bottom: 20px;">

<form method="post" action="cart.php?action=add&id=<?php echo $row["fid"]; ?>" style="height: 35%;">
  <div class="column">
<div class="card " style="width: 18rem;">

<h4 class="card-title"><?php echo $row["rname"]; ?></h4>
  
  <img class="card-img-top img-responsive " style="width: 100%; height: 18rem; " src="<?php echo $food_pic; ?>" alt="Food image">
  <div class="card-body">
    <h4 class="card-title"><?php echo $row["fname"]; ?></h4>
    <h5 class="card-title">(<?php echo $row["fcat"]; ?>)</h4>
    
    <p class="card-text">"<?php echo $row["fdescription"]; ?>"</p>
    <input type="hidden" name="hidden_name" value="<?php echo $row["fname"]; ?>">
    <input type="hidden" name="hidden_price" value="<?php echo $row["fprice"]; ?>">
      <?php 
    if(isset($_SESSION['login_user2']) && (!isset($_SESSION['login_user1'])))
    { 
      ?>

    <h5 class="text-info">Quantity: <input type="number" min="1" max="25" name="quantity" class="form-control" value="1" style="width: 60px; padding: auto;margin:auto;"> </h5>
    <input type="hidden" name="hidden_RID" value="<?php echo $row["rusername"]; ?>">
    <input type="submit" name="add" style="margin-top:5px;" class="btn btn-success" value="Add to Cart">
  <?php 
  }
   else if(!isset($_SESSION['login_user2']) && (!isset($_SESSION['login_user1'])))
    { 
      ?>

    <h5 class="text-info" style="left:0;">Quantity:<input type="number" min="1" max="25" name="quantity" class="form-control" value="1" style="width: 60px;padding: auto;margin:auto;"> </h5>
    <input type="hidden" name="hidden_RID" value="<?php echo $row["rusername"]; ?>">
    <input type="submit" name="add" style="margin-top:5px;" class="btn btn-success" value="Add to Cart">
  <?php 
  }
  ?>
  </div>
</div>
</div>


</form>
    
  </div>   


<?php
$count++;
if($count==4)
{
  // echo "</div>";
  $count=0;
}
 }
?>
</div>
</div>
</div>
<?php
}
else
{
  ?>

  <div class="container">
    <div class="jumbotron">
      <center>
         <label style="margin-left: 5px;color: red;"> <h1>Oops! No food is available.</h1> </label>
        <p>We will Be right back  </p>
      </center>
       
    </div>
  </div>
</div>
  <?php

}

?>
</div>
<footer>
  <span><a href="https://kannav4199.github.io">kannav4199.github.io</a> © 2020.<br><span>
</footer>

   
</body>
</html>