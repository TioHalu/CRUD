<?php include 'auth/function.php'; 
session_start();
    if (empty($_SESSION['loggedin']) && $_SESSION['loggedin'] == false) {
        header("Location: index.php");
    }
    if(isset($_GET['detail'])) {
        $id = $_GET['detail'];
        $users = mysqli_query($connect, "SELECT * FROM users WHERE id=$id") or die($connect->error());
        $berats = mysqli_query($connect, "SELECT * FROM berat WHERE user_id=$id") or die($connect->error());
        if(isset($users)) {
            $row = $users->fetch_array();
            $nik = $row['nik'];
            $nama = $row['nama'];
            $anak_ke = $row['anak_ke'];
            $tgl_lahir = $row['tgl_lahir'];
            $alamat = $row['alamat'];
            $berat_bdn = $row['berat_bdn'];
            $tinggi_bdn = $row['tinggi_bdn'];
            $lingkar_kpl = $row['lingkar_kpl'];
        }
    }
    if(isset($_POST['save'])) {
        $id = $_POST['id'];
        $tgl = $_POST['tgl'];
        $berat = $_POST['berat'];
        $tinggi = $_POST['tinggi'];

        $result = $connect->query("INSERT INTO berat (user_id, tanggal, berat, tinggi) 
                        VALUES('$id', '$tgl', '$berat', '$tinggi')") 
                        or die ($connect->error); 
        if ($result) {
            $_SESSION['message'] = "Data berhasil ditambahkan";
            $_SESSION['msg_type'] = "success";
        } else {
            $_SESSION['message'] = "Data gagal ditambahkan";
            $_SESSION['msg_type'] = "danger";
        }
        header("location: dataBerat.php?detail=$id");
    }
    if(isset($_GET['delete'])) {
        $id_data = $_GET['delete'];
        $result = $connect->query("DELETE FROM berat WHERE id=$id_data") or die ($mysqli->error());
        if($result) {
            $_SESSION['message'] = "Data berhasil dihapus";
            $_SESSION['msg_type'] = "success";
        }else {
            $_SESSION['message'] = "Data gagal dihapus";
            $_SESSION['msg_type'] = "danger";
        }
        header("location: dataBerat.php?detail=$id");
    }
?>
<?=template_header('Data Berat')?>
<?php if(isset($_SESSION['message'])) :?>
    <div class="alert alert-<?=$_SESSION['msg_type']?>" role="alert">
    <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    ?>
    </div>
<?php endif?>
    <!-- card -->
    <div class="card mt-5">
        <h5 class="card-header ">Data Penimbangan</h5>
        <div class="card-body ">
            <div class="row">
                <div class="col-2">
                    <label for="">NIK</label>
                </div>
                <div class="col-2">:<?=$nik?></div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label for="">Nama</label>
                </div>
                <div class="col-2">:<?=$nama?></div>
            </div>
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Berat Badan</th>
                        <th scope="col">Tinggi Badan</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_array($berats)){?>
                    <tr>
                        <th scope="row"><?php echo $row['tanggal']?></th>
                        <td><?php echo $row['berat']?></td>
                        <td><?php echo $row['tinggi']?></td>
                        <td><a href="dataBerat.php?detail=<?=$id?>&delete=<?php echo $row['id']?>" class="btn btn-danger" style="background: red">Hapus</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a href="./detailsUser.php?edit=<?=$id?>" class="btn bg-info">Kembali</a>
            <a type="submit" class="btn bg-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Baru</a>
        </div>
    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Penimbangan</h5>
                    <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?=@$id;?>">
                        <div class="mt-3">
                            <label for="exampleFormControlInput1" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="exampleFormControlInput1" name="tgl">
                        </div>
                        <div class="mt-3">
                            <label for="exampleFormControlInput1" class="form-label">Berat</label>
                            <input type="number" class="form-control" id="exampleFormControlInput1" name="berat">
                        </div>
                        <div class="mt-3">
                            <label for="exampleFormControlInput1" class="form-label">Tinggi</label>
                            <input type="number" class="form-control" id="exampleFormControlInput1" name="tinggi">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn bg-info" name="save">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?=template_footer()?>