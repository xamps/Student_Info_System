<?php 
session_start();

include("header.php"); 
include("conection.php");
include("modal.php");
$abc = 100;
if($_GET["view"] == "delete")
{
mysql_query("DELETE FROM administrator WHERE adminid ='$_GET[slid]'");
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
$result = mysql_query("SELECT * FROM administrator LIMIT $_GET[first] , $_GET[last]");
?>
<!-- ***************************************************************************** -->
<div class="container">
         <div class="row text-center content-row">
          <div class="row">
              <div class="col-md-6">
  <h2>Admin Details</h2>
    <table class="table table-bordered" >
      <tbody>
  <tr>
    <th>Admin ID</th>
    <th>Admin Name</th>
    <th>Address</th>
    <th>Contact No</th>
    <th>Action</th>
  </tr>
</tbody>
  <!-- ******************************************************************************** -->
<tbody>
  
  <?php
    $i =$_GET[first]+1;
  while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>".$i ."</td>";
  echo "<td>".$row['adminname']."</td>";
  echo "<td>".$row['address']."</td>";
  echo "<td>". $row['contactno']."</td>";
  echo "<td><a href='viewrecords.php?slid=$row[adminid]&view=administrator'><img src='images/view.png' width='32' height='32' /></a>
 <a href='addadmin.php?slid=$row[adminid]&view=administrator'>  <img src='images/edit.png' width='32' height='32' /></a>";
 ?>
 <a href='adminview.php?slid=$row[adminid]&view=delete'><img src='images/delete.png' width='32' height='32' onclick="return confirm('Are you sure??')"></a> 
</td>
<?php
echo "</tr>";
	$i++;
  }
  if($_SESSION["type"]=="admin")
  {
  ?>
</tbody>
<!-- ***************************************************************************************************************************--> 
  <tbody>
  <tr>
 <td>
  <img src="images/previous.png" width="32" height="32" /></a>
</td>
  <td>
    <a href="addadmin.php"><img src="images/add.png" width="32" height="32" /></a>
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
  <!-- ************************************************************** -->
  <div class="col-md-6">
<?php 
}
else
{
		header("Location: admin.php");
}

include("adminmenu.php");
?>
</div>
</div>
</div>
</div>