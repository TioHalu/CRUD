<?php include 'auth/function.php';
session_start();
    if (empty($_SESSION['loggedin']) && $_SESSION['loggedin'] == false) {
        header("Location: http://localhost/posyandu/index.php");
    }
?>

<?=template_header('Detail Pencarian')?>
<!-- card -->
<?php
    if(isset($_GET['search_word'])) {
        $cari = $_GET['search_word'];
        echo "<p><b>Hasil pencarian dengan nama: ".$cari."</b></p>";
    }
?>
<div class="card mt-5">
    <h5 class="card-header "><a href="./dashboard.php" class="btn"><i class="bi bi-arrow-left" style="font-size: 20px;"></i></a> Hasil Pencarian</h5>
    <div class="card-body text-center">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nik</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                </tr>
            </thead>
            <tbody>
            <?php
                if(isset($_GET['search_word'])) {
                    $cari = $_GET['search_word'];
                    $data = mysqli_query($connect, "SELECT * FROM users WHERE nama LIKE '%".$cari."%' OR nik LIKE '%".$cari."%'");
                    
                } else {
                    $data = mysqli_fetch_array("SELECT * FROM users");
                }
                $no = 1;
                while($row = mysqli_fetch_array($data)) {
                ?>
                <tr>
                    <th scope="row"><?php echo $no++; ?></th>
                    <td><?php echo $row['nik']?></td>
                    <td><?php echo $row['nama']?></td>
                    <td><?php echo $row['alamat']?></td>
                    <td>
                        <a href="detailsUser.php?edit=<?php echo $row['id']?>" class="btn btn-warning">Details</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?=template_footer()?>