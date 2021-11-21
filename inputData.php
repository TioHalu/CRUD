<?php include 'auth/function.php'; 
session_start();
$update = false;
$id = 0;
    if (empty($_SESSION['loggedin']) && $_SESSION['loggedin'] == false) {
        header("Location: http://localhost/posyandu/index.php");
    }

    if(isset($_POST['save'])) {
        $nik = $_POST['nik'];
        $nama = $_POST['nama'];
        $anak_ke = $_POST['anak_ke'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $alamat = $_POST['alamat'];
        $berat = $_POST['berat_bdn'];
        $tinggi = $_POST['tinggi_bdn'];
        $lingkar_kpl = $_POST['lingkar_kpl'];

        $result = $connect->query("INSERT INTO users (nik, nama, anak_ke, tgl_lahir, alamat, berat_bdn, tinggi_bdn, lingkar_kpl) 
                        VALUES('$nik', '$nama', '$anak_ke', '$tgl_lahir', '$alamat', '$berat', '$tinggi', '$lingkar_kpl')") 
                        or die ($connect->error); 
        if ($result) {
            echo '<div class="alert alert-success" role="alert"> Data berhasil ditambahkan </div>';
        } else {
            echo '<div class="alert alert-danger" role="alert"> Data gagal ditambahkan </div>';
        };
    }
    if(isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $update = true;
        $result = mysqli_query($connect, "SELECT * FROM users WHERE id=$id") or die($connect->error());
        if(isset($result)) {
            $row = $result->fetch_array();
            $nik = $row['nik'];
            $nama = $row['nama'];
            $anak_ke = $row['anak_ke'];
            $tgl_lahir = $row['tgl_lahir'];
            $alamat = $row['alamat'];
            $berat_bdn = $row['berat_bdn'];
            $tinggi_bdn = $row['tinggi_bdn'];
            $lingkar_kpl = $row['lingkar_kpl'];
        };
    }
    if(isset($_POST['update'])) {
        $id = $_POST['id'];
        $nik = $_POST['nik'];
        $nama = $_POST['nama'];
        $anak_ke = $_POST['anak_ke'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $alamat = $_POST['alamat'];
        $berat_bdn = $_POST['berat_bdn'];
        $tinggi_bdn = $_POST['tinggi_bdn'];
        $lingkar_kpl = $_POST['lingkar_kpl'];
        // var_dump($id,$nik,$nama,$anak_ke,$tgl_lahir,$alamat,$berat_bdn,$tinggi_bdn,$lingkar_kpl);
        $result = $connect->query("UPDATE users SET nik=$nik, nama='$nama', anak_ke='$anak_ke', tgl_lahir='$tgl_lahir', alamat='$alamat', berat_bdn='$berat_bdn', tinggi_bdn='$tinggi_bdn', lingkar_kpl='$lingkar_kpl' 
                                    WHERE id=$id") 
                or die ($connect->error); 
        
        $_SESSION['message'] = "Record has been updated!";
        $_SESSION['msg_type'] = "warning";
        
        header("location: detailsUser.php?edit=$id");
    }
?>

<?=template_header('Input Data')?>
<?php if(isset($_SESSION['message'])) :?>
    <div class="alert alert-<?=$_SESSION['msg_type']?>" role="alert">
    <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    ?>
    </div>
<?php endif?>
<!-- card -->
<?php if($update == true):?>
    <a href="detailsUser.php?edit=<?=$id?>" class="btn btn-primary btn-sm" style="background: blue;">Kembali</a>
<?php else:?>
    <a href="dashboard.php" class="btn btn-sm">Kembali</a>
<?php endif;?>
<div class="card mt-5">
    <h5 class="card-header ">Input Data</h5>
    <div class="card-body ">
        <form action="" method="POST">
            <div class="mt-3">
                <input type="hidden" name="id" value="<?=@$id;?>">
                <div class="mt-3">
                    <label for="exampleFormControlInput1" class="form-label">NIK</label>
                    <input type="number" class="form-control" id="exampleFormControlInput1" pattern="\d*" maxlength="16" name="nik" value="<?=$nik;?>" >
                </div>
                <div class="mt-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="nama" value="<?=@$nama;?>">
                </div>
                <div class="mt-3">
                    <label for="exampleFormControlInput1" class="form-label">Anak Ke</label>
                    <input type="number" class="form-control" id="exampleFormControlInput1" name="anak_ke" value="<?=@$anak_ke;?>">
                </div>
                <div class="mt-3">
                    <label for="exampleFormControlInput1" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="exampleFormControlInput1" name="tgl_lahir" value="<?=@$tgl_lahir;?>">
                </div>
                <div class="mt-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat"><?=@$alamat;?></textarea>
                </div>
                <label for="exampleFormControlInput1" class="form-label">Data Lahir</label>
                <div class="mt-3">
                    <label for="exampleFormControlInput1" class="form-label">Berat Badan</label>
                    <input type="number" class="form-control" id="exampleFormControlInput1" name="berat_bdn" value="<?=@$berat_bdn;?>">
                </div>
                <div class="mt-3">
                    <label for="exampleFormControlInput1" class="form-label">Tinggi Badan</label>
                    <input type="number" class="form-control" id="exampleFormControlInput1" name="tinggi_bdn" value="<?=@$tinggi_bdn;?>">
                </div>
                <div class="mt-3">
                    <label for="exampleFormControlInput1" class="form-label">Lingkar Kepala</label>
                    <input type="number" class="form-control" id="exampleFormControlInput1" name="lingkar_kpl" value="<?=@$lingkar_kpl;?>">
                </div>
            </div>
            <?php if($update == true):?>
                <button type="submit" class="btn mt-3" name='update'>Update</button>
            <?php else:?>
                <button type="submit" class="btn mt-3" name='save'>Simpan</button>
            <?php endif;?>
        </form>
    </div>
</div>
<?=template_footer()?>