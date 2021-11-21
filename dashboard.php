<?php include 'auth/function.php';
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $username = $_SESSION["username"];
    $data = mysqli_query($connect, "SELECT * FROM admin WHERE username='$username'");
    $row = mysqli_fetch_array($data);
} else {
    $_SESSION['message'] = "Untuk mengakses halaman ini silahkan login terlebih dahulu";
    $_SESSION['msg_type'] = "danger";
    header("location: index.php");
}
?>

<?= template_header('Dashboard') ?>
<?php if (isset($_SESSION['message'])) : ?>
    <div class="alert alert-<?= $_SESSION['msg_type'] ?>" role="alert">
        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>
    </div>
<?php endif ?>
<a href="auth/logout.php" class="btn btn-outline-danger mt-3" style="background: red; color:white;">Logout</a>
<!-- card -->
<div class="card mt-5">
    <h5 class="card-header ">Selamat Datang ,<b> <?php echo $row['nama'] ?> </b></h5>
    <div class="card-body text-center">
        <i class="bi bi-pc-display-horizontal"></i>
        <form class="d-flex mb-3" action="detailPencarian.php" method="GET">
            <input class="form-control me-2" type="search" name="search_word" placeholder="Search Data" aria-label="Search">
            <input class="btn" type="submit" value="search" />
        </form>
        <div id="emailHelp" class="form-text text-start">Cari berdasarkan Nama atau NIK</div>
        <a href="./inputData.php" class="btn">Input Data</a>
    </div>
</div><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#38b3d0" fill-opacity="1" d="M0,96L0,96L90,96L90,160L180,160L180,96L270,96L270,32L360,32L360,224L450,224L450,160L540,160L540,256L630,256L630,288L720,288L720,32L810,32L810,32L900,32L900,224L990,224L990,128L1080,128L1080,64L1170,64L1170,96L1260,96L1260,32L1350,32L1350,256L1440,256L1440,320L1350,320L1350,320L1260,320L1260,320L1170,320L1170,320L1080,320L1080,320L990,320L990,320L900,320L900,320L810,320L810,320L720,320L720,320L630,320L630,320L540,320L540,320L450,320L450,320L360,320L360,320L270,320L270,320L180,320L180,320L90,320L90,320L0,320L0,320Z"></path>
</svg>
<?= template_footer() ?>