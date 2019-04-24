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
<a href="download.php">Download List of Charlottesville Places</a>
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
		$( "#Pinput" ).change(function() {
		
			$.ajax({
				url: 'searchPlace.php', 
				data: {searchPlace: $( "#Pinput" ).val(), permission: $( "#perm" ).val()},
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
	<script>
        $(document).ready(function() {
                $( "#Pinput" ).change(function() {
                
                        $.ajax({
                                url: 'searchPlace.php', 
                                data: {reviewDisplay: $( "#Pinput" ).val(), permission: $( "#perm" ).val()},
                                success: function(data){
                                        $('#Dresult').html(data);       
                                
                                }
                        });
                });
                
        });
        </script>
</head>
<body>
	<div class="div1">
	<h3>Search Charlottesville Places!</h3>	
	</div>           
        <div class="div2">
                <img src="blueridge.jpg">
        </div>
	<input type="hidden" id="perm" value="<?php echo $_SESSION["permission"]; ?>"/>
	<br></br>
	<input class="xlarge" id="Pinput" type="search" size="30" placeholder="Search for Place">
	<button type="button" class="button">Search</button>
	
	<br></br>

	<div id="Presult" style="width: 60%; margin: 0 auto;"></div><br/> 
	

</body></html>
