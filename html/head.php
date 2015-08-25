<head>
	<title><?php echo APP_TITLE; ?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?php echo APP_TITLE; ?>">
	<meta name="Oliver Martinez" content="<?php echo APP_TITLE; ?>">
	<link rel="shortcut icon" href="http://getbootstrap.com/assets/ico/favicon.ico">

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/signin.css" rel="stylesheet">
	<link href="css/bootstrapui/jquery-ui-1.10.0.custom.css" rel="stylesheet" />
  <link href="css/ui.jqgrid.css" rel="stylesheet" media="screen" />
  <link href="css/jquery.toast.min.css" rel="stylesheet" media="screen" />

  <script src="js/jquery.js"></script>

</head>

<body>

  <?php 

  require_once("includes/initialize.php");

  if($session->is_logged_in()) { 

  ?>

    <div class="navbar navbar navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#"><?php echo APP_TITLE; ?></a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class=""><a href="index.php">Students</a></li>
            <li class=""><a href="users.php">Users</a></li>
            <li class="pull-right"><a href="logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>

  <?php } ?>