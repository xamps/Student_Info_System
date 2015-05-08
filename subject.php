<?php 
session_start();
include("header.php"); 
include("conection.php");
include("modal.php");
if($_GET["view"] == "delete")
{
mysql_query("DELETE FROM subject WHERE subid ='$_GET[slid]'");
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
$result = mysql_query("SELECT * FROM subject LIMIT $_GET[first] , $_GET[last]");
$result1 = mysql_query("SELECT * FROM course LIMIT $_GET[first] , $_GET[last]");
$reslec = mysql_query("SELECT * FROM lectures LIMIT $_GET[first] , $_GET[last]");
?>
<!-- *********************************************************************************************************** -->
<div class="container">
         <div class="row text-center content-row">
          <div class="row">
              <div class="col-md-6">
  <h2>Subject  Details</h2>
    <table class="table">
    	<tbody>
  <tr>
    <td>ID</td>
    <td>Subject Name</td>
    <td>Course</td>
    <td>Sub Type</td>
    <td>Semester</td>
     <?php
      if($_SESSION["type"]=="admin")
	{
		?>
    <td>Action</td>
    <?php
	}
	?>
    
  </tr>
</tbody>
  <!-- ***************************************************************************************************-->
  <tbody>
    <?php
	   $i =$_GET[first]+1;
  while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>".$i."</td>";
  echo "<td>".$row['subname']."</td>";
  echo "<td>".$row['courseid']."</td>";
  echo "<td>".$row['subtype']."</td>";
  echo "<td>".$row['semester']."</td>";

      if($_SESSION["type"]=="admin")
	{

  echo "<td><a href='viewrecords.php?slid=$row[subid]&view=subject'><img src='images/view.png' width='32' height='32' /></a>
            <a href='subjectxx.php?slid=$row[subid]&view=subject'>  <img src='images/edit.png' width='32' height='32' /></a>";
?>
 <a href='subject.php?slid=<?php echo $row[subid]; ?>&view=delete'><img src='images/delete.png' width='32' height='32'  onclick="return confirm('Are you sure??')"/></a></td>
 <?php echo "</tr>";
	}
  $i++;
  }

      if($_SESSION["type"]=="admin")
	{

?>
</tbody>
<!-- ************************************************************************************* -->
<tbody>
  <tr>
 <td>
  <img src="images/previous.png" width="32" height="32" /></a>
</td>
  <td>
    <a href="subjectinsert.php"><img src="images/add.png" width="32" height="32" /></a>
  </td>
 
    <td>
    <img src="images/next.png" width="32" height="32" /></a>
</td>
  </tr>
  <?php
  }
  ?>
</tbody>
  </table>
</div>
  <!-- *********************************************************************************************** -->
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
</div>
</div>
</div>
</div>