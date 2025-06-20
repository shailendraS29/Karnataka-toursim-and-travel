<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/firststyles.css">
</head>
<body>
<div id="welcome-message" class="welcome-message">
        <div class="welcome-content">
            <img src="images/portfolio/img9.jpg" alt="Karnataka Tourist Place" class="welcome-image">
            <h1>"Welcome to Karnataka Tours and Travels"</h1> <br>
            <p>"Explore the hidden gems of Karnataka. The sixth largest state in India is famous for its wildlife, heritage, temples, monuments, beaches, adventure, food and much more."</p> <br> <br>
            <button id="let-go-button">Let's Go</button>
        </div>
    </div>



<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>

<!doctype html>
<html lang="en-gb" class="no-js">
<head>
<style>
.team-section {
  display: flex;
  justify-content: center;
}
.team-section .col-md-3 {
  display: flex;
  flex-direction: column;
  align-items: center;
}
</style>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <title>GoKarnataka tours and travels</title>
  <meta name="description" content="Traveller">
  <meta name="author" content="WebThemez">

  <link rel="stylesheet" href="css/bootstrap.min.css" />
  
  <link rel="stylesheet" type="text/css" href="css/isotope.css" media="screen" />
  <link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
  <link rel="stylesheet" type="text/css" href="css/da-slider.css" />
  <
  <link href="js/owl-carousel/owl.carousel.css" rel="stylesheet">
  <link rel="stylesheet" href="css/styles.css" />
  
  <link href="assets/css/animate.css" rel="stylesheet" type="text/css" media="all">
  <link href="font/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>

 <?php include('includes/header.php'); ?>

 <div id="#top"></div>
 <section class="hero" id="home">
  <div class="container">
  <div class="hero-text"> <h1 style="font-size:90px;font-family: 'Syncopate', sans-serif; justify-content:center;">
          <b> JOURNEY TO EXPLORE "KARNATAKA"</h1></b>    <br> <br> <br> 
    
  </div>
  </div>
 </section>
  <section id="aboutUs" class="secPad">
  <div class="container"> 

    <!-- Guided by Section -->
    <div class="heading text-center fadeInDown animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
      <h1>Guided by</h1>
    </div>
    <div class="row fadeInDown animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
      <div class="col-md-12 text-center">
        <img src="images/teacher.jpg" alt="Teacher" class="img-responsive img-thumbnail" style="width: 200px; height: auto; margin-bottom: 20px;">
        <h4 style="font-weight: bold;">Prof. ParthaSarathy P.V</h4>
        <p>Professor ParthaSarathy P.V has been a guiding force in the development of our Karnataka tour and travel management project. With extensive experience in the field of computer science, their mentorship has been invaluable. Their insights into the industry and dedication to student success have helped shape the foundation of GoKarnataka Tours and Travels. We are grateful for their continuous support and guidance.</p>
      </div>
    </div>
    <!-- End of Guided by Section -->

    <!-- Our Team Section -->
    <div class="heading text-center fadeInDown animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
      <h1>Our Team</h1>
      <p>Meet the team behind GoKarnataka Travel & Tours. Our crew is committed to crafting unforgettable travel experiences tailored to your preferences.</p>
    </div>

    <div class="row fadeInDown animated justify-content-center team-section" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
      <div class="col-md-3 text-center">
        <img src="images/team1.jpg" alt="Team Member 1" class="img-responsive img-thumbnail">
        <h4 style="font-weight: bold;">Sharath Kumar R</h4>
        <p>Web Developer</p>
        <p>Sharath has extensive web development skills with expertise in HTML, CSS, and JavaScript. His deep knowledge of the tourism industry helped in showcasing Karnataka’s beauty.</p>
      </div>

      <div class="col-md-3 text-center">
        <img src="images/team2.jpg" alt="Team Member 2" class="img-responsive img-thumbnail">
        <h4 style="font-weight: bold;">Shailendra S</h4>
        <p>Web Developer</p>
        <p>Shailendra specializes in HTML, CSS, PHP, and JavaScript, developing unique features tailored to clients' needs. His understanding of heritage ensures each journey is unique and memorable.</p>
      </div>
    </div>

    
  </div>
</section>

  
  </div>   
</section>


