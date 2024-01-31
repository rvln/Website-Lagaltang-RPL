<?php 
require 'function.php';

$no = $_GET["no"];

if( hapus($no) > 0) {
    echo "<script> 
     alert('Data berhasil dihapus!');
     document.location.href = 'managerPengadaan.php';
     </script>";
} else {
    echo "<script> 
     alert('Data gagal dihapus!');
     document.location.href = 'managerPengadaan.php';
     </script>";
}

?>