<?php
        require "dbutil.php";
        $db = DbUtil::loginConnection($_GET['permission']);

        $stmt = $db->stmt_init();

        if($stmt->prepare("select artist, date, time, price, genre, name, street, city, state, capacity from concert natural join concert_venue natural join place natural join holds where genre like ?") or die(mysqli_error($db))) {
                $searchString = '%' . $_GET['searchGenre'] . '%';
                $stmt->bind_param(s, $searchString);
                $stmt->execute();
                $stmt->bind_result($artist, $date, $time, $price, $genre, $name, $street, $city, $state, $capacity);
                echo "<table border=1><th>Artist</th><th>Date</th><th>Time</th><th>Price</th><th>Genre</th><th>Venue Name</th><th>Street</th><th>City</th><th>State</th><th>Venue Capactiy</th>\n";
                while($stmt->fetch()) {
                        echo "<tr><td>$artist</td><td>$date</td><td>$time</td><td>$price</td><td>$genre</td><td>$name</td><td>$street</td><td>$city</td><td>$state</td><td>$capacity</td></tr>";
                }
                echo "</table>";

                $stmt->close();
        }

        $db->close();


?>