<section id="packages" class="secPad">
  <div class="container">
    <div class="heading text-center">
    
      <h2>Most Popular Packages</h2>
     <h4> <p>Our Packages are designed to help you simplify your tour plan so that you are able to visit all significant and excotic tourist destination of Karnataka.</p> </h4>
    </div>
    <div class="">
      <?php $sql = "SELECT * from tbltourpackages order by rand() ";
      $query = $dbh->prepare($sql);
      $query->execute();
      $results=$query->fetchAll(PDO::FETCH_OBJ);
      $cnt=1;
      if($query->rowCount() > 0)
      {
        foreach($results as $result)
        { 
          ?>
          <div class="rom-btm">
            <div class="col-md-3 room-left wow fadeInLeft animated" data-wow-delay=".5s">
              <img src="admin/pacakgeimages/<?php echo htmlentities($result->PackageImage);?>" class="img-responsive" alt="">
            </div>
            <div class="col-md-6 room-midle wow fadeInUp animated" data-wow-delay=".5s">
              <h4>Package Name: <?php echo htmlentities($result->PackageName);?></h4>
              <h6>Package Type : <?php echo htmlentities($result->PackageType);?></h6>
              <p><b>Package Location :</b> <?php echo htmlentities($result->PackageLocation);?></p>
              <p><b>Features</b> <?php echo htmlentities($result->PackageFetures);?></p>
            </div>
            <div class="col-md-3 room-right wow fadeInRight animated" data-wow-delay=".5s">
              <h5>RS: <?php echo htmlentities($result->PackagePrice);?>/-</h5>
              <a href="package_details.php?pkgid=<?php echo htmlentities($result->PackageId);?>" class="view">Details</a>
            </div>
            <div class="clearfix"></div>
          </div>
          <?php 
        }
      } ?>
    </div>
    <div class="clearfix"></div>   
  </div>
</section>

<section id="quote" class="bg-parlex">
  <div class="parlex-back">
    <div class="container secPad text-center">

      <h2>"The World is a book, and those who do not travel read only a page."</h2> <br>
      <h2>"The Most beautiful thing in th world is, of course,the world itself."</h2> <br>
      <h2>"People don't take trips,trips takes people."</h2>
    </div>
  
  </div>
</section>

