<?php
include('session_m.php');

if(!isset($login_session)){
header('Location: restaurantlogin.php'); // Redirecting To Home Page
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
        <a href="restaurantupdate.php"></span> Welcome <?php echo $_SESSION['login_user1']; ?> </a></li>
            <li class="nav-item nav-link"><a href="myrestaurant.php">MANAGER CONTROL PANEL</a></li>
             <li class="nav-item nav-link"><a href="logout_m.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
           </ul>
        </div>

      </div>
    </nav>



<div id="form">
<div class="container">
    
     <h1 style="text-align: center;"><?php echo "$rname"; ?>
     <p style="padding-top: 20px;">Manage all Your Work from here !!</p>


    
    	<div class="col-xs-3" style="text-align: center; ">

    	<div class="list-group">
    		
    		<a href="view_food_items.php" class="list-group-item ">View Food Items</a>
    		<a href="add_food_items.php" class="list-group-item ">Add Food Items</a>
    		<!-- <a href="edit_food_items.php" class="list-group-item ">Edit Food Items</a>
    	 -->	<a href="restaurantorders.php" class="list-group-item ">ORDERS</a>
    	</div>
    </div>
    


</div>
</div>

    

<footer>
  <span><a href="https://kannav4199.github.io">kannav4199.github.io</a> © 2020.<br><span>
</footer>



  </body>
</html>