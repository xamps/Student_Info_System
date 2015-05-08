<?php
session_start(); 
include("header.php"); 
include("conection.php");

if(isset($_POST["submit"]))
{
$result = mysql_query("SELECT * FROM administrator
WHERE adminid='$_POST[uid]' and password='$_POST[pwd]'");
if(mysql_num_rows($result)==0)
{
$log =  "Login failed";
}
else
{
  header("Location: dashboard.php");
}
}
?>
<!-- ************************************************************************************************************ -->
<div class="container">
         <div class="row text-center content-row">
          <div class="row">
              <div class="col-md-6">

<h2>Dashboard.</h2>
<h2>Attendance</h2>
 <?php
include("conection.php");
$result = mysql_query("SELECT * FROM course");
$result1 = mysql_query("SELECT * FROM subject");
?>
<!-- ******************************************************************************************************** -->
<form name="form1" method="post" action="attendanceinsert.php">
  <div class="form-group">
    <label>Course</label>
    <select name="course" >
     <option>Course Details</option>
     <?php
          while($row1 = mysql_fetch_array($result))
          {
            echo "<option value='$row1[courseid]'>$row1[coursekey]</option>";
          }
     ?>     
    </select>
  </div>
  <div class="form-group">
    <label>Semester</label>
    <select name="semester">
      <option value="1">First Semester</option>
      <option value="2">Second Semester</option>
      <option value="3">Third Semester</option>
      <option value="4">Fourth Semester</option>
      <option value="5">Fifth Semester</option>
      <option value="6">Sixth Semester</option>
    </select>
  </div>
  <div class="form-group">
      <label for="student">Subject</label>
    <select name="subject" id="select3">
        <?php
             while($row2 = mysql_fetch_array($result1))
         {
              echo "<option value='$row2[subid]'>$row2[subname]</option>";
          }
        ?>
    </select>
  </div>
  <div class="form-group">
    <label for="totalclass">Total Classes</label>
    <input type="text" name="totalclass" id="totalclass">
  </div>
  <div class="form-group">
    <input type="submit" name="button" id="button" value="Submit">
  </div>
  <div class="form-group">
    <input type="submit" name="button2" id="button2" value="Reset">
  </div>
</form>
</div>
<div class="col-md-6">
<!-- **************************************************************************************************** -->
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