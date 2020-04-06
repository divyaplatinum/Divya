<?php session_start(); 
if(!isset($_SESSION['id'])) // to check user is admin or not  
{                                 //if not admin then destroy the session 
  session_destroy();              // and redirect to index page and 
  header("location:Logout.php");    
}
 require '../Classes/config.php'; // including function file init contains all DB function
  // object of class Operation inside init
	$emp_id=$_POST['emp_id'];
	$status=$_POST['val'];
 
  
  $sql ="Update employee set emp_status='$status' where emp_id='$emp_id'";
  
  

     if(mysqli_query($con,$sql)) 
        { 
      $sql = "SELECT * FROM employee ORDER BY emp_fname";
      $result = mysqli_query($con,$sql);
   
     ?>
  
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
             <td><a href="TaskAssign.php?user_id=<?php echo $row["emp_id"]; ?>" class="button">ASSIGN TASK</a></td>
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
            
          </tr>   
        <?php 
         } ?>
		 </table>
      <?php }
      else
      {
        echo "Cannot update";
      }
    ?>