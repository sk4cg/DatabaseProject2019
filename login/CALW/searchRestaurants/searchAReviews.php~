<?php
        require "dbutil.php";
        $db = DbUtil::loginConnection($_GET['permission']);

        $stmt = $db->stmt_init();

	 if($stmt->prepare("select distinct name, review from plays natural join place natural join place_review where title like ?") or die(mysqli_error($db))) {
                $searchString = '%' . $_GET['searchMReviews'] . '%';
                $stmt->bind_param(s, $searchString);
                $stmt->execute();
                $stmt->bind_result($name, $review);
                echo "<table border=1><h3>Reviews</h3><th>Name</th><th>Review</th>\n";
                while($stmt->fetch()) {
                        echo "<tr><td>$name</td><td>$review</td>";
                }
                echo "</table>";

                $stmt->close();
        }
        $db->close();


?>
