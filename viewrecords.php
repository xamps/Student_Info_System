<?php 
session_start();

include("header.php"); 
include("conection.php");
include("modal.php");
$abc = 100;
if(isset($_SESSION["userid"]))
{
?>
<!-- ****************************************************************************** -->
<div class="container">
         <div class="row text-center content-row">
          <div class="row">
              <div class="col-md-6">
<h2>View Records</h2>

<?php
if($_GET[view]=="course")
{
// Course table starts here
$result = mysql_query("SELECT * FROM course where courseid='$_GET[slid]'");
while($row = mysql_fetch_array($result))
  {
 $courseid =  $row["courseid"];
 $coursename = $row["coursename"];
$coursecomment =   $row["comment"];
$coursekey =   $row["coursekey"];
  }
  
?>  
<!-- ********************************************************************************** -->
 <h2>Course</h2>
    <table class="table">
  <tr>
    <th>Course ID.</th>
    <th><?php echo  $courseid;?></th>
    </tr>
  
   <tr>
    <th>Course Name</th>
    <th><?php echo  $coursename;?></th>
    </tr>
  <tr>
    <th>Comment</th>
    <th><?php echo $coursecomment; ?> </div></th>
    </tr>
  <tr>
    <th>Course Key</th>
    <th> <?php echo  $coursekey; ?></th>
    </tr>
  <tr>
    <th></th>
    <th><a href='course.php'>Back</a></th>
    </tr>
  </table>
  <?php
}
//course ends here
?>  
    <!-- *********************************************************************************** -->  
      
    <?php
 if($_GET[view]=="subject")
{
// Subject table starts here
$result1 = mysql_query("SELECT * FROM subject where subid='$_GET[slid]'");
while($row1 = mysql_fetch_array($result1))
  {
 $subid =  $row1["subid"];
 $subname = $row1["subname"];
$courseid =   $row1["courseid"];
$lecid =   $row1["lecid"];
$subtype = $row1["subtype"];
$semester =   $row1["semester"];
$comment =   $row1["comment"];
  }
  
?>  
 <h2>Subject</h2>
<table class="table">
  <tr>
    <th>Subject ID.</th>
    <th><?php echo  $subid; ?></div></th>
    </tr>
  
   <tr>
    <th>Subject Name</th>
    <th><?php echo  $subname; ?> </div></th>
    </tr>
  <tr>
    <th>Course ID</th>
    <th><?php echo  $courseid; ?> </div></th>
    </tr>
  <tr>
    <th>Lecture ID</th>
    <th> <?php echo  $lecid; ?> </div></th>
    </tr>
    <tr>
    <th>Subject Type</th>
    <th> <?php echo  $subtype; ?> </div></th>
    </tr>
    <tr>
    <th>Semester</th>
    <th><?php echo  $semester; ?> </div></th>
    </tr>
    <tr>
    <th>Comment</th>
    <th><?php echo  $comment; ?> </div></th>
    </tr>
  <tr>
    <th></th>
    <th><a href='subject.php'><< Back </a></div></th>
    </tr>
  </table>
<?php
}
//Subject ends here
?>  
<!-- ********************************************************************************************** -->
        
    <?php
 if($_GET[view]=="lectures")
{
// Lecture table starts here
$result2 = mysql_query("SELECT * FROM lectures where lecid='$_GET[slid]'");
while($row2 = mysql_fetch_array($result2))
  {
 $lecid =  $row2["lecid"];
 $password = $row2["password"];
$lecname =   $row2["lecname"];
$gender = $row2["gender"];
$address =   $row2["address"];
$contactno = $row2["contactno"];
  }
  
?>  
 <h2>Lectures</h2>
<table class="table">
  <tr>
    <th>Lecture ID.</th>
    <th><?php echo  $lecid; ?></div></th>
    </tr>
  
   <tr>
    <th>Password</th>
    <th><?php echo  $password; ?> </div></th>
    </tr>
  <tr>
    <th>Lecture Name</th>
    <th><?php echo  $lecname; ?> </div></th>
    </tr>
  <tr>
    <th>Gender</th>
    <th><?php echo  $gender; ?> </div> ;</th>
  </tr>
  <tr>
    <th>Address</th>
    <th><?php echo  $address; ?> </div></th>
    </tr>
    <tr>
    <th>Contact No</th>
    <th><?php echo  $contactno; ?> </div></th>
    </tr>
  <tr>
    <th></th>
    <th><a href='lectureview.php'><< Back </a></div></th>
    </tr>
  </table>
<?php
}
//Lecture ends here
?>  
<!-- ************************************************************************************ -->
  
      <?php
 if($_GET[view]=="studentdetails")
{
// Student table starts here
$result3 = mysql_query("SELECT * FROM studentdetails where studid='$_GET[slid]'");
while($row3 = mysql_fetch_array($result3))
  {
 $studid =  $row3["studid"];
 $studfname = $row3["studfname"];
$studlname =   $row3["studlname"];
$fathername=   $row3["fathername"];
$gender = $row3["gender"];
$address = $row3["address"];
$contactno = $row3["contactno"];
$courseid = $row3["courseid"];
$semester = $row3["semester"];
$dob = $row3["dob"];
  }
  
?>  
</p>
 <h2>Students</h2>
<table class="table">
  <tr>
    <th>Student ID.</th>
    <th><?php echo  $studid; ?></div></th>
    </tr>
  
   <tr>
    <th>First name</th>
    <th><?php echo  $studfname; ?> </div></th>
    </tr>
  <tr>
    <th>Last Name</th>
    <th><?php echo  $studlname; ?> </div></th>
    </tr>
  <tr>
    <th>Father Name</th>
    <th><?php echo  $fathername; ?> </div></th>
    </tr>
    <tr>
    <th>Gender</th>
    <th><?php echo  $gender; ?> </div></th>
    </tr>
     <tr>
    <th>Address</th>
    <th><?php echo  $address; ?> </div></th>
    </tr>
     <tr>
    <th>Contact No</th>
    <th><?php echo  $contactno; ?> </div></th>
    </tr>
     <tr>
    <th>Course ID</th>
    <th> <?php echo  $courseid; ?> </div></th>
    </tr>
     <tr>
    <th>Semetser</th>
    <th><?php echo  $semester; ?> </div></th>
    </tr>
     <tr>
    <th>Date Of Birth</th>
    <th><?php echo  $dob; ?> </div></th>
    </tr>
  <tr>
    <th>;</th>
    <th><a href='student.php'><< Back </a></div></th>
    </tr>
  </table>
<?php
}
//Student ends here
?>  

  
 <!-- ******************************************************************************************************** -->   
      <?php
 if($_GET[view]=="attendance")
{
// Attendance table starts here
$result4 = mysql_query("SELECT * FROM attendance where attid='$_GET[slid]'");
while($row4 = mysql_fetch_array($result4))
  {
 $attid =  $row4["attid"];
 $studid = $row4["studid"];
$subid =   $row4["subid"];
$totalclasses =   $row4["totalclasses"];
$attendedclasses = $row4["attendedclasses"];
$percentage = $row4["percentage"];
$comment = $row4["comment"];
  }
  
?>  
 <h2>Attendance</h2>
<table class="table" >
  <tr>
    <th>Attendance ID.</th>
    <th><?php echo  $attid; ?></div></th>
    </tr>
  
   <tr>
    <th>Student ID</th>
    <th><?php echo  $studid; ?> </div></th>
    </tr>
  <tr>
    <th>Subject ID</th>
    <th><?php echo  $subid; ?> </div></th>
    </tr>
  <tr>
    <th>Total Classes</th>
    <th><?php echo  $totalclasses; ?> </div></th>
    </tr>
    <tr>
    <th>Attended Classes</th>
    <th><?php echo  $attendedclasses; ?> </div></th>
    </tr>
     <tr>
    <th>Percentage</th>
    <th><?php echo  $percentage; ?> </div></th>
    </tr>
     <tr>
    <th>Comment</th>
    <th><?php echo  $comment; ?> </div></th>
    </tr>
  <tr>
    <th>;</th>
    <th><a href='attendanceview.php'><< Back </a></div></th>
    </tr>
  </table>
<?php
}
//Attendance ends here
?>  

 <!-- ************************************************************************************************ -->     
      <?php
 if($_GET[view]=="examination")
{
// Examination table starts here
$result5 = mysql_query("SELECT * FROM examination where examid='$_GET[slid]'");
while($row5 = mysql_fetch_array($result5))
  {
 $examid =  $row5["examid"];
 $studid = $row5["studid"];
$subid =   $row5["subid"];
$courseid =   $row5["courseid"];
$internaltype = $row5["internaltype"];
$maxmarks = $row5["maxmarks"];
$scored = $row5["scored"];
$result = $row5["result"];
$comment = $row5["comment"];
  }
  
?>  
</p>
<p>;</p>
 <h2>Examination</h2>
<table class="table">
  <tr>
    <th>Exam ID.</th>
    <th><?php echo  $examid; ?></div></th>
    </tr>
  
   <tr>
    <th>Student ID</th>
    <th><?php echo  $studid; ?> </div></th>
    </tr>
  <tr>
    <th>Subject ID</th>
    <th><?php echo  $subid; ?> </div></th>
    </tr>
  <tr>
    <th>Course ID</th>
    <th> <?php echo  $courseid; ?> </div></th>
    </tr>
    <tr>
    <th>Internal Type</th>
    <th><?php echo  $internaltype; ?> </div></th>
    </tr>
     <tr>
    <th>Max Marks</th>
    <th><?php echo  $maxmarks; ?> </div></th>
    </tr>
     <tr>
    <th>Scored</th>
    <th ><?php echo  $scored; ?> </div></th>
    </tr>
    <tr>
    <th>Result</th>
    <th><?php echo  $result; ?> </div></th>
    </tr>
    <tr>
    <th>Comment</th>
    <th><?php echo  $comment; ?> </div></th>
    </tr>
  <tr>
    <th></th>
    <th><a href='examview.php'><< Back </a></div></th>
    </tr>
  </table>
<?php
}
//Examination ends here
?>  

  <!-- ************************************************************************************************** -->
  <?php
if($_GET[view]=="administrator")
{
// Administrator table starts here
$result6 = mysql_query("SELECT * FROM administrator where adminid='$_GET[slid]'");
while($row6 = mysql_fetch_array($result6))
  {
 $adminid =  $row6["adminid"];
 $password = $row6["password"];
$adminname =   $row6["adminname"];
$address =   $row6["address"];
$contactno =   $row6["contactno"];
  }
  
?>   <h2>Admin</h2>
    <table class="table">
  <tr>
    <th>Admin ID.</th>
    <th><?php echo  $adminid; ?></div></th>
    </tr>
  
   <tr>
    <th>Password</th>
    <th><?php echo  $password; ?> </div></th>
    </tr>
  <tr>
    <th>Admin Name</th>
    <th> <?php echo  $adminname; ?> </div></th>
    </tr>
  <tr>
    <th>Address</th>
    <th><?php echo  $address; ?> </div></th>
    </tr>
    <tr>
    <th>Contact No</th>
    <th><?php echo  $contactno; ?> </div></th>
    </tr>
  <tr>
    <th></th>
    <th><a href='adminview.php'><< Back </a></div></th>
    </tr>
  </table>
  <?php
}
//Admin ends here
?>  
</div>
<!-- *********************************************************************************************** -->
<div class="col-md-6">
<?php 
}
else
{
		header("Location: admin.php");
}

include("adminmenu.php");
include("footer.php"); 

?>
</div>
</div>
</div>
</div>