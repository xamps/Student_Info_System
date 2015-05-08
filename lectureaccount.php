<?php
session_start(); 
include("header.php"); 
include("conection.php");

//echo "lec name".$_SESSION["lecname"];
?>
  <div class="container">
         
          <div class="row">
              <div class="col-md-8">
                <h1><i>Student Information System</i></h1>
<h3><i>Nitmas,Diamond Harbour,24 Pargana</i></h3>
<p><b>Student Information Systems are the primary systems for operating  colleges. The Student Information System is a student-level 
  data collection  system that allows the Department to collect and analyze more accurate and  comprehensive information. 
  Student information systems provide capabilities for  entering student records, tracking student attendance, and managing many 
  other  student-related data needs in a college or university.</b></p>

<h1><i>Student Information System Supports:</i></h1>
<div class="list">
<ul class="list-group">
<li >Handling inquiries from prospective students.</li>
<li>Handling the Student details.</li>
<li>Maintaining the Student Marks Details.</li>
<li>Handling Student Attendance Records.</li>
<li>Maintaining records of absences and attendance.</li>
<li>Maintaining records of Internal marks.</li>
</ul>
</div>
                 <!--<div class="list">
                 <ul class="list-group" style="list-style-type:none">
   <li><a href="course.php">Course</a></li>
   <li><a href="subject.php">Subject</a></li>
   <li><a href="student.php">Student</a> </li>
   <li><a href="attendanceview.php">Attendance</a></li>
   <li><a href="examview.php">Examination</a></li>
 </ul>
</div>-->
 </div>
 <div class="col-md-4">
<?php 
include("lecturemenu.php");
?>
</div>
</div>
</div>
</div>