<!DOCTYPE html>
<html>

<head>
  <title>Legalisasi BAS</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/web/css/form.css">
  <link href='http://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords"
    content="Colored Pricing Table template Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
  <script type="application/x-javascript">
    addEventListener("load", function () {
      setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>
  <!-- Custom Theme files -->
  <link href='<?php echo base_url();?>/assets/web/css/stylew.css' rel="stylesheet" type="text/css" media="all" />
  <!-- //Custom Theme files -->
  <!-- web font -->
  <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
  <!--web font-->

  <style>
    h1 {
      font-weight: bold;
    }

    ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: #333;
    }

    li {
      float: left;
      border-right: 1px solid #bbb;
    }

    li:last-child {
      border-right: none;
    }

    li a {
      display: block;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }

    li a:hover:not(.active) {
      background-color: #111;
    }

    .active {
      background-color: #4CAF50;
    }
  </style>

</head>

<body>
  <div>

    <ul>
      <!--<div class="main-row">
			<li><a href="<?php echo base_url()?>index.php">Beranda</a></li>
		</div>
		<div class="main-row">
			<li><a class="active" href="<?php echo base_url()?>index.php/Legalisasibas/indexweb">Legalisasi BAS
					Advokat</a></li>
		</div>
		<div class="main-row">
			<li style="float:right"><a href="<?php echo base_url()?>index.php/login">Masuk</a></li>
		</div>
		<div class="main-row">
			<li style="float:right"><a
					href="<?php echo base_url()?>index.php/Legalisasibas/persyaratanlegalisasi">Bantuan</a></li>
		</div>-->
      <div class="main-row">
        <li style="float:right"><a href="https://meet.jit.si/digitalmelayani" target="_blank">Hubungi Kami</a></li>
      </div>
      <div class="main-row">
        <li style="float:right"><a href="<?php echo base_url()?>index.php">Home</a></li>
      </div>
    </ul>

    <?php
  $no=1;
    if(isset($data_legalisasi)){
      foreach($data_legalisasi as $row){
    ?>
    <?php }
        }
          ?>

    <!-- main -->
    <div class="main">
      <h1>Form Pendaftaran <br>Legalisasi BAS</h1>
      <div class="main-row">
        <div><?= validation_errors() ?></div>

        <form action="<?php echo base_url()?>index.php/Legalisasibas/daftarlegalisasi" method="POST">
          <table>
            <legend><span class="number">1</span>Data Pemohon</legend><br>
            <label>NIK :</label>
            <input type="text" name="nik" required><br>
            <label>Nama Lengkap :</label>
            <input type="text" name="nmlkp" required><br>
            <label>Nama Organisasi :</label>
            <input type="text" name="nmorg" required><br>
            <label>E-Mail :</label>
            <input type="text" name="email" required><br>
            <label>Nomor Handphone / Whatsapp :</label>
            <input type="text" name="nohp" required><br>

            <input type="hidden" id="sts" name="sts" value="Belum Selesai" required><br>

            <div align="center"><button type="submit" value="Simpan">Simpan</button></div>

          </table>
        </form>
      </div>
    </div>
    <div id="footer">
    </div>
</body>

</html>