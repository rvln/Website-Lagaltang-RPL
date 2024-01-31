<?php

require 'function.php';

if( isset($_POST["register"]) ) {

  if( registrasi($_POST) > 0) {
    echo "<script>
          alert ('user baru berhasil ditambahkan!'); 
          </script>";
  } else {
    echo mysqli_error($conn);
  }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <style>
     body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-image: url('latar.jpeg'); 
      background-size: cover;
    }

    
    .container {
      width: 300px;
      margin: 100px auto;
      padding: 20px;
      background-color: rgba(255, 255, 255, 0.8);
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.9);
    }

    .imgcontainer {
      text-align: center;
      margin-bottom: 20px;
    }

    .avatar {
      width: 250px;
      height: 100px;
      border-radius: 50%;
    }

    /* CSS untuk form input */
    input[type="text"], input[type="password"], select {
      width: calc(100% - 20px);
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      box-sizing: border-box;
    }

    button {
      width: 100%;
      padding: 10px;
      margin-top: 10px;
      border: none;
      border-radius: 3px;
      background-color: #009d63;
      color: white;
      cursor: pointer;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="imgcontainer">
    <img src="unsrat.png" alt="Avatar" class="avatar">
  </div>
  <h1>Sign Up</h1>
  <p>Please fill in this form to create an account.</p>
  <hr>
  <form action="" method="post">
    <!-- Isi form registrasi di sini -->
    <label for="email"><b>Email</b></label>
    <input type="text" name="email" id="email" placeholder="Email" required>
    <label for="password"><b>Password</b></label>
    <input type="password" name="password" id="password" placeholder="Password Baru" required>
    <input type="password" name="password2" id="password2" placeholder="Konfirmasi Password Baru" required>
    <label for="role"><b>Role</b></label>
    <select name="role" id="role">
      <option value="managerPengadaan">Manager Pengadaan</option>
      <option value="vendor">Vendor</option>
      <option value="managerProyek">Manager Proyek</option>
    </select>
    <button type="submit" name="register">Register!</button>
  </form>
  <button class="back-btn" onclick="window.location.href='login.php'">Already have an account? Login</button>
</div>

</body>
</html>
