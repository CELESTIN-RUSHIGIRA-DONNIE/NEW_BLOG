<?Php
    include('includes/config.php');
    
    $Page_title = "Login page";
    $meta_description = "Login page description";
    $meta_keywords = "fashion, css, laravel";
    
    include('includes/header.php');
    if(isset($_SESSION['auth']))
    {
        $_SESSION['message'] = "You are already Logged in";
        header("Location: index.php");
        exit(0);
    }
    include('includes/navbar.php');
?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">

                <?php include('message.php'); ?>

               <div class="card">
                    <div class="card-header">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">
                        <form action="logincode.php" method="POST">
                            <div class="form-group mb-3">
                                <label for="">Email ID</label>
                                <input type="email" name="email" placeholder="Enter your email" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Password</label>
                                <input type="password" name="password" placeholder="Enter your password" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" name="login_btn" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
               </div>
            </div>
        </div>
    </div>
</div>

<?Php
    include('includes/footer.php');
?>