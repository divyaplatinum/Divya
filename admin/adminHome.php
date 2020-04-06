<?php session_start(); 
if(!isset($_SESSION['adminname'])){
    header('Location: logout.php');
}

  ?>



<?php
  include("html/AdminHeader.php");
  include("html/Sidebar.html");
 
 
  ?> 
  
  <html>
<head>
  <title>User Home</title>
  
  <style type="text/css">
    body {
      background-image: url('../images/adminhome.jpg');
    }

    .headers{
      position: fixed;
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

    tr:nth-child(even) {
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

        div.field {

          width: 730px;
          height: 418px;
          overflow: auto;
        }

        .header {
          overflow: hidden;
          background-color: #f1f1f1;
          padding: 20px 10px;
        }

        .header a {
          float: left;
          color: black;
          text-align: center;
          padding: 12px;
          text-decoration: none;
          font-size: 18px; 
          line-height: 25px;
          border-radius: 4px;
        }

        .header a.logo {
          font-size: 25px;
          font-weight: bold;
        }

        .header a:hover {
          background-color: #ddd;
          color: black;
        }

        .header a.active {
          background-color: dodgerblue;
          color: white;
        }

        .header-right {
          float: right;
        }

        @media screen and (max-width: 500px) {
          .header a {
            float: none;
            display: block;
            text-align: left;
          }

          .header-right {
            float: none;
          }
        }
      </style>
    </head>
    <body >
  
      

 <?php
 
    $sql = "SELECT * FROM scheduletask a LEFT JOIN projecttask b ON a.projectid=b.taskid
	                                      LEFT JOIN employee c On c.emp_id=a.empid";
    $result = mysqli_query($con,$sql); 

  ?>

  <center>
  
    <!-- All task shown here -->
    <div class="field" id="alltasks">
        <h3 style="color: white;">All Project Tasks</h3>
    
          <table>
            <td width="60">Assigned To</td>
			<td width="100"> Task Name</td>
			<td width="60">Designation</td>
            <td width="150">Priority</td>
			 <td width="150">Deadline</td>
			<td width="150">Status</td>
			<td width="150">Task Details</td>
			
               <?php
      
          while($row = mysqli_fetch_assoc($result)) {
            
 		  $level=$row["level"];
		  if($level==1)
		  {
			  $lname='Low priority';
		  }
		  else if($level==2)
		  {
			  $lname='Midiuem priority';
		  }
		  else if($level==3)
		  {
			  $lname='High priority';
		  }
          ?>      
			
            <tr>      <!--fetching task details  -->
             
              <td align="center"><?php echo $row["emp_fname"]." ".$row["emp_lname"]; ?></td> 
              <td align="center"><?php echo $row["taskname"]; ?></td>			  
              <td align="center"><?php echo $row["emp_role"]; ?></td> 
			  <td align="center"><?php echo $lname; ?></td>
			  <td align="center"><?php echo $row["deadline"]; ?></td>
              <?php if($row["schstatus"]==1)
              { ?>
               <td style="color: green;"><?php echo "Open" ;?></td>
             <?php }  else
             {
              ?>
              <td style="color: red;"><?php echo "Close" ;?></td>

            <?php } ?>
            <td><a href="TaskDetails.php?task_id=<?php echo $row["taskid"]; ?>" class="button">SEE DETAILS</a></td>
            
          </tr>

          <?php 
        
        } 
        ?>
	  
	  </table><br>
	  
    <br>
  </div></center>
 

</body>
</html>