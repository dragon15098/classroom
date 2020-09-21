<html lang="en">

<head>
    <title>
        Page Title
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./../view/home/home.css">
    <link rel="stylesheet" href="./../view/user_detail/user_detail.css">
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
            <form method="POST">
                <div class="container">
                    <h1>User infomation</h1>
                    <hr>

                    <label for="Name"><b>Name</b></label>
                    <input type="text" placeholder="Name" name="name" id="name" value=<?php echo $user->name ?>>

                    <label for="Username"><b>Username</b></label>
                    <input type="text" placeholder="Username" name="username" id="username" readonly value=<?php echo $user->username ?>>

                    <!-- <label for="Password"><b>Password</b></label>
				    <input type="Password" placeholder="Password" name="password" id="password"  value="" required >

				   <label for="VerifyPassword"><b>Verify password</b></label>
				    <input type="Password" placeholder="VerifyPassword" name="verifyPassword" id="verifyPassword" required value=""> -->

                    <label for="Email"><b>Email</b></label>
                    <input type="text" placeholder="Email" name="email" id="email" value=<?php echo $user->email ?>>

                    <label for="Phone number"><b>Phone number</b></label>
                    <input type="text" placeholder="Phone number" name="phoneNumber" id="phoneNumber" value=<?php echo $user->phoneNumber ?>>
                    <hr>

                    <input type="hidden" name="userId" id="userId" value=<?php echo $user->userId ?>>
                    <input type="hidden" name="action" value='load'>

                    <a href="C_Message.php?userId=<?php echo $user->userId ?> " style="float: left;" class="btn btn_action">Send Message</a>
                    <button method="POST" formaction="C_UserDetail.php" type="submit" style="float: right;" class="btn btn_action">Update Info</button>
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