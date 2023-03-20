<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- SEO Meta Tags -->
  <meta name="description" content="Your description">
  <meta name="author" content="Your name">

  <!-- OG Meta Tags to improve the way the post looks when you share the page on Facebook, Twitter, LinkedIn -->
  <meta property="og:site_name" content="" /> <!-- website name -->
  <meta property="og:site" content="" /> <!-- website link -->
  <meta property="og:title" content="" /> <!-- title shown in the actual shared post -->
  <meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
  <meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
  <meta property="og:url" content="" /> <!-- where do you want your post to link to -->
  <meta name="twitter:card" content="summary_large_image"> <!-- to have large image post format in Twitter -->

  <!-- Webpage Title -->
  <title>Legalisasi Berita Acara Sumpah Advokat</title>

  <!-- Styles -->
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&family=Poppins:wght@600&display=swap"
    rel="stylesheet">
  <link href="<?php echo base_url();?>/assets/web/css/bootstrap.css" rel="stylesheet">
  <link href="<?php echo base_url();?>/assets/web/css/fontawesome-all.css" rel="stylesheet">
  <link href="<?php echo base_url();?>/assets/web/css/styles.css" rel="stylesheet">

  <!-- FontAwesom Script -->
  <script src="https://kit.fontawesome.com/f42ecbee67.js" crossorigin="anonymous"></script>

  <!-- Favicon  -->
	<link rel="icon" href="<?php echo base_url();?>/assets/web/images/system/favicon.ico">
</head>

<body data-spy="scroll" data-target=".fixed-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg fixed-top navbar-light">
    <div class="container">

      <!-- Text Logo - Use this if you don't have a graphic logo -->
      <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Name</a> -->

      <!-- Image Logo -->
      <a class="navbar-brand logo-image" href="<?php echo base_url()?>index.php"><img
          src="<?php echo base_url();?>/assets/web/images/logo.png" alt="alternative"></a>

      <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link page-scroll"
              href="<?php echo base_url()?>index.php/Kepaniteraan/indexweb">Kepaniteraan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link page-scroll"
              href="<?php echo base_url()?>index.php/Kesekretariatan/indexweb">Kesekretariatan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link page-scroll" href="https://meet.jit.si/digitalmelayani" target="_blank">Bantuan</a>
          </li>
        </ul>
        <span class="nav-item social-icons ml-auto">
          <!-- <a href="<?php echo base_url();?>index.php/web/login_views">Masuk</a> -->
          <a class="nav-link page-scroll" href="<?php echo base_url()?>index.php/login">Masuk</a>


        </span>
      </div> <!-- end of navbar-collapse -->
    </div> <!-- end of container -->
  </nav> <!-- end of navbar -->
  <!-- end of navigation -->

  <!-- Projects -->
  <div id="projects" class="cards-1" style="text-align: center;">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
        </div> <!-- end of col -->
      </div> <!-- end of row -->
      <div class="row">
        <div class="col-lg-12">

          <!-- Card -->
          <div class="card">
            <div class="card-image">
              <a href="#" onload="toggleForm2()">
                <i class="fa-solid fa-user icon"></i>
              </a>
            </div>
            <div class="card-body">
              <strong>ADMIN</strong> - Masuk
            </div>
          </div>
          <!-- Form login -->
          <div id="form-login" class="card-body">
            <form action="<?php echo base_url();?>index.php/user/login" method="POST">
              <div class="form-group-login">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" class="form-control" required>
              </div>
              <div class="form-group-login">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>
              </div>
              <button type="submit" class="btn btn-primary btn-block">Masuk</button>
            </form>
          </div>
        </div> <!-- end of row -->
      </div> <!-- end of container -->
    </div> <!-- end of cards-1 -->
    <!-- end of projects -->

    <footer>
        <p>&copy; 2023 Pengadilan Tinggi Bandung</p>
    </footer>



    <!-- Scripts -->
    <script src="<?php echo base_url();?>/assets/web/js/jquery.min.js"></script>
    <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="<?php echo base_url();?>/assets/web/js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="<?php echo base_url();?>/assets/web/js/jquery.easing.min.js"></script>
    <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="<?php echo base_url();?>/assets/web/js/morphext.min.js"></script>
    <!-- Morphtext rotating text in the header -->
    <script src="<?php echo base_url();?>/assets/web/js/scripts.js"></script> <!-- Custom scripts -->
</body>

</html>