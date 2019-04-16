<?php
	session_start();
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
		echo "<div>";
		echo "Login Success.";
		echo "</div>";
		header('Location: CALW');
		exit;

} else {
  echo "Sorry, login was unsuccessful. Please go back and try again or create a new login.";
}

                $stmt->close();
        }

        $db->close();


?>

<html>

<head>
	<title>CALW LOGIN</title>
</head>

<body>
<br></br>
<form>
  <input type="button" value="Back to Login" onclick="history.back()">
</form>

</body>
</html>
