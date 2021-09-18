<?php require("connection.php");
session_start();
// if (!isset($_SESSION["Email"])) {
//     header("location:login.php");
//     exit();
// }
$id = $_REQUEST["id"];
$url =$_SESSION['url'];
$query = "SELECT * FROM ads WHERE Id='$id'";
$fire = $connection->query($query);
$run=mysqli_fetch_array($fire);
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
	<link rel="stylesheet" href="css/posting.css">
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
		<form method="post">
			<div class="box">Property Type and Location</div><br>
			<table>
				<tr>
					<td>Purpose <sup>*</sup></td>
					<td>
						<div class="radio-group">
							<select name="purpose" class="form-control col-md-3" required>
							<option selected value="<?php echo $run['Purpose'];?>"><?php echo $run['Purpose'];?></option>
								<option>Sale</option>
								<option>Rent</option>
							</select>
						</div>
					</td>
				</tr>
				<tr>
					<td>Property Type <sup>*</sup></td>
					<td>
						<div class="radio-group">
							<select name="type" class="form-control" required>
							<option selected value="<?php echo $run['Type'];?>"><?php echo $run['Type'];?></option>
								<option>Home</option>
								<option>Plot</option>
								<option>Commercial</option>
							</select>
						</div>
					</td>
				</tr>
				<tr>
					<td>City <sup>*</sup></td>
					<td>
						<select id="inputState" name="city" class="form-control" required>
							<option selected value="<?php echo $run['City'];?>"><?php echo $run['City'];?></option>
							<option>Lahore</option>
							<option>Islamabad</option>
							<option>Multan</option>
							<option>Quetta</option>
							<option>Bahawalpur</option>
							<option>Karachi</option>
							<option>Gawadar</option>
							<option>Gujranwala</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Society <sup>*</sup></td>
					<td>
						<select id="inputState" name="society" class="form-control" required>
							<option selected value="<?php echo $run['Society'];?>"><?php echo $run['Society'];?></option>
							<option>DHA</option>
							<option>Cantt</option>
							<option>Bahria Town</option>
							<option>Model Town</option>
							<option>Gulberg</option>
							<option>Johar Town</option>
							<option>Paragon City</option>
							<option>Sui Gas</option>
							<option>Estate Life</option>
							<option>Park View</option>
							<option>Air Avenue</option>
							<option>Eden City</option>
							<option>Pak Arab</option>
							<option>Banker Society</option>
							<option>Farma Nights</option>
						</select>
					</td>
				</tr>
			</table><br>
			<div class="box">Property Details</div><br>
			<table>
				<tr>
					<td>Property Title <sup>*</sup></td>
					<td>
						<input type="text" name="title" class="form-control" value="<?php echo $run['Title'];?>" required>
					</td>
				</tr>
				<tr>
					<td>Description <sup>*</sup></td>
					<td>
						<textarea class="form-control" name="description" value="<?php echo $run['Description'];?>" cols="50" rows="5" required><?php echo $run['Description'];?></textarea>
					</td>
				</tr>
				<tr>
					<td>Price <sup>*</sup></td>
					<td>
						<input type="text" name="price" value="<?php echo $run['Price'];?>" class="form-control" required>
					</td>
				</tr>
				<tr>
					<td>Land Area <sup>*</sup></td>
					<td>
						<input type="text" name="area" value="<?php echo $run['Area'];?>" class="form-control" required>
					</td>
					<td>
						<select id="inputState" name="unit" class="form-control"  required>
							<option value="<?php echo $run['AreaUnit'];?>" selected><?php echo $run['AreaUnit'];?></option>
							<option>Marla</option>
							<option>Kanal</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Bedroom's </td>
					<td>
						<input type="text" name="beds" value="<?php echo $run['Beds'];?>" class="form-control">
					</td>
					<td><select id="inputState" name="baths" class="form-control">
							<option selected value="<?php echo $run['Baths'];?>">Bathrooms</option>
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
			<input type="file" name="picture" class="form-control"><br>
			<div class="box">Contact Details</div><br>
			<table>
				<tr>
					<td>Name <sup>*</sup></td>
					<td>
						<input type="text" name="name" class="form-control" value="<?php echo $run['Name']?>" required>
					</td>
				</tr>
				<tr>
					<td>Mobile <sup>*</sup></td>
					<td>
						<input type="text" name="mobile" class="form-control" value="<?php echo $run['Mobile']?>" required>
					</td>
				</tr>
				<tr>
					<td>Email <sup>*</sup></td>
					<td>
						<input type="email" name="email" class="form-control" value="<?php echo $run['Email']?>" required>
					</td>
				</tr>
			</table><br>
			<div class="text-center"><button class="btn btn-secondary" type="submit" name="submit">Submit Property</button></div>
			<?php
			if (isset($_POST['submit'])) {
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
				$pic = $_REQUEST['picture'];
				$name = $_REQUEST['name'];
				$mobile = $_REQUEST['mobile'];
				$email = $_REQUEST['email'];
				$status = $run['status'];
				$insertQuery = "UPDATE ads SET Purpose='$purpose',Type='$type',City='$city',Society='$society',Title='$title',Description='$description',Price='$price',Area='$area',AreaUnit='$unit',Beds='$beds',Baths='$baths',Name='$name',Mobile='$mobile',Email='$email',status='$status' WHERE Id='$id'";
				$run = $connection->query($insertQuery);
				if ($run) {
					header("location: $url");
				} else {
					echo "<br><div class='alert alert-danger'>Ad Updating failed!</div>";
				}
			}?>
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