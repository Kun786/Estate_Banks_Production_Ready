<?php require("connection.php");
session_start();
if (!isset($_SESSION["Email"])) {
    header("location:login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link rel="shortcut icon" href="imgs/favicon.ico">
    <script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/sidenav.css">
    <link rel="stylesheet" type="text/css" href="font/css/all.css">
    <script src="js/admin.js"></script>
    <script>
        function addProperty() {
            window.location.href = ("posting.php");
        }

        function sale() {
            window.location.href = ("sale.php");
        }

        function rent() {
            window.location.href = ("rent.php");
        }

        function hot() {
            location.assign("hotAds.php");
        }

        function superHot() {
            location.assign("superHotAds.php");
        }
        function messages() {
            location.assign("messages.php");
        }
    </script>
</head>

<body>
    <div class="header">
        <?php
        $email = $_SESSION['Email'];
        $nameQuery = "SELECT * FROM admin WHERE Email='$email'";
        $runName = $connection->query($nameQuery);
        $adminName = mysqli_fetch_array($runName);
        ?>
        <div class="container-fluid">
            <div class="row d-flex d-md-block flex-nowrap wrapper">
                <div class="col-md-2 float-left col-1 pl-0 pr-0 collapse width " id="sidebar">
                    <div class="list-group border-0 card text-center text-md-left">
                        <h4 class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><img src="imgs/my.jpg" class="img-fluid" style="width:60px;height:60px;border-radius:100px;margin-left:50px;"><br> <span class="d-none d-md-inline text-center"><?php echo $adminName['Name']; ?></span></h4>
                        <br> <a href="#" onclick="admin()" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fas fa-tachometer-alt"></i> <span class="d-none d-md-inline">Dashboard</span></a>
                        <a href="#" onclick="sale()" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="far fa-money-bill-alt"></i> <span class="d-none d-md-inline">Sale</span></a>
                        <a href="#" onclick="rent()" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fas fa-vihara"></i> <span class="d-none d-md-inline">Rent</span></a>
                        <a href="#" onclick="hot()" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fas fa-fire"></i> <span class="d-none d-md-inline">Hot</span></a>
                        <a href="#" onclick="superHot()" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fas fa-pepper-hot"></i> <span class="d-none d-md-inline">Super Hot</span></a>
                        <a href="#" onclick="messages()" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="far fa-comment-alt"></i><span class="d-none d-md-inline">Messages</span></a>
                        <a href="#" onclick="maps()" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fas fa-map-marked-alt"></i><span class="d-none d-md-inline">Maps</span></a>
                        <a href="#" onclick="requests()" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fas fa-user-tie"></i> <span class="d-none d-md-inline">Admin Requests</span></a>
                        <a href="#" onclick="logout()" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fas fa-sign-out-alt"></i> <span class="d-none d-md-inline">Logout</span></a>

                    </div>
                </div>
                <div> <?php
                        // $header = "SELECT * FROM setting";
                        // $runheader = $connectionection->query($header);
                        // $myheader = mysqli_fetch_array($runheader);
                        ?>
                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                        <a href="#" data-target="#sidebar" data-toggle="collapse" aria-expanded="false"><i class="fas fa-bars fa-2x py-2 p-1"></i></a>
                        <a class="navbar-brand" onclick="admin()" href="#" style="margin-left: 10px;">Real Estate Banks<sup>&reg;</sup></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" onclick="addProperty()" href="#">Add Property <span class="sr-only">(current)</span></a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div><br>
        </div>
    </div>
    <!--end header container-->
<div class="container-fluid">
<div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <?php
                    $queryGraph1 = "SELECT COUNT(id) AS total FROM ads WHERE date >= '2020-01-01' AND date <= '2020-01-31'";
                    $runGraphQuery1 = $connection->query($queryGraph1);
                    $resultGraph1 = mysqli_fetch_array($runGraphQuery1);
                    $cnt1 = $resultGraph1['total'];
                    ?>
                    <?php
                    $queryGraph2 = "SELECT COUNT(id) AS total FROM ads WHERE date >= '2020-02-01' AND date <= '2020-02-28'";
                    $runGraphQuery2 = $connection->query($queryGraph2);
                    $resultGraph2 = mysqli_fetch_array($runGraphQuery2);
                    $cnt2 = $resultGraph2['total'];
                    ?>
                    <?php
                    $queryGraph3 = "SELECT COUNT(id) AS total FROM ads WHERE date >= '2020-03-01' AND date <= '2020-03-31'";
                    $runGraphQuery3 = $connection->query($queryGraph3);
                    $resultGraph3 = mysqli_fetch_array($runGraphQuery3);
                    $cnt3 = $resultGraph3['total'];
                    ?>
                    <?php
                    $queryGraph4 = "SELECT COUNT(id) AS total FROM ads WHERE date >= '2020-04-01' AND date <= '2020-04-30'";
                    $runGraphQuery4 = $connection->query($queryGraph4);
                    $resultGraph4 = mysqli_fetch_array($runGraphQuery4);
                    $cnt4 = $resultGraph4['total'];
                    ?>
                    <?php
                    $queryGraph5 = "SELECT COUNT(id) AS total FROM ads  WHERE date >= '2020-05-01' AND date <= '2020-05-31'";
                    $runGraphQuery5 = $connection->query($queryGraph5);
                    $resultGraph5 = mysqli_fetch_array($runGraphQuery5);
                    $cnt5 = $resultGraph5['total'];
                    ?>
                    <?php
                    $queryGraph6 = "SELECT COUNT(id) AS total FROM ads  WHERE date >= '2020-06-01' AND date <= '2020-06-30'";
                    $runGraphQuery6 = $connection->query($queryGraph6);
                    $resultGraph6 = mysqli_fetch_array($runGraphQuery6);
                    $cnt6 = $resultGraph6['total'];
                    ?>
                    <?php
                    $queryGraph6 = "SELECT COUNT(id) AS total FROM ads  WHERE date >= '2020-07-01' AND date <= '2020-07-31'";
                    $runGraphQuery6 = $connection->query($queryGraph6);
                    $resultGraph6 = mysqli_fetch_array($runGraphQuery6);
                    $cnt7 = $resultGraph6['total'];
                    ?>
                    <?php
                    $queryGraph6 = "SELECT COUNT(id) AS total FROM ads  WHERE date >= '2020-08-01' AND date <= '2020-08-31'";
                    $runGraphQuery6 = $connection->query($queryGraph6);
                    $resultGraph6 = mysqli_fetch_array($runGraphQuery6);
                    $cnt8 = $resultGraph6['total'];
                    ?>
                    <?php
                    $queryGraph6 = "SELECT COUNT(id) AS total FROM ads  WHERE date >= '2020-09-01' AND date <= '2020-09-30'";
                    $runGraphQuery6 = $connection->query($queryGraph6);
                    $resultGraph6 = mysqli_fetch_array($runGraphQuery6);
                    $cnt9 = $resultGraph6['total'];
                    ?>
                    <?php
                    $queryGraph6 = "SELECT COUNT(id) AS total FROM ads  WHERE date >= '2020-10-01' AND date <= '2020-10-31'";
                    $runGraphQuery6 = $connection->query($queryGraph6);
                    $resultGraph6 = mysqli_fetch_array($runGraphQuery6);
                    $cnt10 = $resultGraph6['total'];
                    ?>
                    <?php
                    $queryGraph6 = "SELECT COUNT(id) AS total FROM ads  WHERE date >= '2020-11-01' AND date <= '2020-11-30'";
                    $runGraphQuery6 = $connection->query($queryGraph6);
                    $resultGraph6 = mysqli_fetch_array($runGraphQuery6);
                    $cnt11 = $resultGraph6['total'];
                    ?>
                    <?php
                    $queryGraph6 = "SELECT COUNT(id) AS total FROM ads  WHERE date >= '2020-12-01' AND date <= '2020-12-31'";
                    $runGraphQuery6 = $connection->query($queryGraph6);
                    $resultGraph6 = mysqli_fetch_array($runGraphQuery6);
                    $cnt12 = $resultGraph6['total'];
                    ?>

                    <div class="container-fluid">
                        <canvas id="myChart"></canvas>
                        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
                        <script>
                            var ctx = document.getElementById('myChart').getContext('2d');
                            var chart = new Chart(ctx, {
                                // The type of chart we want to create
                                type: 'line',

                                // The data for our dataset
                                data: {
                                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                                    datasets: [{
                                        label: 'Ad Posting Month Wise',
                                        borderColor: 'rgb(12, 196, 208)',
                                        data: [<?php echo $cnt1; ?>, <?php echo $cnt2; ?>, <?php echo $cnt3; ?>, <?php echo $cnt4; ?>, <?php echo $cnt5; ?>, <?php echo $cnt6; ?>, <?php echo $cnt7; ?>, <?php echo $cnt8; ?>, <?php echo $cnt9; ?>, <?php echo $cnt10; ?>, <?php echo $cnt11; ?>, <?php echo $cnt12; ?>]
                                    }]
                                },
                                options: {}
                            });
                        </script>
                    </div>
                </div>
            </div>
</div>
</body>

</html>