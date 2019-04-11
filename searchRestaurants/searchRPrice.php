<?php
        require "dbutil.php";
        $db = DbUtil::loginConnection();

        $stmt = $db->stmt_init();

        if($stmt->prepare("select name, price, ambiance, cuisine, menu from restaurant natural join place where price like ?") or die(mysqli_error($db))) {
                $searchString = $_GET['searchRPrice'];
                $stmt->bind_param(s, $searchString);
                $stmt->execute();
                $stmt->bind_result($name, $price, $ambiance, $cuisine, $menu);
                echo "<table border=1><th>Restaurant Name</th><th>Price</th><th>Ambiance</th><th>Cuisine</th><th>Menu</th>\n";
                while($stmt->fetch()) {
                        echo "<tr><td>$name</td><td>$price</td><td>$ambiance</td><td>$cuisine</td><td>$menu</td></tr>";
                }
                echo "</table>";

                $stmt->close();
        }

        $db->close();


?>
