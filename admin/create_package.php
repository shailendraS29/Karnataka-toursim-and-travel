<?php
include('includes/checklogin.php');
check_login();
if(isset($_POST['submit']))
{
  $pname=$_POST['packagename'];
  $ptype=$_POST['packagetype']; 
  $plocation=$_POST['packagelocation'];
  $pprice=$_POST['packageprice']; 
  $pfeatures=$_POST['packagefeatures'];
  $pdetails=$_POST['packagedetails']; 
  $pimage=$_FILES["packageimage"]["name"];
  move_uploaded_file($_FILES["packageimage"]["tmp_name"],"pacakgeimages/".$_FILES["packageimage"]["name"]);
  $sql="INSERT INTO TblTourPackages(PackageName,PackageType,PackageLocation,PackagePrice,PackageFetures,PackageDetails,PackageImage) VALUES(:pname,:ptype,:plocation,:pprice,:pfeatures,:pdetails,:pimage)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':pname',$pname,PDO::PARAM_STR);
  $query->bindParam(':ptype',$ptype,PDO::PARAM_STR);
  $query->bindParam(':plocation',$plocation,PDO::PARAM_STR);
  $query->bindParam(':pprice',$pprice,PDO::PARAM_STR);
  $query->bindParam(':pfeatures',$pfeatures,PDO::PARAM_STR);
  $query->bindParam(':pdetails',$pdetails,PDO::PARAM_STR);
  $query->bindParam(':pimage',$pimage,PDO::PARAM_STR);
  $query->execute();
  $lastInsertId = $dbh->lastInsertId();
  if($lastInsertId)
  {
    $msg="Package Created Successfully";
  }
  else 
  {
    $error="Something went wrong. Please try again";
  }

}
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
  <title>Admin - Create Package</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
  <style>
    .errorWrap {
      padding: 10px;
      margin: 0 0 20px 0;
      background: #fff;
      border-left: 4px solid #dd3d36;
      -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
      box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    }
    .succWrap{
      padding: 10px;
      margin: 0 0 20px 0;
      background: #fff;
      border-left: 4px solid #5cb85c;
      -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
      box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    }
  </style>
</head>

<body id="page-top">
  <div id="wrapper">
 
    <?php include('includes/sidebar.php');?>
  
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
     
        <?php include('includes/header.php');?>
       
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Package</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item">Forms</li>
              <li class="breadcrumb-item active" aria-current="page">Create Package</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12">
            
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Create Package</h6>
                  <?php 
                  if($error){?>
                    <div class="errorWrap">
                      <strong>ERROR</strong>:<?php echo htmlentities($error); ?> 
                    </div>
                    <?php 
                  } 
                  else if($msg){?>
                    <div class="succWrap">
                      <strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> 
                    </div>
                    <?php
                  }?>
                </div>
                <div class="card-body">
                  <form class="form-sample"  method="post" enctype="multipart/form-data">

                    <div class="row">
                      <div class="form-group col-md-6">
                        <label class="col-sm-12 pl-0 pr-0">Package Name</label>
                        <div class="col-sm-12 pl-0 pr-0">
                          <input type="text" class="form-control" name="packagename" id="packagename" placeholder="Name" required>
                        </div>
                      </div>
                      <div class="form-group col-md-6 pl-md-0">
                        <label class="col-sm-12 pl-0 pr-0">Package Type</label>
                        <div class="col-sm-12 pl-0 pr-0">
                          <input type="text" class="form-control" name="packagetype" id="packagetype" placeholder=" package Type " required>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-md-6">
                        <label class="col-sm-12 pl-0 pr-0">Package Location</label>
                        <div class="col-sm-12 pl-0 pr-0">
                         <input type="text" class="form-control" name="packagelocation" id="packagelocation" placeholder="  Location" required>
                       </div>
                     </div>
                     <div class="form-group col-md-6 pl-md-0">
                      <label class="col-sm-12 pl-0 pr-0">Price in Rs/label>
                      <div class="col-sm-12 pl-0 pr-0">
                        <input type="text" class="form-control" name="packageprice" id="packageprice" placeholder=" Price is Rs" required>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-6 pl-md-0">
                      <label class="col-sm-12 pl-0 pr-0">Package Details</label>
                      <div class="col-sm-12 pl-0 pr-0">
                        <textarea class="form-control" rows="5" cols="50" name="packagedetails" id="packagedetails" placeholder="Package Details" required></textarea> 
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                      <label class="col-sm-12 pl-0 pr-0">Package Features</label>
                      <div class="col-sm-12 pl-0 pr-0">
                        <input type="text" class="form-control" name="packagefeatures" id="packagefeatures" placeholder="Package Features Eg-free Pickup-drop facility" required>
                      </div>
                    </div>
                  </div>

                  <div class="row">  
                    <div class="form-group col-md-4 ">
                      <label class="col-sm-12 pl-0 pr-0 ">Attach Package Image</label>
                      <div class="col-sm-12 pl-0 pr-0">
                        <input type="file" name="packageimage" id="packageimage" required>
                      </div>
                    </div> 
                  </div>   

                  <button type="submit" name="submit" class="btn-primary btn">Create</button>

                  <button type="reset" class="btn-inverse btn">Reset</button>
                </form>
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

</body>

</html>