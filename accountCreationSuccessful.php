<?php 
include_once("navbar.php");
include("loginSQL.php");
?>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<div class="main">
	<h3>Your username is: <?php echo $_SESSION['username'] ?> </h3>
	<h3>Account creation successful, click <a href="login.php">here</a> to login</h3>

</div>

<?php include("footer.php") ?>
