<?php
session_start();
include("header.php");
include("conection.php");
include("modal.php");
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
		$resultac = mysql_query("SELECT * FROM examination");
	echo	mysql_num_rows($result);
	}
	else
	{
	$result = mysql_query("SELECT * FROM examination LIMIT $_GET[first] , $_GET[last]");
	}
$result1 = mysql_query("SELECT * FROM course LIMIT $_GET[first] , $_GET[last]");
$result2 = mysql_query("SELECT * FROM subject LIMIT $_GET[first] , $_GET[last]");
?>

<!-- ****************************************************************************************** -->
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
<!-- ***************************************************************************************** -->
<div class="container">
         <div class="row text-center content-row">
          <div class="row">
              <div class="col-md-6">
  <h2>Examination Details</h2>
   <?php include("selectcss.php"); ?>
       <?php 
if(mysql_num_rows($resultac) >= 1)
{
	?>
     <table>
       <tr>
    <td>ExamID</td>
    <td>StudentID</td>
    <td>SubjectID</td>
    <td>CourseID</td>
    <td>Internal Type</td>
    <td>Max Marks</td>
    <td>Scored</td>
    <td>Result</td>
    <td>Action</td>
  </tr>
      <?php
	 $i =$_GET[first]+1;
  while($row = mysql_fetch_array($resultac))
  {
  echo "<tr>";
  echo "<td>"  . $i . "</td>";
  echo "<td>" . $row['studid'] . "</td>";
  echo "<td>" . $row['subid'] . "</td>";
  echo "<td>" . $row['courseid'] . "</td>";
  echo "<td>" . $row['internaltype'] . "</td>";  
  echo "<td>" . $row['maxmarks'] . "</td>";
  echo "<td>" . $row['scored'] . "</td>";
  echo "<td>" . $row['result'] . "</td>";
  echo "<td><a href='viewrecords.php?slid=$row[examid]&view=examination'><img  src='images/view.png' width='32' height='32'></a>
   <a href='examupdate.php?exid=$row[examid]'> <img src='images/edit.png' width='32' height='32'></a> . </td>";
  echo "</tr>";
  $i++;
  }
?>

        <tr>
          <td>
	      <td><img src="images/previous.png" alt="" 32" height="32"></td>
          <td><a href="exam.php" ><img src="images/add.png" alt="" 32" height="32" /></a></td>
          <td><img src="images/next.png" alt="" 32" height="32" /></td>
        </tr>
  
</table>
       <?php
}
else
{
	echo "<h2>No Records Found...</h2>";
}
?>
<?php
     if($_SESSION["type"]=="admin")
	{
		?>
     <p><a href="examview.php?first=<?php echo $first; ?>&amp;last=<?php echo $last; ?>"><a href="exam.php" ><strong>Add Examination Records</strong></a></p>
 <?php
	}
	?>
    </div>
    <div class="col-md-6">
  <?php 
}
else
{
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