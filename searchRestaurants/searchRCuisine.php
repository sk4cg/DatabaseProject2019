<?php
        require "dbutil.php";
        $db = DbUtil::loginConnection();

        $stmt = $db->stmt_init();

        if($stmt->prepare("select name, cuisine, ambiance, price, menu from restaurant natural join place where cuisine like ?") or die(mysqli_error($db))) {
                $searchString = '%' . $_GET['searchRCuisine'] . '%';
                $stmt->bind_param(s, $searchString);
                $stmt->execute();
                $stmt->bind_result($name, $cuisine, $ambiance, $price, $menu);
                echo "<table border=1><th>Restaurant Name</th><th>Cuisine</th><th>Ambiance</th><th>Price</th><th>Menu</th>\n";
                while($stmt->fetch()) {
                        echo "<tr><td>$name</td><td>$cuisine</td><td>$ambiance</td><td>$price</td><td>$menu</td></tr>";
                }
                echo "</table>";

                
        }
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

        $db->close();


?>
