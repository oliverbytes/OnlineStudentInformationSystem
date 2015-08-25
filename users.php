<?php 

/* 
  BY NEMORY OLIVER MARTINEZ - nemoryoliver@gmail.com
*/

require_once("includes/initialize.php");

if(!$session->is_logged_in())
{
  header("location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

  <?php include_once("html/head.php"); ?>

    <div class="container" style="margin-top:50px;">

      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Users</h3>
        </div>
        <div class="panel-body">
           <?php include_once("grids/users.php"); ?>
        </div>
      </div>
       
    </div>

    <?php include_once("html/foot.php"); ?>
    
  </body>
</html>