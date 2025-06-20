<?php
include('includes/checklogin.php');
check_login();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>Admin - GoKarnataka Tours & Travels</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
  <link href="css/bootstrap.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <?php include('includes/sidebar.php');?>
     <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <?php include('includes/header.php');?>
        <div class="container-fluid" id="container-wrapper"> 
         <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 style="text-align: center;"> </h1>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="manage_bookings.php">Home</a></li>
               <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
            
          </div>  
          <br> <br> <br>
            
          <h1 style=" text-align: center; font-size:100px; font-weight:bold; color:royalblue">GO KARNATAKA TOURS & TRAVELS</h1>   <br> <br>
          <h2 style=" text-align: center; font-size: 50px; font-weight:bold;color:royalblue">Hello Admin <br> Wellcome Back!!</h2>
           


        </div>
        
        <?php include('include/modal.php');?>
       
      </div>
      
      <?php include('includes/footer.php');?>

    </div>
  </div>

  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>  
</body>

</html>