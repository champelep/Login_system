<?php
	require "header.php";
?>


	<main>
		<h1>Signup</h1>
		<form action="includes/signup.inc.php" method="post">
			<input type="text" name="uid" placeholder="Username">
			<input type="text" name="mail" placeholder="E-mail">
			<input type="password" name="pwd" placeholder="Password">
			<input type="password" name="pwd-repeat" placeholder="Repeat your password">
			<button type = "submit" name="signup-submit">Signup</button>
	</main>


<?php
	require "footer.php";
?>