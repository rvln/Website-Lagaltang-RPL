

<?php
$conn = mysqli_connect("localhost", "root", "", "website");

function registrasi($data) {
    global $conn;

    $email = strtolower(stripslashes($data["email"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    $role = $data["role"];

    $result = mysqli_query($conn,"SELECT email FROM users WHERE email = '$email'");
    if(mysqli_fetch_assoc($result) ){
        echo"<script>
                alert('Username sudah terdaftar!');
                </script>";
                return false;
    }

    if( $password !== $password2) {
        echo "<script>
                alert('Konfirmasi password tidak sesuai!');
                </script>";
                return false;
    } else {
        echo mysqli_error($conn);
    }
    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn,"INSERT INTO users (email, password, role) VALUES('$email', '$password', '$role')");

    return mysqli_affected_rows($conn);
}

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;
}
    return $rows;
}

function tambah($barang) {
    global $conn;
    
    $id_barang = htmlspecialchars($barang["ID_Barang"]);
    $nama = htmlspecialchars($barang["Nama_Barang"]);
    $jumlah = htmlspecialchars($barang["Jumlah"]);
    $satuan = htmlspecialchars($barang["Satuan"]);
    $status = 'Pending';
    
    $insert = "INSERT INTO barang (ID_Barang, Nama_Barang, Jumlah, Satuan, Status) 
    VALUES('$id_barang', '$nama', '$jumlah', '$satuan', '$status')";

    $query_result = mysqli_query($conn, $insert);

    if ($query_result) {
        return mysqli_affected_rows($conn);
    } else {
        return -1;
    }
}

function tambahrfq($rfq) {
    global $conn;

    $id_barang = htmlspecialchars($rfq["id_barang"]);
    $nama = htmlspecialchars($rfq["nama_barang"]);
    $jumlah = htmlspecialchars($rfq["jumlah"]);
    $satuan = htmlspecialchars($rfq["satuan"]);
    $harga = htmlspecialchars($rfq["harga"]);
    $status = 'Pending';

    // Periksa apakah created_at tersedia, jika tidak, gunakan CURRENT_TIMESTAMP
    $waktu = isset($rfq["created_at"]) ? "'" . htmlspecialchars($rfq["created_at"]) . "'" : "CURRENT_TIMESTAMP";

    // Query untuk tabel rfq
    $insert_rfq = "INSERT INTO rfq (ID_Barang, Nama_Barang, Jumlah, Satuan, Harga, Status, Created_at) 
    VALUES('$id_barang', '$nama', '$jumlah', '$satuan', '$harga', '$status', $waktu)";

    // Query untuk tabel rfq_tolak
    $insert_rfq_t = "INSERT INTO rfq_tolak (ID_Barang, Nama_Barang, Jumlah, Satuan, Harga, Status, Created_at) 
    VALUES('$id_barang', '$nama', '$jumlah', '$satuan', '$harga', '$status', $waktu)";

    // Jalankan query untuk tabel rfq
    $query_result_rfq = mysqli_query($conn, $insert_rfq);

    // Jalankan query untuk tabel rfq_tolak
    $query_result_rfq_t = mysqli_query($conn, $insert_rfq_t);

    // Periksa hasil query untuk tabel rfq dan rfq_tolak
    if ($query_result_rfq && $query_result_rfq_t) {
        return mysqli_affected_rows($conn);
    } else {
        return -1;
    }
}



function tambah2($barang) {
    global $conn;
    
    $id_barang = htmlspecialchars($barang["ID_Barang"]);
    $nama = htmlspecialchars($barang["Nama_Barang"]);
    $jumlah = htmlspecialchars($barang["Jumlah"]);
    $satuan = htmlspecialchars($barang["Satuan"]);
    $harga = htmlspecialchars($barang["Harga"]);
    
    $insert = "INSERT INTO barang_vendor (ID_Barang, Nama_Barang, Jumlah, Satuan, Harga) 
    VALUES('$id_barang', '$nama', '$jumlah', '$satuan', '$harga')";

    $query_result = mysqli_query($conn, $insert);

    if ($query_result) {
        return mysqli_affected_rows($conn);
    } else {
        return -1;
    }
}

