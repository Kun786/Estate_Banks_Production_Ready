<?php
$conn = mysqli_connect('localhost', 'root', '', 'reb');
if ($conn) {
	echo "Conntection Build Successfully!";
}

if (isset($_POST['id'])) {
	$id = $_POST["id"];

	$query = "SELECT * FROM societies where cityId = '$id'";
	$fire = $conn->query($query);
	while ($row = mysqli_fetch_array($fire)) {
		$id = $row['societyId'];
		$name = $row['societyName'];
		echo "<option value='$id'>$name</option>";
	}
}

if (isset($_POST['sId'])) {
	$sid = $_POST["sId"];

	$query = "SELECT * FROM phases where societyId = '$sid'";
	$fire = $conn->query($query);
	while ($row = mysqli_fetch_array($fire)) {
		$id = $row['phaseId'];
		$name = $row['phaseName'];
		echo "<option value='$id'>$name</option>";
	}
}

// Ad_Post page code

// if(isset($_POST['id'])){
// 	$id = $_POST['id'];
// 	$query = "SELECT * FROM societies WHERE cityId = '$id'";
// 	$run = $conn->query($query);
// 	while($row = mysqli_fetch_array($run)){
// 		$id = $row['societyId'];
// 		$societyName = $row['societyName'];
// 		echo "<option value='$id'>$societyName</option>";
// 	}
// }
// if(isset($_POST['societyId'])){
// 	$id = $_POST['societyId'];
// 	$query = "SELECT * FROM phases WHERE societyId = '$id'";
// 	$run = $conn->query($query);
// 	while($row = mysqli_fetch_array($run)){
// 		$id = $row['phaseId'];
// 		$societyName = $row['phaseName'];
// 		echo "<option value='$id'>$societyName</option>";
// 	}
// }
?>