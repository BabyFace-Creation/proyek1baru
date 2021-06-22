
    <?php
session_start();
include("../../db.php");
$user_id=$_REQUEST['user_id'];

$result=mysqli_query($con,"select user_id, email, password from user_info where user_id='$user_id'")or die ("query 1 incorrect.......");

list($user_id,$user_name,$user_password)=mysqli_fetch_array($result);

if(isset($_POST['btn_save'])) 
{

$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];
$user_password=$_POST['password'];

mysqli_query($con,"update user_info set first_name='$first_name', last_name='$last_name', email='$email', password='$user_password' where user_id='$user_id'")or die("Query 2 is inncorrect..........");

header("location: manageuser.php");
mysqli_close($con);
}
include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
        <div class="col-md-5 mx-auto">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Edit User</h5>
              </div>
              <div class="col-sm-7 ">
    <label style="font-size:18px;">Email</label><br>
    <input class="input-lg" style="font-size:18px; width:200px" name="email" type="text"  id="email" value="<?php echo $user_name; ?>" autofocus><br><br>
    </div>


<div class="col-sm-7 ">
<label style="font-size:18px;">Password</label><br>
<input class="input-lg" style="font-size:18px; width:200px" name="password" type="text"  id="password" value="<?php echo $user_password; ?>">
    <br><br></div>
    <div class="col-sm-7">
        <button type="submit" class="btn btn-success " name="btn_save" id="btn_save" style="font-size:18px">Submit</button></div>
</form>
              <form action="edituser.php" name="form" method="post" enctype="multipart/form-data">
              <div class="card-body">
                
                  
                  
                  
                  
                
              </div>
              
              </form>    
            </div>
          </div>
         
          
        </div>
      </div>
      <?php
include "footer.php";
?>