function hapus($no) {
    global $conn;

    $safe_no = mysqli_real_escape_string($conn, $no);

    mysqli_query($conn,"DELETE FROM barang WHERE No = $safe_no");
    
    return mysqli_affected_rows($conn);
}

function hapus2($no) {
    global $conn;

    $safe_no = mysqli_real_escape_string($conn, $no);

    mysqli_query($conn,"DELETE FROM barang_vendor WHERE No = $safe_no");
    
    return mysqli_affected_rows($conn);
}

function hapus3($no) {
    global $conn;

    $safe_no = mysqli_real_escape_string($conn, $no);

    mysqli_query($conn,"DELETE FROM rfq_penawaran WHERE No = $safe_no");
    
    return mysqli_affected_rows($conn);
}

function setujui($no) {
    global $conn;

    // Mendapatkan data dari tabel rfq_setujui berdasarkan nomor
    $row = query("SELECT * FROM rfq_persetujuan WHERE No = $no");

    // Pastikan data tersedia sebelum mencoba mengakses elemennya
    if (!$row) {
        return 0; // Tidak ada data, kembalikan 0 untuk menunjukkan kesalahan
    }

    $row = $row[0]; // Ambil elemen pertama dari hasil query

    // Pastikan variabel yang diambil dari $row sesuai dengan struktur tabel
    $id_barang = htmlspecialchars($row["ID_Barang"]);
    $nama = htmlspecialchars($row["Nama_Barang"]);
    $jumlah = htmlspecialchars($row["Jumlah"]);
    $satuan = htmlspecialchars($row["Satuan"]);
    $deadline = htmlspecialchars($row["Deadline"]);
    $harga = htmlspecialchars($row["Harga"]);
    $status = 'Diproses';

    // Insert data ke tabel rfq_setujui
    $insert = "INSERT INTO rfq_disetujui  
    (ID_Barang, Nama_Barang, Jumlah, Satuan, Deadline, Harga, Status)
    VALUES ('$id_barang', '$nama', '$jumlah', '$satuan', '$deadline', '$harga', '$status')";

    $query_result = mysqli_query($conn, $insert);

    return mysqli_affected_rows($conn);
}

function update_pengadaan($no) {
    global $conn;

    $status = 'Di Order';
    $safe_no = mysqli_real_escape_string($conn, $no);

    $query = "UPDATE rfq_persetujuan SET Status = $status WHERE No = $safe_no";
    
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}



function setujui2($no) {
    global $conn;

    $safe_no = mysqli_real_escape_string($conn, $no);

    mysqli_query($conn,"UPDATE rfq SET Status = 'Diterima' WHERE No = $safe_no");
    
    return mysqli_affected_rows($conn);
}

function Beli($no) {
    global $conn;

    $safe_no = mysqli_real_escape_string($conn, $no);

    mysqli_query($conn,"UPDATE barang_vendor SET Status = 'Dibeli' WHERE No = $safe_no");
    
    return mysqli_affected_rows($conn);
}

function tolak($no) {
    global $conn;

    mysqli_query($conn,"DELETE FROM rfq_persetujuan WHERE No = $no");
    
    return mysqli_affected_rows($conn);
}

function tolak2($no) {
    global $conn;

    mysqli_query($conn,"DELETE FROM rfq_tolak WHERE No = $no");
    
    return mysqli_affected_rows($conn);
}

