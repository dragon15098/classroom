<html lang="en">

<head>
    <title>
        Page Title
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./../view/home/home.css">
</head>

<body>
    <?php include_once "./../view/header.php"; ?>
    <?php include_once "./../view/navbar.php"; ?>

    <div class="row">
        <?php include_once "./../view/side.php"; ?>
        <div class="main">
            <span style="font-size:20px">
                List Job
            </span>
            <?php
            if ($_SESSION["type"] === 1) {
                echo "<button onclick=\"location.href='./C_AddJob.php'\" class='button button_action'>Add new Job</button>";
            } else {
                echo "<br>";
                echo "<br>";
            }
            ?>
            <table border='1'>
                <tr>
                    <th>Id</th>
                    <th>JobName</th>
                    <th>Action</th>
                </tr>
                <?php
                foreach ($page->data as &$job) {
                    echo "<tr>";
                    echo "<td>" . $job->jobId . "</td>";
                    echo "<td>" . $job->jobName . "</td>";
                    echo "<td>" . "<button onclick=\"location.href='./C_Job.php?jobId=" . $job->jobId . "'\" class=\"button button_action\">View detail</button>" .
                        "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
            <?php
                include_once "./../view/page_footer.php";
            ?>
            </div>
        </div>
    </div>
    <div class="footer">
        <h2>
            Footer
        </h2>
    </div>
</body>

</html>