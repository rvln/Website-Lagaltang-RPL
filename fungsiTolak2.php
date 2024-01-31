<?php
require 'function.php';

$no = $_GET["no"];

if( tolak2($no) > 0) {
    echo "<script> 
     alert('Data di tolak!');
     document.location.href = 'vendor.php';
     </script>";
} else {
    echo "<script> 
     alert('Terjadi Kesalahan!');
     document.location.href = 'vendor.php';
     </script>";
}
?>