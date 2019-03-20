<?php
        require "dbutil.php";
        $db = DbUtil::loginConnection();

        $stmt = $db->stmt_init();

        if($stmt->prepare("select * from place where name like ?") or die(mysqli_error($db))) {
                $searchString = '%' . $_GET['searchPlace'] . '%';
                $stmt->bind_param(s, $searchString);
                $stmt->execute();
                $stmt->bind_result($placeID, $name, $hours_of_op, $rating, $street, $city, $state);
                echo "<table border=1><th>Place ID</th><th>Name</th><th>Hours of Operation</th><th>Rating</th><th>Street</th><th>City</th><th>State</th>\n";
                while($stmt->fetch()) {
                        echo "<tr><td>$placeID</td><td>$name</td><td>$hours_of_op</td><td>$rating</td><td>$street</td><td>$street</td><td>$city</td><td>$state</td></tr>";
                }
                echo "</table>";

                $stmt->close();
        }

        $db->close();


?>
