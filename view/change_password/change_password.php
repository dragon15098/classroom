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
    <?php include_once "./../view/header.php";  ?>
    <?php include_once "./../view/navbar.php"; ?>

    <div class="row">
        <?php include_once "./../view/side.php"; ?>
        <div class="main">
            <form method="POST">
                <div class="container">
                    <h1>Change password</h1>
                    <hr>
                    <label for="Password"><b>Password</b></label>
                    <input type="Password" placeholder="Password" name="password" id="password" required>

                    <label for="VerifyPassword"><b>Verify password</b></label>
                    <input type="Password" placeholder="VerifyPassword" name="verifyPassword" id="verifyPassword" required value="">
                    <input type="hidden" name="action" value="changePassword">
                    <button method="POST" formaction="C_ChangePassword.php" type="submit" style="float: right;" class="btn btn_action">Change</button>
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