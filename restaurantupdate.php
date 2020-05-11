<?php
session_start();
include 'connection.php';

if(!isset($_SESSION['login_user1'])){
header("location: restaurantlogin.php"); 
}


$con=mysqli_connect("localhost","root","stark","FOODSHALA");


$query=mysqli_query($con,"select * from RESTAURANT where username='".$_SESSION['login_user1']."'");
if(mysqli_num_rows($query))
{   $un=$_SESSION['login_user1'];
  
}

if(isset($_POST['submit']))
{

$up="update restaurant set fullname='".$_POST['fullname']."' , email='".$_POST['email']."' , contact='".$_POST['contact']."', address='".$_POST['address']."',password='".$_POST['password']."',rname='".$_POST['rname']."'   where username='".$_SESSION['login_user1']."' ";

if($con->query($up))
{?>

  <script >alert("information updated, please login again");</script>
  <?php
  session_destroy();
  header("location:restaurantlogin.php");
}

          

}



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





<div class="container" style="width:95%; padding: auto;margin:auto;">

<h1>UPDATE your Information</h1>

  

 <form role="form" action="restaurantupdate.php" method="POST" style="padding: auto;margin:auto;">
         
          <div class="row">
          <div class="form-group col-xs-12">
            <label for="fullname"><span class="text-danger" style="margin-right: 5px;">*</span> Full Name: </label>
            <div class="input-group">
              <input class="form-control" id="fullname" type="text" name="fullname" placeholder="Your Full Name" required autofocus="">
              
            </div>           
          </div>
        </div>

        <div class="row">
          <div class="form-group col-xs-12">
            <label for="username"><span class="text-danger" style="margin-right: 5px;">*</span> Username: </label>
            <div class="input-group">
              <input class="form-control" id="username" type="text" name="username"  placeholder="<?php echo $un ?>"  value=<?php echo $un ?> required readonly />
              
            </div>           
          </div>
        </div>

        <div class="row">
          <div class="form-group col-xs-12">
            <label for="email"><span class="text-danger" style="margin-right: 5px;">*</span> Email: </label>
            <div class="input-group">
              <input class="form-control" id="email" type="email" name="email" placeholder="Email" required>
              
            </div>           
          </div>
        </div>

        <div class="row">
          <div class="form-group col-xs-12">
            <label for="contact"><span class="text-danger" style="margin-right: 5px;">*</span> Contact:+91- </label>
            <div class="input-group">
              <input class="form-control" id="contact" type="text" name="contact" placeholder="Contact" required max="9999999999" pattern="[0-9]{10}">
                           
            </div>           
          </div>
        </div>

        <div class="row">
          <div class="form-group col-xs-12">
            <label for="address"><span class="text-danger" style="margin-right: 5px;">*</span> Address: </label>
            <div class="input-group">
              <input class="form-control" id="address" type="text" name="address" placeholder="Address" required>
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
          <div class="form-group col-xs-12">
            <label for="rname"><span class="text-danger" style="margin-right: 5px;">*</span> Restaurant Name: </label>
            <div class="input-group">
             <input class="form-control" id="rname" type="text" name="rname" placeholder="Restaurant Name" required>
              
            </div>           
          </div>
        </div>
        
        
      
        <div class="row">
          <div class="form-group col-xs-4">
              <button class="btn btn-primary" type="submit" name="submit" value="submit">Submit</button>
          </div>

        </div>
        
        </form>

</div>

</div>
<footer>
  <span><a href="https://kannav4199.github.io">kannav4199.github.io</a> © 2020.<br><span>
</footer>

   
</body>
</html>