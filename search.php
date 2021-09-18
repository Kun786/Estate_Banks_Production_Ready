<?php 
$conn = mysqli_connect('localhost', 'root', '', 'reb');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Data</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script src="bootstrap/js/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/d6fb912aa0.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<style>
		 .status {
            background: #ff0000;
            color: white;
            padding: 2px;
            border-radius: 0px 4px 4px 0px;
            position: absolute;
            z-index: 1;
            top: 5px;
            left: 0px;
        }
	</style>
</head>
<body>
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
	<div class="container-fluid mt-3">
	<div class="row">
		<?php 
if (isset($_POST['submit'])) {
	$type = $_POST["type"];
	$city = $_POST["city"];
	$society = $_POST["society"];
	$phase = $_POST["phase"];
	$purpose = $_POST['purpose'];
	$area = $_POST['area'];

	$query = "SELECT * FROM ads WHERE Type = '$type' && City = '$city' && Society = '$society' && phase = '$phase'  && Area = '$area' && Purpose = '$purpose' && status = 1";
	$fire = $conn->query($query);
	while ($row = mysqli_fetch_array($fire)) {
		$id = $row['Id'];
		echo $id;
		$images = $row['Imgs'];
                if($images){
                    $img = 'uploads/'.$images;
                }
                else {
                    $img = "imgs/no-image.jpg";
                }
		$society = $row['Society'];
		$phase = $row['phase'];
		$societyQuery = "SELECT * FROM societies WHERE societyId = '$society'";
		$run = $conn->query($societyQuery);
		$societyName = mysqli_fetch_array($run);
		$phaseQuery = "SELECT * FROM phases WHERE phaseId = '$phase'";
		$firePhase = $conn->query($phaseQuery);
		$phaseName = mysqli_fetch_array($firePhase);
?>
		<div class="col-md-6 col-lg-6 col-sm-12 text-center">
                    <div class="card mb-3 mt-3" style="max-width: 630px;">
                        <div class="row no-gutters">
                            <div class="col-md-6">
                                <img src="<?php echo $img;?>" class="card-img" alt="image not found!">
                                <div class="status">SUPER HOT</div>
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <h5 class="card-title">PKR <?php echo $row['Price']; ?></h5>
                                    <hr>
                                    <p class="card-text"><i class="fas fa-ruler-combined"></i> <?php echo $row['Area']; ?> <?php echo $row['AreaUnit'] ?></p>
                                    <p class="card-text"><?php echo $row['Title']; ?></p>
                                    <button class="btn btn-secondary"><a href="viewAd.php?id=<?php echo $id;?>" class="text-light"><i class="far fa-eye"></i></a></button><br><br>
                                    <p class="card-text"><small class="text-muted">Real Estate Banks<sup>&reg;</sup></small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
		<?php }} ?>
				<?php 
if (isset($_POST['submit'])) {
	$type = $_POST["type"];
	$city = $_POST["city"];
	$society = $_POST["society"];
	$phase = $_POST["phase"];
	$purpose = $_POST['purpose'];
$area = $_POST['area'];

	$query = "SELECT * FROM ads WHERE Type = '$type' && City = '$city' && Society = '$society' && phase = '$phase' && Area = '$area' && Purpose = '$purpose' && status = 2";
	$fire = $conn->query($query);
	while ($row = mysqli_fetch_array($fire)) {
		$images = $row['Imgs'];
                if($images){
                    $img = 'uploads/'.$images;
                }
                else {
                    $img = "imgs/no-image.jpg";
                }
		$society = $row['Society'];
		$phase = $row['phase'];
		$societyQuery = "SELECT * FROM societies WHERE societyId = '$society'";
		$run = $conn->query($societyQuery);
		$societyName = mysqli_fetch_array($run);
		$phaseQuery = "SELECT * FROM phases WHERE phaseId = '$phase'";
		$firePhase = $conn->query($phaseQuery);
		$phaseName = mysqli_fetch_array($firePhase);
?>
		<div class="col-md-6 col-lg-6 col-sm-12 text-center">
                    <div class="card mb-3 mt-3" style="max-width: 630px;">
                        <div class="row no-gutters">
                            <div class="col-md-6">
                                <img src="<?php echo $img;?>" class="card-img" alt="image not found!">
                                <div class="status">HOT</div>
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <h5 class="card-title">PKR <?php echo $row['Price']; ?></h5>
                                    <hr>
                                    <p class="card-text"><i class="fas fa-ruler-combined"></i> <?php echo $row['Area']; ?> <?php echo $row['AreaUnit'] ?></p>
                                    <p class="card-text"><?php echo $row['Title']; ?></p>
                                    <button class="btn btn-secondary"><a href="viewAd.php?id=$id" class="text-light"><i class="far fa-eye"></i></a></button><br><br>
                                    <p class="card-text"><small class="text-muted">Real Estate Banks<sup>&reg;</sup></small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
		<?php }} ?>
				<?php 
if (isset($_POST['submit'])) {
	$type = $_POST["type"];
	$city = $_POST["city"];
	$society = $_POST["society"];
	$phase = $_POST["phase"];
	$purpose = $_POST['purpose'];
$area = $_POST['area'];

	$query = "SELECT * FROM ads WHERE Type = '$type' && City = '$city' && Society = '$society' && phase = '$phase' && Area = '$area' && Purpose = '$purpose' && status = 0";
	$fire = $conn->query($query);
	while ($row = mysqli_fetch_array($fire)) {
		$images = $row['Imgs'];
                if($images){
                    $img = 'uploads/'.$images;
                }
                else {
                    $img = "imgs/no-image.jpg";
                }
		$society = $row['Society'];
		$phase = $row['phase'];
		$societyQuery = "SELECT * FROM societies WHERE societyId = '$society'";
		$run = $conn->query($societyQuery);
		$societyName = mysqli_fetch_array($run);
		$phaseQuery = "SELECT * FROM phases WHERE phaseId = '$phase'";
		$firePhase = $conn->query($phaseQuery);
		$phaseName = mysqli_fetch_array($firePhase);
?>
		<div class="col-md-6 col-lg-6 col-sm-12 text-center">
                    <div class="card mb-3 mt-3" style="max-width: 630px;">
                        <div class="row no-gutters">
                            <div class="col-md-6">
                                <img src="<?php echo $img;?>" class="card-img" alt="image not found!">
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <h5 class="card-title">PKR <?php echo $row['Price']; ?></h5>
                                    <hr>
                                    <p class="card-text"><i class="fas fa-ruler-combined"></i> <?php echo $row['Area']; ?> <?php echo $row['AreaUnit'] ?></p>
                                    <p class="card-text"><?php echo $row['Title']; ?></p>
                                    <button class="btn btn-secondary"><a href="viewAd.php?id=$id" class="text-light"><i class="far fa-eye"></i></a></button><br><br>
                                    <p class="card-text"><small class="text-muted">Real Estate Banks<sup>&reg;</sup></small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
		<?php }} ?>
	</div>
</div>
</body>
</html>