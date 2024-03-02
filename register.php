<?Php
    include('includes/config.php');

    $Page_title = "register page";
    $meta_description = "Login page description";
    $meta_keywords = "fashion, css, laravel";
    include('includes/header.php');

    if(isset($_SESSION['auth']))
    {
        if(!isset($_SESSION['message']))
        {
            $_SESSION['message'] = "You are already Logged in";
        }
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
                        <form action="registercode.php" method="POST">
                            <div class="form-group mb-3">
                                <label for="">First name</label>
                                <input required type="text" name="fname" placeholder="Enter your first name" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Last name</label>
                                <input required type="text" name="lname" placeholder="Enter your last name" class="form-control">
                            </div> 
                            <div class="form-group mb-3">
                                <label for="">Email ID</label>
                                <input required type="email" name="email" placeholder="Enter your email" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Password</label>
                                <input required type="password" name="password" placeholder="Enter your password" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Confirm Password</label>
                                <input required type="password" name="cpassword" placeholder="confirm password" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" name="register_btn" class="btn btn-primary btn-sm">Register</button>
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