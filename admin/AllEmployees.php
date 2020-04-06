<?php session_start(); 
if(!isset($_SESSION['id']))  // admin check
{
  session_destroy();
   header("location:Logout.php");   
}?>
<!DOCTYPE html>
<html>
<head>
	<title> All Employees</title>
   <link href="../css/smiletoggle.css" rel="stylesheet" type="text/css" media="all" />
	<style>
    body {
      background-image: url('../images/flies.jpg');
    }
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;

    }

    td {

      text-align: left;
      padding: 8px;
      background-color: #d6cece;
    }

    table tr:nth-child(even) {s
      background-color: red;
    }
    table tr td:first-child{ border-top-left-radius: 25px;
      border-bottom-left-radius: 5px;}
      table tr td:last-child{ border-top-right-radius: 5px;
        border-bottom-right-radius: 25px;}

        .button {
          border-radius: 8px;
          border: bold 17px Arial;
          text-decoration: none;
          background-color: #EEEEEE;
          color: #333333;
          padding: 2px 6px 2px 6px;
          border-top: 1px solid #CCCCCC;
          border-right: 2px solid #333333;
          border-bottom: 2px solid #333333;
          border-left: 1px solid #CCCCCC;
        }
        .button1 {
          border-radius: 8px;
          border: bold 17px Arial;
          text-decoration: none;
          background-color:#aae87c;
          color: #333333;
          padding: 2px 6px 2px 6px;
          border-top: 1px solid #CCCCCC;
          border-right: 2px solid #333333;
          border-bottom: 2px solid #333333;
          border-left: 1px solid #CCCCCC;
        }
        .button2 {
          border-radius: 8px;
          border: bold 17px Arial;
          text-decoration: none;
          background-color:#da6856;
          color: #333333;
          padding: 2px 6px 2px 6px;
          border-top: 1px solid #CCCCCC;
          border-right: 2px solid #333333;
          border-bottom: 2px solid #333333;
          border-left: 1px solid #CCCCCC;
        }
        .body
        {
          background-color: #9ccef8;
        }
        div.field {

          width: 700px;
          height: 318px;
          overflow: auto;
		  margin-bottom:800px;
        }

         .switch {
       position: relative;
       display: inline-block;
       width: 60px;
       height: 34px;
   }

   .switch input {
       opacity: 0;
       width: 0;
       height: 0;
   }

   .slider {
       position: absolute;
       cursor: pointer;
       top: 0;
       left: 0;
       right: 0;
       bottom: 0;
       background-color: red;
       -webkit-transition: .4s;
       transition: .4s;
   }

   .slider:before {
       position: absolute;
       content: "";
       height: 26px;
       width: 26px;
       left: 4px;
       bottom: 4px;
       background-color: white;
       -webkit-transition: .4s;
       transition: .4s;
   }

   input:checked + .slider {
       background-color: green;
   }

   input:focus + .slider {
       box-shadow: 0 0 1px #2196F3;
   }

   input:checked + .slider:before {
       -webkit-transform: translateX(26px);
       -ms-transform: translateX(26px);
       transform: translateX(26px);
   }

   /* Rounded sliders */
   .slider.round {
       border-radius: 34px;
   }

   .slider.round:before {
       border-radius: 50%;
   }
        
      </style>
     <!--  <script>
    
    addEventListener("load", function () {
      setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>
 -->

    </head>
    <body bgcolor="#9ccef8">
     <?php 
    include("html/AdminHeader.php"); // header include
    include("html/Sidebar.html"); // sidebar include
    $myId=$_SESSION['id']; // getting admin_id
    $sql = "SELECT * FROM employee ORDER BY emp_fname";
    $result = mysqli_query($con,$sql);
		
   //$row = mysqli_fetch_array($result);
   
    ?>
    <br><br>
    <div id="str"></div>
    <!-- All user details shown here -->
    <center><div id="field" class="field">
             <table style="margin-top:5px;">
			
			 <td>Employee Name</td>
			 <td>Task</td>
			 <td>Status</td>
			 <td>Role</td>
			 <td>ActivateDeactivateUser</td>
              
           	
        <?php
         
          while($row = mysqli_fetch_assoc($result)) {
            ?>
             
            <tr>
             
             <td align="center"><?php echo $row["emp_fname"]." ".$row["emp_lname"]; ?></td>
             <td><a href="TaskAssign.php?emp_id=<?php echo $row["emp_id"]; ?>" class="button"> TASK Details</a></td>
             <?php if($row["emp_status"]==1)
             { ?>
           <td style="color: green;"><?php echo "✔" ;?></td>
            <?php }  else
            {
            ?>
              <td style="color: red;"><?php echo "✘" ;?></td>

            <?php } ?>
             <td align="center"><?php echo $row["emp_role"]; ?></td>
			 
			 <td>
              <label class="switch">
                <input type="checkbox" name="enabledisable" value="1" <?php echo ($row['emp_status']=='1' ? 'checked' : ''); ?> onclick="activate_deactivate_user(this.checked ? 1 : 0,<?php echo $row['emp_id'];?>)" >
                <span class="slider round"></span></label>
              </td>
            
          </tr><br>

          <?php  
        } 

    

      ?>
	  </table>
    
    <!-- // All users  -->
  </div></center>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript">
    /*function to activate deactivate user*/
    function activate_deactivate_user(val,emp_id){
      $.ajax({
        type:'post',
        url:'ActivateDeactivateUser.php',
        data:{val:val,emp_id:emp_id},
        success:function(result){
          $("#field").html(result);
      }
    });
    }
    /* //function to activate deactivate user*/
  </script>
</body>
</html>

        