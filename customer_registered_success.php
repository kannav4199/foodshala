<html>

 <head>
    <title>Customer Registered</title>

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
$address = $conn->real_escape_string($_POST['address']);
$password = $conn->real_escape_string($_POST['password']);
$cat=$conn->real_escape_string($_POST['category']);


$query = "INSERT into CUSTOMER(fullname,username,email,contact,address,password,category) VALUES('" . $fullname . "','" . $username . "','" . $email . "','" . $contact . "','" . $address . "','" . $password ."','" .$cat . "')";
$success = $conn->query($query);

if (!$success){
	?>

  <h1 style="text-align: center;"><?php echo "username $username Already exists !";

die();
}

$conn->close();

?>


<div class="container" id="main">
	<div class="jumbotron" style="text-align: center;">
		<h2> <?php echo "Welcome $fullname!" ?> </h2>
		<h1>Your account has been created.</h1>
		<p>Login Now from <a href="customerlogin.php">HERE</a></p>
	</div>
</div>

    

<footer>
  <span><a href="https://kannav4199.github.io">kannav4199.github.io</a> © 2020.<br><span>
</footer>

  
    </body>
</html>