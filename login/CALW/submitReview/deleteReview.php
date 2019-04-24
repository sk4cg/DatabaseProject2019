<?php
        require "dbutil.php";
        $db = DbUtil::loginConnection($_GET['perm']);
        $stmt = $db->stmt_init();

        if($stmt->prepare("delete from place_review where reviewID=?") or die(mysqli_error($db))) {
                $searchString = $_GET['deleteP'];
                $stmt->bind_param(s, $searchString);
                $stmt->execute();
               echo "Deleted successfully!";
	              $stmt->close();
		      }

        $db->close();
?>

