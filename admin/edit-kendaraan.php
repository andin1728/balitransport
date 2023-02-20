<?php
include 'config.php';
$id = $_GET['id_kendaraan'];
$sql = mysqli_query($con, "select * from tb_kendaraan where id_kendaraan='$id'");
$data = mysqli_fetch_array($sql);
?>
<div class="col-xxl">
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Perubahan Status Pengembalian</h5>
            <small class="text-muted float-end">T&C</small>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-message">Nama Unit</label>
                    <div class="col-sm-10">
                        <input type="text" name="id_kendaraan" value="<?php echo $data['id_kendaraan'] ?>" hidden>
                        <input type="text" name="nama" value="<?php echo $data['nama'] ?>" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-message">Merek</label>
                    <div class="col-sm-10">
                        <input type="text" name="merek" value="<?php echo $data['merek'] ?>" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-message">Fuel / BBM</label>
                    <div class="col-sm-10">
                        <input type="text" name="fuel" value="<?php echo $data['fuel'] ?>" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-message">Passenger</label>
                    <div class="col-sm-10">
                        <input type="text" name="passenger" value="<?php echo $data['passenger'] ?>" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-message">Harga /Day</label>
                    <div class="col-sm-10">
                        <input type="text" name="harga" value="<?php echo $data['harga'] ?>" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-message">Transmisi</label>
                    <div class="col-sm-10">
                        <input type="text" name="transmisi" value="<?php echo $data['transmisi'] ?>" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-message">Asuransi</label>
                    <div class="col-sm-10">
                        <input type="text" name="asuransi" value="<?php echo $data['asuransi'] ?>" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-message">Service</label>
                    <div class="col-sm-10">
                        <input type="text" name="service" value="<?php echo $data['service'] ?>" class="form-control">
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-sm-10 text-end">
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <button type="submit" name="submit-edit-kendaraan" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include 'config.php';

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_POST['submit-edit-kendaraan'])) {
    // Get data from form input
    $id_kendaraan = $_POST['id_kendaraan'];
    $nama = $_POST['nama'];
    $merek = $_POST['merek'];
    $fuel = $_POST['fuel'];
    $passenger = $_POST['passenger'];
    $harga = $_POST['harga'];
    $transmisi = $_POST['transmisi'];
    $asuransi = $_POST['asuransi'];
    $service = $_POST['service'];

    // SQL query
    $sql = "UPDATE tb_kendaraan
SET nama='$nama', merek='$merek', fuel='$fuel', passenger='$passenger', harga='$harga', transmisi='$transmisi', asuransi='$asuransi', service='$service'
WHERE id_kendaraan='$id_kendaraan'";

    // Execute query
    if (mysqli_query($con, $sql)) {
        echo "<script>window.location.href='index.php?module=data-kendaraan&success-kendaraan';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}

// Close connection
mysqli_close($con);
