<?php 
session_start();

include("header.php"); 
include("conection.php"); ?>

 <div class="container">
         <div class="row text-center content-row">
          <div class="row">
              <div class="col-md-6">
                        <h1>search student with their name</h1>
                        <form class="form-horizontal" role="form" method="post" action="result.php">
                              <div class="form-group">
                                <label for="roll no" class="col-sm-4 control-label">Roll No:</label>
                                <div class="col-sm-8">
                                      <input type="text" placeholder="Roll No" class="form-control input-lg" id="textfield2" name="rollno">
                                </div>
                              </div>
                            <div class="form-group">
                        <button type="submit" name="button2" id="button2" value="submit" class="btn btn-success">Search</button>
                      </div>
                    </form>
                  </div>
                </div>
                <hr></hr>
                <div class="row">
              <div class="col-md-6">
                        <h1>search by name and class</h1>
                        <form class="form-horizontal" role="form" method="post" action="">
                              <div class="form-group">
                                   <label for="textfield3" class="col-sm-4">Name</label>
                                   <div class="col-sm-8">
                                          <input type="text" placeholder="Name" class="form-control input-lg" id="textfield3" name="textfield2">
                                        </div>
                                       </div>
                                       <div class="form-group">
                                         <label for="select" class="col-sm-4">Course</label>
                                           <div class="col-sm-4">
   <?php
      $rescourse = mysql_query("SELECT * FROM course ");

  ?>
    <select class="form-control" name="select" id="select">
      <!--<select name="select" id="select">-->
      <?php
      while($row1 = mysql_fetch_array($rescourse))
  {
echo "<option value='$row1[courseid]'>$row1[coursekey]</option>";
  }
  ?>
        </select>
                              </div>
                            </div>
                            <!--<div class="col-sm-4">
                            </div>-->
                            <div class="form-group">
                             
                        <button type="submit" name="submitresult" id="submitresult" value="submit" class="btn btn-success">Search</button>
                      </div>
                      </div>
                    </form>
              </div>
            </div>
             </div>
<?php
if(isset($_POST[submitresult]))
{
   $searchstu = mysql_query("SELECT * FROM studentdetails where (studfname LIKE '$_POST[textfield2]' OR `studlname` LIKE '$_POST[textfield2]') AND courseid ='$_POST[select]' ");
  
?>
<!--<form name="form2" method="post" action="viewresult.php">-->
<div class="container">
         <div class="row text-center content-row">
          <div class="row">
              <div class="col-md-6">
    <table class="table">
      <thead>
    <tr>
      <th><strong>Student ID</strong></th>
      <th><strong>Name</strong></th>
      <th><strong>Fathers Name</strong></th>
      <th><strong>Semester</strong></th>
      <th><strong>View Result</strong></th>
    </tr>
  </thead>
     <?php
   
      while($rowc = mysql_fetch_array($searchstu))
  {
  ?>
  <tbody>
    <tr style="background-color:grey">
      <td><?php echo $rowc["studid"];?></td>
      <td><?php echo $rowc["studfname"]. " ". $rowc["studlname"];?></td>
      <td><?php echo $rowc["fathername"];?></td>
      <td><?php echo $rowc["semester"];?></td>
      <td><a href="result.php?resid=<?php echo $rowc["studid"];?>"><img src="images/view.png" width="26" height="21"></a></td>
    </tr>
     <?php
  }
  ?>
  </tbody>
  <?php
}
?>
</div>
</div>
</div>
</div>