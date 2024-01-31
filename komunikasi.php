<?php 
require 'function.php';

$data2 = query('SELECT * FROM barang_vendor');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="stylesKomunikasi.css" />
    <title>LagalTang</title>
</head>
<body>

<body style="background-color: #f0f0f0;">

<div class="bg-white">
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Komunikasi</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="fal  se" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="login.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

                        <div class="row">
                                    <hr color="black">
                                    <center>
                                    <h3 class="fs-4 mb-3">Daftar Penawaran</h3>
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
                                  <th scope="col">harga</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php $i = 1; ?>
                              <?php foreach($data2 as $row) : ?>
                                <tr>
                                  <th scope="row"><?= $i; ?></th>
                                  <td><?= $row["ID_Barang"]; ?></td>
                                  <td><?= $row["Nama_Barang"]; ?></td>
                                  <td><?= $row["Jumlah"]; ?></td>
                                  <td><?= $row["Satuan"]; ?></td>
                                  <td><?= $row["Harga"]; ?></td>
                                </tr>
                                <?php $i++; ?>
                                <?php endforeach; ?>
                              </tbody>
                              </div>
                              </table>
                        </div>

</body>
<div id="disqus_thread"></div>
<script>
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
    /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://komunikasivendor.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
<script id="dsq-count-scr" src="//komunikasivendor.disqus.com/count.js" async></script>
</html>