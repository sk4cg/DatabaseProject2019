<?php
        require "dbutil.php";
        $db = DbUtil::loginConnection($_GET['permission']);

        $stmt = $db->stmt_init();

        if($stmt->prepare("select name, ambiance, cuisine, price, menu, street, city, state from restaurant natural join place where price like ?") or die(mysqli_error($db))) {
                $searchString = $_GET['searchRPrice'];
                $check = $_GET['permission'];
                $stmt->bind_param(s, $searchString);
                $stmt->execute();
                $stmt->bind_result($name, $ambiance, $cuisine, $price, $menu, $street, $city, $state);
                echo "<table border=1><th>Restaurant Name</th><th>Ambiance</th><th>Cuisine</th><th>Price</th><th>Menu</th><th>Street</th><th>City</th><th>State</th>\n";
                while($stmt->fetch()) {
                        echo "<tr><td>$name</td><td>$ambiance</td><td>$cuisine</td><td>$price</td><td>$menu</td><td>$street</td><td>$city</td><td>$state</td></tr>";
                }
                echo "</table>";

                
        }
	/*
	if($stmt->prepare("select name, review from restaurant natural join place natural join place_review where cuisine like ?") or die(mysqli_error($db))) {
                $searchString = '%' . $_GET['searchRCuisine'] . '%';
                $stmt->bind_param(s, $searchString);
                $stmt->execute();
                $stmt->bind_result($name, $review);
                echo "<table border=1><h3>Restaurant Reviews</h3><th>Restaurant Name</th><th>Review</th>\n";
                while($stmt->fetch()) {
                        echo "<tr><td>$name</td><td>$review</td></tr>";
                }
                echo "</table>";

                $stmt->close();
        }
	*/
        $db->close();


?>
