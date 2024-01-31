<?php 
require 'function.php';


$no = $_GET["no"];

$ubah = query("SELECT * FROM rfq WHERE No = $no")[0];
$deadline = query("SELECT * FROM rfq_penawaran WHERE No = $no");

if (isset($_POST["submit"])) {

if(ubah3($_POST) > 0) {
    echo 
        "<script> 
            alert('Penawaran Berhasil Dikirim!');
            document.location.href = 'vendor.php';
        </script>";
} else {
    echo 
        "<script> 
            alert('Data gagal dikrim! Error: " . mysqli_error($conn) . "');
            document.location.href = 'vendor.php';
        </script>";
    }
}

?>

<head>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="stylesUbah.css" />
    <title>LagalTang</title>
</head>

<body>
<!--CONTENT <START--------------------------------------------------------------------------------------->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-paperclip me-2"></i>
                    <h2 class="fs-2 m-0">Memberikan Penawaran</h2>
                </div>
            </nav>
            
            <form action="" method="post">
                <input type="hidden" name="No" value="<?= $ubah["No"]; ?>">
                <div class="row">
                    <div class="col">
                        <label for="ID_Barang" class="form-label fw-bold">ID Barang</label>
                        <input type="text" name="ID_Barang" id="ID_Barang" value="<?= $ubah["ID_Barang"]; ?>" class="form-control" placeholder="ID Barang" aria-label="First name" readonly>
                    </div>
                    <div class="col">
                        <label for="Nama_Barang" class="form-label fw-bold">Nama Barang</label>
                        <input type="text" name="Nama_Barang" id="Nama_Barang" value="<?= $ubah["Nama_Barang"]; ?>" class="form-control" placeholder="Nama Barang" aria-label="First name" readonly>
                    </div>
                    <div class="col">
                        <label for="Jumlah" class="form-label fw-bold">Jumlah</label>
                        <input type="number" name="Jumlah" id="Jumlah" required value="<?= $ubah["Jumlah"]; ?>" class="form-control" placeholder="Jumlah" aria-label="Last name">
                    </div>
                    <div class="col">
                        <label for="Satuan" class="form-label fw-bold">Satuan</label>
                        <input type="text" name="Satuan" id="Satuan" required value="<?= $ubah["Satuan"]; ?>" class="form-control" placeholder="Satuan" aria-label="Last name">
                    </div>
                    <div class="col">
                        <label for="Harga" class="form-label fw-bold">Harga</label>
                        <input type="number" name="Harga" id="Harga" required value="<?= $ubah["Harga"]; ?>" class="form-control" placeholder="Harga" aria-label="Last name">
                    </div>
                </div>
                <div>
                    <div class="d-md-flex gap-2 justify-content-md-end">
                        <button type="submit" class="btn btn-success d-grid my-3" name="submit">Kirim</button></div>
                    </div>
                </form>
        </div>
</body>

</html>
