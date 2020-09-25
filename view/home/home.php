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
    <?php include_once "./../view/header.php";  ?>
    <?php include_once "./../view/navbar.php"; ?>

    <script>
        function deleteUser(userId) {
            $.ajax({
                type: "POST",
                url: "./C_UserDetail.php",
                data: {
                    action: 'delete',
                    userId: userId,
                },
                success: function(res) {
                    if (res === "SUCCESS") {
                        location.reload();
                    }
                }
            });
        }
    </script>

    <div class="row">
        <?php include_once "./../view/side.php"; ?>
        <div class="main">
            <span style="font-size:20px">
                List user
            </span>
            <?php
            if ($_SESSION["type"] === 1) {
                echo "<button onclick=\"location.href='./C_AddUser.php'\" class='button button_action'>Add user</button>";
            } else {
                echo "<br>";
                echo "<br>";
            }
            ?>
            <table border='1'>
                <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Action</th>
                </tr>
                <?php

                foreach ($page->data as &$user) {
                    echo "<tr>";
                    echo "<td>" . $user->userId . "</td>";
                    echo "<td>" . $user->name . "</td>";
                    echo "<td>";
                    echo "<button onclick=\"location.href='./C_UserDetail.php?id=" . $user->userId . "'\" class=\"button button_action\">View detail</button>";
                    if ($_SESSION["type"] === 1) {
                        echo "<button onclick=\"location.href='./C_ChangePassword.php?id=" . $user->userId . "'\" class=\"button button_action\">Change password</button>";
                        echo "<button onclick='deleteUser(" . $user->userId . ")' class=\"button button_action\">Delete user</button>";
                    }
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
            <?php
            include_once "./../view/page_footer.php"
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