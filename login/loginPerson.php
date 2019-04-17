<?php
        require "dbutil.php";
        $db = DbUtil::loginConnection();

        $stmt = $db->stmt_init();

        if($stmt->prepare("select * from loginPerm where username like ? and password like ?") or die(mysqli_error($db))) {
                $searchString = $_POST['username'];
		$searchPassword = $_POST['password'];
                $stmt->bind_param(ss, $searchString, $searchPassword);
                $stmt->execute();
		$stmt->store_result();
		if($stmt->num_rows > 0){
		$stmt->bind_result($username, $password, $permission);
		while($stmt->fetch()) {
                        $newVariable=$permission;
                }
		session_start();
		$_SESSION["permission"] = $permission;
		echo "<div>";
                echo $_SESSION["permission"];
                echo "</div>";
		header('Location: CALW/index.php');
		exit;
		

} else {
  echo "Sorry, login was unsuccessful. Please go back and try again or create a new login.";
}

                $stmt->close();
        }

        $db->close();


?>
