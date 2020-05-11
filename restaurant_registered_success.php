<html>

   <head>
    <title>Restaurant Registered</title>

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


       </div>

      </div>
    </nav>

<?php

require 'connection.php';
$conn = Connect();

$fullname = $conn->real_escape_string($_POST['fullname']);
$username = $conn->real_escape_string($_POST['username']);
$email = $conn->real_escape_string($_POST['email']);
$contact = $conn->real_escape_string($_POST['contact']);
$rname=$conn->real_escape_string($_POST['rname']);
$address = $conn->real_escape_string($_POST['address']);
$password = $conn->real_escape_string($_POST['password']);

$query = "INSERT into RESTAURANT(fullname,username,email,contact,rname,address,password) VALUES('" . $fullname . "','" . $username . "','" . $email . "','" . $contact . "','" . $rname . "','" . $address ."','" . $password ."')";
$success = $conn->query($query);

if (!$success){
	
?>

  <h1 style="text-align: center;"><?php echo "username $username Already exists";
  die();
}

$conn->close();

?>

<div id="form">
<div class="container">
	<div class="jumbotron" style="text-align: center;">
		<h2> <?php echo "Welcome $fullname!" ?> </h2>
		<h1>Your account has been created.</h1>
		<p>Login Now from <a href="restaurantlogin.php">HERE</a></p>
	</div>
</div>

</div>
    

<footer>
  <span><a href="https://kannav4199.github.io">kannav4199.github.io</a> © 2020.<br><span>
</footer>

  

    </body>
</html>