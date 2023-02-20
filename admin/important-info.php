<?php
include 'config.php';
?>
<?php if (isset($_GET['success-Important'])) { ?>
    <div id="toastSuccess" class="bs-toast toast toast-placement-ex m-2 fade bg-success top-0 end-0" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000" data-autohide="true">
        <div class="toast-header">
            <i class="bx bx-bell me-2"></i>
            <div class="me-auto fw-semibold">Perubahan Data Berhasil</div>
            <small>1 second ago</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">Perubahan Important info berhasil dilakukan.</div>
    </div>
<?php unset($_GET['success-Important']);
} ?>
<?php if (isset($_GET['failed-Important'])) { ?>
    <div id="toastFailed" class="bs-toast toast toast-placement-ex m-2 fade bg-danger top-0 end-0" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000" data-autohide="true">
        <div class="toast-header">
            <i class="bx bx-bell me-2"></i>
            <div class="me-auto fw-semibold">Perubahan Data Gagal</div>
            <small>1 second ago</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">Perubahan Important info gagal dilakukan.</div>
    </div>
<?php } ?>
<?php
include 'config.php';
$sql = mysqli_query($con, "select * from tb_info");
$data = mysqli_fetch_array($sql);
?>
<div class="col-xxl">
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Perubahan Important Info</h5>
            <small class="text-muted float-end">T&C</small>
        </div>
        <div class="card-body">
            <form action="submit-important.php" method="POST">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-message">Before Book</label>
                    <div class="col-sm-10">
                        <input type="text" name="id_info" value="<?php echo $data['id_info'] ?>" hidden>
                        <textarea id="basic-default-message" name="b_book" class="form-control" placeholder="Masukan Important info before book." aria-label="Masukan Important info before book." aria-describedby="basic-icon-default-message2"><?php echo $data['b_book'] ?></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-message">After Book</label>
                    <div class="col-sm-10">
                        <textarea id="basic-default-message" name="a_book" class="form-control" placeholder="Masukan Important info after book." aria-label="Masukan Important info before book." aria-describedby="basic-icon-default-message2"><?php echo $data['a_book'] ?></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-message">During Pick-Up</label>
                    <div class="col-sm-10">
                        <textarea id="basic-default-message" name="d_pick" class="form-control" placeholder="Masukan Important info during pickup." aria-label="Masukan Important info before book." aria-describedby="basic-icon-default-message2"><?php echo $data['d_pick'] ?></textarea>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-sm-10 text-end">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>