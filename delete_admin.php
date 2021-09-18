<?php require("connection.php");
session_start();
if (!isset($_SESSION["Email"])) {
    header("location:login.php");
    exit();
}
?>

<?php
$url =$_SESSION['url'];
$id = $_REQUEST["id"];
$delete_query = "DELETE FROM admin WHERE Id='$id'";
$fire_query = $connection->query($delete_query);

header("Location:requests.php");

exit();
mysqli_close($connection);
?>