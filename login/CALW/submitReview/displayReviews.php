<?php
        require "dbutil.php";
        $db = DbUtil::loginConnection($_GET['permission']);

        $stmt = $db->stmt_init();

        if($stmt->prepare("select reviewID, placeID, review from place_review") or die(mysqli_error($db))) {
                $stmt->execute();
                $stmt->bind_result($reviewID, $placeID, $review);
                echo "<table border=1><th>Review ID</th><th>Place ID</th><th>Review</th>\n";
                while($stmt->fetch()) {
                        echo "<tr><td>$reviewID</td><td>$placeID</td><td>$review</td>";
                }
                echo "</table>";
		echo "<br></br>";

                $stmt->close();
        }

        $db->close();


?>
