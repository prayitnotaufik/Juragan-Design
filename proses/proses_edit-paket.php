<?php
    session_start();
    include('../config/connection.php');
    
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $harga = $_POST["harga"];
    $dekorasi = $_POST["dekorasi"];
    $rias_baju = $_POST["rias_baju"];
    $dokumentasi = $_POST["dokumentasi"];
    $mc = $_POST["mc"];
    $free = $_POST["free"];
    $biaya = $_POST["biaya"];
    $code = $_FILES['file']['error'];
    if ($code === 0) {     

        $destination_path = getcwd();

        $error = "";
        $nama_folder = "foto";
        $tmp = $_FILES['file']['tmp_name'];
        $nama_file = $_FILES['file']['name'];
        $path = $destination_path . "\\..\\$nama_folder\\$nama_file";

        if (file_exists($path)) {
            $error = urldecode("File dengan nama yang sama sudah tersimpan, coba lagi");
            header("Location:../tambah-paket.php?error=$error");
        }

        $ukuran = $_FILES['file']['size'];
        if ($ukuran > 2000000) {
            $error = urldecode("Ukuran melebihi 2 MB");
            header("Location:../tambah-paket.php?error=$error");
        }

        $tipe_file = array('image/jpeg', 'image/gif', 'image/png');
        if (!in_array($_FILES['file']['type'], $tipe_file)) {
            $error = urldecode("Cek Kembali Ekstensi File Anda (*jpeg, *jpg, *gif, *png)");
            header("Location:../tambah-paket.php?error=$error");
        }

        if(move_uploaded_file($tmp, $path)) {

            $sql = "UPDATE paket SET nama_paket ='$nama',harga ='$harga',dekorasi ='$dekorasi',rias_baju ='$rias_baju',dokumentasi ='$dokumentasi',mc ='$mc',free ='$free',biaya_pelihara ='$biaya',foto='$nama_file' WHERE id_paket = '$id'";

            if (mysqli_query($con, $sql)) {
                header("Location:../admin-paket.php");
            } else {
                $error = urldecode("Data tidak berhasil ditambahakan");
                header("Location:../tambah-paket.php?error=$error");
            }
        }
    } else {
        $error = urldecode("Foto tidak berhasil terupload");
        header("Location:../tambah-paket.php?error=$error");
    }
    mysqli_close($con);

    $sql = "UPDATE paket SET nama_paket ='$nama',harga ='$harga',dekorasi ='$dekorasi',rias_baju ='$rias_baju',dokumentasi ='$dokumentasi',mc ='$mc',free ='$free' WHERE id_paket = '$id'";
    if (mysqli_query($con, $sql)) {
        header("Location:../admin-paket.php");
    }
    mysqli_close($con);
?>