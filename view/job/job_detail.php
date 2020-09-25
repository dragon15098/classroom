<html lang="en">

<head>
    <title>
        Page Title
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./../view/home/home.css">
    <link rel="stylesheet" href="./../view/job/job_detail.css">
    <script src='./../view/lib/kit.fontawesome.js'></script>
    <script src='./../view/lib/jquery.js'></script>
</head>

<body>
    <?php include_once "./../view/header.php";  ?>
    <?php include_once "./../view/navbar.php"; ?>

    <div class="row">
        <?php include_once "./../view/side.php"; ?>
        <div class="main">

            <?php
            if ($_SESSION["type"] === 1) {
                include_once "./../view/job/job_table.php";
            }
            ?>

            <h2>Job detail</h2>
            <div class="container">
                <label for="Name"><b>Job name</b></label>
                <p name="jobName" id="name"><?php echo $jobDetail->jobName ?></p>

                <label for="Name"><b>File job</b></label>
                <br>
                <br>
                <a href=<?php echo $jobDetail->filePath ?> download>Download</a>
                <br>
                <br>
            </div>
            <?php
            if ($_SESSION["type"] == 0) {
                if ($userHasSubmit) {
                    include_once("./../view/job/has_submit_job.php");
                } else {
                    include_once("./../view/job/submit_job.php");
                }
            }
            ?>
        </div>
    </div>
    <div class="footer">
        <h2>
            Footer
        </h2>
    </div>
</body>

</html>