<?php
        require "dbutil.php";
        $db = DbUtil::loginConnection($_GET['permission']);

        $stmt = $db->stmt_init();

        if($stmt->prepare("select placeID, name from place") or die(mysqli_error($db))) {
                $searchString = '%' . $_GET['submitReview'] . '%';
                $stmt->bind_param(s, $searchString);
                $stmt->execute();
                $stmt->bind_result($placeID, $name);
                echo "<table border=1><th>Name of Place</th><th>Place ID</th>\n";
                while($stmt->fetch()) {
                        echo "<tr><td>$name</td><td>$placeID</td>";
                }
                echo "</table>";

                $stmt->close();
        }

        $db->close();


?>
