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
    <style>
        .thead {
            background-color: #563d7c;
            color: white;
        }

        table {
            color: #563d7c;
        }

        table a {
            color: #563d7c;
        }

        .super {
            color: #ff0000;
        }

        .normal {
            color: #caccd1;
        }
    </style>
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
                        // $runheader = $connection->query($header);
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

    <!-- start ads table -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h3 class="text-center">Sale Ads</h3>
                <table class="table table-bordered table-striped text-center">
                    <thead class="thead">
                        <tr>
                            <th style='vertical-align:middle'>Purpose</th>
                            <th style='vertical-align:middle'>Type</th>
                            <th style='vertical-align:middle'>City</th>
                            <th style='vertical-align:middle'>Society</th>
                            <th style='vertical-align:middle'>Phase/Block</th>
                            <th style='vertical-align:middle'>Price</th>
                            <th style='vertical-align:middle'>Area</th>
                            <th style='vertical-align:middle'>Title</th>
                            <th colspan="5" style='vertical-align:middle'>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM ads WHERE Purpose='Sale' ORDER BY Id DESC";
                        $run = $connection->query($query);
                        while ($result = mysqli_fetch_array($run)) {
                            $id = $result['Id'];
                            $url = $_SERVER['REQUEST_URI'];
                            $_SESSION['url'] = $url;
                            $status = $result['status'];
                            $feature = $result['feature'];
                            $city = $result['City'];
                            $society = $result['Society'];
                            $phase = $result['phase'];
                            $societyQuery = "SELECT * FROM societies WHERE societyId = '$society'";
                            $run = $connection->query($societyQuery);
                            $societyName = mysqli_fetch_array($run);
                            $phaseQuery = "SELECT * FROM phases WHERE phaseId = '$phase'";
                            $firePhase = $connection->query($phaseQuery);
                            $phaseName = mysqli_fetch_array($firePhase);
                            $cityQuery = "SELECT * FROM cities WHERE cityId = '$city'";
                            $fireCity = $connection->query($cityQuery);
                            $cityName = mysqli_fetch_array($fireCity);
                            if ($feature == 1) {
                                $ft = "<div class='super'><i class='fas fa-bolt'></i></div>";
                            } else {
                                $ft = "<div class='normal'><i class='fas fa-bolt'></i></div>";
                            }
                            if ($status == 1) {
                                $st1 = "<div class='super'><i class='fas fa-pepper-hot'></i></div>";
                                $st2 = "<div class='normal'><i class='fas fa-fire'></i></div>";
                            } elseif ($status == 2) {
                                $st2 = "<div class='super'><i class='fas fa-fire'></i></div>";
                                $st1 = "<div class='normal'><i class='fas fa-pepper-hot'></i></div>";
                            } else {
                                $st1 = "<div class='normal'><i class='fas fa-pepper-hot'></i></div>";
                                $st2 = "<div class='normal'><i class='fas fa-fire'></i></div>";
                            }
                            echo "<tr>";
                            echo "<td style='vertical-align:middle'>" . $result['Purpose'] . "</td>";
                            echo "<td style='vertical-align:middle'>" . $result['Type'] . "</td>";
                            echo "<td style='vertical-align:middle'>" . $cityName['cityName']. "</td>";
                            echo "<td style='vertical-align:middle'>" . $societyName['societyName'] . "</td>";
                            echo "<td style='vertical-align:middle'>" . $phaseName['phaseName'] . "</td>";
                            echo "<td style='vertical-align:middle'>" . $result['Price'] . "</td>";
                            echo "<td style='vertical-align:middle'>" . $result['Area'] . " " . $result['AreaUnit'] . "</td>";
                            echo "<td style='vertical-align:middle'>" . $result['Title'] . "</td>";
                            echo "<td> <a href ='hotAction.php?id=$id'>" . $st2 . "</td>";
                            echo "<td> <a href ='superHotAction.php?id=$id'>" . $st1 . "</td>";
                            echo "<td> <a href ='featureAction.php?id=$id'>" . $ft . "</a></td>";
                            echo "<td> <a href ='editAds.php?id=$id'><i class='far fa-edit'></i></a></td>";
                            echo "<td> <a href ='deleteAd.php?id=$id'><i class='fas fa-trash'></i></a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>