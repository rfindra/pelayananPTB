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
	<title>Pelayanan Digital Pengadilan Tinggi Bandung</title>

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
<!-- Pop-up Message Script -->
<script>
    // Function to show the pop-up message
    function showMessage() {
        var confirmation = confirm("Mohon Kesediaannya untuk Mengisi Buku Tamu. Klik OK untuk Mengisi Buku Tamu Digital");
        if (confirmation) {
            redirectToBukutamu();
        }
    }

    // Function to redirect to bukutamu.php
    function redirectToBukutamu() {
        //window.location.href = '<?php echo base_url('views/web/bukutamu.php'); ?>';
        window.location.href = '<?php echo base_url('index.php/Bukutamu/indexweb');?>';
    }

    // Execute the showMessage function when the page is loaded
    window.onload = showMessage;
</script>
<!--End of Buku Tamu Pop Pop-up-->


</head>

<body data-spy="scroll" data-target=".fixed-top">

	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg fixed-top navbar-light">
		<div class="container">

			<!-- Text Logo - Use this if you don't have a graphic logo -->
			<!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Name</a> -->

			<!-- Image Logo -->
			<a class="navbar-brand logo-image" href="<?php echo base_url(); ?>index.php"><img
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
					<!--<li class="nav-item">
						<a class="nav-link page-scroll"
							href="<?php echo base_url()?>index.php/Bukutamu/indexweb">Bukutamu</a>
					</li>
					<!--<li class="nav-item">
						<a class="nav-link page-scroll"
							href="<?php echo base_url()?>index.php/Survei/indexweb">Survei</a>
					</li>-->

					<li class="nav-item">
						<a class="nav-link page-scroll" href="https://meet.jit.si/digitalmelayani"
							target="_blank">Bantuan</a>
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
	<div id="projects" class="cards-1">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="h2-heading">PELAYANAN DIGITAL <br> PENGADILAN TINGGI BANDUNG </h2>
					<!--<p class="p-heading">Pengadilan Tinggi Bandung</p>--><br>
				</div> <!-- end of col -->
			</div> <!-- end of row -->
			<div class="row">
				<div class="col-lg-12">

					<!-- Card -->
					<div class="card">
						<div class="card-image">
							<a href="<?php echo base_url()?>index.php/Kepaniteraan/indexweb">
								<img class="img-fluid" src="assets/web/images/system/qrKepaniteraan.png" alt="alternative">
							</a>
						</div>
						<div class="card-body">
							<strong>Kepaniteraan </strong> - Pelayanan Kepaniteraan Pengadilan Tinggi Bandung
						</div>
					</div>
					<!-- end of card -->

					<!-- Card -->
					<div class="card">
						<div class="card-image">
							<a href="<?php echo base_url()?>index.php/Kesekretariatan/indexweb">
								<img class="img-fluid" src="assets/web/images/system/qrKesekretariatan.png" alt="alternative">
							</a>
						</div>
						<div class="card-body">
							<strong>Kesekretariatan </strong> - Pelayanan Kesekretariatan Pengadilan Tinggi Bandung
						</div>
					</div>
					<!-- end of card -->

					<!-- Card -->
					<div class="card">
						<div class="card-image">
							<a href="https://eberpadu.mahkamahagung.go.id/" target=_blank>
								<img class="img-fluid" src="assets/web/images/system/qrBerpadu.png" alt="alternative">
							</a>
						</div>
						<div class="card-body">
							<strong>e-Berpadu </strong> - Elektronik Berkas Pidana Terpadu
						</div>
					</div>
					<!-- end of card -->

					<!-- Card -->
					<div class="card">
						<div class="card-image">
							<a href="http://esurvey.badilum.mahkamahagung.go.id/index.php/kontrol_ikm_ptsp" target=_blank> 
								<img class="img-fluid" src="assets/web/images/system/qrEmot.png" alt="alternative">
							</a>
						</div>
						<div class="card-body">
							<strong>e-Survey Dirjen Badilum </strong> - Survey Kepuasan Masyarakat pada Pelayanan Pengadilan Tinggi Bandung
						</div>
					</div>
					<!-- end of card -->

					<!-- Card -->
					<div class="card">
						<div class="card-image">
							<a href="https://meet.jit.si/digitalmelayani" target="_blank">
								<img class="img-fluid" src="assets/web/images/system/qrVideo.png" alt="alternative">
							</a>
						</div>
						<div class="card-body">
							<strong>Bantuan</strong> - Hubungi Petugas PTSP Pengadilan Tinggi Bandung
						</div>
					</div>
					<!-- end of card -->
				</div> <!-- end of col -->
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