<?php
        require "dbutil.php";
        $db = DbUtil::loginConnection();

        $stmt = $db->stmt_init();

        if($stmt->prepare("select * from restaurant where cuisine like ?") or die(mysqli_error($db))) {
                $searchString = '%' . $_GET['searchRCuisine'] . '%';
                $stmt->bind_param(s, $searchString);
                $stmt->execute();
                $stmt->bind_result($placeID, $ambiance, $cuisine, $price, $menu);
                echo "<table border=1><th>Place ID</th><th>Ambiance</th><th>Cuisine</th><th>Price</th><th>Menu</th>\n";
                while($stmt->fetch()) {
                        echo "<tr><td>$placeID</td><td>$ambiance</td><td>$cuisine</td><td>$price</td><td>$menu</td></tr>";
                }
                echo "</table>";

                $stmt->close();
        }

        $db->close();


?>
