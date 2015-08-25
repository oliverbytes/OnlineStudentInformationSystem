<?php 

/* 
  BY NEMORY OLIVER MARTINEZ - nemoryoliver@gmail.com
*/

require_once("includes/initialize.php");

if($session->is_logged_in())
{
  header("location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
  
  <?php include_once("html/head.php"); ?>

    <div class="container">
      <div class="form-signin">
        <h2 class="form-signin-heading">STI Student Information System</h2>
        <input id="username" type="username" class="form-control" placeholder="username" required><br/>
        <input id="password" type="password" class="form-control" placeholder="password" required><br/>
        <button id="btnlogin" class="btn btn-lg btn-primary btn-block">Login</button>

        <br/><br/><p class="muted credit">developed by <a href="http://nemoryoliver.com">Nemory Oliver Martinez</a> - <a href= "mailto: nemoryoliver@gmail.com" >nemoryoliver@gmail.com</a></p>
      </div>
    </div>

    <script>

    $("#btnlogin").click(function()
    {
    	var theusername = $("#username").val();
	    var thepassword = $("#password").val();

	    if(theusername.length > 0 && thepassword.length > 0)
	    {
	    	$("#btnlogin").prop("disabled", true);
	    	$("#btnlogin").text("Logging In...");

	    	$.post("includes/webservices/login.php", {username: theusername, password: thepassword}, function(response) 
	    	{
          console.log(response);

          var responseJSON = JSON.parse(response);

  				if(responseJSON.status == "okay")
  				{
  					window.location.href = "index.php";
  				}
  				else
  				{
  					alert(responseJSON.message);
  				}

  				$("#btnlogin").prop("disabled", false);
  				$("#btnlogin").text("Login");
  			});
	    }
	    else
    	{
    		alert("Please enter a username and a password.");
    	}
    });

    </script>

  </body>
</html>