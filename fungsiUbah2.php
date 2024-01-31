<?php
require 'function.php';

if(isset($_POST['no'])) {
    $no = $_POST['no'];

    if(ubah4($no) > 0) {
        echo 
            "<script> 
                alert('Data Berhasil Dikirim!');
                document.location.href = 'managerPengadaan.php';
            </script>";
    } else {
        echo 
            "<script> 
                alert('Data gagal diubah!');
                document.location.href = 'managerPengadaan.php';
            </script>";
    }
}
?>
