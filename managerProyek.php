<?php 
require 'function.php';

$data = query('SELECT * FROM barang');
$data5 = query('SELECT * FROM rfq_persetujuan');
$data6 = query('SELECT * FROM rfq_disetujui');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="stylesManagerProyek.css" />
    <title>LagalTang</title>
</head>

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
          <a class="nav-link active" aria-current="page" href="home3.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="managerProyek.php">Manager Proyek</a>
        </li>
      </ul>
      <div class="d-flex align-items-center">
        <div class="dropdown">
          <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-user me-2"></i> Manager Proyek
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item text-center" href="login.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</nav>


<div id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
        <h2 class="fs-2 m-0">Manajer Project</h2>
    </nav>
</div>


<div class="row my-5">
    <center>
        <h3 class="fs-4 mb-3">Daftar Pengadaan</h3>
    </center>
    <div class="col">
    <table class="table bg-white rounded shadow-sm table-bordered">
                <thead>
                    <tr>
                        <th style="width: 30px;" scope="col">No</th>
                        <th scope="col">ID RFQ</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Satuan</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
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
                            <td><?= $row["Status"]; ?></td>
                            <td>
                            <a href="fungsiSetuju.php?no=<?= $row["No"]; ?>" onclick="return confirm('Apakah anda yakin?');" class="btn btn-success btn-sm" role="button">Setujui</a>
                            <a href="fungsiTolak.php?no=<?= $row["No"]; ?>" onclick="return confirm('Apakah anda yakin?');" class="btn btn-danger btn-sm" role="button">Tolak</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<!-- Daftar Barang -->
<div class="row">
        <hr color="black">
        <center>
            <h3 class="fs-4 mb-3">Daftar Barang</h3>
        </center>
        <div class="col">
            <table class="table bg-white rounded shadow-sm table-bordered">
                <thead>
                    <tr>
                        <th style="width: 30px;" scope="col">No</th>
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
    <!-- /#page-content-wrapper -->

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