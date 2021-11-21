<?php include 'auth/function.php'; 
session_start();
    if (empty($_SESSION['loggedin']) && $_SESSION['loggedin'] == false) {
        header("Location: http://localhost/posyandu/index.php");
    } 
    if(isset($_GET['edit'])) {
        $id = $_GET['edit'];
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
    
?>

<?=template_header('Data Pengguna')?>
<?php if(isset($_SESSION['message'])) :?>
    <div class="alert alert-<?=$_SESSION['msg_type']?>" role="alert">
    <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    ?>
    </div>
<?php endif?>
<div class="card mt-5">
    <h5 class="card-header "><a href="./detailPencarian.php?search_word=<?=$nama?>" class="btn"><i class="bi bi-arrow-left" style="font-size: 20px;"></i></a></i> Halaman Detail Pencarian</h5>
    <div class="card-body ">
        <div class="row">
            <div class="col-2">
                <label for="">NIK</label>
            </div>
            <div class="col-10">:<?= $nik; ?></div>
        </div>
        <div class="row">
            <div class="col-2">
                <label for="">Nama</label>
            </div>
            <div class="col-10">:<?= $nama; ?></div>
        </div>
        <div class="row">
            <div class="col-2">
                <label for="">Anak Ke</label>
            </div>
            <div class="col-10">:<?= $anak_ke; ?></div>
        </div>
        <div class="row">
            <div class="col-2">
                <label for="">Tanggal Lahir</label>
            </div>
            <div class="col-10">:<?= $tgl_lahir; ?></div>
        </div>
        <div class="row">
            <div class="col-2">
                <label for="">Alamat</label>
            </div>
            <div class="col-10">:<?= $alamat;?></div>
        </div>
        <!-- table -->
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">Berat Badan (g)</th>
                    <th scope="col">Tinggi Badan (cm)</th>
                    <th scope="col">Lingkar Kepala (cm)</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                    <td><?= $berat_bdn;?></td>
                    <td><?= $tinggi_bdn;?></td>
                    <td><?= $lingkar_kpl;?></td>
                </tr>
            </tbody>
        </table>
        <!-- end table -->
        <div class="row text-center mt-5">
            <div class="col-4">
                <a href="./inputData.php?edit=<?php echo $row['id']?>" class="btn bg-warning">Edit Data</a>
            </div>
        </div>
        <div class="row text-center mt-5">
            <div class="col-4">
                <a href="./dataBerat.php?detail=<?php echo $row['id']?>" class="btn btn-info">Data Penimbangan</a>
            </div>
            <div class="col-4">
                <a href="./dataVitamin.php?detail=<?php echo $row['id']?>" class="btn btn-info">Data Vitamin</a>
            </div>
            <div class="col-4">
                <a href="./dataImunisasi.php?detail=<?php echo $row['id']?>" class="btn btn-info">Data Imunisasi</a>
            </div>
        </div>
    </div>
</div>
<?=template_footer()?>