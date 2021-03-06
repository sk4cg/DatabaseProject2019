<?php
session_start();
if(empty($_SESSION['permission'])){
echo "Hello! To access this webpage, you first must login or make an account.";
echo <<<HTML
<a href="../../../login">Log In</a>
HTML;
exit;
}
if($_SESSION['permission'] == 'ram8yx_a'){
echo <<<HTML
<form action="deleteReview.php" method="get" id="form1">
  To delete a review, insert reviewID: <input type="text" name="deleteP"><br>
  <input type="hidden" name="perm" value="ram8yx_a" />
</form>
<button type="submit" form="form1" value="Submit" onclick="return confirm('Are you sure you want to delete?');">Submit</button>

<p id="demo" onclick="myFunction()">Click me to get the list of all reviews for reference (when deleting)!</p>

<script>
function myFunction() {
  $.ajax(
        {
                url: 'displayReviews.php',
                data: {permission: 'ram8yx_b'},
                success: function(data){
                        $('#Rresult').html(data);
                }
        }
        );
}
</script>
<br></br>
HTML;
}
?>

<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    <link rel='stylesheet' href='styles.css' type='text/css' />
    <button class="backbutton" onClick="goBack()">Go Back</button>
    <script src="js/jquery-1.6.2.min.js" type="text/javascript"></script> 
        <script src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
        <title>Submit a Review</title>
	<script>
        $.ajax(
	{
		url: 'displayPlaces.php',
		data: {displayPlaces: $("#Pinput").val(), permission: 'ram8yx_b'},
		success: function(data){
			$('#Presult').html(data);
		}
	}
	);
	$(document).ready(function() {
                $( "#Dinput" ).change(function() {
                        $.ajax({
                                url: 'submitReview.php', 
                                data: {submitR: $( "#Cinput" ).val(), actualR: $( "#Dinput" ).val(), permission: $( "#perm" ).val()},
                                success: function(data){
                                        $('#Cresult').html(data);       
                                
                                }
                        });
                });
                
        });
	 function goBack() {
            window.history.back();
        }
        </script>
</head>
<body>
        
	<div class="div1">
	<h3> Please refer to the table below to submit a review:  <h3>
	</div>
	<input type="hidden" id="perm" value="<?php echo $_SESSION["permission"]; ?>"/>
	<div id="Rresult"></div>
	<div id="Presult"></div>
	<br>
	Place you are reviewing:
        <input class="xlarge" id="Cinput" type="search" size="10" placeholder="Place ID"><br>
	Review: <br>
	<input class="xlarge" id="Dinput" type="search" size="200" placeholder="Write Review Here">
	<br></br>
	<button class="button" type="submit" value="Submit">Submit</button>
	<div id="Cresult"></div>
</body></html>
