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
  <title>Admin - manage packages</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">

    <?php include('includes/sidebar.php');?>
 
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
      
        <?php include('includes/header.php');?>
        <
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Packages</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Manage Packages</li>
            </ol>
          </div>

          <div class="row">
         
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Total Packages =
                  <?php $sql3 = "SELECT PackageId from tbltourpackages";
                      $query3= $dbh -> prepare($sql3);
                      $query3->execute();
                      $results3=$query3->fetchAll(PDO::FETCH_OBJ);
                      $cnt3=$query3->rowCount();
                      ?>
                     <?php echo htmlentities($cnt3);?>
                  </h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>PackageId</th>
                        <th>Package Name</th>
                        <th>Package Type</th>
                        <th>Package Location</th>
                        <th>Package Price</th>
                        <th>Creation Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $sql = "SELECT * from tbltourpackages";
                      $query = $dbh -> prepare($sql);
                      $query->execute();
                      $results=$query->fetchAll(PDO::FETCH_OBJ);
                      $cnt=1;
                      if($query->rowCount() > 0)
                      {
                        foreach($results as $result)
                        { 
                          ?>    
                          <tr>
                            <td>#MP-<?php echo htmlentities($cnt);?></td>
                            <td><?php echo htmlentities($result->PackageName);?></td>
                            <td><?php echo htmlentities($result->PackageType);?></td>
                            <td><?php echo htmlentities($result->PackageLocation);?></td>
                            <td>Rs: <?php echo htmlentities($result->PackagePrice);?></td>
                            <td><?php echo htmlentities($result->Creationdate);?></td>
                            <td><a href="update_packages.php?pid=<?php echo htmlentities($result->PackageId);?>"><button type="button" class="btn btn-primary btn-sm">Edit</button></a></td>
                          </tr>
                          <?php 
                          $cnt=$cnt+1; 
                        } 
                      }?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
         
          <?php include('includes/modal.php');?>

        </div>
      
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

  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>


  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); 
      $('#dataTableHover').DataTable();
    });
  </script>

</body>

</html>