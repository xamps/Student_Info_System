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
  <div class="container">
         <div class="row text-center content-row">
          <div class="row">
              <div class="col-md-6">
                <h1><i>Student Information System</i></h1>
<h3><i>Nitmas,Diamond Harbour,24 Pargana</i></h3>
<p><b>A snapshot of the NITMAS specifically for domestic students studying in India.Includes details about the courses,faculty profile and subject catalog. Student Brochure is a online accession medium,where student will get the information of their own attendence,examination marks and lecture view of each and every subject.Parents can also monitor their son's academic activity staying at home.</b></p>

<h1><i>Student Brochure System Supports:</i></h1>
<div class="list">
<ul class="list-group">
<li>Maintaing the Student details.</li>
<li>Maintaining Student Marks Details.</li>
<li>Maintaining records of absences and attendance.</li>
<li>Maintaining records of Internal marks.</li>
</ul>
</div>
</div>
 <div class="col-md-6">
<?php
         include("adminmenu.php");
?>
</div>
</div>
</div>
</div>
