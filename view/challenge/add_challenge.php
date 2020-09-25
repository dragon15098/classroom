<html lang="en">

<head>
    <title>
        Page Title
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./../view/home/home.css">
    <link rel="stylesheet" href="./../view/challenge/add_challenge.css">
</head>

<body>
    <?php include_once "./../view/header.php";  ?>
    <?php include_once "./../view/navbar.php"; ?>

    <div class="row">
        <?php include_once "./../view/side.php"; ?>
        <div class="main">
            <form action="C_AddJob.php" method="post" enctype="multipart/form-data">
                <div class="container">
                    <h1>Add Challenge</h1>

                    <textarea type="text" id="content" name="hint" placeholder="Write some hint.." style="height:100px"></textarea>
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <input type="hidden" name="action" value="submit">
                    <br>

                    <button method="POST" formaction="C_AddChallenge.php" type="submit" style="float: right;" class="btn btn_action">Create challenge</button>
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