function ubah($barang){
    global $conn;

    $no = $barang["No"];
    $id_barang = htmlspecialchars($barang["ID_Barang"]);
    $nama = htmlspecialchars($barang["Nama_Barang"]);
    $jumlah = htmlspecialchars($barang["Jumlah"]);
    $satuan = htmlspecialchars($barang["Satuan"]);

    $query = "UPDATE barang SET 
    ID_Barang = '$id_barang', 
    Nama_Barang = '$nama', 
    Jumlah = '$jumlah', 
    Satuan = '$satuan' 
    WHERE No = $no";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function ubah2($vendor){
    global $conn;

    $id_barang = htmlspecialchars($vendor["ID_Barang"]);
    $nama = htmlspecialchars($vendor["Nama_Barang"]);
    $jumlah = htmlspecialchars($vendor["Jumlah"]);
    $satuan = htmlspecialchars($vendor["Satuan"]);
    $deadline = htmlspecialchars($vendor["Deadline"]);
    $harga = htmlspecialchars($vendor["Harga"]);
    $status = 'Sedang Diproses';

    $insert = "INSERT INTO rfq_penawaran  
            (ID_Barang, Nama_Barang, Jumlah, Satuan, Deadline, Harga, Status)
            VALUES ('$id_barang', '$nama', '$jumlah', '$satuan', '$deadline', '$harga', '$status')";

    $query_result = mysqli_query($conn, $insert);

    return mysqli_affected_rows($conn);
}

function ubah3($rfq_p) {
    global $conn;

    $id_barang = htmlspecialchars($rfq_p["ID_Barang"]);
    $nama = htmlspecialchars($rfq_p["Nama_Barang"]);
    $jumlah = htmlspecialchars($rfq_p["Jumlah"]);
    $satuan = htmlspecialchars($rfq_p["Satuan"]);
    $deadline = htmlspecialchars($rfq_p["Deadline"]);
    $harga = htmlspecialchars($rfq_p["Harga"]);
    $status_rfq = 'Diterima';
    $status_penawaran = 'Sedang Diproses';

    // Insert data ke tabel rfq_penawaran
    $insert = "INSERT INTO rfq_penawaran  
            (ID_Barang, Nama_Barang, Jumlah, Satuan, Deadline, Harga, Status)
            VALUES ('$id_barang', '$nama', '$jumlah', '$satuan', '$deadline', '$harga', '$status_penawaran')";

    $query_result = mysqli_query($conn, $insert);

    // Update kolom Status di tabel rfq
    if ($query_result) {
        $updateStatus = "UPDATE rfq SET Status = '$status_rfq' WHERE ID_Barang = '$id_barang'";
        mysqli_query($conn, $updateStatus);

        return mysqli_affected_rows($conn);
    } else {
        // Tampilkan pesan kesalahan SQL jika query gagal
        echo "Error inserting record: " . mysqli_error($conn);
        return -1;
    }
}

function ubah4($no) {
    global $conn;

    // Mendapatkan data dari tabel rfq berdasarkan nomor
    $row = query("SELECT * FROM rfq_penawaran WHERE No = $no");

    // Pastikan data tersedia sebelum mencoba mengakses elemennya
    if (!$row) {
        return 0; // Tidak ada data, kembalikan 0 untuk menunjukkan kesalahan
    }

    $row = $row[0]; // Ambil elemen pertama dari hasil query

    // Pastikan variabel yang diambil dari $row sesuai dengan struktur tabel
    $id_barang = htmlspecialchars($row["ID_Barang"]);
    $nama = htmlspecialchars($row["Nama_Barang"]);
    $jumlah = htmlspecialchars($row["Jumlah"]);
    $satuan = htmlspecialchars($row["Satuan"]);
    $deadline = htmlspecialchars($row["Deadline"]);
    $harga = htmlspecialchars($row["Harga"]);
    $status = 'Diproses';

    // Insert data ke tabel rfq_persetujuan
    $insert = "INSERT INTO rfq_persetujuan  
    (ID_Barang, Nama_Barang, Jumlah, Satuan, Deadline, Harga, Status)
    VALUES ('$id_barang', '$nama', '$jumlah', '$satuan', '$deadline', '$harga', '$status')";

    $query_result = mysqli_query($conn, $insert);

    return mysqli_affected_rows($conn);
}

?>