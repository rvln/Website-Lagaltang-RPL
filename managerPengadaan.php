<?php
require 'function.php';

if (isset($_POST["submit"])) {

    if(tambah($_POST) > 0)  {
      echo 
        "<script> 
          alert('Data berhasil ditambahkan!');
          document.location.href = 'managerPengadaan.php';
        </script>";
    } else {
      echo 
        "<script> 
          alert('Data gagal ditambahkan!');
          document.location.href = 'managerPengadaan.php';
        </script>";
    }
  }

  if (isset($_POST["input"])) {

    if(tambahrfq($_POST) > 0)  {
      echo 
        "<script> 
          alert('Data berhasil dikirim!');
          document.location.href = 'managerPengadaan.php';
        </script>";
    } else {
      echo 
        "<script> 
          alert('Data gagal ditambahkan!');
          document.location.href = 'managerPengadaan.php';
        </script>";
    }
  }


$data1 = query('SELECT * FROM barang');
$data2 = query('SELECT * FROM barang_vendor');
$data3 = query('SELECT No, ID_Barang, Nama_Barang, Jumlah, Satuan, Harga, Status, Created_at FROM rfq');
$data4 = query('SELECT * FROM rfq_penawaran');
$data5 = query('SELECT * FROM rfq_persetujuan');
$data6 = query('SELECT * FROM rfq_disetujui');

session_start();
include_once "php/config.php";

            $sql = mysqli_query($conn_user, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            }
        

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="stylesManagerPengadaan.css" />
    <title>LagalTang</title>
</head>

<body style="background-color: #f0f0f0;">

<!------ SIDEBAR START --------------------------------------------------------------------------------->
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
          <a class="nav-link active" aria-current="page" href="home.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="managerPengadaan.php">Manajer Pengadaan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="users.php">Hubungi Vendor</a>
        </li>
      </ul>
      <div class="d-flex align-items-center">
        <div class="dropdown">
          <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-user me-2"></i> Manajer Pengadaan
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item text-center" href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</nav>

<div id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
        <h2 class="fs-2 m-0">Manajer Pengadaan</h2>
    </nav>
</div>

<!--SIDEBAR END ---------------------------------------------------------------------------------------->

<!--CONTENT START--------------------------------------------------------------------------------------->

        <body>
            <form action="" method="post">
                <div class="container-fluid px-4">
                    <center>
                        <h3 class="fs-4 mb-3">Pengajuan RFQ</h3>
                    </center>
                </div>

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-4 mb-3">
                            <label for="id_barang" class="form-label fw-bold">ID Product</label>
                            <input type="text" name="id_barang" id="id_barang" class="form-control" placeholder="ID Product" aria-label="ID Barang">
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-4 mb-3">
                            <label for="nama_barang" class="form-label fw-bold">Nama Product</label>
                            <input type="text" name="nama_barang" id="nama_barang" class="form-control" placeholder="Nama Product" aria-label="Nama Barang">
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-4 mb-3">
                            <label for="jumlah" class="form-label fw-bold">Jumlah</label>
                            <input type="number" name="jumlah" id="jumlah" class="form-control" placeholder="Jumlah" aria-label="Jumlah">
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-4 mb-3">
                            <label for="satuan" class="form-label fw-bold">Satuan</label>
                            <input type="text" name="satuan" id="satuan" class="form-control" placeholder="Satuan" aria-label="Satuan">
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-4 mb-3">
                            <label for="harga" class="form-label fw-bold">Harga</label>
                            <input type="number" name="harga" id="harga" class="form-control" placeholder="Harga" aria-label="Harga">
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-4 mb-3">
                            <button type="submit" class="btn btn-success d-grid" name="input">Input</button>
                        </div>
                    </div>
                </div>
            </form>

            <div class="container">
    <!-- Daftar RFQ -->
    <div class="row">
        <hr color="black">
        <center>
            <h3 class="fs-4 mb-3">Daftar RFQ</h3>
        </center>
        <div class="col">
            <table class="table bg-white rounded shadow-sm table-bordered">
                <thead>
                    <tr>
                        <th style="width: 30px;" scope="col">No</th>
                        <th scope="col">ID Barang</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Satuan</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Status</th>
                        <th scope="col">Waktu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($data3 as $row) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $row["ID_Barang"]; ?></td>
                            <td><?= $row["Nama_Barang"]; ?></td>
                            <td><?= $row["Jumlah"]; ?></td>
                            <td><?= $row["Satuan"]; ?></td>
                            <td><?= $row["Harga"]; ?></td>
                            <td><?= $row["Status"]; ?></td>
                            <td><?= $row["Created_at"]; ?></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Daftar Penawaran RFQ -->
    <div class="row">
        <hr color="black">
        <center>
            <h3 class="fs-4 mb-3">Daftar Penawaran Barang</h3>
        </center>
        <div class="col">
            <table class="table bg-white rounded shadow-sm table-bordered">
                <thead>
                    <tr>
                        <th style="width: 30px;" scope="col">No</th>
                        <th scope="col">ID Barang</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Satuan</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Aksi</th>
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
                            <td>
                                <form action="fungsiUbah2.php" method="post">
                                    <input type="hidden" name="no" value="<?= $row["No"]; ?>">
                                    <button type="submit" class="btn btn-success btn-sm" role="button">Ajukan ke Manajer Proyek</button>
                                </form>
                                <form action="fungsiSetujuiPengadaan.php" method="post">
                                    <input type="hidden" name="no" value="<?= $row["No"]; ?>">
                                    <button type="submit" class="btn btn-success btn-sm" role="button">setujui</button>
                                </form>
                                    <a href="fungsiHapus3.php?no=<?= $row["No"]; ?>" onclick="return confirm('Apakah anda yakin?');" class="btn btn-danger btn-sm" role="button">Tolak</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Daftar Kontrak -->
    <div class="row">
        <hr color="black">
        <center>
            <h3 class="fs-4 mb-3">Daftar Barang Diterima</h3>
        </center>
        <div class="col">
            <table class="table bg-white rounded shadow-sm table-bordered">
                <thead>
                    <tr>
                        <th style="width: 30px;" scope="col">No</th>
                        <th scope="col">ID Barang</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Satuan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($data6 as $row) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $row["ID_Barang"]; ?></td>
                            <td><?= $row["Nama_Barang"]; ?></td>
                            <td><?= $row["Jumlah"]; ?></td>
                            <td><?= $row["Satuan"]; ?></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- CONTENT END---------------------------------------------------------------------------------------->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>