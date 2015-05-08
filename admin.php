<?php 
session_start();
//echo $_SESSION["uid"];
if(isset($_SESSION["userid"]))
{
	if($_SESSION["type"]=="admin")
	{
	header("Location: dashboard.php");
	}
	else
	{	
	header("Location: lectureaccount.php");
	}
}

include("header.php"); 
include("conection.php");
if(isset($_POST["uid"]) && isset($_POST["pwd"]) )
{
//	echo "sdfsd".	$_POST[uid];
$result = mysql_query("SELECT * FROM administrator WHERE adminid='$_POST[uid]'");
while($row = mysql_fetch_array($result))
  {
$pwdmd5 = $row["password"];
  }

if(md5($_POST["pwd"])==$pwdmd5)
{
	$_SESSION["userid"] = $_POST["uid"];
	$_SESSION["type"]="admin";
	header("Location: dashboard.php");
}
else
{
$log =  "Login failed.. Please try again..";
echo"$log";
}
}

if(isset($_POST["luid"]) && isset($_POST["lpwd"]))
{

$result = mysql_query("SELECT * FROM lectures WHERE lecid='$_POST[luid]'");
	while($row = mysql_fetch_array($result))
 	 {
$pwdm= $row["password"];
$lecnm=$row["lecname"];
  	}
//echo"pwd". md5($_POST["lpwd"]);

if(md5($_POST["lpwd"])==$pwdm)
	{
		//echo $_POST["lpwd"];
	$_SESSION["userid"] = $_POST["luid"];
	$_SESSION["type"]="lecturer";
  $_SESSION["lecnm"]=$lecnm;
	header("Location: lectureaccount.php");
	}
else
	{
		$log12 =  "Login failed.. Please try again..";
    echo"$log12";
	}
}
?>
***************************************************************************************************************************************
<div class="container">
         <div class="row text-center content-row">
          <div class="row">
              <div class="col-md-6">
              	<h1>Admin Login</h1>
                  	 <form class="form-horizontal" role="form" method="post" action="admin.php">
                              <div class="form-group">
                                <label for="author" class="col-sm-4 control-label">Admin Login Id(required)</label>
                                <div class="col-sm-8">
                                      <input type="text" placeholder="Login Id" class="form-control input-lg" id="uid" name="uid">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="email" class="col-sm-4 control-label">Password</label>
                                <div class="col-sm-8">
                                      <input type="password" placeholder="password" class="form-control input-lg" id="pwd" name="pwd">
                                </div>
                              </div>
                            <div class="form-group">
                        <button type="submit" name="button2" id="submit" value="submit" class="btn btn-success">Search</button>
                      </div>
                    </form>
                  </div>
                </div>
            </div>
        </div>

****************************************************************************************************************************************
<div class="container">
         <div class="row text-center content-row">
          <div class="row">
              <div class="col-md-6">
              	<h1>Lecture View</h1>
                  	 <form class="form-horizontal" role="form" method="post" action="admin.php">
                              <div class="form-group">
                                <label for="author" class="col-sm-4 control-label">Lecture Login Id(required)</label>
                                <div class="col-sm-8">
                                      <input type="text" placeholder="Login Id" class="form-control input-lg" id="luid" name="luid">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="email" class="col-sm-4 control-label">Password</label>
                                <div class="col-sm-8">
                                      <input type="password" placeholder="password" class="form-control input-lg" id="lpwd" name="lpwd">
                                </div>
                              </div>
                            <div class="form-group">
                        <button type="submit" name="button2" id="submit" value="submit" class="btn btn-success">Search</button>
                      </div>
                    </form>
                  </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<?php 
?>
