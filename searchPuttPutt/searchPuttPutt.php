<?php
        require "dbutil.php";
        $db = DbUtil::loginConnection();

        $stmt = $db->stmt_init();

        if($stmt->prepare("select * from putt natural join place where name like ?") or die(mysqli_error($db))) {
                $searchString = '%' . $_GET['searchPuttPutt'] . '%';
                $stmt->bind_param(s, $searchString);
                $stmt->execute();
                $stmt->bind_result($placeID, $num_holes, $price, $age, $name, $hours_of_op, $rating, $street, $city, $state);
                echo "<table border=1><th>name</th><th>hours_of_op</th><th>rating</th><th>city</th>\n";
                while($stmt->fetch()) {
                        echo "<tr><td>$name</td><td>$hours_of_op</td><td>$rating</td><td>$city</td></tr>";
                }
                echo "</table>";

                $stmt->close();
        }

        $db->close();


?>
