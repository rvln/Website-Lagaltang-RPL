<?php 
require 'function.php';

$data = query('SELECT * FROM barang_vendor');
$data2 = query('SELECT * FROM rfq');
$data4 = query('SELECT * FROM rfq_penawaran');
$data5 = query('SELECT * FROM rfq_tolak');

if (isset($_POST["submit"])) {

    if(tambah2($_POST) > 0)  {
      echo 
        "<script> 
          alert('Data berhasil ditambahkan!');
          document.location.href = 'vendor.php';
        </script>";
    } else {
      echo 
        "<script> 
          alert('Data gagal ditambahkan!');
          document.location.href = 'vendor.php';
        </script>";
    }
  }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="stylesHome.css" />
    <title>LagalTang</title>
</head>

<body>

<body style="background-color: #f0f0f0;">

<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="logo.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
      LagaItang
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home2.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="managerPengadaan.php">Vendor</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="komunikasi.php">Hubungi Manajer Pengadaan</a>
        </li>
      </ul>
      <div class="d-flex align-items-center">
        <div class="dropdown">
          <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-user me-2"></i>Vendor</a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item text-center" href="login.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</nav>


        <!-- Page Content -->
        <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
        <h2 class="fs-2 m-0">Dashboard</h2>

            </nav>
            <!-- Table Content -->
            
            <div class="row">
                    <hr color="black">
                    <center>
                    <h3 class="fs-4 mb-3">Daftar Proses Penawaran</h3>
                    </center>
                    <div class="col">
                        <table class="table shadow-sm table-hover">
                            <thead>
                              <tr>
                                <th style="width: 30px;" scope="col">No</th>
                                <th scope="col">ID Barang</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Satuan</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Deadline</th>
                                <th scope="col">Status</th>
                              </tr>
                            </thead>
                            <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($data4 as $row) : ?>
                              <tr>
                                  <th scope="row"><?= $i; ?></th>
                                  <td><?= $row["ID_Barang"]; ?></td>
                                  <td><?= $row["Nama_Barang"]; ?></td>
                                  <td><?= $row["Jumlah"]; ?></td>
                                  <td><?= $row["Satuan"]; ?></td>
                                  <td><?= $row["Harga"]; ?></td>
                                  <td><?= $row["Deadline"]; ?></td>
                                  <td><?= $row["Status"]; ?></td>
                                </tr>
                                <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                            <hr color="black">
                            <center>
                            <h3 class="fs-4 mb-3">Daftar Pengajuan RFQ</h3>
                            </center>
                            <div class="col">
                            <table class="table shadow-sm table-hover">
                        <thead>       
                            <tr>
                                <th style="width: 30px;" scope="col">No</th>
                                <th scope="col">ID Product</th>
                                <th scope="col">Nama Product</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Satuan</th>
                                <th scope="col">Harga</th>
                            </tr>
                        </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach($data5 as $row) : ?>
                                <tr>
                                  <th scope="row"><?= $i; ?></th>
                                  <td><?= $row["ID_Barang"]; ?></td>
                                  <td><?= $row["Nama_Barang"]; ?></td>
                                  <td><?= $row["Jumlah"]; ?></td>
                                  <td><?= $row["Satuan"]; ?></td>
                                  <td><?= $row["Harga"]; ?></td>
                                </tr>
                                <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- /#page-content-wrapper -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>