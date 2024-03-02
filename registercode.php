<?php
session_start();
include('admin/config/dbcon.php');

if(isset($_POST['register_btn']))
{
   $fname = mysqli_real_escape_string($con, $_POST['fname']);
   $lname = mysqli_real_escape_string($con, $_POST['lname']);
   $email = mysqli_real_escape_string($con, $_POST['email']);
   $password = mysqli_real_escape_string($con, $_POST['password']);
   $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

   if($password == $cpassword)
   {
        //check email
        $checkemail = "SELECT email FROM users WHERE email ='$email'";
        $checkemail_run = mysqli_query($con, $checkemail);
        
        if(mysqli_num_rows($checkemail_run) > 0)
        {
            $_SESSION['message'] = "Email already exist";
            header("Location: register.php");
            exit(0);
        }
        else
        {
            $user_query = "INSERT INTO users (fname,lname,email,password) VALUES ('$fname','$lname','$email','$password')";
            $user_query_run = mysqli_query($con,$user_query);

            if($user_query_run)
            {
                $_SESSION['message'] = "Registered success";
                header('Location: login.php');
                exit(0);
            }
            else
            {
                $_SESSION['message'] = "something is wrong";
                header('Location: register.php');
                exit(0);
            }
        }
   }
   else{
    $_SESSION['message'] = "Two message doesn't the same";
    header('Location: register.php');
    exit(0);
   }
}

?>