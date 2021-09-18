<?php include("connection.php") ?>
<!DOCTYPE html>
<html>
<head>
	<title>Register Form</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script src="bootstrap/js/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://kit.fontawesome.com/d6fb912aa0.js"></script>
	<style type="text/css">

		.main{
			background-image:linear-gradient(to left, #563d7c, #00a98f);
			padding: 33px;
			height: 100%;
		}
		.mainBox{
			width: 65%;
			height: 75vh;
			margin-left: 17%;
		}
		.box{
			width: 100%;
			height: 75vh;
			border-radius: 10px;
		}
		.left{
			background-image: linear-gradient(rgba(0,0,0,.7),rgba(0,0,0,.8)), url("imgs/bg6.jpg");
			background-size: cover;
			background-position: center;
			height: 100%;
			float: right;
			padding: 0;
			width: 100%;
			border-radius: 10px 0px 0px 10px;
			display: table;
		}
		.left h2{
			display: table-cell;
			vertical-align: middle;
		}
		.left small {
			font-size: 15px;
		}
		.right{
			width: 100%;
			height: 100%;
			float: left;
			background-color: white;
			border-radius: 0px 10px 10px 0px;
		}
		.right img{
			width: 100px;
			height: 100px;
		}
		input, textarea, select{
			font-size: 15px;
			color: #563d7c;
		}
		input::placeholder, textarea::placeholder{
			font-size: 13px;
			color: #563d7c;
		}
		input{
			border: none;
			outline: none;
			background: transparent;
			border-bottom: 2px solid #563d7c;
			width: 100%;
			padding: 3px;
		}
		textarea{
			resize: none;
			background: transparent;
			border: none;
			outline: none;
			border-bottom: 2px solid #563d7c;
			padding: 3px;
		}
		select{
			width: 100%;
			border: none;
			outline: none;
			border-bottom: 2px solid #563d7c;
			padding: 4px;
		}
		tr, td{
			padding: 7px;
		}
		tr{
			margin-bottom: 7px;
		}

		.navbar{
			background-color: #563d7c !important;
			color: #caccd1 !important;
		}
		.navbar a {
			color: #caccd1 !important;
		}
		.navbar a:hover{
			color: whitesmoke !important;
		}
		footer{
			width: 100%;
			bottom: 0px;
			background-color: #563d7c;
			margin: 0;
			display: flex;
			justify-content: center;
			align-items: center;
			color: whitesmoke;
			padding: 9px;
		}
		.rg{
			background-color: #563d7c;
			color: white;
		}
		.rg:hover{
			background-color: white;
			color: #563d7c;
			border: 2px solid #563d7c;
		}
		small a{
			font-weight: bold;
			color: #563d7c;
		}


		


	</style>
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
	
	<div class="main">
		<div class="mainBox">

			<div class="box row container-fluid">
				<div class="left col-md-6 col-sm-12">
					<h2 class="text-center text-light">Real Estate Banks<sup>&reg;</sup><br><small class="text-center text-light">Our Mission to Complete the Dream.
						Register Here to Acheived the Goal.</small></h2>
					</div>
					<div class="right col-md-6 col-sm-12">
						<div class="text-center">
							<br><img src="imgs/avatar.png" class="img-fluid"><br><br>
						</div>
						<form method="post">
							<table>
								<tr>
									<td>
										<input type="text" name="name" placeholder="Name" required ngModel>
									</td>
									<td>
										<input type="text" name="fname" placeholder="Father Name" required ngModel>
									</td>
								</tr>
								<tr>
									<td>
										<input type="email" name="email" placeholder="Email" required ngModel>
									</td>
									<td>
										<input type="text" name="mobile" placeholder="Mobile Number" required ngModel>
									</td>
								</tr>
								<tr>
									<td>
										<input type="password" name="pass" placeholder="Password" required ngModel>
									</td>
									<td>
										<input type="password" name="rpass" placeholder="Confirm Password" required ngModel>
									</td>
								</tr>
								<tr>
									<td>
										<select name="gender" required ngModel>
											<option>Male</option>
											<option>Female</option>
										</select>
									</td>
									<td>
										<input type="text" name="cnic" placeholder="CNIC Number" required ngModel>
									</td>
								</tr>
								<tr>
									<td colspan="2">
										<textarea rows="3" cols="48" minlength="15" name="address" required placeholder="Your Complete Address"
										ngModel></textarea>
									</td>
								</tr>
								<tr>
									<td><button class="btn rg" type="submit" name="submit">Register</button></td>
									<td><small>if already registered! <a href="login.php">Login</a></small></td>
								</tr>
							</table>
							<?php 
							if(isset($_POST['submit'])){
								$name=$_REQUEST['name'];
								$fname=$_REQUEST['fname'];
								$email=$_REQUEST['email'];
								$mobile=$_REQUEST['mobile'];
								$pass=$_REQUEST['pass'];
								$gender=$_REQUEST['gender'];
								$cnic=$_REQUEST['cnic'];
								$address=$_REQUEST['address'];
								
								$selectQuery="SELECT * FROM admin";
								$fireSelectQuery=$connection->query($selectQuery);
								$users = mysqli_num_rows($fireSelectQuery);
								if($users >= 1){
									$status = 0;
								}
								else{
									$status = 1;
								}
								$insertQuery="INSERT INTO admin(Name,Fname,Email,Mobile,Password, Gender,Cnic,Address,Status)Values('$name','$fname','$email','$mobile','$pass','$gender','$cnic','$address','$status')";
								$run=$connection->query($insertQuery);
								if($run){
									echo "Registered Successfully!";
								}
								else {
									echo "Registeration Failed";
								}
							}
							?>
						</form>
					</div>
				</div>

			</div>
		</div>

		<!-- footer start -->
		<footer>
			Real Estate Banks &copy; 2020 | All Rights Reserved
		</footer>
		<!-- footer end -->

	</body>
	</html>