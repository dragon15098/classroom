<?php
include_once("./controller/C_FacebookLogin.php");
// load up global things
    if ( isset( $_GET['state'] ) && FB_APP_STATE == $_GET['state'] ) { // coming from facebook
		// try and log the user in with $_GET vars from facebook 
		$fbUser = tryAndLoginWithFacebook( $_GET );
		echo ('<pre>');
		print_r($fbUser);
		die();
	}
?>


<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        form {
            border: 3px solid #f1f1f1;
        }

        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            opacity: 0.8;
        }

        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
        }

        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
        }

        img.avatar {
            width: 30%;
            border-radius: 50%;
        }

        .container {
            padding: 16px;
        }

        span.psw {
            float: right;
            padding-top: 16px;
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }

            .cancelbtn {
                width: 100%;
            }
        }
    </style>
    <title></title>
</head>

<body>
    <h2>
        Login Form
    </h2>
    <form action="controller/C_Login.php" method="post">
        <div class="imgcontainer">
            <img src="img_avatar2.png" alt="Avatar" class="avatar">
        </div>
        <div class="container">
            <label for="username">
                <b>Username</b>
            </label>
            <input type="text" placeholder="Enter Username" name="username" required="">
            <label for="password">
                <b>Password</b>
            </label>
            <input type="password" placeholder="Enter Password" name="password" required="">
            <button type="submit">Login</button>
        </div>

    </form>
    <div class="container">
        <?php
        echo ("<button style=\"background-color: #4267B2;\" onclick=\"location.href= '" . getFacebookLoginUrl() . "' \"  type=\"submit\">Login with Facebook</button>");
        ?>

    </div>

    <div class="container" style="background-color:#f1f1f1">
        <button type="button" class="cancelbtn">Cancel</button>
        <span class="psw">Forgot
            <a href="#">password?</a>
        </span>
    </div>
</body>

</html>