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
    <div class="header">
        <h1>
            <?php
            echo "Welcome " . $userDetail->name;
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
            <h2>
                List user
            </h2>
            <table border='1'>
                <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Action</th>
                </tr>
                <?php
                
                foreach ($pageUsers->data as &$user) {
                    echo "<tr>";
                    echo "<td>" . $user->userId . "</td>";
                    echo "<td>" . $user->name . "</td>";
                    echo "<td>" . "<button onclick=\"location.href='./C_UserDetail.php?id=" . $user->userId . "'\" class=\"button button_action\">View detail</button>" . "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
            <div class="pagination">
                <a href="#">&laquo;</a>
                <?php

                // $sql = 'SELECT COUNT(*) as total FROM user WHERE userId <> ? LIMIT 5 OFFSET 0;';
                // $result = $db->getResultQuerry($sql, "d", $_SESSION["userId"]);
                // $row = mysqli_fetch_assoc($result);
                // $total =  $row["total"];
                // $size = 5;
                // $loop_time = $total / $size;
                // for ($page_number = 1; $page_number <= $loop_time + 1; $page_number++) {
                //     echo '<a href="#">' . $page_number . '</a>';
                // }
                ?>
                <a href="#">&raquo;</a>
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