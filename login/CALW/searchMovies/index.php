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
    <button class="backbutton" onClick="goBack()">Go Back</button>
    <script src="js/jquery-1.6.2.min.js" type="text/javascript"></script> 
        <script src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
        <title>AJAX Persons Example - Displaying FILES</title>
        <script>
        $(document).ready(function() {
                $( "#Pinput" ).change(function() {
                
                        $.ajax({
                                url: 'searchMovies.php', 
                                data: {searchMovies: $( "#Pinput" ).val(), permission: $( "#perm" ).val()},
                                success: function(data){
                                        $('#Cresult').html(data);       
                                
                                }
                        });
                });
                
        });

	  $(document).ready(function() {
                $( "#Cinput" ).change(function() {

                        $.ajax({
                                url: 'searchTheaters.php',
                                data: {searchTheaters: $( "#Cinput" ).val(), permission: $( "#perm" ).val()},
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
        <h3>Search Charlottesvile Movies and Theaters!</h3>
	</div>
	<input type="hidden" id="perm" value="<?php echo $_SESSION["permission"]; ?>"/>
        <input class="xlarge" id="Pinput" type="search" size="30" placeholder="Search By Movie Title">
	</br>
	<div id="Presult" style="width: 60%; margin: 0 auto;"></div>
	<input class="xlarge" id="Cinput" type="search" size="30" placeholder="Search By Movie Theater">
	</br></br>        
	<div id="Cresult" style="width: 60%; margin: 0 auto;"></div>
	<button class="button" type="button">Search</button>
</body></html>
