<?php 
session_start();

include("header.php"); 
include("conection.php");
include("modal.php");
$abc = 100;
if($_GET["view"] == "delete")
{
  mysql_query("DELETE FROM course WHERE courseid ='$_GET[slid]'");
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
 $result = mysql_query("SELECT * FROM course LIMIT $_GET[first] , $_GET[last]");


 ?>
 <!-- *********************************************************************************************************** -->
 <script language="Javascript">
 function val()
 {
   
  if(confirm('Format the hard disk?'))
  {
    alert('You are very brave!');
  }
  else 
  {
    alert('A wise decision!')
  }
  if(document.emp.txt1.value=="")
  {
    alert("Please enter userid");
    document.emp.txt1.focus();
    document.emp.txt1.select();
    return false;
  }
  else
  {
    return true;
  }	

}
</script>
<!-- ************************************************************************************** -->
<div class="container">
 <div class="row text-center content-row">
  <div class="row">
    <div class="col-md-6">
      <h2>Course Details</h2>
      
      <table class="table">
       <thead>
        <tr>
          <th>SL. No.</th>
          <th>Course</th>
          <?php
          if($_SESSION["type"]=="admin")
          {
            ?>
            <th>Action</th>
            <?php
          }
          ?>
        </tr>
      </thead>
      <!-- *****************************************************************************************-->
      <tbody>
        <?php
        $i =$_GET[first]+1;
        while($row = mysql_fetch_array($result))
        {
          echo "<tr>";
          echo "<td>".$i."</td>";
          echo "<td>".$row['coursekey'] ."</td>";
          if($_SESSION["type"]=="admin")
          {
           echo "<td><a href='viewrecords.php?slid=$row[courseid]&view=course'><img src='images/view.png' width='32' height='32'></a>";
           echo "<img src='images/edit.png' width='32' height='32'  onclick='Openeditcourse(". $row[courseid].")'/>";
           ?>
           <a href="course.php?slid=<?php echo $row[courseid]; ?>&view=delete" onclick="return confirm('Are you sure??')">
             <?php
             echo "<img src='images/delete.png' width='32' height='32' /></a></td>";
           }

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
             <a href="courseinsert.php"><img src="images/add.png" width="32" height="32" /></a>
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