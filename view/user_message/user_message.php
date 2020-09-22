<html lang="en">

<head>
    <title>
        Page Title
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./../view/home/home.css">
    <link rel="stylesheet" href="./../view/user_detail/user_detail.css">
    <link rel="stylesheet" href="./../view/user_message/user_message.css">
    <script src='./../view/lib/kit.fontawesome.js'></script>
    <script src='./../view/lib/jquery.js'></script>
</head>

<body>
    <?php include_once "./../view/header.php";  ?>
    <?php include_once "./../view/navbar.html"; ?>

    <div class="row">
        <?php include_once "./../view/side.php"; ?>
        <div class="main">
            <h2>Chat Messages</h2>
            <script>
                function changeView(messageId) {
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

                function editMessage(messageId) {
                    var inputId = "input" + messageId;
                    console.log("ABC");
                    $.ajax({
                        type: "POST",
                        url: "./C_Message.php",
                        data: {
                            action: 'edit',
                            messageId: messageId,
                            content: $("#" + inputId).val()
                        },
                        success: function(res) {
                            if (res === "SUCCESS") {
                                location.reload();
                            }
                        }
                    });
                }

                function deleteMessage(messageId) {
                    $.ajax({
                        type: "POST",
                        url: "./C_Message.php",
                        data: {
                            action: 'delete',
                            messageId: messageId
                        },
                        success: function(res) {
                            if (res === "SUCCESS") {
                                location.reload();
                            }
                        }
                    });
                }
            </script>
            <div class="container" style="height:400px; overflow: auto;">
                <?php

                foreach ($user_messages as &$message) {
                    if ($message->fromUserId === $_SESSION["userId"]) {
                        echo "<div class='container_message'>";
                        echo "<i class='far fa-trash-alt icon-action' onclick='deleteMessage(" . $message->messageId . ")' ></i>";
                        echo "<i style='margin-right: 10px' class='fas fa-marker icon-action' onclick='changeView(" . $message->messageId . ")' ></i>";
                        echo "<br>";
                        echo "<input style='float:right;' disabled value='" . $message->content . "' id='input" . $message->messageId . "'>";
                        echo "<br>";
                        echo "<br>";
                        echo "<input onClick='editMessage(" . $message->messageId . ")' id='button" . $message->messageId . "' type='submit' class='input_edit' value='Submit'>";
                        echo "</div>";
                    } else {
                        echo "<div class='container_message darker'>";
                        echo "<p>" . $message->content . "</p>";
                        echo "</div>";
                    }
                }
                ?>
            </div>
            <div class="container">
                <form action="./C_Message.php" method="POST">
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