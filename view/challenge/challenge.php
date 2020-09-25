<html lang="en">

<head>
    <title>
        Page Title
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./../view/home/home.css">
    <script src='./../view/lib/kit.fontawesome.js'></script>
    <script src='./../view/lib/jquery.js'></script>
</head>

<body>
    <?php include_once "./../view/header.php"; ?>
    <?php include_once "./../view/navbar.php"; ?>

    
    <div class="row">
        <?php include_once "./../view/side.php"; ?>
        <div class="main">
            <span style="font-size:20px">
                List challenge
            </span>
            <?php
            if ($_SESSION["type"] === 1) {
                echo "<button onclick=\"location.href='./C_AddChallenge.php'\" class='button button_action'>Add Challenge</button>";
            } else {
                echo "<br>";
                echo "<br>";
            }
            ?>
            <table border='1'>
                <tr>
                    <th>Id</th>
                    <th>Challenge</th>
                    <th>Action</th>
                </tr>
                <?php

                foreach ($page->data as &$challenge) {
                    echo "<tr>";
                    echo "<td>" . $challenge->challengeId . "</td>";
                    echo "<td>Challenge " . $challenge->challengeId . "</td>";
                    echo "<td>" . "<button onclick=\"location.href='./C_Challenge.php?id=" . $challenge->challengeId . "'\" class=\"button button_action\">View detail</button>" .
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
    <div class="footer">
        <h2>
            Footer
        </h2>
    </div>
</body>

</html>