<?php
        require "dbutil.php";
        $db = DbUtil::loginConnection();

        $stmt = $db->stmt_init();

        if($stmt->prepare("select * from putt where placeID like ?") or die(mysqli_error($db))) {
                $searchString = '%' . $_GET['searchPuttPutt'] . '%';
                $stmt->bind_param(s, $searchString);
                $stmt->execute();
                $stmt->bind_result($placeID, $num_holes, $price, $age);
                echo "<table border=1><th>Place ID</th><th>Num Holes</th><th>Price</th><th>Age</th>\n";
                while($stmt->fetch()) {
                        echo "<tr><td>$placeID</td><td>$num_holes</td><td>$price</td><td>$age</td></tr>";
                }
                echo "</table>";

                $stmt->close();
        }

        $db->close();


?>
