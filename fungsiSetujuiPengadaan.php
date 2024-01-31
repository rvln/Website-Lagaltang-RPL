<?php
session_start();
include_once "function.php";

if (isset($_POST['no'])) {
    $no = $_POST['no'];

    $safe_no = mysqli_real_escape_string($conn, $no);

    $query = "UPDATE rfq_penawaran SET Status = 'Di Order' WHERE No = '$safe_no'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script> 
                alert('Data Berhasil Dikirim!');
                document.location.href = 'managerPengadaan.php';
            </script>";
    } else {
        echo "<script> 
                alert('Data gagal diubah!');
                document.location.href = 'managerPengadaan.php';
            </script>";
    }
}
?>
