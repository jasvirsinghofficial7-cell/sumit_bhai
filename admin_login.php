<?php
include("header.php");
?>

<!-- Page Header Start -->
<div class="container-xxl py-5 page-header position-relative mb-5">
    <div class="container py-5">
        <h1 class="display-2 text-white animated slideInDown mb-4">Admin Portal</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Admin Login</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<div class="container-fluid py-5">
    <div class="row">
        <div class="col-md-5 mx-auto shadow-lg p-5 rounded border-top border-5 border-primary bg-white">
            <div class="text-center mb-4">
                <h2 class="text-primary"><i class="fa fa-user-shield me-2"></i>Secure Login</h2>
                <p class="text-muted">GenzDream Administrators Only</p>
            </div>
            
            <?php
            if(isset($_REQUEST["msg"]))
            {
                echo "<div class='alert alert-danger text-center fw-bold'>".$_REQUEST["msg"]."</div>";
            }
            ?>
            <form method="post">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                    <label for="email">Admin Email</label>
                </div>
                <div class="form-floating mb-4">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>
                <button type="submit" name="submit" class="btn btn-primary w-100 rounded-pill py-3 fw-bold fs-5">Login to Dashboard</button>
            </form>
        </div>
    </div>
</div>

<?php
include("footer.php");
?>

<?php
if(isset($_REQUEST["submit"]))
{
    include("config.php");
    
    // Security ke liye mysqli_real_escape_string use kiya hai
    $email = mysqli_real_escape_string($conn, $_REQUEST["email"]);
    $password = mysqli_real_escape_string($conn, $_REQUEST["password"]);

    $q = "SELECT * FROM admin_login WHERE email='$email' AND password='$password'";
    $res = mysqli_query($conn,$q);
    
    if($data = mysqli_fetch_array($res)){
        // Session create
        $_SESSION["email"]= $data["email"];
        
        echo "<script>window.location.assign('dashboard.php')</script>";
    }
    else{
        echo "<script>window.location.assign('admin_login.php?msg=Invalid Credentials! Please try again.')</script>";
    }
}
?>