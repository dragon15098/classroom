<?php
	session_start();
?>
<html lang="en">
    <head>
        <title>
            Page Title
        </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="home.css">
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
						// include './../backend/db_connect.php';
						// $db = new DatabaseConnection();
						// $sql = 'SELECT UserId, Username, Password FROM user WHERE UserId <> ?;';
						// $result = $db->prepareQuery($sql, "d", $_SESSION["userId"]);
						// while($row = mysqli_fetch_array($result))
						// {	
						// 	echo "<tr>";
						// 	echo "<td>" . $row['UserId'] . "</td>";
						// 	echo "<td>" . $row['Username'] . "</td>";
						// 	echo "<td>" . "<button class=\"button button_action\">View detail</button>" . "</td>";
						// 	echo "</tr>";
						// }
					?>
				</table>
				<div class="pagination">
					<a href="#">&laquo;</a>
					<!-- <a href="#">1</a>
					<a href="#" class="active">2</a>
					<a href="#">3</a>
					<a href="#">4</a>
					<a href="#">5</a>
					<a href="#">6</a> -->
					<?php
						include './../backend/db_connect.php';
						$db = new DatabaseConnection();
						$sql = 'SELECT COUNT(*) FROM user WHERE UserId <> ?;';
						$result = $db->prepareQuery($sql, "d", $_SESSION["userId"]);
						$total = $result->fetchColumn();
						echo $total;
						$limit = 5;
						$page_show = $total / $limit;
						echo $page_show;
						while($page_show--){
							echo "<a> 4 </a>";
						}
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
