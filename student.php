<?php 
session_start();
include("header.php"); 
include("conection.php");
include("modal.php");
if($_GET["view"] == "delete")
{
mysql_query("DELETE FROM studentdetails WHERE studid ='$_GET[slid]'");
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
    $result = mysql_query("SELECT * FROM studentdetails where courseid='$_POST[courseid]' && semester='$_POST[semester]'");
  }
  else
  {
$result = mysql_query("SELECT * FROM studentdetails LIMIT $_GET[first] , $_GET[last]");
  }

$result1= mysql_query("SELECT * FROM course LIMIT $_GET[first] , $_GET[last]");
?>
<!-- *********************************************************************************** -->
<div class="container">
         <div class="row text-center content-row">
          <div class="row">
              <div class="col-md-6">
  <h2>Student Details</h2>
  <p>
  <form role="form" method="post" action="student.php">
    <div class="form-group">
    <label>Course </label>  
    <select name="courseid" id="select2">
      <option> Select Course </option>
      <?php
 while($row1 = mysql_fetch_array($result1))
  {
  echo "<option ='$row1[courseid]'>$row1[coursekey]</option>";
  }
  ?>
    </select>
  </div>
    <div class="form-group">
    <label>Semester</label>  
    <select name="semester" id="select">
     <option> Select Semester </option>
      <option>First Semester</option>
      <option>Second Semester</option>
      <option>Third Semester</option>
      <option>Fourth Semester</option>
      <option>Fifth Semester</option>
      <option>Sixth Semester</option>
    </select> 
  </div>
    <div class="form-group">
    <button type="submit" name="button" id="button" value="submit" class="btn btn-success"> Submit </button>
  </div>
    </form>
    <br></br>
    <!-- ******************************************************************************************* -->
  <?php 
if(mysql_num_rows($result) >= 1)
{
  ?>
    <table  class="table">
      <tbody>
      <tr>
        <td>SL No.</td>
        <td>ID</td>
        <td>Name</td>
        <td>Date of birth</td>
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
<!-- ******************************************************************************************** -->
<tbody>
      <?php
$i =$_GET[first]+1;
  while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>".$i."</td>";
  echo "<td>".$row['studid']."</td>";
  echo "<td>".$row['studfname']." ".$row['studlname']."</td>";  
  echo "<td>".$row['dob']."</td>"; 
      if($_SESSION["type"]=="admin")
  {
  
        echo "<td><a href='viewrecords.php?slid=$row[studid]&view=studentdetails'><img src='images/view.png' ='32' height='32' /></a>
       <a href='studentins.php?slid=$row[studid]&view=studentdetails'>  <img src='images/edit.png' ='32' height='32' /></a>";
       ?>
           
 <a href='student.php?slid=$row[studid]&view=delete'><img src='images/delete.png' ='32' height='32' onclick="return confirm('Are you sure??')"/></a></td>
  <?php
    }
  echo "</tr>";
 $i++;
  } 
    if($_SESSION["type"]=="admin")
  {
?>
</tbody>
<!-- ************************************************************************************************* -->
<tbody>
      <tr>
 <td>
  <img src="images/previous.png" width="32" height="32" /></a>
</td>
  <td>
    <a href="studentinsert.php"><img src="images/add.png" width="32" height="32" /></a>
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
<!-- ************************************************************************************* -->
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
<!-- ************************************************************************************* -->

