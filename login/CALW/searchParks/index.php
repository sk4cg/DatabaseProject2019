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
<a href="download.php">Download List of Charlottesville Parks</a>
HTML;
?>

<!DOCTYPE html>
<!-- saved from url=(0058)http://www.cs.virginia.edu/~cc5ny/ajax/ex01/ex01index.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	<link rel='stylesheet' href='styles.css' type='text/css' />
	<p>
    	<button class="backbutton" onclick="goBack()">Go Back</button>
        <script src="js/jquery-1.6.2.min.js" type="text/javascript"></script> 
	<script src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
 	<title>AJAX Persons Example - Displaying FILES</title>
	<script>
	$(document).ready(function() {
		$( "#Rinput" ).change(function() {
		
			$.ajax({
				url: 'searchPark.php', 
				data: {searchPark: $( "#Rinput" ).val(), permission: $( "#perm" ).val()},
				success: function(data){
					$('#Rresult').html(data);	
				
				}
			});
		});
		
	});
	
	$(document).ready(function() {
                $( "#Tinput" ).change(function() {

                        $.ajax({
                                url: 'searchType.php',
                                data: {searchType: $( "#Tinput" ).val(), permission: $( "#perm" ).val()},
                                success: function(data){
                                        $('#Rresult').html(data);

                                }
                        });
                });

        });

	$(document).ready(function() {
                $( "#Rinput" ).change(function() {

                        $.ajax({
                                url: 'searchPReviews.php',
                                data: {searchPReviews: $( "#Rinput" ).val(), permission: $( "#perm" ).val()},
                                success: function(data){
                                        $('#Xresult').html(data);

                                }
                        });
                });

        });

	$(document).ready(function() {
                $( "#Tinput" ).change(function() {

                        $.ajax({
                                url: 'searchTReviews.php',
                                data: {searchTReviews: $( "#Tinput" ).val(), permission: $( "#perm" ).val()},
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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body>
	<div class="div1">
	<h3>Search Charlottesville Parks!</h3>	
        </div>
	<input type="hidden" id="perm" value="<?php echo $_SESSION["permission"]; ?>"/>
	<input class="xlarge" id="Rinput" type="search" size="30" placeholder="Search By Park Name">
	<br>
	<input class="xlarge" id="Tinput" type="search" size="30" placeholder="Search By Park Type (e.g. dog)">
	<p>
	<button class="button" type="button">Search</button>

	<p>
		
	<div id="Rresult" style="width: 30%; margin: 0 auto;"></div>
	<p>
	<div id="Xresult" style="width: 30%; margin: 0 auto;"></div>
	
	<br></br>

</body></html>
