<?php
        require "dbutil.php";
        $db = DbUtil::loginConnection();

        $stmt = $db->stmt_init();

        if($stmt->prepare("select * from movie_times  where title like ?") or die(mysqli_error($db))) {
                $searchString = '%' . $_GET['searchLastName'] . '%';
                $stmt->bind_param(s, $searchString);
                $stmt->execute();
                $stmt->bind_result($title, $year, $times);
                echo "<table border=1><th>Title</th><th>Year</th><th>Times</th>\n";
                while($stmt->fetch()) {
                        echo "<tr><td>$title</td><td>$year</td><td>$times</td></tr>";
                }
                echo "</table>";

                $stmt->close();
        }

        $db->close();


?>
