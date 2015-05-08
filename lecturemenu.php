<?php 
session_start();
?>
<?php
//if(isset($_SESSION["userid"]))
{
?>
<h2>Lecturer Profile</h2>
<div class="list">
<ul class="list-group" style="list-style-type:none">
	<li>Lecture ID : <?php echo $_SESSION["userid"] ; ?></li>
    <li>Name : <?php echo $_SESSION["lecnm"]; ?></li>
</ul>
</div>
<h2>Lecturer Menu</h2>
<div class="list">
<ul class="list-group" style="list-style-type:none">
    <li><a href="lecturevieww.php">Lecture Profile</a></li>
    <li><a href="attendanceview.php">Attendance</a></li>
    <li><a href="examview.php">Examination</a></li>
	<li><a href="course.php">Course</a></li>
    <li><a href="subject.php">Subject</a></li>
    <li><a href="student.php">Student</a></li>
    
</ul>
</div>
<h2><a href="logout.php">Logout</a></h2>
<?php
}
?>