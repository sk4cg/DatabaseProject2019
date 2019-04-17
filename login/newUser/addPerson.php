<?php
        require "dbutil.php";
        $db = DbUtil::loginConnection();

        $stmt = $db->stmt_init();

        if($stmt->prepare("INSERT INTO loginPerm (username, password, permission) VALUES (?,?, 'ram8yx_b')") or die(mysqli_error($db))) {
                $searchString = $_POST['username'];
		$searchPassword = $_POST['password'];
                $stmt->bind_param(ss, $searchString, $searchPassword);
                $stmt->execute();
		echo "You have successfully been added as a user. Please go back to the login page and login using these credentials."; 
		 $stmt->close();
        }
echo <<<HTML
<br></br>
<a href="../">Login</a>
HTML;

        $db->close();


?>
