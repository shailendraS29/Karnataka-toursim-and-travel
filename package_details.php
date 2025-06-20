<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (isset($_POST['submit2'])) {
	$pid = intval($_GET['pkgid']);
	$useremail = $_SESSION['login'];
	$fromdate = $_POST['fromdate'];
	$todate = $_POST['todate'];
	$comment = $_POST['comment'];
	$status = 0;
	$sql = "INSERT INTO tblbooking(PackageId,UserEmail,FromDate,ToDate,Comment,status) VALUES(:pid,:useremail,:fromdate,:todate,:comment,:status)";
	$query = $dbh->prepare($sql);
	$query->bindParam(':pid', $pid, PDO::PARAM_STR);
	$query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
	$query->bindParam(':fromdate', $fromdate, PDO::PARAM_STR);
	$query->bindParam(':todate', $todate, PDO::PARAM_STR);
	$query->bindParam(':comment', $comment, PDO::PARAM_STR);
	$query->bindParam(':status', $status, PDO::PARAM_STR);
	$query->execute();
	$lastInsertId = $dbh->lastInsertId();
	if ($lastInsertId) {
		echo '<script>alert("Checking for availability,Thank you")</script>';
	} else {
		echo '<script>alert("Something Went Wrong. Please try again")</script>';
	}
}
?>
<!doctype html>
<html lang="en-gb" class="no-js">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<title>My Travel - Package details</title>
	<meta name="description" content="Traveller">
	<meta name="author" content="WebThemez">

	<link rel="stylesheet" href="css/bootstrap.min.css" />

	<link rel="stylesheet" type="text/css" href="css/isotope.css" media="screen" />
	<link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/da-slider.css" />

	<link href="js/owl-carousel/owl.carousel.css" rel="stylesheet">
	<link rel="stylesheet" href="css/styles.css" />

	<link href="assets/css/animate.css" rel="stylesheet" type="text/css" media="all">
	<link href="font/css/font-awesome.min.css" rel="stylesheet">
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Get today's date in YYYY-MM-DD format
			var today = new Date().toISOString().split('T')[0];
			// Set the min attribute of both date inputs
			var fromDateInput = document.getElementById("datepicker");
			var toDateInput = document.getElementById("datepicker1");
			fromDateInput.setAttribute("min", today);
			toDateInput.setAttribute("min", today);

			// Validate dates and display message
			function validateDate(input) {
				var inputDate = new Date(input.value);
				var todayDate = new Date(today);
				var errorMessage = document.getElementById("error-message");

				if (inputDate < todayDate) {
					errorMessage.textContent = "The date cannot be earlier than today.";
					input.value = ""; // Clear the invalid input
				} else {
					errorMessage.textContent = "";
				}
			}

			// Event listeners to validate dates
			fromDateInput.addEventListener("change", function() {
				validateDate(this);
				toDateInput.setAttribute("min", this.value); // Set the min date for "To" input
			});

			toDateInput.addEventListener("change", function() {
				validateDate(this);
			});
		});
	</script>
</head>

