<?php
session_start();
if(empty($_SESSION['permission'])){
echo "Hello! To access this webpage, you first must login or make an account.";
echo <<<HTML
<a href="../../login">Log In</a>
HTML;
exit;
}
?>

<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    <link rel='stylesheet' href='styles.css' type='text/css' />
    <script src="js/jquery-1.6.2.min.js" type="text/javascript"></script> 
	<script src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
 	<title>AJAX Persons Example - Displaying FILES</title>
	<script>
	$(document).ready(function() {
		$( "#LastNinput" ).change(function() {
		
			$.ajax({
				url: 'ex01searchPersons.php', 
				data: {searchLastName: $( "#LastNinput" ).val()},
				success: function(data){
					$('#LastNresult').html(data);	
				
				}
			});
		});
		
	});
	</script>
</head>
<body>
	<div class="div1">
	<h3>Welcome to our Charlottesville Activity Lookup Website! (CALW)</h3>	
	</div>
	<div class="div2">
		<img src="cville.jpg"> 
	</div>        

	<div class="div3">
	<h4>What do you want to search for? Press a button:</h4>   
	<button id="places" class="float-left submit-button" >All Places</button>

	<button id="movies" class="float-left submit-button" >Movies</button>
	<button id="concerts" class="float-left submit-button" >Concerts</button>
	<button id="parks" class="float-left submit-button" >Parks</button>
	<button id="puttputt" class="float-left submit-button" >Putt-Putt</button>
	<button id="restaurants" class="float-left submit-button" >Restaurants</button>
	<button id="logout" class="float-left submit-button">Logout</button>
	</div>
<br/>
<div class="div4"><h4> Here to submit a review? <h4></div>
<button id="review" class="float-left2 submit-button" > Submit a Review </button>

<script type="text/javascript">
    document.getElementById("places").onclick = function () {
        location.href = "searchPlaces/";
    };
    document.getElementById("movies").onclick = function () {
        location.href = "searchMovies/";
    };
    document.getElementById("concerts").onclick = function () {
        location.href = "searchConcerts/";
    };
    document.getElementById("puttputt").onclick = function () {
        location.href = "searchPuttPutt/";
    };
    document.getElementById("parks").onclick = function () {
        location.href = "searchParks/";
    };
    document.getElementById("restaurants").onclick = function () {
        location.href = "searchRestaurants/";
    };
    document.getElementById("review").onclick = function () {
        location.href = "submitReview/";
    };
    document.getElementById("logout").onclick = function() {
    	<?php
    session_start();
    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name(),'',0,'/');
    session_regenerate_id(true);
?>
	location.href="../";
    };
</script>

</body></html>

