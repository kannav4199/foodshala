<?php
include('session_m.php');
include('connect.php');
if(!isset($login_session)){
header('Location: restaurantlogin.php'); 
}



// Storing Session
$user_check=$_SESSION['login_user1'];


$query=mysqli_query($conn,"select * from RESTAURANT   where username='$user_check' ");
if(mysqli_num_rows($query))
{   if(!file_exists("image/restaurant/$user_check/foodimages"))
  {
    mkdir("image/restaurant/$user_check/foodimages",0777,true);
  }
 
}

if(isset($_POST['submit'])){


if(!empty($_FILES['im']))
{


$fname =$_POST['fname'];
$fprice = $_POST['fprice'];
$fdescription =$_POST['fdescription'];
$fcat = $_POST['fcat'];
$image=$_FILES['im']['name'];
$avl = $_POST['available'];



   $in="insert into FOOD (rusername,fname,fprice,fdescription,fcat,fimg,available) values
        
        ('" . $user_check . "' , '" . $fname . "' , '" . $fprice . "' , '" . $fdescription . "' , '" . $fcat . "' , '$image', '" .$avl. "' ) " ;
        $success=mysqli_query($con,$in);
        //$success = $conn->query($in);
        
        if($success)
        {
           move_uploaded_file($_FILES['im']['tmp_name'],"image/restaurant/$user_check/foodimages/".basename($image));

           ?>

           <script>alert("Food Added :)")</script>
           <?php
        }
          else{
          echo "failed";
          $error = $_FILES['im']['error'];
          echo "$error";

        }
  
  
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
         
           <li class="nav-item nav-link">
        <a href="restaurantupdate.php"></span> Welcome <?php echo $_SESSION['login_user1']; ?> </a></li>
            <li class="nav-item nav-link"><a href="myrestaurant.php">MANAGER CONTROL PANEL</a></li>
             <li class="nav-item nav-link"><a href="logout_m.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
           </ul>
        </div>

      </div>
    </nav>


      <div id="form">


    
    <div class="col-xs-12">
      <div class="form-area" style="padding: 0px 100px 100px 100px;">
        <form action="add_food_items.php" method="POST" enctype="multipart/form-data" style="width: 40%;justify-content: center;align-content: center;margin:auto;">
        <br style="clear: both">
          <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> ADD NEW FOOD ITEM HERE </h3>

          <div class="form-group">
            <input type="text" class="form-control" id="name" name="fname" placeholder="Your Food name" required>
          </div>     

          <div class="form-group">
            <input type="text" class="form-control" id="price" name="fprice" placeholder="Your Food Price (INR)" required>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" id="description" name="fdescription" placeholder="Your Food Description" required>
          </div>

          <div class="form-group">
            <select name="fcat">
              <option value="Veg">Veg</option>
              <option value="NonVeg">Non-Veg</option>

            </select>
          </div>

         

          <div class="form-group">
            <label for="im">Choose Food Image:
             <input type="file"  name="im" placeholder="Your food pic" required/>
          </div>

           <div class="form-group">
            <select name="available">
              <option value="yes">Available</option>
              <option value="No">Out of Stock</option>

            </select>
          </div>

          <div class="form-group">
          <button type="submit" id="submit" name="submit" value="submit" class="btn btn-primary pull-right"> ADD FOOD </button>    
      </div>
        </form>

        
        </div>
      
    </div>
</div>
</div>

   

<footer>
  <span><a href="https://kannav4199.github.io">kannav4199.github.io</a> © 2020.<br><span>
</footer>

  </body>
</html>