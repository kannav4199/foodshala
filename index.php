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

    <div class="conatiner-fluid" id="main">
        
        <div class="tagline">Good Food is Good Mood</div>

        <h1>WELCOME :)</h1>
 
    <br>
    
    <h2>Feeling Hungry?</h2>
    <center><a class="btn btn-success btn-lg" href="foodlist.php" role="button" > Order Now </a></center>
    </div>

    

<footer>
  <span><a href="https://kannav4199.github.io">kannav4199.github.io</a> © 2020.<br><span>
</footer>

  
</body>
</html>