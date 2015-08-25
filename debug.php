<?php 

/* 
  BY NEMORY OLIVER MARTINEZ - nemoryoliver@gmail.com
*/

require_once("includes/initialize.php");

?>

<!DOCTYPE html>
<html lang="en">

  <?php include_once("html/head.php"); ?>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#"><?php echo APP_TITLE; ?></a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="container" style="margin-top:50px;">

       <p>Date: <input type="text" id="datepicker"></p>
       
    </div>

    <?php include_once("html/foot.php"); ?>

    <script>

      var humanDate = new Date(1393974000);

      console.log(humanDate.toLocaleDateString());

    </script>
    
  </body>
</html>