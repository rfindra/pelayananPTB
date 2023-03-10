<!DOCTYPE html>
<html>

<head>
  <title>Pengadilan Tinggi Bandung</title>

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
  <link href="<?php echo base_url();?>/assets/admin/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
  <link href="<?php echo base_url();?>/assets/admin/css/font-awesome.css" rel="stylesheet">
  <!-- Custom Theme files -->
  <link href="<?php echo base_url();?>/assets/web/css/stylex.css" rel="stylesheet" type="text/css" media="all" />
  <!-- //Custom Theme files -->
  <!-- web font -->
  <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
  <!--web font-->

  <style>
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

  <ul>
    <div class="main-row">
      <li><a href="<?php echo base_url()?>index.php">Beranda</a></li>
    </div>
    <div class="main-row">
      <li><a class="active" href="<?php echo base_url()?>index.php/Legalisasibas/indexweb">Legalisasi BAS Advokat</a>
      </li>
    </div>
    <div class="main-row">
      <li style="float:right"><a href="<?php echo base_url()?>index.php/Legalisasibas/persyaratanlegalisasi">Bantuan</a>
      </li>
    </div>
    <div class="main-row">
      <li style="float:right"><a href="<?php echo base_url()?>index.php/Legalisasibas/indexweb">Kembali</a></li>
    </div>
  </ul>

  <!-- main -->
  <div class="main">
    <h1>Status Permohonan <br>Legalisasi BAS</h1>
    <div class="main-row">

      <?php
  $no=1;
    if(isset($data_legalisasi)){
      foreach($data_legalisasi as $row){
    ?>
      <?php }
        }
          ?>


      <form action="<?php print site_url();?>/Legalisasibas/cariweb" method=POST>
        Cari NIK Anda:
        <input type="search" name="cari">
      </form><br>

      </table>

      <div align="center">
        <table id="example1" align="center" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>
                <div align="center">NIK</div>
              </th>
              <th>
                <div align="center">Nama Lengkap</div>
              </th>
              <th>
                <div align="center">Nama Organisasi</div>
              </th>
              <th>
                <div align="center">Tanggal Daftar</div>
              </th>
              <th>
                <div align="center">Tanggal Pengambilan</div>
              </th>
              <th>
                <div align="center">Status</div>
              </th>
            <!--  <th>
                <div align="center">Aksi</div>
              </th>-->
            </tr>
          </thead>
          <tbody>
            <?php foreach($status_legalisasi as $row) : ?>
            <tr>
              <td>
                <div align="center"><?php print $row->nik; ?></div>
              </td>
              <td>
                <div align="center"><?php print $row->nm_lengkap; ?></div>
              </td>
              <td>
                <div align="center"><?php print $row->nama_organisasi; ?></div>
              </td>
              <td>
                <div align="center"><?php echo date("d M Y H:i:s",strtotime($row->tgl_daftar)); ?></div>
              </td>
              <td>
                <div align="center"><?php print $row->tgl_ambil; ?></div>
              </td>
              <td>
                <div align="center"><?php print $row->status; ?></div>
              </td>
            <!--  <td width="20%">
                <div align="center">
                  <a href="<?php echo base_url()?>index.php/cetak/view_legalisasi/<?php print $row->nik; ?>/<?php print $row->id_berkas; ?>"
                    type="button" class="fa fa-eye"><b> Lihat | </b></a>
                  <a href="<?php echo base_url()?>index.php/cetak/cetak_legalisasi/<?php print $row->nik; ?>/<?php print $row->id_berkas; ?>"
                    type="button" target="_blank" class="fa fa-print"><b> Cetak</b></a></div>
              </td> -->
            </tr>

            <?php endforeach; ?>
          </tbody>
        </table><br>
      </div>
      <div id="footer">
      </div>
    </div>
  </div>
  </body>

</html>