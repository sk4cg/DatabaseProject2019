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
<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

    <link rel='stylesheet' href='styles.css' type='text/css' />
    <script src="js/jquery-1.6.2.min.js" type="text/javascript"></script> 
	  <button class="backbutton" onClick="goBack()">Go Back</button>
	  <script src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
 	  <title>AJAX Persons Example - Displaying FILES</title>
	  <script>
        $(document).ready(function() {
                $( "#Ainput" ).change(function() {

                        $.ajax({
                                url: 'searchConcert.php',
                                data: {searchConcert: $( "#Ainput" ).val(), permission: $( "#perm" ).val()},
                                success: function(data){
                                        $('#Presult').html(data);

                                }
                        });
                });

        });
        $(document).ready(function() {
                $( "#Ginput" ).change(function() {

                        $.ajax({
                                url: 'searchGenre.php',
                                data: {searchGenre: $( "#Ginput" ).val(), permission: $( "#perm" ).val()},
                                success: function(data){
                                        $('#Presult').html(data);

                                }
                        });
                });

        });
        $(document).ready(function() {
                $( "#Dinput" ).change(function() {

                        $.ajax({
                                url: 'searchDate.php',
                                data: {searchDate: $( "#Dinput" ).val(), permission: $( "#perm" ).val()},
                                success: function(data){
                                        $('#Presult').html(data);

                                }
                        });
                });

        });
    $(document).ready(function() {
                $( "#Vinput" ).change(function() {

                        $.ajax({
                                url: 'searchVenue.php',
                                data: {searchVenue: $( "#Vinput" ).val(), permission: $( "#perm" ).val()},
                                success: function(data){
                                        $('#Presult').html(data);

                                }
                        });
                });

        });
        $(document).ready(function() {
                $( "#Pinput" ).change(function() {

                        $.ajax({
                                url: 'searchPrice.php',
                                data: {searchPrice: $( "#Pinput" ).val(), permission: $( "#perm" ).val()},
                                success: function(data){
                                        $('#Presult').html(data);

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
	<h3>Search Charlottesville Concerts!</h3>	
        </div>   
	<input type="hidden" id="perm" value="<?php echo $_SESSION["permission"]; ?>"/>
	<input class="xlarge" id="Ainput" type="search" size="30" placeholder="Search By Artist">
	<div id="Aresult" style="width: 70%; margin: 0 auto;"></div>
	<input class="xlarge" id="Ginput" type="search" size="30" placeholder="Search By Genre">
	<div id="Gresult" style="width: 70%; margin: 0 auto;"></div>
	<input class="xlarge" id="Vinput" type="search" size="30" placeholder="Search By Venue">
	<div id="Vresult" style="width: 70%; margin: 0 auto;"></div>
	<input class="xlarge" id="Dinput" type="search" size="30" placeholder="Search By Date (yyyy-mm-dd)">
	<div id="Dresult" style="width: 70%; margin: 0 auto;"></div>
	<input class="xlarge" id="Pinput" type="search" size="30" placeholder="Search By Price (e.g. $50)">
	<p>
	<div id="Presult" style="width: 70%; margin: 0 auto;"></div>
	<p>
	<button class="button" type="button">Search</button>
</body></html>
