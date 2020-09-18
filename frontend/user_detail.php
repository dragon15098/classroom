<?php
	session_start();
	include './../backend/db_connect.php';
?>
<html lang="en">
    <head>
        <title>
            Page Title
        </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="home.css">
		<link rel="stylesheet" href="user_detail.css">
    </head>
    <body>
        <div class="header">
            <h1>
                <?php
                	echo "Welcome " . $_SESSION['username'];
                ?>
            </h1>
            <p>
                A <b>responsive</b> website created by me.
            </p>
        </div>
        <div class="navbar">
            <a href="#" class="active">Home</a> <a href="#">Link</a> <a href="#">Link</a> <a href="#" class="right">Link</a>
        </div>
        <div class="row">
            <div class="side">
                <h2>
                    About Me
                </h2>
                <h5>
                    Photo of me:
                </h5>
                <div class="fakeimg" style="height:200px;">
                    Image
                </div>
                <p>
                    Some text about me in culpa qui officia deserunt mollit anim..
                </p>
                <h3>
                    More Text
                </h3>
                <p>
                    Lorem ipsum dolor sit ame.
                </p>
                <div class="fakeimg" style="height:60px;">
                    Image
                </div>
                <br>
                <div class="fakeimg" style="height:60px;">
                    Image
                </div>
                <br>
                <div class="fakeimg" style="height:60px;">
                    Image
                </div>
            </div>
            <div class="main">	
				<?php
					$db = new DatabaseConnection();
					$sql = 'SELECT * FROM user WHERE UserId = ?;';
					$result = $db->getResultQuerry($sql, "d", $_GET["id"]);
					$row = mysqli_fetch_array($result);
				?>
				<form method="POST">
				<div class="container">
				    <h1>User infomation</h1>
				    <hr>

				    <label for="Name"><b>Name</b></label>
				    <input type="text" placeholder="Name" name="Name" id="Name" value= <?php echo $row["Name"] ?> >

				    <label for="Username"><b>Username</b></label>
				    <input type="text" placeholder="Username" name="Username" id="Username" readonly value= <?php echo $row["Username"] ?> >
				   
				   <label for="Password"><b>Password</b></label>
				    <input type="Password" placeholder="Password" name="Password" id="Password"  value="" required >

				   <label for="VerifyPassword"><b>Verify password</b></label>
				    <input type="Password" placeholder="VerifyPassword" name="VerifyPassword" id="VerifyPassword" required value="">
				   
				    <label for="Email"><b>Email</b></label>
				    <input type="text" placeholder="Email" name="Email" id="Email"  value= <?php echo $row["Email"] ?>  >
				  
				    <label for="Phone number"><b>Phone number</b></label>
				    <input type="text" placeholder="Phone number" name="PhoneNumber" id="PhoneNumber" value= <?php echo $row["PhoneNumber"] ?> >
				    <hr>

				    <input type="hidden" placeholder="UserId" name="UserId" id="UserId"  value= <?php echo $row["UserId"] ?>  >

				    <button formaction="./../backend/send_message.php" type="submit" style="float: left;" class="btn btn_action">Send Mail</button>
				    <button formaction="./../backend/update_info.php" type="submit" style="float: right;" class="btn btn_action">Update Info</button>
				</div>
				
				</form>
            </div>
        </div>
        <div class="footer">
            <h2>
                Footer
            </h2>
        </div>
    </body>
</html>
