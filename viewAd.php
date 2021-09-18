<?php require("connection.php");
session_start();
$id = $_REQUEST["id"];
$query = "SELECT * FROM ads WHERE Id='$id'";
$fire = $connection->query($query);
$run=mysqli_fetch_array($fire);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Real Estate Banks</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script src="bootstrap/js/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://kit.fontawesome.com/d6fb912aa0.js"></script>
	<style>
		/*property search box styling starting*/
		.search{
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
			background-color: rgba(0,0,0,.7);
		}
		/*search box properties styling ending*/
		/*properties section styling start*/
		.properties ul{
			list-style: none;
			font-weight: bold;
			color: #563d7c;
		}
		.properties h3{
			color: #563d7c;
		}
		.properties ul li:hover{
			cursor: pointer;
        }
        .left{
            width: 60%;
            float: left;
        }
        .right{
            width: 40%;
            float: left;
            margin-top: 10%;
        }
        .price{
            margin-left: 100px;
        }
		/*properties section styling end*/
	</style>
</head>
<body>
	<!-- header start -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#">Real Estate Banks<sup>&reg;</sup></a>
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
<div class="container-fluid text-center">
   <div class="left">
   <br><br><h4><?php echo $run["Title"];?></h4><br>
    <img src="imgs/no-image.jpg" class="img-fluid"><br><br>
	<table class="table table-striped table-bordered">
            <tr><th>Price</th><td>PKR <?php echo $run["Price"];?></td></tr>
            <tr><th>Area</th><td><i class='fas fa-ruler-combined'></i> <?php echo $run["Area"];?> <?php echo $run["AreaUnit"];?></td></tr>
			<tr><th>Beds </th><td><i class="fas fa-bed"></i> <?php echo $run["Beds"];?></td></tr>
			<tr><th>Baths</th><td><i class="fas fa-bath"></i> <?php echo $run["Baths"];?></td></tr>
        </table>
    <p><?php echo $run["Description"];?></p><br>
   </div>
    <div class="right">
        <table class="table table-striped table-bordered">
            <tr><th>Name</th><td><?php echo $run["Name"];?></td></tr>
            <tr><th>Email</th><td><?php echo $run["Email"];?></td></tr>
            <tr><th>Mobile</th><td><?php echo $run["Mobile"];?></td></tr>
        </table>
    </div>
</div>
	<!-- footer start -->
	<footer>
		Real Estate Banks &copy; 2020 | All Rights Reserved
	</footer>
	<!-- footer end -->
</body>
</html>