<?php include("connection.php");
session_start() ?>
<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script src="bootstrap/js/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>

<body>
	<!-- header start -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="index.php">Real Estate Banks<sup>&reg;</sup></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
					<a class="nav-link" href="salesPlots.php">Sale <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="rentPlots.php">Rent</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Maps</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="about.php">About Us</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="contact.php">Contact Us</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="Login.php">Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="register.php">Register</a>
				</li>
			</ul>
		</div>
	</nav>
	<!-- header section end -->

	<!-- form start -->
	<div class="main">
		<div class="box">
			<div class="img text-center">
				<img class="img-fluid" src="imgs/avatar.png">
			</div><br><br>
			<form method="post">
				<div class="form-group">
					<input type="email" name="email" required placeholder="Email" ngModel>
				</div><br>
				<div class="form-group">
					<input type="password" name="pass" minlength="6" required placeholder="Password" ngModel>
				</div><br>
				<div class="form-group text-center"><button type="submit" name="submit">Login <i class="fa fa-arrow-right"></i></button><br><br>
					<small>if not registered! <a href="register.php">Register</a></small></div>
			</form>
		</div>
	</div>
	<?php
	if (isset($_POST["submit"])) {
		$email = $_POST["email"];
		$pass = $_POST["pass"];
		$query = "SELECT * FROM admin WHERE Email='$email' and Password='$pass' and status='1'";
		$run = $connection->query($query);
		$data = mysqli_num_rows($run);
		if ($data == 1) {
			$_SESSION['Email'] = $email;
			header("Location:admin.php");
		} else {
			echo "<br><div class='alert alert-danger'>Invalid username/password <b>Or</b> Your are not registerd!</div>";
		}
	}
	?>

	<!-- form end -->
	<!-- footer start -->
	<footer>
		Real Estate Banks &copy; 2020 | All Rights Reserved
	</footer>
	<!-- footer end -->

</body>

</html>