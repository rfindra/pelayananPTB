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
    <title>Audiensi Pengadilan Tinggi Bandung</title>

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
                            href="<?php echo base_url()?>index.php/Kepaniteraan/indexweb">Kepaniteraan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll"
                            href="<?php echo base_url()?>index.php/Kesekretariatan/indexweb">Kesekretariatan</a>
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
                    <h2 class="h2-heading">AUDIENSI PIMPINAN <br> PENGADILAN TINGGI BANDUNG </h2>
                    <!--<p class="p-heading">Pengadilan Tinggi Bandung</p>--><br>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">

                    <!-- Card -->
                    <div class="card">
                        <div class="card-image">
                            <a href="#" onclick="toggleForm1()">
                                <i class="fas fa-file-signature icon"></i>
                            </a>
                        </div>
                        <div class="card-body">
                            <strong>Audiensi </strong>
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Form 1 -->
                    <div id="form1" style="display:block;">
                        <!-- Add the form container with display:none -->
                        <div class="card-body">
                            <!--<h3 class="h3-heading">Permohonan Audiensi dengan Pimpinan Pengadilan Tinggi Bandung</h3>-->
                            <div><?= validation_errors() ?></div>
                            <?php echo form_open_multipart('Audiensi/daftar_audiensi'); ?>
                            <table>
                                <legend>Data Pemohon</legend><br>
                                <tr>
                                    <td><label>NIK :</label></td>
                                    <td><input type="text" name="nik" placeholder="Nomor Induk Kependudukan" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Nama Lengkap :</label></td>
                                    <td><input type="text" name="nmlkp" placeholder="Nama Lengkap" required></td>
                                </tr>
                                <tr>
                                    <td><label>Nama Lembaga / Organisasi :</label></td>
                                    <td><input type="text" name="nmlembaga" placeholder="Nama Lembaga / Organisasi"
                                            required></td>
                                </tr>
                                <tr>
                                    <td><label>E-Mail :</label></td>
                                    <td><input type="email" name="email" placeholder="E-Mail" required></td>
                                </tr>
                                <tr>
                                    <td><label>Nomor Handphone / Whatsapp :</label></td>
                                    <td><input type="text" name="nohp" placeholder="Nomor Handphone / Whatsapp"
                                            required></td>
                                </tr>
                                <tr>
                                    <td><label>Foto KTP :</label></td>
                                    <td><input type="file" name="foto_ktp" accept="image/*" required></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><?php echo form_error('foto_ktp'); ?></td>
                                </tr>
                                <tr>
                                    <td><label>Upload Surat Permohonan Audiensi :</label></td>
                                    <td><input type="file" name="surat_permohonan" accept="application/pdf" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><?php echo form_error('surat_permohonan'); ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><input type="hidden" id="status" name="status"
                                            value="Belum Selesai"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" value="Simpan">Simpan</button>
                                    </td>
                                </tr>
                            </table>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                    <!-- End of Form 1 -->
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
    <!--<script>
        const form1 = document.getElementById('form1');
        const form2 = document.getElementById('form2');

        const toggleForm1 = () => {
            form1.style.display = form1.style.display === 'none' ? 'block' : 'none';
            form2.style.display = 'none';
        }

        const toggleForm2 = () => {
            form2.style.display = form2.style.display === 'none' ? 'block' : 'none';
            form1.style.display = 'none';
        }

        const hideForms = () => {
            form1.style.display = 'none';
            form2.style.display = 'none';
        }

        document.getElementById('form1-link').addEventListener('click', (event) => {
            event.preventDefault();
            toggleForm1();
        });

        document.getElementById('form2-link').addEventListener('click', (event) => {
            event.preventDefault();
            toggleForm2();
        });

        document.getElementById('close-forms').addEventListener('click', (event) => {
            event.preventDefault();
            hideForms();
        });
    </script>-->





</body>

</html>