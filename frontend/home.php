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
                My Website
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
		    Colored Table Header
		</h2>
                <?php
			include './../backend/db_connect.php';
			$db = new DatabaseConnection();
			$result = $db->query('SELECT UserId, Username, Password FROM user;');
		
			echo "<table border='1'>
				<tr>
				<th>Firstname</th>
				<th>Lastname</th>	
				<th>Action</th>
				</tr>";
			
			while($row = mysqli_fetch_array($result))
			{			
				
				echo "<tr>";
				echo "<td>" . $row['Username'] . "</td>";
				echo "<td>" . $row['Password'] . "</td>";
				echo "<td>" . "<button class=\"button button_action\">View detail</button>" . "</td>";
				echo "</tr>";
			}

			echo "</table>";

			mysqli_close($con);
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
