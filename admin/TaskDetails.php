<?php session_start(); 
if(!isset($_SESSION['id'])) // admin check
{
  session_destroy();
  header("location:Logout.php");    
}?>
<!DOCTYPE html>
<html>
<head>
  <title>Task Details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="Slide Login Form template Responsive, Login form web template, Flat Pricing tables, Flat Drop downs Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
  <!-- <script>
    
    addEventListener("load", function () {
      setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script> -->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>

  <!-- Custom Theme files -->
  <link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
  <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
  <!-- //Custom Theme files -->

  <!-- web font -->
  <link href="//fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">
  <!-- //web font -->

  
  <style type="text/css">

  table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
  }

  td {
    text-align: left;
    padding: 8px;
    background-color: #d6cece;
  }

  tr:nth-child(even) {
    background-color: red;
  }
  table tr td:first-child{ border-top-left-radius: 25px;
    border-bottom-left-radius: 5px;}
    table tr td:third-child{ width: 600px;}
    table tr td:last-child{ border-top-right-radius: 5px;
      border-bottom-right-radius: 25px;}

      div.field {

        width: 540px;
        height: 318px;
        overflow:auto; 
       
      }

    </style>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">

/* //function to save comments in the DB */

/*tiny mc comment box*/
      tinymce.init({
        selector: "#comment",
        setup: function (editor) { 
          editor.on('change', function () {
            tinymce.triggerSave();
          });
        }
      });
/* // tiny mc comment box*/

    </script>
  </head>
  <body >
    <?php
   
      include("html/AdminHeader.php");  // some files include
      include("html/Sidebar.html");

      $task_id=$_REQUEST['task_id'];
      //$myId=$_SESSION['admin_id'];

     
	  
	   $sql = "SELECT * FROM projecttask where taskid='$task_id'";
      
      $result = mysqli_query($con,$sql);
	  
		
        $row = mysqli_fetch_array($result);
      
        $taskName=$row["taskname"];
        $taskdescription=trim($row["taskdescription"]);
    
        $taskStatus=$row["taskstatus"];

      if($taskStatus==1)
	  {
		  $tname='Open';
	  }
	  else
	  {
		   $tname='Close';
	  }
            

      ?>
      <!-- task details shown here -->
      <div class="w6layouts-main"> 
        <div class="seeprofile-layer">
            
           
          <h1> Task Details-CurrentStatus</h1>
          <div class="header-main1">

      
           

            <div class="header-left-bottom">     
              <div class="icon1">
                <span class="fa fa-user"></span>
                Task Name :<?php echo $taskName; ?>                           
              </div>  
              
              <div class="icon1" style="margin-bottom:20px;">
                <span class="fa fa-user"></span>
                Task Description :<?php echo $taskdescription; ?>                           
              </div>  

              <?php if($row["taskstatus"]==1)
             { ?>
           <div class="icon1"><span class="fa fa-user"></span> Status :<?php echo "Open" ;?> </div>  
           
            <?php }  else
            {
            ?>
              <div class="icon1"><span class="fa fa-user"></span> Status : <?php echo "Close" ;?></div>  

            <?php } ?>
            
             
            <div class="bottom">
           <button class="btn"  style=" float:right;"type="button" name="back"><a href="AdminHome.php" style="color: white;">Home</a></button>
           </div><br>
            
              
            </div> 

			
            
          </div>
         
        </div>  
      </div>


  </body>
</html>