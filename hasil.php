<?php 
include 'function.php';
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 0) {
        header("location: indexAdmin.php");
    } else if ($_SESSION['role'] == 2) {
        header("location: indexPakar.php");
    }
} else {
    header("location:index.php");
}

$gejala = mysqli_query($koneksi, "SELECT * FROM gejala");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
    rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
    crossorigin="anonymous"/>
    <link
    href="https://fonts.googleapis.com/css?family=Poppins:300,400,700&display=swap"
    rel="stylesheet"/>
    <link rel="stylesheet" href="custom.css" />
    <title>Cek Penyakit Bearded Dragon</title>
</head>
<body>
    <nav class="navbar py-2 navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#"
            ><img src="gambar/logo.png" width="147" alt="logo"
            /></a>
            <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
            >
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li>
                        <a class="btn px-2 py-2 btn-success ml-2" href="function.php?act=ulang" role="button">Cek Ulang</a>
                    </li>
                    <li>
                        <a class="btn px-2 py-2 btn-primary ml-2" href="logout.php" role="button"
                    >Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="hasil mt-4">
        <div class="container">
            <div class="row">
                <div class="col align-self-center">
                    <h3 class="mb-4">Penyakit yang di alami bearded dragon anda : </h3>
                    <?php
                        if(isset($_SESSION)) {
                    ?>
                    <h5 class="mb-4">
                        <div class="py-1">
                            <strong>
                            Metabolic Bone Disease = <?= $_SESSION['mbd']; ?>%
                            </strong>
                            <?php
                            if ($_SESSION['mbd'] > 30) {
                                $query = "SELECT * FROM solusi WHERE id_penyakit = 1";
                                $data = mysqli_query($koneksi, $query);
                                while ($row = mysqli_fetch_array($data)) {
                                    echo '<p>' . $row['solusi'] . '</p>';
                                }
                            }
                    ?>    
                        </div>
                        <div class="py-1">
                            <strong>
                            Parasit Internal = <?= $_SESSION['pi']; ?>%
                            </strong>
                            <?php
                            if ($_SESSION['pi'] > 30) {
                                $query = "SELECT * FROM solusi WHERE id_penyakit = 2";
                                $data = mysqli_query($koneksi, $query);
                                while ($row = mysqli_fetch_array($data)) {
                                    echo '<p>' . $row['solusi'] . '</p>';
                                }
                            }
                    ?>    
                        </div>
                        <div class="py-1">
                            <strong>
                            Parasit Eksternal = <?= $_SESSION['pe']; ?>%
                            </strong>
                            <?php
                            if ($_SESSION['pe'] > 30) {
                                $query = "SELECT * FROM solusi WHERE id_penyakit = 3";
                                $data = mysqli_query($koneksi, $query);
                                while ($row = mysqli_fetch_array($data)) {
                                    echo '<p>' . $row['solusi'] . '</p>';
                                }
                            }
                    ?>    
                        </div>
                        <div class="py-1">
                            <strong>
                            Infeksi Respiratori = <?= $_SESSION['ir']; ?>%
                            </strong>
                            <?php
                            if ($_SESSION['ir'] > 30) {
                                $query = "SELECT * FROM solusi WHERE id_penyakit = 4";
                                $data = mysqli_query($koneksi, $query);
                                while ($row = mysqli_fetch_array($data)) {
                                    echo '<p>' . $row['solusi'] . '</p>';
                                }
                            }
                    ?>    
                        </div>
                        <div class="py-1">
                            <strong>
                            Stomatitis= <?= $_SESSION['stomatis']; ?>%
                            </strong>
                            <?php
                            if ($_SESSION['stomatis'] > 30) {
                                $query = "SELECT * FROM solusi WHERE id_penyakit = 5";
                                $data = mysqli_query($koneksi, $query);
                                while ($row = mysqli_fetch_array($data)) {
                                    echo '<p>' . $row['solusi'] . '</p>';
                                }
                            }
                        
                    ?>    
                        </div>
                        <div class="py-1">
                            <strong>
                            Obesitas = <?= $_SESSION['obesitas']; ?>%
                            </strong>
                            <?php
                            if ($_SESSION['obesitas'] > 30) {
                                $query = "SELECT * FROM solusi WHERE id_penyakit = 6";
                                $data = mysqli_query($koneksi, $query);
                                while ($row = mysqli_fetch_array($data)) {
                                
                                    echo '<p>' . $row['solusi'] . '</p>';
    
                                }
                            }
                        
                    ?>    
                        </div>
                        <div class="py-1">
                            <strong>
                            Stress = <?= $_SESSION['stress']; ?>%
                            </strong>
                            <?php
                            if ($_SESSION['stress'] > 30) {
                                $query = "SELECT * FROM solusi WHERE id_penyakit = 7";
                                $data = mysqli_query($koneksi, $query);
                                while ($row = mysqli_fetch_array($data)) {
                                
                                    echo '<p>' . $row['solusi'] . '</p>';
    
                                }
                            }
                        
                    ?>    
                        </div>
                        <div class="py-1">
                            <strong>
                            Egg Binding = <?= $_SESSION['eb']; ?>%
                            </strong>
                            <?php
                            if ($_SESSION['eb'] > 30) {
                                $query = "SELECT * FROM solusi WHERE id_penyakit = 8";
                                $data = mysqli_query($koneksi, $query);
                                while ($row = mysqli_fetch_array($data)) {
                                
                                    echo '<p>' . $row['solusi'] . '</p>';
    
                                }
                            }
                    ?>    
                        </div>
                    </h5>
                        <?php } ?>
                    
                    <form action="" method="post" enctype="multipart/form-data" role="form">
                </div>
                    </form>
                <div class="col d-none d-sm-block">
                    <img width="500" src="gambar/hasil.png" alt="hero" />
                </div>
            </div>
        </div>
    </section>
</body>

<script
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"
></script>
<script
    src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"
></script>
<script
    src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"
></script>
<script
    src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"
></script>
</html>
