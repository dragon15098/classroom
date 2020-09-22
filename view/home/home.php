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
    <?php include_once "./../view/header.php";  ?>
    <?php include_once "./../view/navbar.html"; ?>

    <div class="row">
        <?php include_once "./../view/side.php"; ?>
        <div class="main">
            <span style="font-size:20px">
                List user
            </span>
            <button onclick="location.href='./C_AddUser.php'" class='button button_action'>
                Add user
            </button>
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
                    echo "<td>" . "<button onclick=\"location.href='./C_UserDetail.php?id=" . $user->userId . "'\" class=\"button button_action\">View detail</button>" .
                        "<button onclick=\"location.href='./C_UserDetail.php?id=" . $user->userId . "'\" class=\"button button_action\">Change password</button>" .
                        "<button onclick=\"location.href='./C_UserDetail.php?id=" . $user->userId . "'\" class=\"button button_action\">Change password</button>" .
                        "</td>";
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