<?php
include_once("navbar.php");
?>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="main.css?v=<?php echo time() ?>">
</head>

<div class="container rounded main d-flex justify-content-center">
	<div class="container text-align: justify-content-center">
		<h1 class="display-5 mx-auto"><strong>Welcome to Fitness Palace!</strong></h1>

		<img src="fitness.jpg" id="fitness" class=".img-thumbnail mx-auto d-block .img-fluid	max-width: 100%;">
		<div id="intro">
			<p>We are your one-stop-shop for all of your fitness needs. Whether you are looking to build strength or
				just
				stay in shape, we have something for everyone. Our state-of-the-art gym features the latest in fitness
				equipment, as well as a variety of classes and programs to suit your individual needs.</p>

			<p>At the Fitness Palace, we believe that everyone should have access to the resources they need to stay
				healthy
				and active. That’s why we strive to provide an environment that is welcoming and inclusive to all
				individuals. Our friendly and knowledgeable staff are here to help you get the most out of your workout,
				no
				matter your fitness level or experience.</p>

			<p>Our facility is open 7 days a week, so you can always find time to fit in a workout. We also offer
				discounts
				and promotions throughout the year, so make sure to check back often.</p>

		</div>
	</div>

	<div id="secondaryDiv">
		<h1 class="display-5 text-center" id="membership"><strong>Membership Options</strong></h1>

		<p>At the Fitness Palace, we offer a range of membership options to suit your needs. Whether you’re looking for
			a one-off visit or a regular workout, we have something for everyone.</p>
			<ul id="prices" >
				<li><strong>Daily Membership:</strong> £6.50</li>
				<li><strong>Monthly Membership:</strong> £13.50</li>
			</ul>

		<p>We offer discounts and promotions throughout the year, so make sure to check back often.</p>

		<p>Thank you for choosing the Fitness Palace! We look forward to helping you reach your fitness goals.</p>
	</div>
</div>

<?php include("footer.php") ?>