<?php
        require "dbutil.php";
        $db = DbUtil::loginConnection();

        $stmt = $db->stmt_init();

        if($stmt->prepare("select * from place natural join plays where name like ?") or die(mysqli_error($db))) {
                $searchString = '%' . $_GET['searchTheaters'] . '%';
                $stmt->bind_param(s, $searchString);
                $stmt->execute();
                $stmt->bind_result($placeID, $name, $hours_of_op, $rating, $street, $city, $state, $title, $year);
                echo "<table border=1><th>Theater Name</th><th>Hours of Operation</th><th>Theater Rating</th><th>Street</th><th>City</th><th>State</th><th>Movie Title</th><th>Movie Year</th>\n";
                while($stmt->fetch()) {
                        echo "<tr><td>$name</td><td>$hours_of_op</td><td>$rating</td><td>$street</td><td>$city</td><td>$state</td><td>$title</td><td>$year</td></tr>";
                }
                echo "</table>";

 
        }
	if($stmt->prepare("select distinct name, review from place natural join plays natural join place_review where name like ?") or die(mysqli_error($db))) {
                $searchString = '%' . $_GET['searchTheaters'] . '%';
                $stmt->bind_param(s, $searchString);
                $stmt->execute();
                $stmt->bind_result($name, $review);
                echo "<table border=1><h3>Reviews</h3><th>Theater</th><th>Review</th>\n";
                while($stmt->fetch()) {
                        echo "<tr><td>$name</td><td>$review</td></tr>";
                }
                echo "</table>";

                $stmt->close();
        }

        $db->close();


?>
