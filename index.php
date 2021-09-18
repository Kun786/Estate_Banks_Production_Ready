<?php include('connection.php'); ?>
<!DOCTYPE html>
<html>

<head>
	<title>Real Estate Banks</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script src="bootstrap/js/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://kit.fontawesome.com/d6fb912aa0.js"></script>
	<script>
		console.log('hi');
		$(document).ready(function() {
			$('#city').on('change', function() {
				var cityId = $(this).val();
				console.log(cityId);
				$.ajax({
					method: "POST",
					url: "ajax.php",
					data: {
						id: cityId
					},
					dataType: "html",
					success: function(data) {
						$("#society").html(data);
					}
				});
			});

			$('#society').on('change', function() {
				var societyId = $(this).val();
				console.log(societyId);
				$.ajax({
					method: "POST",
					url: "ajax.php",
					data: {
						sId: societyId
					},
					dataType: "html",
					success: function(data) {
						$("#phase").html(data);
					}
				});
			});
		});
	</script>
	<style>
		/*property search box styling starting*/
		.search {
			margin-top: -620px;
			margin-bottom: 110px;
			z-index: 1;
			display: flex;
			align-items: center;
			justify-content: center;
		}

		.hero {
			height: 80vh;
			width: 100%;
			color: white;
			display: table;

		}

		.hero .inner-hero {
			display: table-cell;
			vertical-align: middle;
		}

		.hero .inner-hero h1 {
			font-weight: 400;
			font-size: 50px;
			margin-top: 10px;
			margin-bottom: 10px;
		}

		.hero .inner-hero .container {
			width: 100%;
			box-shadow: 4px 4px 5px 3px #f3f4f7;
			padding: 10px;
			border-radius: 10px;
			background-color: rgba(0, 0, 0, .7);
		}

		/*search box properties styling ending*/
		/*properties section styling start*/
		.properties ul {
			list-style: none;
			font-weight: bold;
			color: #563d7c;
		}

		.properties h3 {
			color: #563d7c;
		}

		.properties ul li:hover {
			cursor: pointer;
		}

		/*properties section styling end*/
		/* featurd cards styling */
		.feature,
		.feature-heading {
			color: #563d7c;
		}

		.bx:hover .card-body {
			box-shadow: 0px 1px 5px 1px;
			transition: 0.3s linear;
		}

		.featured {
			top: 5px;
			background: #ff0000;
			padding: 5px;
			color: white;
			position: absolute;
			z-index: 1;
			text-transform: uppercase;
			border-radius: 0px 5px 5px 0px;
		}

		.feature ul {
			list-style: none;
			margin: 0px;
		}

		.feature ul li {
			display: inline-block;
			margin-left: 15px;
		}

		/* end featurd cards styling */
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
					<a class="nav-link" href="login.php">Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="register.php">Register</a>
				</li>
			</ul>
		</div>
	</nav>
	<!-- header section end -->
	<!-- slider start -->
	<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img class="d-block w-100" src="imgs/bg5.jpg" alt="First slide">
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="imgs/bg1.jpg" alt="Second slide">
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="imgs/villa.jpg" alt="Third slide">
			</div>
		</div>
	</div><br><br>
	<!-- slider end -->
	<!-- search form start -->
	<div class="search">
		<div class="container-fluid">
			<div class="row">
				<div class="col hero">
					<div class="inner-hero">
						<!-- Top hero form section start -->
						<div class="container">
							<h1 class="text-center">Find the Perfect Property</h1><br>
							<form class="form" method="post" action="search.php">
								<div class="form-row">
									<div class="col-md-4 col-sm-12 btn-lg-4">
										<select id="inputState" name="type" class="form-control" required="required">
											<option selected>--Property Type--</option>
											<option value="home">Home</option>
											<option value="plot">Plot</option>
											<option value="commercial">Commercial</option>
										</select>
									</div>
									<div class="col-md-4 col-sm-12 btn-lg-4">
										<select id="city" class="form-control" name="city" required="required">
											<option selected>--City--</option>
											<?php
											$query = "SELECT * FROM cities";
											$fire = $connection->query($query);
											while ($row = mysqli_fetch_array($fire)) {
											?>
												<option value="<?php echo $row['cityId']; ?>"><?php echo $row['cityName']; ?></option>
											<?php
											}
											?>
										</select>
									</div>
									<div class="col-md-4 col-sm-12 btn-lg-4">
										<select id="society" class="form-control" name="society" required="required">
											<option selected>--Society--</option>
										</select>
									</div>
								</div><br>
								<!-- second row start -->
								<div class="form-row">
									<div class="col-md-3 col-sm-12 btn-lg-3">
										<select id="phase" class="form-control" name="phase" required="required">
											<option selected>--Select Phase--</option>
										</select>
									</div>
									<div class="col-md-3 col-sm-12 btn-lg-3">
										<select id="inputState" class="form-control" name="purpose" required="required">
											<option selected>--Purpose--</option>
											<option value="rent">Rent</option>
											<option value="sale">Sale</option>
										</select>
									</div>
									<div class="col-md-2 col-sm-12 btn-lg-2">
										<select id="inputState" class="form-control" name="area">
											<option selected value="">--Property Size Unit--</option>
											<option value="5"> 5 Marla</option>
											<option value="10">10 Marla</option>
											<option value="1"> 1 Kanal</option>
											<option value="2"> 2 Kanal</option>
										</select>
									</div>
									<div class="col-md-2 col-sm-12 btn-lg-2">
										<input type="text" class="form-control" placeholder="Min-Price" name="">
									</div>
									<div class="col-md-2 col-sm-12 btn-lg-2">
										<input type="text" class="form-control" placeholder="Max-Price" name="">
									</div>
								</div><br>
								<div class="form-row">
									<div class="col-md-4 col-sm-12 btn-lg-4">
									</div>
									<div class="col-md-4 col-sm-12 btn-lg-4">
										<button class="btn btn-outline-light btn-block" name="submit" type="submit">Search</button><br>
									</div>
									<div class="col-md-4 col-sm-12 btn-lg-4">
									</div>
								</div>
							</form>
						</div>
						<!-- Top form section end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- search form end -->
	<!-- featured properties -->
	<div class="container mt-5 mb-5 feature-heading">
		<div class="row">
			<div class="col">
				<div class="row text-center">
					<div class="col"></div>
					<div class="col mb-3 mt-3">
						<h3>Featured Properties</h3>
					</div>
					<div class="col"></div>
				</div>
			</div>
		</div>
		<div class="row feature">
			<?php
			$dataQuery = "SELECT * FROM ads WHERE feature = '1' ORDER BY Id DESC";
			$runQuery = $connection->query($dataQuery);
			while ($data = mysqli_fetch_array($runQuery)) {
				$images = $data['Imgs'];
				if ($images) {
					$img = 'uploads/' . $images;
				} else {
					$img = "imgs/no-image.jpg";
				}
				$society = $data['Society'];
				$phase = $data['phase'];
				$societyQuery = "SELECT * FROM societies WHERE societyId = '$society'";
				$run = $connection->query($societyQuery);
				$societyName = mysqli_fetch_array($run);
				$phaseQuery = "SELECT * FROM phases WHERE phaseId = '$phase'";
				$firePhase = $connection->query($phaseQuery);
				$phaseName = mysqli_fetch_array($firePhase);
			?>
				<div class="col-lg-4 col-md-6 col-sm-12 bx">
					<div class="card" style="width: 23rem;">
						<img src="<?php echo $img;?>" class="card-img-top" alt="image not found!">
						<div class="featured">Featured</div>
						<div class="card-body">
							<h6 class="text-left">PKR <?php echo $data['Price']; ?></h6>
							<h5><?php echo $data['Title']; ?></h5>
							<p class="card-text"><small><i class="fas fa-map-marker-alt"></i><?php echo $societyName['societyName']; ?> <?php echo $phaseName['phaseName']; ?></small></p>
							<ul>
								<li><i class="fas fa-bed"></i> <?php echo $data['Beds']; ?></li>
								<li><i class="fas fa-bath"></i> <?php echo $data['Baths']; ?></li>
								<li><i class="fas fa-ruler-combined"></i> <?php echo $data['Area']; ?></li>
								<li><i class="fas fa-utensils"></i></li>
							</ul>
						</div>
					</div>
				</div>
			<?php }; ?>
		</div>
	</div>
	<!-- end featured properties -->
	<!-- available property information start -->
	<div class="container-fluid properties">
		<h3 class="text-center mt-3 mb-3">Available Properties for Sale</h3>
		<hr>
		<div class="row text-center">
			<div class="col-4">
				<ul>
					<li>Lahore</li>
					<li>Islamabad</li>
					<li>Multan</li>
					<li>Gujranwala</li>
				</ul>
			</div>
			<div class="col-4">
				<ul>
					<li>Bahawalpur</li>
					<li>Gwadar</li>
					<li>Karachi</li>
					<li>Multan</li>
				</ul>
			</div>
			<div class="col-4">
				<ul>
					<li>Sargodha</li>
					<li>Faisalabad</li>
					<li>Rawalpindi</li>
					<li>Sialkot</li>
					<li>Muree</li>
				</ul>
			</div>
		</div>

	</div>
	<!-- aailable property information end -->
	<!-- about start -->
	<div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6 col-lg-6 col-sm-12 location">
					<!-- location starting -->
					<h3 class="text-center mt-3 mb-3">Location</h3>
					<hr>
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3402.476042587772!2d74.39109481462998!3d31.483596456108177!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391905e1557e6021%3A0xa2f4d7231fe24348!2sReal%20Estate%20Banks!5e0!3m2!1sen!2s!4v1584619874400!5m2!1sen!2s" width="100%" height="420" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				</div>
				<!-- location ending -->
				<!-- get in touch starting -->
				<div class="col-md-6 col-lg-6 col-sm-12 get">
					<h3 class="text-center mt-3 mb-3">Get in Touch</h3>
					<hr>
					<ul>
						<table>
							<li>
								<tr>
									<td><i id="loc" class="fas fa-map-marker-alt"></i></td>
									<td> 1st Floor G-147, Phase 1, Masjid Chowk, Defence Housing Authority Lahore Cantt, Pakistan.</td>
								</tr>
							</li>
							<li>
								<tr>
									<td><i id="ph" class="fas fa-phone-alt"></i></td>
									<td> +9242-35690898</td>
								</tr>
							</li>
							<li>
								<tr>
									<td><i id="ph" class="fas fa-mobile-alt"></i></td>
									<td> +92321-4444219</td>
								</tr>
							</li>
							<li>
								<tr>
									<td><i id="wh" class="fab fa-whatsapp"></i></td>
									<td> +92302-6222511</td>
								</tr>
							</li>
							<li>
								<tr>
									<td><i id="em" class="fas fa-envelope"></i></td>
									<td>estatebank786@gmail.com</td>
								</tr>
							</li>
						</table>
					</ul>
					<div class="follow">
						<h3 class="text-center mt-3 mb-3">Follow Us</h3>
						<hr>
						<ul>
							<li><a id="tw" href="#"><i class="fab fa-twitter fa-2x"></i></a></li>
							<li><a id="fb" href="https://www.facebook.com/Real-Estate-Bank-112941383609689/"><i class="fab fa-facebook fa-2x"></i></a></li>
							<li><a id="in" href="https://www.instagram.com/realestatebanks/?hl=en"><i class="fab fa-instagram fa-2x"></i></a></li>
							<li><a id="yt" href="#"><i class="fab fa-youtube fa-2x"></a></i></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- get in youch ending -->
	<!-- about end -->
	<!-- footer start -->
	<footer>
		Real Estate Banks &copy; 2020 | All Rights Reserved
	</footer>
	<!-- footer end -->
</body>

</html>