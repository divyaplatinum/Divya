
<?php
 session_start(); 
if(!isset($_SESSION['id']))  // to check user is admn or not
{
  session_destroy();
  header("location:Logout.php");    
} 
 require '../Classes/config.php';
if(isset($_POST['level'])){
	
     $level=$_POST['level'];
if($level==1 OR  $level==2){
   $sql = "SELECT * FROM employee where emp_role!='Project Manager' and emp_status='1'";
    $result = mysqli_query($con,$sql);

	while( $row = mysqli_fetch_array($result) ){
    $empid = $row['emp_id'];
    $name = $row['emp_fname'];

    $emp_arr[] = array("id" => $empid, "name" => $name);
    }
   }
 else{
	  $sql = "SELECT * FROM employee where emp_role='Project Manager' and emp_status='1'";
      $result = mysqli_query($con,$sql);
       while( $row = mysqli_fetch_array($result) ){
    $empid = $row['emp_id'];
    $name = $row['emp_fname'];

    $emp_arr[] = array("id" => $empid, "name" => $name);
    }	  
   }
    echo json_encode($emp_arr);
}	
?>
