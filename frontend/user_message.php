<?php
include './../backend/db_connect.php';
include './../backend/check_login.php';
?>
<html lang="en">

<head>
    <title>
        Page Title
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="user_detail.css">
    <link rel="stylesheet" href="user_message.css">
    <script src='lib/kit.fontawesome.js'></script>
    <script src='lib/jquery.js'></script>
</head>

<body>
    <div class="header">
        <h1>
            <?php
            echo "Welcome " . $_SESSION['username'];
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
            <h2>Chat Messages</h2>
            <script>
                function editMessage(messageId) {
                    var buttonId = "button" + messageId;
                    var inputId = "input" + messageId;
                    if ($("#" + buttonId).is(":visible")) {
                        $("#" + inputId).prop('disabled', true);
                        $("#" + buttonId).hide();
                    } else {
                        $("#" + inputId).prop('disabled', false);
                        $("#" + buttonId).show();
                    }
                }

                function sendRequest() {
                    $.ajax({
                        type: "POST",
                        url: "./../message_process.php", 
                        data: {
                            name: name,
                            email: email,
                            password: password
                        }, // passing the values
                        success: function(res) {
                            //do what you want here...
                        }
                    });
                }

                function deleteMessage(messageId) {
                    console.log("delete");
                }
            </script>
            <div class="container" style="height:400px; overflow: auto;">
                <?php
                $db = new DatabaseConnection();
                $sql = 'SELECT 
                                * 
                            FROM user_message 
                            WHERE 
                                (toUserId = ? AND fromUserId = ?) 
                                OR 
                                (fromUserId = ? AND toUserId = ?) 
                            ORDER BY messageId;';

                $result = $db->getResultQuerry($sql, "dddd", $_GET["userId"], $_SESSION["userId"], $_GET["userId"], $_SESSION["userId"]);
                while ($row = mysqli_fetch_array($result)) {
                    if ($row["fromUserId"] === $_SESSION["userId"]) {
                        echo "<div class='container'>";
                        echo "<div>";
                        echo "<i class='far fa-trash-alt icon-action' onclick='deleteMessage(" . $row["messageId"] . ")' ></i>";
                        echo "<i style='margin-right: 10px' class='fas fa-marker icon-action' onclick='editMessage(" . $row["messageId"] . ")' ></i>";
                        echo "</div>";
                        echo "<img src='a2.jpg' class='right' alt='Avatar' style='width:100%;'>";
                        echo "<input style='width:80%' disabled value='" . $row["content"] . "' id='input" . $row["messageId"] . "'>";
                        echo "<br>";
                        echo "<input id='button" . $row["messageId"] . "' type='submit' style='display: none; margin-top: 5px; ' value='Submit'>";
                        echo "</div>";
                    } else {
                        echo "<div class='container darker'>";
                        echo "<img src='a1.jpg' alt='Avatar' style='width:100%;'>";
                        echo "<p>" . $row["content"] . "</p>";
                        echo "</div>";
                    }
                }
                ?>
            </div>
            <div class="container">
                <form action="./../backend/message_process.php" method="POST">
                    <label for="subject">Message</label>
                    <input type="hidden" name="toUserId" id="toUserId" value=<?php echo $_GET["userId"] ?>>
                    <textarea type="text" id="content" name="content" placeholder="Write something.." style="height:100px"></textarea>
                    <input type="submit" value="Submit">
                </form>
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