<body>
	<header class="header">
		<?php if ($_SESSION['login']) { ?>
			<div class="top-header">
				<div class="container">
					<ul class="tp-hd-lft wow fadeInLeft animated" data-wow-delay=".5s">
						<li class="hm"><a href="index.php"><i class="fa fa-home"></i></a></li>
						<li class="prnt"><a href="profile.php">My Profile</a></li>
						<li class="prnt"><a href="change_password.php">Change Password</a></li>
						<li class="prnt"><a href="tour_history.php">My Bookings</a></li>
					</ul>
					<ul class="tp-hd-rgt wow fadeInRight animated" data-wow-delay=".5s">
						<li class="tol">Welcome :</li>
						<li class="sig"><?php echo htmlentities($_SESSION['login']); ?></li>
						<li class="sigi"><a href="logout.php">/ Logout</a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
			</div>
		<?php
		} else {
		?>
			<div class="top-header">
				<div class="container">

					<ul class="tp-hd-rgt wow fadeInRight animated" data-wow-delay=".5s">
						<li class="tol"></li>
						<li class="sig"><a href="#" data-toggle="modal" data-target="#myModal">Sign Up</a></li>
						<li class="sigi"><a href="#" data-toggle="modal" data-target="#myModal4">&nbsp; Sign In</a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
			</div>
		<?php
		} ?>
		<div class="container">
			<nav class="navbar navbar-inverse" role="navigation">
				<div class="navbar-header adeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
					<a href="#" class="navbar-brand scroll-top logo"><b>GoKarnataka Tours & Travels</b></a>
					<button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
						<span class="sr-only"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>

				<div id="main-nav" class="collapse navbar-collapse adeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
					<ul class="nav navbar-nav" id="mainNav">
						<li><a href="index.php" class="scroll-link">Home</a></li>
						<li><a href="index.php" class="scroll-link">About Us</a></li>
						<li><a href="index.php" class="scroll-link">Packages</a></li>
						<li><a href="index.php" class="scroll-link">Gallery</a></li>
						<li><a href="index.php" class="scroll-link">Contact Us</a></li>
					</ul>
				</div>

			</nav>

		</div>

	</header>

	<div id="#top"></div>
	<section id="home">
		<div class="banner-container" style="height:100px;">

			<div class="container banner-content">
				<div id="da-slider" class="da-slider">
					<div class="da-slide">
						<h2>Tour Packages</h2>
						<p>Get your plans right away.. enjoy!!!</p>
						<div class="da-img"></div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<section id="packages" class="secPad">
		<div class="container">
			<div class="heading text-center">

				<h2>Package Details</h2>
				<p>Book your packages</p>
			</div>

			<div class="selectroom">
				<div class="container">
					<?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
					<?php
					$pid = intval($_GET['pkgid']);
					$sql = "SELECT * from tbltourpackages where PackageId=:pid";
					$query = $dbh->prepare($sql);
					$query->bindParam(':pid', $pid, PDO::PARAM_STR);
					$query->execute();
					$results = $query->fetchAll(PDO::FETCH_OBJ);
					$cnt = 1;
					if ($query->rowCount() > 0) {
						foreach ($results as $result) {
					?>

							<div class="selectroom_top">
								<div class="col-md-4 selectroom_left wow fadeInLeft animated" data-wow-delay=".5s">
									<img src="admin/pacakgeimages/<?php echo htmlentities($result->PackageImage); ?>" class="img-responsive" alt="">
								</div>
								<div class="col-md-8 selectroom_right wow fadeInRight animated" data-wow-delay=".5s">
									<h2><?php echo htmlentities($result->PackageName); ?></h2>
									<p class="dow">#PKG-<?php echo htmlentities($result->PackageId); ?></p>

									<p><b>Package Type :</b> <?php echo htmlentities($result->PackageType); ?></p>

									<p><b>Package Location :</b> <?php echo htmlentities($result->PackageLocation); ?></p>
									<p><b>Features</b> <?php echo htmlentities($result->PackageFetures); ?></p>

									<div class="clearfix"></div>
									<div class="grand">
										<p>Grand Total</p>
										<h3>Rs:9000/-</h3>
									</div>
								</div>
								<h3>Package Details</h3>
								<p style="padding-top: 1%"><?php echo htmlentities($result->PackageDetails); ?> </p>
								<div class="clearfix"></div>
							</div>

							<form name="book" method="post">
								<div class="selectroom_top">
									<div class="selectroom-info animated wow fadeInUp animated" data-wow-duration="1200ms" data-wow-delay="500ms" style="visibility: visible; animation-duration: 1200ms; animation-delay: 500ms; animation-name: fadeInUp; margin-top: -70px">
										<div class="ban-bottom">
											<div class=" col-md-6 mr-2 ">
												<label class="inputLabel" style="font-weight:bold;">From</label>
												<input class="form-control" id="datepicker" type="date" placeholder="dd-mm-yyyy"  name="fromdate" required="">
											</div>
											<div class=" col-md-6">
												<label class="inputLabel"style="font-weight:bold;">To</label>
												<input class="form-control" id="datepicker1" type="date" placeholder="dd-mm-yyyy" name="todate" required="">
											</div>
										</div>
										
										<ul>

											<li class="spe">
												<label class="inputLabel" style="font-weight:bold;">Comment</label>
												<textarea  class="form-control" rows="4" cols="4" type="text" name="comment" required=""></textarea> <br>
											</li>
											
											<form>
												<ul>
													<li>
														<input type="checkbox" id="bus" name="option">
														<label  class="inputLabel "for="bus" style="font-weight:bold;">BUS &nbsp;&nbsp;&nbsp;&nbsp;</label>
													</li>
													<li>
														<input type="checkbox" id="train" name="option">
														<label  class="inputLabel "for="train"style="font-weight:bold;" >TRAIN&nbsp;&nbsp;&nbsp;&nbsp;</label>
													</li>
													<li>
														<input type="checkbox" id="car" name="option">
														<label  class="inputLabel "for="car"style="font-weight:bold;">CAR</label>
													</li>
													
												</ul>
											</form>
											


											<?php if ($_SESSION['login']) { ?>
   												 <li class="spe ml-auto" align="center">
        												<button type="submit" name="submit2" class="btn btn-primary"> Book</button> 
   												 </li>
												 
													<?php } else { ?>
													    <li class="sigi ml-auto" align="center" style="margin-top: 1%">
													         <br> <?php echo str_repeat('&nbsp;', 500); ?> <a href="#" data-toggle="modal" data-target="#myModal4" class="btn btn-primary">Book</a>
													    </li>
													<?php } ?>

											<div class="clearfix"></div>
										</ul>
									</div>
								</div>
							</form>
							<?php 
						}
					} ?>
				</div>
			</div>
		
		</div>
	</section>
	<a href="#top" class="topHome"><i class="fa fa-chevron-up fa-2x"></i></a>
	<?php include('includes/footer.php');?>

	<?php include('includes/signup.php');?>     

	<?php include('includes/signin.php');?>     
	
	<script>
