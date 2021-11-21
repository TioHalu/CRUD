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

<?=template_header('Dashboard')?>
<?php if(isset($_SESSION['message'])) :?>
    <div class="alert alert-<?=$_SESSION['msg_type']?>" role="alert">
    <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    ?>
    </div>
<?php endif?>
<a href="auth/logout.php" class="btn btn-outline-danger" style="background: red; color:white;">Logout</a>
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
    </div>
<?=template_footer()?>