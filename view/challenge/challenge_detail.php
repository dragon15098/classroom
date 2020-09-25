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
            <form method="post">
                <div class="container">
                    <h1>Challenge detail</h1>
                    <label>
                        <b>
                            Hint
                        </b>
                    </label>
                    <textarea type="text" disabled id="content" name="hint" placeholder="Write some hint.." style="height:100px"><?php echo $hint ?></textarea>
                    <input type="hidden" name="action" value="submit">
                    <input type="hidden" name="challengeId" value=<?php echo $_GET["id"] ?>>
                    <label>
                        <b>
                            Answer
                        </b>
                    </label>
                    <input type="text" name="answer">

                    <br>

                    <button method="POST" formaction="C_Challenge.php" type="submit" style="float: right;" class="btn btn_action">Submit answer</button>
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