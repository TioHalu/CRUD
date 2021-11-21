<?php 
include 'auth/function.php'; 
session_start();
    if (isset($_POST["login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $md5password = md5($password);  
        $result = mysqli_query($connect, "SELECT * FROM admin WHERE username='$username' AND password='$md5password'");

        if(mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                header("Location: http://localhost/posyandu/dashboard.php");
        } else {
            $_SESSION['error']=true;
            header("Location: index.php");
        };
    }
?>

<?=template_header('Login')?>
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
        <h5 class="card-header text-center">Login</h5>
        <div class="card-body">
            <?php if(isset($_SESSION['error'])) :?>
                <p class="text-danger">*Username / password tidak sesuai</p>
            <?php endif ?>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="username" name="username" class="form-control" id="username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" name="login" class="btn ">Submit</button>
            </form>
        </div>
    </div>
    
<?=template_footer()?>