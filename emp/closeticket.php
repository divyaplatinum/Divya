<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<?php session_start(); 
if(!isset($_SESSION['id'])) //check admin
{
  session_destroy();
  header("location:Logout.php");    
}?>
<!DOCTYPE html>
<html>
<head>
	<title>Close Finished Ticked </title>

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
	<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
	<!-- //Custom Theme files -->

	<!-- web font -->
	<link href="//fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">
	<!-- //web font -->
	<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

	<script> 
		//tinymce include for task details
		tinymce.init({
			selector: '#mytextarea'
		});
	</script>

</head>
<body>
	<?php 
	
	include("html/Header.php"); // include header
    

	?>
	<div class="w5layouts-main"> 
		<div class="updateprofile-layer">
			<h1>Close Task </h1> 
			<div class="header-main1">
				
				<div class="header-left-bottom">
					<form action="#" method="post">	
							

						<div class="icon1">
						
						
						<div class="icon1">
							<span class="fa fa-user"></span>
							Priority Level: <select name="status" id="status" style="width:200px;" > 
							<option value="0">Close</option>	      
							

							</select>
						</div>	
						
						

						 <div class="bottom">
                            <input  type="submit" class="btn" name="assign" value="Assign" />
                         </div>

					</form>			

					

						<div class="bottom">
							<button class="btn"  style=" float:right;"type="button" name="back"><a href="empHome.php" style="color: white;">Home</a></button>
						</div>
					
				</div>
			</div>	
		</div>
	</div>	
	<!-- //main -->
	<?php

	if(isset($_POST['assign'])) // onset assign button 
	{
   $status = $_POST['status']; // get above form details in variable
   $sid = $_REQUEST['sid'];
  
   
               print_R( $sid );
  
		$sql_res ="Update scheduletask set schstatus='0' where sid='$sid'";
		
		 

         if(mysqli_query($con,$sql_res)) 
        {
          
           echo "Close record  successfully";     
         
         
       }
	   else
       {
         echo "not added";
       }
       
  
  


	}
	?>
</body>
</html>

