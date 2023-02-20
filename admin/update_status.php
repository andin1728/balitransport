<?php
include 'config.php';
$id = $_GET['id_transaksi'];
$sql = mysqli_query($con, "select * from tb_transaksi where id_transaksi='$id'");
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
                    <label class="col-sm-2 col-form-label" for="basic-default-message">Status</label>
                    <div class="col-sm-10">
                        <input type="text" name="id_transaksi" value="<?php echo $data['id_transaksi'] ?>" hidden>
                        <select name="status" class="form-control" id="">
                            <option value="Ready">Ready</option>
                            <option value="Jalan">Jalan</option>
                        </select>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-sm-10 text-end">
                        <button type="submit" name="submit-pengembalian" class="btn btn-primary">Simpan</button>
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
if (isset($_POST['submit-pengembalian'])) {
// Get data from form input
$id_transaksi = $_POST['id_transaksi'];
$status = $_POST['status'];

// SQL query
$sql = "UPDATE tb_transaksi
SET status='$status'
WHERE id_transaksi='$id_transaksi'";

// Execute query
if (mysqli_query($con, $sql)) {
    echo "<script>window.location.href='index.php?module=pengembalian&success-Pengembalian';</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
}

// Close connection
mysqli_close($con);
