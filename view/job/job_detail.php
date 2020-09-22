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
    <?php include_once "./../view/navbar.html"; ?>

    <div class="row">
        <?php include_once "./../view/side.php"; ?>
        <div class="main">
            <form action="C_SubmitJob.php" method="post" enctype="multipart/form-data">
                <div class="container">
                    <h1>Job detail</h1>
                    <hr>

                    <label for="Name"><b>Job name</b></label>
                    <input type="text" placeholder="Job name" name="jobName" id="name" value=<?php echo $jobDetail->jobName ?>>
                    <label for="Name"><b>File job</b></label>
                    <br>
                    <br>
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <input type="hidden" name="jobId" id="jobId" value=<?php echo $jobDetail->jobId ?>>
                    <button method="POST" formaction="C_SubmitJob.php" type="submit" style="float: right;" class="btn btn_action">Submit</button>
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