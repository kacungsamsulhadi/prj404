<?php 
include 'function.php';
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 0) {
        header("location: indexAdmin.php");
    } else if ($_SESSION['role'] == 2) {
        header("location: indexPakar.php");
    }
}

if(!isset($_SESSION['persentase'])){
    $_SESSION['persentase'] = [];
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
    <title>Cek Bearded Dragon Yuk!</title>
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
                        <a class="btn px-4 btn-primary ml-2" href="logout.php" role="button"
                    >Log Out</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>

    <section class="test mt-5">
        <div class="container">
            <div class="row">
                <div class="col align-self-center">
                    <h2 class="mb-4">Pertanyaan : </h2>
                    <form action="" method="post" enctype="multipart/form-data" role="form">
                    <?php
                        $id_penyakit=1;
                        $id = gejala($id_penyakit);
                        $id_gejala = intval($id);
                        if(!isset($_SESSION['id_gejala'])){
                            $_SESSION['id_gejala'] = $id_gejala;
                        }else{
                            $id_gejala = $_SESSION['id_gejala'];
                            if($id_gejala == $id_penyakit){
                                $id_gejala = $_SESSION['id_gejala']+1;
                            }
                        }
                        $data = mysqli_query($koneksi, "SELECT gejala FROM gejala WHERE id_gejala = '$id_gejala'");
                        $row = mysqli_fetch_assoc($data);
                    ?>
                    <p class="mb-4">
                        Apakah bearded dragon anda mengalami <?= $row['gejala']; ?> ?
                    </p>
                    <?php 
                        echo'<input type="submit" class="btn btn-primary mr-2 px-4 py-2" name="ya" value="Ya">';
                        echo'<input type="submit" class="btn btn-danger px-3 py-2" name="tidak" value="Tidak">';
                        $persentase = $_SESSION['persentase'];
                        $temp = 0;
                        $_SESSION['id_gejala'] = $id_gejala;
                        $next_gejala = $_SESSION['id_gejala'];
                        if(isset($_POST['ya'])){
                            if(isset($id_gejala)){
                                $temp = $id_gejala - 1;
                                array_push($persentase, $temp);
                            }
                            $_SESSION['persentase'] = $persentase;
                            $next_gejala = $id_gejala + 1;

                            $_SESSION['id_gejala'] = $next_gejala;
                        } 
                        else if(isset($_POST['tidak'])){
                            $next_gejala = $id_gejala + 1;
                            $_SESSION['id_gejala'] = $next_gejala;
                        }
                        if($_SESSION['id_gejala'] > 23) {
                        $mbd = array(1,2,3,4);
                        $pi = array(5,6,7);
                        $pe = array(8,9);
                        $ir = array(10,11,12);
                        $stomatis =array(13,14,15);
                        $obesitas = array(16,17);
                        $stress = array(18,19,20);
                        $eb = array(21,22); 
                        $nilai = 0;
                        foreach ($persentase as $value) {
                            if (in_array($value, $mbd)) {
                                $nilai += 1;
                            }else{
                                $nilai += 0;
                            } 
                        }
                        $mbd = $nilai/count($mbd);
                        $Akut = number_format($mbd,3);
                        $hasilmbd = $Akut *100;
                        $_SESSION['mbd'] = $hasilmbd;
                        $nilai = 0;
                        foreach ($persentase as $value) {
                            if (in_array($value, $pi)) {
                                $nilai += 1;
                            }else{
                                $nilai += 0;
                            }
                        }
                        $pi = $nilai/count($pi);
                        $Kronis = number_format($pi,3);
                        $hasilpi = $Kronis *100;

                        $_SESSION['pi'] = $hasilpi;
                        $nilai = 0;
                        foreach ($persentase as $value) {
                            if (in_array($value, $pe)) {
                                $nilai += 1;
                            }else{
                                $nilai += 0;
                            }
                        }
                        $pe = $nilai/count($pe);
                        $Batu = number_format($pe,3);
                        $hasilpe = $Batu *100;

                        $_SESSION['pe'] = $hasilpe;
                        $nilai = 0;
                        foreach ($persentase as $value) {
                            if (in_array($value, $ir)) {
                                $nilai += 1;
                            }else{
                                $nilai += 0;
                            }
                        }
                        $ir = $nilai/count($ir);
                        $Infeksi = number_format($ir,3);
                        $hasilir = $Infeksi *100;

                        $_SESSION['ir'] = $hasilir;
                        $nilai = 0;
                        foreach ($persentase as $value) {
                            if (in_array($value, $stomatis)) {
                                $nilai += 1;
                            }else{
                                $nilai += 0;
                            }
                        }
                        $stomatis = $nilai/count($stomatis);
                        $Kanker = number_format($stomatis,3);
                        $hasilstomatis = $Kanker *100;

                        $_SESSION['stomatis'] = $hasilstomatis;
                        $nilai = 0;
                        foreach ($persentase as $value) {
                            if (in_array($value, $obesitas)) {
                                $nilai += 1;
                            }else{
                                $nilai += 0;
                            }
                        }
                        $obesitas = $nilai/count($obesitas);
                        $Gagal = number_format($obesitas,3);
                        $hasilobesitas = $Gagal *100;

                        $_SESSION['obesitas'] = $hasilobesitas;
                        $nilai = 0;
                        foreach ($persentase as $value) {
                            if (in_array($value, $stress)) {
                                $nilai += 1;
                            }else{
                                $nilai += 0;
                            }
                        }
                        $stress = $nilai/count($stress);
                        $sd = number_format($stress,3);
                        $hasilstress = $sd *100;
                        
                        $_SESSION['stress'] = $hasilstress;
                        $nilai = 0;
                        foreach ($persentase as $value) {
                            if (in_array($value, $eb)) {
                                $nilai += 1;
                            }else{
                                $nilai += 0;
                            }
                        }
                        $eb = $nilai/count($eb);
                        $sds = number_format($eb,3);
                        $hasileb = $sds *100;
                        
                        $_SESSION['eb'] = $hasileb;
                        header('Location:hasil.php');
                    }
                    ?>
                    <br>
                    
                </div>
                    </form>
                <div class="col d-none d-sm-block">
                    <img width="500" src="gambar/jawab.png" alt="hero" />
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