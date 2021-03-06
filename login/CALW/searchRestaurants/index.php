<?php
session_start();
if(empty($_SESSION['permission'])){
echo "Hello! To access this webpage, you first must login or make an account.";
echo <<<HTML
<a href="../../../login">Log In</a>
HTML;
exit;
}
?>

<?php
echo <<<HTML
<a href="download.php">Download List of Charlottesville Restaurants</a>
HTML;
?>

<!DOCTYPE html>
<!-- saved from url=(0058)http://www.cs.virginia.edu/~cc5ny/ajax/ex01/ex01index.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    <link rel='stylesheet' href='styles.css' type='text/css' />
    <p>
    <button class="backbutton" onClick="goBack()">Go Back</button>
    <script src="js/jquery-1.6.2.min.js" type="text/javascript"></script> 
	<script src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
 	<title>AJAX Persons Example - Displaying FILES</title>
	<script>
	$(document).ready(function() {
		$( "#Rinput" ).change(function() {
		
			$.ajax({
				url: 'searchRestaurants.php', 
				data: {searchRestaurants: $( "#Rinput" ).val(), permission: $( "#perm" ).val()},
				success: function(data){
					$('#Presult').html(data);	
				
				}
			});
		});
		
	});

	$(document).ready(function() {
                $( "#Cinput" ).change(function() {

                        $.ajax({
                                url: 'searchRCuisine.php',
                                data: {searchRCuisine: $( "#Cinput" ).val(), permission: $( "#perm" ).val()},
                                success: function(data){
                                        $('#Presult').html(data);

                                }
                        });
                });

        });

	$(document).ready(function() {
                $( "#Pinput" ).change(function() {

                        $.ajax({
                                url: 'searchRPrice.php',
                                data: {searchRPrice: $( "#Pinput" ).val(), permission: $( "#perm" ).val()},
                                success: function(data){
                                        $('#Presult').html(data);

                                }
                        });
                });

        });

	$(document).ready(function() {
                $( "#Rinput" ).change(function() {

                        $.ajax({
                                url: 'searchAReviews.php',
                                data: {searchAReviews: $( "#Rinput" ).val(), permission: $( "#perm" ).val()},
                                success: function(data){
                                        $('#Xresult').html(data);

                                }
                        });
                });

        });

	$(document).ready(function() {
                $( "#Cinput" ).change(function() {

                        $.ajax({
                                url: 'searchCReviews.php',
                                data: {searchCReviews: $( "#Cinput" ).val(), permission: $( "#perm" ).val()},
                                success: function(data){
                                        $('#Xresult').html(data);

                                }
                        });
                });

        });

	$(document).ready(function() {
                $( "#Pinput" ).change(function() {

                        $.ajax({
                                url: 'searchPReviews.php',
                                data: {searchPReviews: $( "#Pinput" ).val(), permission: $( "#perm" ).val()},
                                success: function(data){
                                        $('#Xresult').html(data);

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
	<h3>Search Charlottesville Restaurants!</h3>	
        </div>
	<input type="hidden" id="perm" value="<?php echo $_SESSION["permission"]; ?>"/>

	<input class="xlarge" id="Rinput" type="search" size="30" placeholder="Search By Ambiance">

	<div id="Rresult" style="width: 60%; margin: 0 auto;"></div>

	<input class="xlarge" id="Cinput" type="search" size="30" placeholder="Search By Cuisine">

	<div id="Cresult" style="width: 80%; margin: 0 auto;"></div>

	<input class="xlarge" id="Pinput" type="search" size="30" placeholder="Search By Price (enter $-$$$$)">
	
	<p>
        <button class="button" type="button">Search</button>
	<p>
	<div id="Presult" style="width: 80%; margin: 0 auto;"></div>
	<p>
	<div id="Xresult" style="width: 30%; margin: 0 auto;"></div>
</body></html>
