<?php
include("header.php");
include("conection.php");
if($_GET["view"] == "delete")
{
mysql_query("DELETE FROM contact WHERE contactid ='$_GET[slid]'");
}
$result = mysql_query("SELECT * FROM contact");
?>
<div class="container">
         <div class="row text-center content-row">
          <div class="row">
              <div class="col-md-6">
  <h2>Contact Inbox</h2>
  <form name="form2" method="post" action="contactview.php">
<table class="table table-bordered">
  <thead>
  <?php
	  $i =1;
  while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>";
  ?>
  <a href='contactview.php?slid=<?php echo $row[contactid]; ?>&view=delete'><img src='images/delete.png' width='32' height='32'  onclick="return confirm('Are you sure??')"/></a>
  <?php
  echo"<td>".$i."</td>";
  echo "<td>".$row['name']."</td>";
	echo"<td><a href='inbox.php?cid=$row[contactid]'>".$row['subject']."</a></td>";
  echo "</tr>";
  $i++;
  }
?>
</thead>
</table>
    </form>
  </div>
  <div class="col-md-6">
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
