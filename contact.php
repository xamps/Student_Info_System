<?php
include("validation.php");
include("header.php"); 
?>
  <?php
  if(isset($_POST["name"]))
  {
  include("conection.php");
$sql="INSERT INTO contact (name, emailid, contactno, subject, message) VALUES ('$_POST[name]','$_POST[email]','$_POST[contact]','$_POST[subject]','$_POST[message]')";
if (!mysql_query($sql,$con))
  {
  die('Error in mysql:'. mysql_error());
  }
  else
  {
echo "Mail sent Successfully...";
  }
  }
  else
  {
	  ?>
    *********************************************************************************************************************************
    <div class="container">
         <div class="row text-center content-row">
          <div class="row">
              <div class="col-md-6">
                <h1>Contact Us</h1>
  <!--********************************************************************************************************************************-->
                     <form name="form1" class="form-horizontal" role="form" method="post" id="formID" action="1contact.php">
                              <div class="form-group">
                                <label for="author" class="col-sm-4 control-label">Name</label>
                                <div class="col-sm-8">
                                      <input type="text" placeholder="Name" class="form-control input-lg" id="name" name="name" value=""  class="validate[required,custom[onlyLetterSp]] text-input">
                                </div>
                              </div>
<!--******************************************************************************************************************************** -->                         
                              <div class="form-group">
                                <label for="email" class="col-sm-4 control-label">Email</label>
                                <div class="col-sm-8">
                                      <input type="text" placeholder="email" class="form-control input-lg" id="email" name="email" value="" class="validate[required,custom[email]] text-input">
                                </div>
                              </div>
<!--********************************************************************************************************* -->          
                       <div class="form-group">
                                <label for="contact" class="col-sm-4 control-label">Contact No</label>
                                <div class="col-sm-8">
                                      <input type="text" placeholder="Contact No" class="form-control input-lg" id="contact" name="contact" value="" class="validate[required,custom[email]] text-input">
                                </div>
                              </div>
<!--*************************************************************************************************************************** -->                             
                      <div class="form-group">
                                <label for="subject" class="col-sm-4 control-label">Subject</label>
                                <div class="col-sm-8">
                                      <input type="text" placeholder="Subject" class="form-control input-lg" id="subject" name="subject" value="" class="validate[required,custom[email]] text-input">
                                </div>
                              </div>
<!--*************************************************************************************************************************-->            
                      <div class="form-group">
                                <label for="message" class="col-sm-4 control-label">Message</label>
                                <div class="col-sm-8">
                                      <textarea  class="form-control input-lg" id="message" name="message" value="" row="10"></textarea>
                                </div>
                              </div>
                            <div class="form-group">
                        <button type="submit" name="button2" id="submit" value="submit" class="btn btn-success">Search</button>
                      </div>
***********************************************************************************************************************************                      
                    </form>
                  </div>
                </div>
            </div>
        </div>
    <?php
  }
  ?>
<h2>Contact Us</h2>
<ul>
	<li>Please enter Name, Mail Id, contact Number, Subject, Message.</li>
</ul>
