<?php include("connection.php");?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Contact Us</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/d6fb912aa0.js"></script>
    <style>
        .main {
            background-image: linear-gradient(rgba(36, 96, 131, 0.5), rgba(69, 143, 192, 0.5)), url("imgs/bg1.jpg");
            background-size: cover;
            background-position: bottom;
            width: 100%;
            height: 75vh;
        }

        .left {
            padding: 20px;
        }

        .left textarea {
            resize: none;
        }
        .right{
            background: #563d7c;
            color: white;
            padding: 15px 10px 30px 50px;
        }
        .right ul{
            list-style: none;
        }
        .right ul li{
            display: inline-block;
            padding: 12px 12px 12px 12px;
        }
        .right ul li:hover{
            cursor: pointer;
            border: 1px solid white;
            border-radius: 5px;
        }
        .right ul li a{
           color: white;   
       }
       .right table td{
        padding: 10px;
    }
    .container .box{
        margin-top: 10%;
        box-shadow: 2px 12px 8px -4px #563d7c;
        background-color: white;
    }
    .container .box .left .message-heading{
       color: #563d7c;
   }
   .container .box .left input, .container .box .left textarea{
       border: 1px solid #563d7c;
   }
   .container .box .left input::placeholder, .container .box .left textarea::placeholder{
       color: #563d7c;
   }
   .container .box .left .btn{
       background-color: #563d7c !important;
       color: #fff;
   }
   .container .box .left .btn:hover{
    border: 1px solid #563d7c !important;
    color: #563d7c;
    background-color: #fff !important;
   }
   .container .box .left input:focus, .container .box .left textarea:focus{
       outline: 1px solid #563d7c;
       border: 2px solid #563d7c;
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
    margin-top: 18%;
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
    <!-- form start -->
    <div class="main container-fluid">
        <div class="row">
            <div class="col">
                <div class="container">
                    <h3 class="text-light">Get In Touch</h3>
                    <h5 class="text-light">Have any question? We'd love to hear from you</h5>
                    <div class="row box">
                        <div class="col-md-8 left">
                            <h4 class="message-heading">Send us a message</h4><br>
                            <form class="form" method="post">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="text" name="name" placeholder="Your Name" class="form-control"
                                        required ngModel>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="email" name="email" placeholder="Your Email" class="form-control"
                                        required ngModel>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea name="message" placeholder="Enter your message here..."
                                    class="form-control" required id="" cols="30" rows="10"></textarea>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-default btn-lg float-right" type="submit" name="submit"><i
                                        class="fas fa-paper-plane"></i></button>
                                    </div>
                                    <?php 
                                        if(isset($_POST["submit"])){
                                            $name=$_REQUEST["name"];
                                            $email=$_REQUEST["email"];
                                            $msg=$_REQUEST["message"];
                                            $query="INSERT INTO messages(Name,Email,Message)Values('$name','$email','$msg')";
                                            $fire=$connection->query($query);
                                            if($fire){
                                            echo "<div class='alert alert-success'>Your message sent Successfully!</div>";
                                            }
                                            else{
                                                echo "<div class='alert alert-danger'>Message sending failed!</div>";
                                            }
                                        }
                                    ?>
                                </form>
                            </div>
                            <div class="col-md-4 right">
                                <h4 class="text-light">
                                    Contact Information
                                </h4><br>
                                <table>
                                    <tr>
                                        <td><i class="fas fa-map-marker-alt"></i></td>
                                        <td>19-G,1st Floor Phase 1 Commercial DHA Lahore Cantt.</td>
                                    </tr><br>
                                    <tr>
                                        <td><i class="far fa-envelope"></i></td>
                                        <td>estatebank786@gmail.com</td>
                                    </tr><br>
                                    <tr>
                                        <td><i class="fas fa-phone-alt"></i></td>
                                        <td>+9242-35690898</td>
                                    </tr><br>
                                    <td><i class="fab fa-whatsapp"></i></td>
                                    <td>+92321-4444219</td>
                                </tr><br>
                            </table><br><br>
                            <ul>
                                <li><a href=""><i class="fab fa-facebook fa-2x"></i></a></li>
                                <li><a href=""><i class="fab fa-twitter fa-2x"></i></a></li>
                                <li><a href=""><i class="fab fa-instagram fa-2x"></i></a></li>
                                <li><a href=""><i class="fab fa-youtube fa-2x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- form end -->
    <!-- footer start -->
    <footer>
        Real Estate Banks &copy; 2020 | All Rights Reserved
    </footer>
    <!-- footer end -->

</body>

</html>