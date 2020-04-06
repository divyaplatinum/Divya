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
	<title>Schedule  Task </title>

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
	
	include("html/AdminHeader.php"); // include header
    

	?>
	<div class="w5layouts-main"> 
		<div class="updateprofile-layer">
			<h1>Schedule Task </h1> 
			<div class="header-main1">
				
				<div class="header-left-bottom">
					<form action="#" method="post">	
							

						<div class="icon1">
							<span class="fa fa-user"></span>
							 Project Task : <select name="projects" > 
								<?php 
								$sql = "SELECT * FROM projecttask where taskstatus=1";
                               $result = mysqli_query($con,$sql);  //box(drop down)
								while($row = mysqli_fetch_assoc($result)) 
								{       
									echo "<option value=".$row['taskid'].">".$row['taskname']."</option>";
								}
								?>

							</select>
						</div>	
						
						<div class="icon1">
							<span class="fa fa-user"></span>
							Priority Level: <select name="level" id="level" style="width:200px;" > 
							<option value="0">select</option>	      
							<option value="1">Low Priority</option>
							<option value="2">Medium Priority</option>	
							<option value="3">High Priority</option>	

							</select>
						</div>	
						
						<div class="icon1">
						<span class="fa fa-user"></span>
							Employee: <select name="emp" id="emp" style="width:200px;" > 
							
							</select>
						
					   </div>	
					   
					   <div class="icon1">
							<span class="fa fa-user"></span>
							Task DeadLine :<input type="datetime-local" placeholder="Dead Line" name="deadline" required=""/>
						</div>	

						 <div class="bottom">
                            <input  type="submit" class="btn" name="assign" value="Assign" />
                         </div>

					</form>			

					

						<div class="bottom">
							<button class="btn"  style=" float:right;"type="button" name="back"><a href="AdminHome.php" style="color: white;">Home</a></button>
						</div>
					
				</div>
			</div>	
		</div>
	</div>	
	<!-- //main -->
	<?php

	if(isset($_POST['assign'])) // onset assign button 
	{
   $projectid = $_POST['projects']; // get above form details in variable
   $level = $_POST['level'];
  
   $emp = $_POST['emp'];
   $date = $_POST['deadline'];
   $date1=Date('y-m-d', strtotime($date));

   //echo "$projectName";

    if ($_POST['projects']==null || $_POST['level']==null || $_POST['emp']==null) // empty field submission check
    {
     echo '<span style="color:red"> First Select TaskName& level<br></span>';
    } 
    
    else
    {
		$sql_res ="Update projecttask set taskstatus='0' where taskid='$projectid'";
		
		  mysqli_query($con,$sql_res);
		
          $sql ="INSERT INTO scheduletask(projectid,level,empid,deadline,schstatus)VALUES ('$projectid','$level','$emp','$date1','1')";

         if(mysqli_query($con,$sql)) 
        {
          
           echo "New record created successfully";     
         
         
       }
	   else
       {
         echo "not added";
       }
       
    }
  mysqli_close($con);


	}
	?>
</body>
</html>

<script type="text/javascript">
                    $(document).ready(function(){
                       $('#level').change(function(){
						    var val=$(this).val();
							
							$.ajax({
                                    
                                     url: 'levelemp.php',
									 type:'POST',
                                     data: {level:val},
                                     dataType:'JSON',
                                   success:function(data) // post-submit callback 
                                    {
										
										
                                      
                                        var items = '<option value="">Select  Employee</option>';
                                        $.each(data,function(name,value) {
                                           items += "<option value='"+value.id+"'>"+value.name+"</option>";
                                        });
                                        
                                        $('#emp').html(items);
										
										 
										
										
										
										
                                    },
                                    error:function()
                                    {
                                        
                                        alert('Something went Refresh and try again');
                                    }  
                                });
					   });
					});
					</script>
