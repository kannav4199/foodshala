    <?php
include('login_u.php'); 

if(isset($_SESSION['login_user2'])){
header("location: foodlist.php"); 
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Customer Login</title>

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
    <div id="form">
    <div class="container">
    
     <h1>Hi Guest,<br> Welcome to <span class="edit">FOODSHALA </span></h1>
     <br>
   <p>Kindly LOGIN to continue.</p>
   

    <div class="container" style="margin-top: 4%; margin-bottom: 2%;">
      <div class="col-md-5 col-md-offset-4">
        <label style="margin-left: 5px;color: red;"><span> <?php echo $error;  ?> </span></label>
      <div class="panel panel-primary">
        
        <div class="panel-body">
          
        <form action="" method="POST">
          
        <div class="row">
          <div class="form-group col-xs-12">
            <label for="username"><span class="text-danger" style="margin-right: 5px;">*</span> Username: </label>
            <div class="input-group">
              <input class="form-control" id="username" type="text" name="username" placeholder="Username" required autofocus="">
              
              </span>
            </div>           
          </div>
        </div>

        <div class="row">
          <div class="form-group col-xs-12">
            <label for="password"><span class="text-danger" style="margin-right: 5px;">*</span> Password: </label>
            <div class="input-group">
              <input class="form-control" id="password" type="password" name="password" placeholder="Password" required>
              
            </div>           
          </div>
        </div>

        <div class="row">
          <div class="form-group col-xs-4">
              <button class="btn btn-primary" name="submit" type="submit" value=" Login ">Submit</button>
          </div>

        </div>
        <label style="margin-left: 5px;">or</label> <br>
       <label style="margin-left: 5px; color: green !important;"><a href="customersignup.php">Create a new account.</a></label>

        </form>
        </div>     
      </div>      
    </div>
    </div>
</div>
</div>


    <footer style="width: 100% !important;">
  <span><a href="https://kannav4199.github.io">kannav4199.github.io</a> © 2020.<br></span>
</footer>

    </body>
</html>