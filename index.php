<!DOCTYPE html>
<html>
<head>
<title>Index</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="Slide Login Form template Responsive, Login form web template, Flat Pricing tables, Flat Drop downs Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

	 <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>

	<!-- Custom Theme files -->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
	<!-- //Custom Theme files -->

	<!-- web font -->
	<link href="//fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">
	<!-- //web font -->

</head>
<body>

<!-- main -->
<div class="w3layouts-main"> 
	<div class="bg-layer">
		<h1 style="color: white;text-shadow: 1px 1px 8px black;">Employee Login here..</h1>
		<div class="header-main">
			<div class="main-icon">
				<span class="fa fa-eercast"></span>
			</div>
			<div class="header-left-bottom">
				   <form action="" method="post">
					<div class="icon1">
						<span class="fa fa-user"></span>
						<input type="email" placeholder="Email Address" name="email"  required=""/>
					</div>
					<div class="icon1">
						<span class="fa fa-lock"></span>
						<input type="password" placeholder="Password" name="password" required=""/>
					</div>
			       
					<div class="bottom">
						
						 <input  class="btn" type="submit" value="Login" name="but_submit" id="but_submit" />
					</div>
				
				</form>	
			</div>
		</div>
		
	</div>
</div>	
<!-- //main -->

<?php
          session_start();
	   
		   require 'Classes/config.php';
		  
          if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
            header("location: user/UserHome.php");
           exit;
        }
         
	
    if(isset($_POST['but_submit'])){
		

    $email = $_POST["email"]; 
    $password = $_POST["password"];
   
	

    if ($email != "" && $password != ""){

        $sql_query = "select count(*) as cntUser,emp_id ,emp_fname from employee where emp_email='".$email."' and emp_password='".$password."'";
        $result = mysqli_query($con,$sql_query);
		
        $row = mysqli_fetch_array($result);
		
		
		

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['ename'] = $row['emp_fname'];
			 $_SESSION['id'] = $row['emp_id'];
			 $_SESSION["loggedin"]=true;
           header("location: emp/empHome.php");
		   
		  
        }else{
            echo "Invalid username and password";
        }

    }

}
?>

</body>
</html>