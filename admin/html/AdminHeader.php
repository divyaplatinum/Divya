<?php
  //session_start();
  if(!isset($_SESSION['id']))
  {       
    header("location:Logout.php");    
  }
  ?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
.name { 
  font-family: sans-serif;
  color: white;
  text-shadow: 
    1px 1px 8px black,  
    1.5em .4em 10vw orange, 
    0 0 10vw gold;
  font-size: 03vw;
  }
  .logout { 
  font-family: sans-serif;
  color: white;
  text-shadow: 
    1px 1px 8px black,  
    1.5em .4em 10vw orange, 
    0 0 10vw gold;
  font-size: 02vw;
  }
</style>
  </head>
  <body>
    <?php 
	

	     require '../Classes/config.php';
        //$con = mysqli_connect('localhost','root', 'root123', 'task');
      
        $myId=$_SESSION['id'];
		
       

		
		  $sql = "SELECT * FROM admin WHERE admin_id = '".$myId."'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
         $fname = $row["admin_name"];
    }
}
		
		
		
		
		
		
		    //$fname = $row['admin_name'];
			 //$_SESSION['id'] = $row['admin_id'];
      
  ?>
    <header>
       <nav class="navbar navbar-expand-lg navbar-light text-light py-3 main-nav" style="background-color: #2d5bb1;">
          <div class="container">
            <a class="navbar-brand" href="index.html">  <a href="AdminHome.php" class="logo"><img src="<?php echo "$imagePath";?>" style="border-radius:50%; margin-right: 25px;height: 70px;width: 65px;" ></a></a>
              <a class="name" ><?php echo "Admin  ". $fname; ?> </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto"> 

				    
				  
				
				
				
                   <li class="nav-item">   
                     <a class="logout" href="Logout.php">Logout</a>
                  </li>				   

				
                 
				  
				  
                </ul>
              </div>
          </div>
        </nav>
    </header>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    
    <script src="js/custom.js"></script>
  </body>
</html>