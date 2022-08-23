<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  DESIGNED BY CENSONO, MATUR INNOCENT CEOCensono -->
    <!--  STARTED 08-JULY- 2021 -->
    <!--  DESIGN AND IMPLEMENTATION OF HOTEL RESERVATION AND PAYMENT SYSTEM-->
<link rel="stylesheet" href="../bootstrap.min.css">    
<link href="../fontawesome/css/all.min.css" rel="stylesheet">   
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="navbar-header">
                        <button class="navbar-toggle" data-target="#mobile_menu" data-toggle="collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                        <a href="#" class="navbar-brand">EMERALD HOTEL AND SUITES</a>
                    </div>

                    <div class="navbar-collapse collapse" id="mobile_menu">
                        <ul class="nav navbar-nav">
                            <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                            <li><a href="reserve_plans.php"><span class="fas fa-home"></span> Plans</a></li>
<?php
include('connect.php');

$end_date=date("Y-m-d");
$sql="SELECT * FROM reservations WHERE end_date='$end_date' AND status!='Ended' AND status!='Cancelled' ";
$result=mysql_query($sql);

$count=mysql_num_rows($result);
?>
                         <!--    <li><a href="notifications.php"><span class="fas fa-bell"></span> <span class="badge"><?php echo $count; ?></span></a></li>
        <li><a href="users.php"><span class="fas fa-users"></span> Users</a></li>
                            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-info"></span> About Us <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">About One</a></li>
                                    <li><a href="#">About Two</a></li>
                                    <li><a href="#">About Three</a></li>
                                    <li><a href="#">About Four</a></li>
                                    <li><a href="#">About Five</a></li>
                                    <li><a href="#">About Six</a></li>
                                </ul>
                            </li> -->
                            <li><a href="#contact">Contact Us</a></li>

                        </ul>

                        <ul class="nav navbar-nav navbar-right">
<?php
if(isset($_SESSION['name'])){
    echo '<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="glyphicon glyphicon-user"></span> <span class="caret"></span> '.$_SESSION['name'].'</a>
    <ul class="dropdown-menu">
        <li><a style="padding: 10px;" href="logout.php"><span class="fas fa-link"> Logout</a></li>
    </ul>
    ';
 
}else{
    echo '<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-log-in"></span> Login / Sign Up <span class="caret"></span></a>
        <ul class="dropdown-menu">
        <li><a href="login.php">Login</a></li>
        <li><a href="register.php">Sign Up</a></li>
    </ul>';
}

?>
                            
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<br>
<br>


<script src="../jquery.min.js"></script>
<script src="../bootstrap.min.js"></script>
