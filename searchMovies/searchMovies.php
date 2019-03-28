<?php
        require "dbutil.php";
        $db = DbUtil::loginConnection();

        $stmt = $db->stmt_init();

        if($stmt->prepare("select * from plays natural join place where title like ?") or die(mysqli_error($db))) {
                $searchString = '%' . $_GET['searchMovies'] . '%';
                $stmt->bind_param(s, $searchString);
                $stmt->execute();
                $stmt->bind_result($placeID, $title, $year, $name, $hours_of_op, $rating, $street, $city, $state);
                echo "<table border=1><th>Movie Title</th><th>Movie Year</th><th>Theater Name</th><th>Hours of Operation</th><th>Theate Rating</th><th>Street</th><th>City</th><th>State</th>\n";                
		while($stmt->fetch()) {
                        echo "<tr><td>$title</td><td>$year</td><td>$name</td><td>$hours_of_op</td><td>$rating</td><td>$street</td><td>$city</td><td>$state</td>";
                }
                echo "</table>";

                $stmt->close();
        }

        $db->close();


?>
