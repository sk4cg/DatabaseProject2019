<?php
        require "dbutil.php";
        $db = DbUtil::loginConnection($_GET['permission']);

        $stmt = $db->stmt_init();

	if($stmt->prepare("INSERT INTO place_review (placeID, review) VALUES (?,?)") or die(mysqli_error($db))) {
                $stmt->bind_param(ss, $ref, $aReview);
		$ref = $_GET['submitR'];
                $aReview = $_GET['actualR'];
                
		$stmt->execute();
                if(mysqli_error($db)){
		echo mysqli_error($db);}
		else{echo "New Review Added Successfully";}
                $stmt->close();
        }       
        $db->close();


?>
