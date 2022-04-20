<?php
    session_start();
   
     if (isset($_SESSION['mylogcheker'])&& $_SESSION['mylogcheker']=='Rt_0_0_cab'){

     }else{
         header("Location: vendorlogin.php");
         exit;
     }


                ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Shopping website, Shop with ease, easy shopping, shop and chill">
    <meta name="author" content="Haishat Ibrahim">

    <title>Vendor Dashboard</title>

    <!-- Custom styles for this template-->
    
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
    <link href="all.css" rel="stylesheet" type="text/css">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="fontawesome/css/all.css">
    <link href="./animate/animate.css" rel="stylesheet">
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

</head>
    <body>
      <div>
        <div class="container-fluid  bg-gradient-primary" id="product-container">
        	<div class="row">
        		<div class="col 12">
        			<!-- Navbar starts Here-->
  <nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand text-light" href="#" ><img src="./shopimages/nobg.png" alt="logo" class="image-fluid"><b>Shop&Chill</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <?php  
               
                echo "Welcome"." ". $_SESSION['mylastname'];
               

             ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="vendordashboard.php">Vendor Dashboard</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="vendorlogout.php">Logout</a></li>
          </ul>
    </li>
      </ul>
    </div>
  </div>
<nav>
</div>
         <!-- Navbar Ends here-->