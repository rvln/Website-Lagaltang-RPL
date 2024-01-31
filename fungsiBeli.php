<?php
require 'function.php';

$no = $_GET["no"];

if( Beli($no) > 0) {
    echo "<script> 
     alert('Barang dibeli!');
     document.location.href = 'managerPengadaan.php';
     </script>";
} else {
    echo "<script> 
     alert('Terjadi Kesalahan!');
     document.location.href = 'managerPengadaan.php';
     </script>";
}
?>