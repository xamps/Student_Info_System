<?php
session_start(); 
include("header.php"); 
include("conection.php");

$result = mysql_query("SELECT * FROM lectures
WHERE lecid='$_SESSION[userid]'");
 while($row1 = mysql_fetch_array($result))
  {
	  $lecid = $row1[lecid];
	$pass =	  $row1[password]; 	
	$couseid = 	  $row1[courseid]; 	
	$lecname =	  $row1[lecname]; 	
	$address = 	  $row1[address]; 	
	$contno =	  $row1[contactno];
  }
  $result12 = mysql_query("SELECT * FROM course
WHERE courseid 	='$couseid'");
 while($row2 = mysql_fetch_array($result12))
  {
	  $cbane =	  $row2[coursename];
  }
?>
<div class="container">
    <div class="row">
       <div class="row text-center content-row">
      <div class="col-md-6"> 
  <h2>Lecture Profile</h2>
   <table class="table">
    <tbody>
     <tr>
       <td> Lecture ID :</td>
       <td><?php echo $lecid ;?></td>
     </tr>
     <tr>
       <td> Name :</td>
       <td><?php echo $lecname ;?></td>
     </tr>
     <tr>
       <td>Address :</td>
       <td><?php echo $address ;?></td>
     </tr>
     <tr>
       <td>Contact No.</td>
       <td><?php echo $contno;?></td>
     </tr>
     <tr>
       <td>Course :</td>
       <td><?php echo $cbane ;?></td>
     </tr>
   </tbody>
   </table>
</div>
<div class="col-md-4" style="float:right">  
<?php 
if($_SESSION["type"]=="admin")
	{
	include("adminmenu.php");
	}
	else
	{	
	include("lecturemenu.php");
	}
 ?>
</div>
</div>
</div>
</div>