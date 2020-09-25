<!doctype html>
<html lang="en">

<div class="navbar">
    <a href="./C_Home.php">Home</a> 
    <a href="./C_Job.php">Job</a> 
    <a href="./C_Challenge.php">Challange</a> 
    <a style="float: right; " href="./../index.php">Log out</a>    
    <a style="float: right; " href="./C_ChangePassword.php?id=<?php echo $_SESSION['userId']?>">Change Password</a> 
    <a style="float: right; " href="./C_UserDetail.php?id=<?php echo $_SESSION['userId']?>">Update profile</a> 
    
</div>


</html>