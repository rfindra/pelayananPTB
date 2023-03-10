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
    <link href="<?php echo base_url();?>/assets/web/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo base_url();?>/assets/web/css/5all.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo base_url();?>/assets/web/css/styles.css" rel="stylesheet" type="text/css" media="all" />

    <!-- FontAwesom Script -->
    <script src="https://kit.fontawesome.com/f42ecbee67.js" crossorigin="anonymous"></script>

    <!-- Favicon  -->
    <link rel="icon" href="assets/web/images/favicon.png">
</head>

<body data-spy="scroll" data-target=".fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-light">
        <div class="container">

            <!-- Text Logo - Use this if you don't have a graphic logo -->
            <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Name</a> -->

            <!-- Image Logo -->
            <a class="navbar-brand logo-image" href="<?php echo base_url()?>index.php"><img
                    src="assets/web/images/logo.svg" alt="alternative"></a>

            <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav">
                    <!--
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="#about">About <span class="sr-only">(current)</span></a>
                        </li>  
                    -->
                    <li class="nav-item">
                        <a class="nav-link page-scroll"
                            href="<?php echo base_url()?>index.php/Aktakelahiran/indexweb">Kepaniteraan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll"
                            href="<?php echo base_url()?>index.php/Aktakematian/indexweb">Kesekretariatan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="https://meet.jit.si/digitalmelayani"
                            target="_blank">Bantuan</a>
                    </li>
                </ul>
                <span class="nav-item ml-auto">
                    <!--    <a href="#your-link">
                            <span class="fab fa-facebook-f"></span>
                        </a>
                        <a href="#your-link">
                            <span class="fab fa-twitter"></span>
                        </a>
                    
                    <a href="<?php echo base_url()?>index.php/login">Masuk
                       <span class="fab fa-instagram"></span>
                    </a> -->
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
                    <h2 class="h2-heading">LEGALISASI BERITA ACARA SUMPAH ADVOKAT <br> PENGADILAN TINGGI BANDUNG </h2>
                    <!--<p class="p-heading">Pengadilan Tinggi Bandung</p>--><br>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">

                    <!-- Card -->
                    <div class="card">
                        <div class="card-image">
                            <a href="#" onclick="toggleForm('form2')">
                                <i class="fa-solid fa-magnifying-glass icon"></i>
                            </a>
                        </div>
                        <div class="card-body">
                            <strong>Upload </strong> <br> Dokumen Persyaratan Legalisasi
                        </div>
                    </div>

                    <!-- Form 1 -->
                    <div id="form2" style="display:none;">
                        <?php
                                            if(isset($data_berkas)){
                                                foreach($data_berkas as $row){
                                                  $id = $row->id_berkas;
                                            ?>
                        <?php }
                                             }
                                                ?>
                        <?php echo form_open_multipart('UploadLegalisasi/simpanedit/'.$id)?>
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">

                                        <div class="form-group">
                                            <label>Foto KTP</label>
                                            <input type="file" class="form-control" name="gambar[]" size="50">
                                        </div><br>
                                        <div class="form-group">
                                            <label>Foto KTA</label>
                                            <input type="file" class="form-control" name="gambar[]" size="50">
                                        </div><br>
                                        <div class="form-group">
                                            <label>Foto BAS Asli</label>
                                            <input type="file" class="form-control" name="gambar[]" size="50">
                                        </div><br>
                                        <div class="form-group">
                                            <label>Foto Surat Kuasa</label>
                                            <input type="file" class="form-control" name="gambar[]" size="50">
                                        </div><br>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->

                        </div> <!-- end of col -->
                    </div> <!-- end of row -->
                </div> <!-- end of container -->
            </div> <!-- end of cards-1 -->
            <!-- end of projects -->

            <!-- Scripts -->
            <script src="js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
            <script src="js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
            <script src="js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
            <script src="js/morphext.min.js"></script> <!-- Morphtext rotating text in the header -->
            <script src="js/scripts.js"></script> <!-- Custom scripts -->
</body>

</html>