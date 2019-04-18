<?php
        require "dbutil.php";
        $db = DbUtil::loginConnection($_GET['permission']);

        $stmt = $db->stmt_init();

        if($stmt->prepare("select title, year, name, street, city, state from plays natural join place where title like ?") or die(mysqli_error($db))) {
                $searchString = '%' . $_GET['searchMovies'] . '%';
                $stmt->bind_param(s, $searchString);
                $stmt->execute();
                $stmt->bind_result($title, $year, $name, $street, $city, $state);
                echo "<table border=1><th>Movie Title</th><th>Movie Year</th><th>Theater Name</th><th>Street</th><th>City</th><th>State</th>\n";                
		while($stmt->fetch()) {
                        echo "<tr><td>$title</td><td>$year</td><td>$name</td><td>$street</td><td>$city</td><td>$state</td>";
                }
                echo "</table>";
        }
	/* 
	 if($stmt->prepare("select distinct name, review from plays natural join place natural join place_review where title like ?") or die(mysqli_error($db))) {
                $searchString = '%' . $_GET['searchMovies'] . '%';
                $stmt->bind_param(s, $searchString);
                $stmt->execute();
                $stmt->bind_result($name, $review);
                echo "<table border=1><h3>Reviews</h3><th>Name</th><th>Review</th>\n";
                while($stmt->fetch()) {
                        echo "<tr><td>$name</td><td>$review</td>";
                }
                echo "</table>";

                $stmt->close();
        }
	*/

        $db->close();


?>
