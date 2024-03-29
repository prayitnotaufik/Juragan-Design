<!DOCTYPE html>
<?php include 'config/connection.php' ?>
<html>
<?php include 'includes/head.php'?>
<body>
<style>
    body {
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    background: url("img/bgnew.jpg");
    background-size: cover;
    }
</style>
<?php include 'includes/navbar.php' ?>
    <div class="container">
        <div class="heading py-5 mt-5">
            <h1 class="text-center">Menu Juragan Design</h1>
        </div>
        <div class="row mb-5">
            <?php
            $query2 = "SELECT * FROM user WHERE username = '$username'";
            $getID = mysqli_query($con,$query2);
            $item = mysqli_fetch_assoc($getID);
            $query = "SELECT * FROM paket WHERE level = 1";
            $result = mysqli_query($con,$query);
            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){ 
                    $id_paket = $row["id_paket"];
                    // $count = $row["rias_baju"];
                    // $countArray = explode(",",$count);
                    $HitungDekorasi = count(explode(",",$row["dekorasi"]));
                    $HitungRias = count(explode(",",$row["rias_baju"]));

                    if($row["dokumentasi"]!=null){
                        $HitungDokumentasi = count(explode(",",$row["dokumentasi"]));
                    }else{
                        $HitungDokumentasi = 0;
                    }

                    if($row["mc"]!=null){
                        $HitungMc = count(explode(",",$row["mc"]));
                    }else{
                        $HitungMc = 0;
                    }

                    if($row["free"]!=null){
                        $HitungFree = count(explode(",",$row["free"]));
                    }else{
                        $HitungFree = 0;
                    }                   
                    ?>
                    <div class="col-lg-4 col-md-5">
                    <!--Panel-->
                    <div class="card" style="background-color: rgba(0, 0, 0, 0.37)">
                        <h5 class="text-uppercase font-weight-bold text-center pt-4 text-white"> <span class="bg-orange1 py-2 px-3 rounded"><?php echo $row["nama_paket"] ?></span> </h5>
                        <div class="card-body">
                            <h5 class="text-center font-weight-bold mb-3 text-white">Rp.<?php echo $row["harga"] ?>,-</h5>
                            <img width="300px" src="foto/<?php echo $row["foto"] ?>" alt="" srcset="">
                            <div class="mt-3">
                                <?php
                                    if (isset($username)) {?>
                                        <a href="pemesanan.php?id_paket=<?php echo $id_paket ?>&id_user=<?php echo $item["id_user"] ?>" class="btn btn-block btn-orange">DETAIL & PESAN</a>
                                    <?php }else {?>
                                        <a href="login.php" class="btn btn-block btn-orange">DETAIL & PESAN</a>
                                    <?php } ?>
                            </div> 
                        </div>
                    </div>
                    <!--/.Panel-->
                </div>
                <!-- Grid column --> 
                <?php } ?>
            <?php } ?>
            <!-- Grid column -->
            
        </div>            
    </div>
<?php include 'includes/footer.php' ?>
<?php include 'includes/scripts.php' ?>
</body>

</html>