<section id="portfolio" class="page-section section appear clearfix secPad">
  <div class="container">
    <div class="heading text-center">
    
      <h2>Gallery</h2>
      <h4>
      <p>Karnataka is preferred travel destination for many due to its Beach Relaxation, Food, Pilgimage, Heritage,Wildlife, Hills & Mountains, TrekHere and Advantures. Here are some beautiful image gallery of our Karnataka</p>
      </h4>
    </div>
    <div class="row">            
      <div class="col-md-12">
        <div class="row">
          <div class="portfolio-items clearfix papper " id="3" >
            <article class="col-sm-4  isotopeItem webdesign">
              <div class="portfolio-item">
                <img src="images/portfolio/america.jpg" alt="" />
                <div class="portfolio-desc align-center">
                  <div class="folio-Get It!">
                    <a href="images/portfolio/img1.jpg" class="fancybox">                                                
                      <i class="fa fa-arrows-alt fa-2x"></i>
                    </a>
                  </div>
                </div>
              </div>
            </article>

            <article class="col-sm-4 isotopeItem photography">
              <div class="portfolio-item">
                <img src="images/portfolio/img2.jpg" alt="" />
                <div class="portfolio-desc align-center">
                  <div class="folio-Get It!">
                    <a href="images/portfolio/img2.jpg" class="fancybox">
                      <i class="fa fa-arrows-alt fa-2x"></i>
                    </a>
                  </div>
                </div>
              </div>
            </article>


            <article class="col-sm-4 isotopeItem photography">
              <div class="portfolio-item">
                <img src="images/portfolio/img3.jpg" alt="" />
                <div class="portfolio-desc align-center">
                  <div class="folio-Get It!">
                    <a href="images/portfolio/img3.jpg" class="fancybox">
                      <i class="fa fa-arrows-alt fa-2x"></i>
                    </a>
                  </div>
                </div>
              </div>
            </article>

            <article class="col-sm-4 isotopeItem print">
              <div class="portfolio-item">
                <img src="images/portfolio/img4.jpg" alt="" />
                <div class="portfolio-desc align-center">
                  <div class="folio-Get It!">
                    <a href="images/portfolio/img4.jpg" class="fancybox">
                      <i class="fa fa-arrows-alt fa-2x"></i>
                    </a>
                  </div>
                </div>
              </div>
            </article>

            <article class="col-sm-4 isotopeItem photography">
              <div class="portfolio-item">
                <img src="images/portfolio/img5.jpg" alt="" />
                <div class="portfolio-desc align-center">
                  <div class="folio-Get It!">
                    <a href="images/portfolio/img5.jpg" class="fancybox">
                      <i class="fa fa-arrows-alt fa-2x"></i>
                    </a>
                  </div>
                </div>
              </div>
            </article>

            <article class="col-sm-4 isotopeItem webdesign">
              <div class="portfolio-item">
                <img src="images/portfolio/img6.jpg" alt="" />
                <div class="portfolio-desc align-center">
                  <div class="folio-Get It!">
                    <a href="images/portfolio/img6.jpg" class="fancybox">
                      <i class="fa fa-arrows-alt fa-2x"></i>
                    </a>
                  </div>
                </div>
              </div>
            </article>

            <article class="col-sm-4 isotopeItem print">
              <div class="portfolio-item">
                <img src="images/portfolio/img7.jpg" alt="" />
                <div class="portfolio-desc align-center">
                  <div class="folio-Get It!">
                    <a href="images/portfolio/img7.jpg" class="fancybox">
                      <i class="fa fa-arrows-alt fa-2x"></i>
                    </a>
                  </div>
                </div>
              </div>
            </article>

            <article class="col-sm-4 isotopeItem photography">
              <div class="portfolio-item">
                <img src="images/portfolio/img8.jpg" alt="" />
                <div class="portfolio-desc align-center">
                  <div class="folio-Get It!">
                    <a href="images/portfolio/img8.jpg" class="fancybox">
                      <i class="fa fa-arrows-alt fa-2x"></i>
                    </a>
                  </div>
                </div>
              </div>
            </article>

            <article class="col-sm-4 isotopeItem print">
              <div class="portfolio-item">
                <img src="images/portfolio/img9.jpg" alt="" />
                <div class="portfolio-desc align-center">
                  <div class="folio-Get It!">
                    <a href="images/portfolio/img9.jpg" class="fancybox">
                      <i class="fa fa-arrows-alt fa-2x"></i>
                    </a>
                  </div>
                </div>
              </div>
            </article>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<section id="contactUs" class="page-section secPad">
  <div class="container">
    <div class="row">
      <div class="heading text-center">
       
        <h2>Ready For Unforgatable Travel. Remember Us!</h2>  <br>  <h4>
        <p>Thank you for visiting our website. Feel free to contact and reach us !!</p></h4>
      </div>
    </div>
    <div class="row mrgn30">
      <div class="col-sm-12 col-md-8">
      <form name="sentMessage" id="contactForm" method="post" action="contact_form_handler.php" validate>
    <h3>Contact Form</h3> <br>
    <div class="control-group">
        <div class="controls">
            <input type="text" class="form-control" 
            placeholder="Full Name" id="name" name="name" required
            data-validation-required-message="Please enter your name" />
            <p class="help-block"></p>
        </div>
    </div>     
    <div class="control-group" style="margin-bottom: 8px;">
        <div class="controls">
            <input type="email" class="form-control" placeholder="Email" 
            id="email" name="email" required
            data-validation-required-message="Please enter your email" />
        </div>
    </div>     

    <div class="control-group" style="margin-bottom: 8px;">
        <div class="controls">
            <textarea rows="10" cols="100" class="form-control" 
            placeholder="Message" id="message" name="message" required
            data-validation-required-message="Please enter your message" minlength="5" 
            data-validation-minlength-message="Min 5 characters" 
            maxlength="999" style="resize:none"></textarea>
        </div>
    </div>     
    <div id="success"> </div> 
    <button type="submit" class="btn btn-primary pull-right">Send</button><br />
</form>

        
      
      </div> 

   
      <?php include('includes/signup.php');?>     
     
      <?php include('includes/signin.php');?>     
      
    </div>
  </div>

</section>
<?php include('includes/footer.php'); ?>

<a href="#top" class="topHome"><i class="fa fa-chevron-up fa-2x"></i></a>

<script src="js/script.js"></script>
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
</body>
</html>
