<?php
        require "dbutil.php";
        $db = DbUtil::loginConnection();

        $stmt = $db->stmt_init();

        if($stmt->prepare("select * from concert where artist like ?") or die(mysqli_error($db))) {
                $searchString = '%' . $_GET['searchConcert'] . '%';
                $stmt->bind_param(s, $searchString);
                $stmt->execute();
                $stmt->bind_result($concert_ID, $artist, $date, $time, $price, $genre);
                echo "<table border=1><th>Concert ID</th><th>Artist</th><th>Date</th><th>Time</th><th>Price</th><th>Genre</th>\n";
                while($stmt->fetch()) {
                        echo "<tr><td>$concert_ID</td><td>$artist</td><td>$date</td><td>$time</td><td>$price</td><td>$genre</td></tr>";
                }
                echo "</table>";

                $stmt->close();
        }

        $db->close();


?>
