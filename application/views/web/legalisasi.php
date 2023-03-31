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

    <!-- FontAwesom Script -->
    <script src="https://kit.fontawesome.com/f42ecbee67.js" crossorigin="anonymous"></script>

    <!-- Webpage Title -->
    <title>Legalisasi Berita Acara Sumpah Advokat</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="<?php echo base_url();?>/assets/web/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo base_url();?>/assets/web/css/5all.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo base_url();?>/assets/web/css/styles.css" rel="stylesheet" type="text/css" media="all" />

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
                            <a href="#" onclick="toggleForm1()">
                                <i class="fas fa-file-signature icon"></i>
                            </a>
                        </div>
                        <div class="card-body">
                            <strong>Daftar </strong> <br> Legalisasi Berita Acara Sumpah Advokat
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Form 1 -->
                    <div id="form1" style="display:none;">
                        <!-- Add the form container with display:none -->
                        <div class="card-body">
                            <h3 class="h3-heading">Form Pendaftaran Legalisasi BAS</h3>
                            <div><?= validation_errors() ?></div>
                            <form action="<?php echo base_url()?>index.php/Legalisasibas/daftarlegalisasi"
                                method="POST">
                                <table>
                                    <legend></span>Data Pemohon</legend><br>
                                    <label>NIK :</label>
                                    <input type="number" name="nik" placeholder="Nomor Induk Kependudukan" required><br>
                                    <label>Nama Lengkap :</label>
                                    <input type="text" name="nmlkp" placeholder="Nama Lengkap" required><br>
                                    <label>Nama Organisasi :</label>
                                    <input type="text" name="nmorg" placeholder="Nama Organisasi" required><br>
                                    <label>E-Mail :</label>
                                    <input type="email" name="email" placeholder="e-mail" required><br>
                                    <label>Nomor Handphone / Whatsapp :</label>
                                    <input type="number" name="nohp" placeholder="Nomor Handphone" required><br>
                                    <input type="hidden" id="sts" name="sts" value="Belum Selesai" required><br>
                                    <div align="center"><button type="submit" value="Simpan">Simpan</button></div> <br>
                                </table>
                            </form>
                        </div>
                    </div>
                    <!-- End of Form 1 -->

                    <!-- Card -->
                    <div class="card">
                        <div class="card-image">
                            <a href="#" onclick="toggleForm2()">
                                <i class="fa-solid fa-magnifying-glass icon"></i>
                            </a>
                        </div>
                        <div class="card-body">
                            <strong>Status Permohonan </strong> <br> Cek Status Permohonan Legalisasi BAS
                        </div>
                    </div>

                    <!-- Form 2 -->
                    <div id="form2" style="display:none;">
    <?php
    $no=1;
    if(isset($data_legalisasi)){
        foreach($data_legalisasi as $row){
    ?>
    <?php }
    }
    ?>
    <form action="<?php echo base_url()?>index.php/Legalisasibas/cariweb" method="POST">
        Cari NIK Anda:
        <input type="search" name="cari">
        <button type="submit">Cari</button>
    </form>
    <br>
                        <!--<table id="find-monitor" align="center" class="table table-bordered table-striped borderless">
                            <thead class="bg-primary">
                                <tr>
                                    <th class="text-center small">NIK</th>
                                    <th class="text-center small">Nama Ayah</th>
                                    <th class="text-center small">Nama Ibu</th>
                                    <th class="text-center small">Nama Lengkap</th>
                                    <th class="text-center small">Tanggal Daftar</th>
                                    <th class="text-center small">Tanggal Pengambilan</th>
                                    <th class="text-center small">Status</th>
                                    <th class="text-center small">Aksi</th>
                            </thead>
                            <tbody>
                                <?php if(!empty($search_result)) { ?>
                                <?php foreach($search_result as $row) : ?>
                                <tr>
                                    <td class="text-center"><?php print $row->nik; ?></td>
                                    <td class="text-center"><?php print $row->nm_kpl_keluarga; ?></td>
                                    <td class="text-center"><?php print $row->nama_ibu; ?></td>
                                    <td class="text-center"><?php print $row->nm_lengkap; ?></td>
                                    <td class="text-center"><?php echo date("d M Y H:i:s",strtotime($row->tgl_daftar)); ?></td>
                                    <td class="text-center"><?php print $row->tgl_ambil; ?></td>
                                    <td class="text-center"><?php print $row->status; ?></td>
                                </tr>
                                <?php endforeach; ?>
                                <?php } else { ?>
                                <tr>
                                    <td colspan="7" class="text-center">Maaf data yang anda cari tidak ada atau keywordnya salah</td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>--> <br>
                    </div>

                    <!-- end of card -->

                    <!-- Card -->
                    <div class="card">
                        <div class="card-image">
                            <a href="#" onclick="toggleForm1('form1')">
                                <i class="fa-solid fa-file-circle-check icon"></i>
                            </a>
                        </div>
                        <div class="card-body">
                            <strong>Persyaratan</strong> <br>
                            <br>
                            <ul id="req">
                                <li>Scan Kartu Tanda Penduduk</li>
                                <li>Scan Kartu Tanda Anggota</li>
                                <li>Scan Berita Acara Sumpah Advokat</li>
                                <li>Scan Surat Kuasa (Jika Pengambilan akan di Kuasakan) </li>
                                <li>Lama Proses Minimal 1x24 Jam</li>
                            </ul>
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
    <script src="js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="js/morphext.min.js"></script> <!-- Morphtext rotating text in the header -->
    <script src="js/scripts.js"></script> <!-- Custom scripts -->
    <script>
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
    </script>
</body>
</html>