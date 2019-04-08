<?php
        require "dbutil.php";
        $db = DbUtil::loginConnection();

        $stmt = $db->stmt_init();
	$
        if($stmt->prepare("insert into place_review(placeID, review) values(p, r)") or die(mysqli_error($db))) {
                $ID = '%' . $_GET['submitReview'] . '%';
		$stmt->bind_param(p, $Cinput);
		$stmt->bind_param(r, $Dinput);
                $stmt->execute();
                $stmt->bind_result($placeID, $review);
                echo "<table border=1><th>Name of Place</th><th>Place ID</th>\n";
                while($stmt->fetch()) {
                        echo "<tr><td>$placeID</td><td>$review</td>";
                }
                echo "</table>";

                $stmt->close();
        }

        $db->close();


?>
