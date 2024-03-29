<!DOCTYPE html>
<html lang="en">
<?php include 'config/connection.php' ?>
<?php
$id = $_GET["id"];
$query = "SELECT * FROM paket WHERE id_paket = $id";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
?>

<head>
    <?php include 'includes/head.php' ?>
    <link href="css/simple-sidebar.css" rel="stylesheet">
</head>

<body>
    <?php include 'includes/navbar.php' ?>
    <div class="d-flex pt-5 mt-4" id="wrapper">
        <?php include 'includes/sidebar.php' ?>
        <!-- Page Content -->
        <div style="background-color:#E3EDEA;" id="page-content-wrapper">
            <div class="container-fluid mt-3 ml-3">
                <div class="row mb-3">
                    <h1 class="">Update Paket</h1>
                </div>
            </div>
            <div class="container">
                <form action="proses/proses_edit-paket.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="my-input">Nama Paket</label>
                                <input id="my-input" class="form-control" type="text" name="nama" value="<?php echo $row["nama_paket"] ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="my-input">Harga</label>
                                <input id="my-input" class="form-control" type="number" name="harga" value="<?php echo $row["harga"] ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="my-input">Foto</label>
                                <input type="file" name="file" for="file" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="my-input">Lama Pengerjaan (Hari)</label>
                                <input id="my-input" class="form-control" type="number" name="lama" value="<?php echo $row["lama"] ?>" required>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <label for="catatan">Detail</label>
                            <textarea rows="5" class="form-control" type="text" value="" id="detail" placeholder="Masukkan Catatan" name="detail"><?php echo $row["Detail"] ?></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-success btn-block btn-fill">Edit</button>
                        </div>
                        <div class="col-md-2">
                            <a href="admin-paket.php" class="btn btn-warning btn-block btn-fill">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->
    
</body>

</html>