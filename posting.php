<?php include("connection.php");
session_start();
if (!isset($_SESSION["Email"])) {
	header("location:login.php");
	exit();
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Ad Posting</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script src="bootstrap/js/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://kit.fontawesome.com/d6fb912aa0.js"></script>
	<script src="js/admin.js"></script>
	<script>
		console.log('hi');
		$(document).ready(function(){
			$('#city').on('change', function(){
				var cityId = $(this).val();
				console.log(cityId);
				$.ajax({
					method: "POST",
					url: "ajax.php",
					data:{id:cityId},
					dataType: "html",
					success:function(data){
						$("#society").html(data);
					}
				});
			});

			$('#society').on('change', function(){
				var societyId = $(this).val();
				console.log(societyId);
				$.ajax({
					method: "POST",
					url: "ajax.php",
					data:{sId:societyId},
					dataType: "html",
					success:function(data){
						$("#phase").html(data);
					}
				});
			});
		});
	</script>
	<style type="text/css">
		.carousel img {
			width: 100%;
			height: 600px;
		}

		footer {
			width: 100%;
			background-color: #563d7c;
			margin: 0;
			display: flex;
			justify-content: center;
			align-items: center;
			color: whitesmoke;
			padding: 10px;
		}

		.box {
			width: 100%;
			padding: 5px;
			border-radius: 5px;
			background-color: #563d7c;
			color: white;
			text-transform: uppercase;
		}

		sup {
			font-size: 15px;
		}

		table {
			color: #563d7c;
			width: 70%;
		}

		table tr {
			padding: 3px;
			margin-bottom: 5px;
		}

		.btn {
			background-color: #563d7c !important;
		}

		.radio-group input[type="radio"] {
			margin-left: 15px;
		}
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
					<a class="nav-link" onclick="admin()" href="#">Dashboard<span class="sr-only">(current)</span></a>
				</li>
			</ul>
		</div>
	</nav>
	<!-- header section end -->
	<!-- Start form -->
	<div class="container"><br>
		<h3>Add a Property</h3>
		<form method="post" enctype="multipart/form-data">
			<div class="box">Property Type and Location</div><br>
			<table>
				<tr class="mb-3">
					<td>Purpose <sup>*</sup></td>
					<td>
						<div class="radio-group">
							<input type="radio" id="sale" name="purpose" value="sale">Sale
							<input type="radio" name="purpose" value="rent">Rent
						</div>
					</td>
				</tr>
				<tr class="mb-3">
					<td>Property Type <sup>*</sup></td>
					<td>
						<div class="radio-group">
							<input type="radio" name="type" value="home">Home
							<input type="radio" name="type" value="plot">Plot
							<input type="radio" name="type" value="commercial">Commercial
						</div>
					</td>
				</tr>
				<tr>
					<td>City <sup>*</sup></td>
					<td>
						<select  name="city" class="form-control" id="city" required>
							<option value="">Select City</option>
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
					</td>
				</tr>
				<tr>
					<td>Society <sup>*</sup></td>
					<td>
						<select name="society" id="society" class="form-control" required>
							<option selected>Select Society</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Phase & Block <sup>*</sup></td>
					<td>
						<select name="phase" id="phase" class="form-control" required>
							<option selected>Select Phase/Block</option>
						</select>
					</td>
				</tr>
			</table><br>
			<div class="box">Property Details</div><br>
			<table>
				<tr>
					<td>Property Title <sup>*</sup></td>
					<td>
						<input type="text" name="title" class="form-control" required>
					</td>
				</tr>
				<tr>
					<td>Description <sup>*</sup></td>
					<td>
						<textarea class="form-control" name="description" cols="50" rows="5" required></textarea>
					</td>
				</tr>
				<tr>
					<td>Price <sup>*</sup></td>
					<td>
						<input type="text" name="price" class="form-control" required>
					</td>
				</tr>
				<tr>
					<td>Land Area <sup>*</sup></td>
					<td>
						<input type="text" name="area" class="form-control" required>
					</td>
					<td>
						<select id="inputState" name="unit" class="form-control" required>
							<option selected>Area Unit</option>
							<option>Marla</option>
							<option>Kanal</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Bedroom's </td>
					<td>
						<input type="text" name="beds" class="form-control">
					</td>
					<td><select id="inputState" name="baths" class="form-control">
							<option selected>Bathrooms</option>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
							<option>6</option>
							<option>7</option>
							<option>8</option>
						</select></td>
				</tr>
			</table><br>

			<div class="box">Add Images</div><br>
			<input type="file" name="image" multiple class="form-control"><br>
			<div class="box">Contact Details</div><br>

			<table>
				<?php
				$email = $_SESSION['Email'];
				$nameQuery = "SELECT * FROM admin WHERE Email='$email'";
				$runName = $connection->query($nameQuery);
				$adminData = mysqli_fetch_array($runName);
				?>
				<tr>
					<td>Name <sup>*</sup></td>
					<td>
						<input type="text" name="name" class="form-control" value="<?php echo $adminData['Name'] ?>" required>
					</td>
				</tr>
				<tr>
					<td>Mobile <sup>*</sup></td>
					<td>
						<input type="text" name="mobile" class="form-control" value="<?php echo $adminData['Mobile'] ?>" required>
					</td>
				</tr>
				<tr>
					<td>Email <sup>*</sup></td>
					<td>
						<input type="email" name="email" class="form-control" value="<?php echo $adminData['Email'] ?>" required>
					</td>
				</tr>


			</table><br>
			<div class="text-center"><button class="btn btn-secondary" type="submit" name="submit">Submit Property</button></div>
			<?php
			if (isset($_POST['submit'])) {
				$target = "uploads/" . basename($_FILES['image']['name']);
				$image = $_FILES['image']['name'];
				$purpose = $_REQUEST['purpose'];
				$type = $_REQUEST['type'];
				$city = $_REQUEST['city'];
				$society = $_REQUEST['society'];
				$title = $_REQUEST['title'];
				$description = $_REQUEST['description'];
				$price = $_REQUEST['price'];
				$area = $_REQUEST['area'];
				$unit = $_REQUEST['unit'];
				$beds = $_REQUEST['beds'];
				$baths = $_REQUEST['baths'];
				$name = $_REQUEST['name'];
				$mobile = $_REQUEST['mobile'];
				$email = $_REQUEST['email'];
				$phase = $_REQUEST['phase'];
				$status = 0;
				move_uploaded_file($_FILES['image']['tmp_name'], $target);
				$insertQuery = "INSERT INTO ads(Purpose,Type,City,Society,Title,Description,Price,Area,AreaUnit,Beds,Baths,Imgs,Name,Mobile,Email,status,phase)Values('$purpose','$type','$city','$society','$title','$description','$price','$area','$unit','$beds','$baths','$image','$name','$mobile','$email','$status', '$phase')";
				$run = $connection->query($insertQuery);
				if ($run) {
					echo "<br><div class='alert alert-success'>Ad posted Successfully!</div>";
				} else {
					echo "<br><div class='alert alert-danger'>Ad posting failed!</div>";
				}
			}
			?>
		</form>
	</div><br>
	<!-- end form -->
	<!-- footer start -->
	<footer>
		Real Estate Banks &copy; 2020 | All Rights Reserved
	</footer>
	<!-- footer end -->

</body>

</html>