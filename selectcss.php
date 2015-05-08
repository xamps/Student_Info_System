<?php
session_start();
include("conection.php");
 $_GET[first] =0;
  $_GET[last] = 10;
$result1= mysql_query("SELECT * FROM course LIMIT $_GET[first] , $_GET[last]");
$result = mysql_query("SELECT * FROM subject LIMIT $_GET[first] , $_GET[last]");
?>
<!-- ************************************************************************************************ -->
<script>
function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
	}
	
	
	
	function getCity(strURL) {		
		
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('subdiv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}
</script>
<!-- *********************************************************************************************** -->
<form method="post" action="attendanceview.php" role="form" name="form1">
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
    <select name="semsester">
	<option>Select Semester</option>
	<option>1st Semester</option>
	<option>2nd Semester</option>
	<option>3rd Semester</option>
	<option>4th Semester</option>
	<option>5th Semester</option>
	<option>6th Semester</option>
      </select></div>
  <div class="form-group">
    <label>Subject </label>  
    <select name="subject" id="subject">
      <option> Select Subject </option>
      <?php
 while($row1 = mysql_fetch_array($result))
  {
  echo "<option ='$row1[subid]'>$row1[subid]</option>";
  }
  ?>
    </select>
  </div>
  <div class=form-group">
  <button type="submit" name="button" id="button" value="Search" class="btn btn-success">Search</button>
  </div>
</form>