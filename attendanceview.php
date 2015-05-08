<?php
session_start();
include("header.php");
include("conection.php");
include("modal.php");
?>
<!-- ***************************************************************************************** -->
<script>
function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
	}
	
	function getCity(strURL) {		
		
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('subdiv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}
</script>
<!-- *************************************************************************************************** -->

<?php
	if($_GET["view"] == "delete")
	{
	mysql_query("DELETE FROM attendance WHERE attid ='$_GET[slid]'");
	}
if(isset($_SESSION["userid"]))
{
	if(isset($_GET[first])) 
	{
	}
	else
	{
		$_GET[first] =0;
	$_GET[last] = 10;
	}
	if(isset($_POST["button"]))
	{
		
		$resultax = mysql_query("SELECT * FROM attendance where subid='$_POST[subject]'");
	}
	else
	{
	$result = mysql_query("SELECT * FROM attendance LIMIT $_GET[first] , $_GET[last]");
	}
$result1 = mysql_query("SELECT * FROM course LIMIT $_GET[first] , $_GET[last]");
$result2 = mysql_query("SELECT * FROM subject LIMIT $_GET[first] , $_GET[last]");
?>
<!--****************************************************************************************************** -->
<div class="container">
         <div class="row text-center content-row">
          <div class="row">
              <div class="col-md-6">
  <h2>Attendance  Details</h2>
<?php include("selectcss.php"); ?>
     <?php 
if(mysql_num_rows($resultax) >= 1)
{
	?>
<table>
        <tr>
          <td>Sl.No</td>
          <td>Student ID</td>
          <td>Student Name</td>
          <td>Subject</td>
          <td>Total Classes</td>
          <td>Attended Classes</td>
          <td>Percentage</td>
          <td><strong>Action</strong></td>
        </tr>
 <!-- *************************************************************************************************************************** -->
        <?php
	   $i =$_GET[first]+1;
  while($row = mysql_fetch_array($resultax))
  {
  echo "<tr>";
  echo "<td>".$i."</td>";
  echo "<td>".$row['studid']."</td>";
  $result5 = mysql_query("SELECT * FROM studentdetails where studid='$row[studid]'");
    	   while($rowa= mysql_fetch_array($result5))
  {
		  echo "<td>".$rowa['studfname']." ".$rowa['studlname']."</td>";
  }
  
    $result55 = mysql_query("SELECT * FROM subject where subid='$row[subid]'");
    	   while($rowasy= mysql_fetch_array($result55))
  {
	   echo "<td>".$rowasy['subname']."</td>";
  }
	   echo "<td>".$row['totalclasses']."</td>";
	   echo "<td>".$row['attendedclasses']."</td>";  
       echo "<td>".$row['percentage']."</td>";
	   echo "<td><a href='viewrecords.php?slid=$row[attid]&view=attendance'><img src='images/view.png' width='32' height='32'></a>
	   <a href='attendanceinsert.php?slid=$row[attid]&view=edit'><img src='images/edit.png' width='32' height='32'>
	   <a href='attendanceview.php?slid=$row[attid]&view=delete'></a></td>";
  echo "</tr>";
  $i++;
  }
?>
<!-- ******************************************************************************************** -->
<tr>
          <td><img src="images/previous.png" alt="" width="32" height="32" /></td>
          <td><a href="attendance.php" ><img src="images/add.png" alt="" width="32" height="32" /></a></td>
	      <td><img src="images/next.png" alt="" width="32" height="32" /></td>
        </tr>
    </table>
    
      <?php
}
else
{
	echo "<h2>No Records Found...</h2>";
}
?>
</div>
	<div class="col-md-6">
 <?php
}
	else {
		header("Location: admin.php");
	}
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