document.addEventListener("DOMContentLoaded", function() {
    var fromDateInput = document.getElementById('datepicker');
    var toDateInput = document.getElementById('datepicker1');

    // Set minimum date for 'From' input as today
    fromDateInput.min = new Date().toISOString().split("T")[0];

    fromDateInput.addEventListener('change', function() {
        // Set minimum date for 'To' input based on 'From' input value
        var fromDate = new Date(fromDateInput.value);
        toDateInput.min = new Date(fromDate.getTime() + 24 * 60 * 60 * 1000).toISOString().split("T")[0];
        
        // Reset 'To' input if it's before the new minimum date
        if (toDateInput.value <= fromDateInput.value) {
            toDateInput.value = "";
        }
    });

    toDateInput.addEventListener('change', function() {
        // Ensure 'To' date is not the same as or earlier than 'From' date
        var fromDate = new Date(fromDateInput.value);
        var toDate = new Date(toDateInput.value);
        if (toDate <= fromDate) {
            alert("The 'To' date must be later than the 'From' date.");
            toDateInput.value = "";
        }
    });
});
</script>


	<script src="js/modernizr-latest.js"></script>
	<script src="js/jquery-1.8.2.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/jquery.isotope.min.js" type="text/javascript"></script>
	<script src="js/fancybox/jquery.fancybox.pack.js" type="text/javascript"></script>
	<script src="js/jquery.nav.js" type="text/javascript"></script>
	<script src="js/jquery.cslider.js" type="text/javascript"></script>
	<script src="contact/contact_me.js"></script>
	<script src="js/custom.js" type="text/javascript"></script>
	<script src="js/owl-carousel/owl.carousel.js"></script>
</body>
</html>
