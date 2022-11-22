<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../js/sweetalert.min.js"></script>
    <title>Document</title>
</head>

<body>

</body>

</html>
<?php 
session_start();
require "connection.php";
$errors = array();
$email='';


if(isset($_POST['signup'])){
    $first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($connection, $_POST['last_name']);
    $sex = mysqli_real_escape_string($connection, $_POST['sex']);
    $age = mysqli_real_escape_string($connection, $_POST['age']);
    $email_address = mysqli_real_escape_string($connection, $_POST['email_address']);
    $phone_number = mysqli_real_escape_string($connection, $_POST['phone_number']);
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $cpassword = mysqli_real_escape_string($connection, $_POST['confirm_password']);
    $profile = $_FILES['image']['name'];
    if($password !== $cpassword){
        $errors['password'] = "Confirm password not matched!";
    }
    $email_check = "SELECT * FROM account WHERE Email_address = '$email_address'";
    $res = mysqli_query($connection, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "Email that you have entered is already exist!";
    }
    $username_check = "SELECT * FROM account WHERE Username = '$username'";
    $res1 = mysqli_query($connection, $email_check);
    if(mysqli_num_rows($res1) > 0){
        $errors['username'] = "username already exist";
    }
    if(count($errors) === 0){
        $encpass=password_hash($_POST['password'], PASSWORD_DEFAULT);
        if(isset($_FILES['image'])){
            $img_name = $_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $img_explode = explode('.',$img_name);
            $img_ext = end($img_explode);
            $time = time();
            $new_img_name = $time.$img_name;
            move_uploaded_file($tmp_name,"../img/profile/".$new_img_name);     
            if($prifile==''){
                $new_img_name='default.jpg';
            }     
            $insert_data="INSERT INTO account(First_name, Last_name,Gender,Age,Phone_number,Email_address,Username,Password,Profile_pic) VALUES ('$first_name','$last_name','$sex','$age','$phone_number','$email_address','$username','$encpass','$new_img_name')";
            $data_check=  mysqli_query($connection,$insert_data);
            if($data_check){
                $findAccount=  mysqli_query($connection,"SELECT Account_id FROM account WHERE Username='$username' AND Password='$encpass'");
                if(mysqli_num_rows($findAccount)>0){
                    $data=  mysqli_fetch_assoc($findAccount);
                    $account_id=$data['Account_id'];
                    $customerResult=  mysqli_query($connection,"INSERT INTO customer(Customer_id,Balance) VALUES ('$account_id','0')");
                    if($customerResult){
                        echo "
                        <script>
                        swal({
    text: 'You are Registered Successfuly! Please Login to the system',
    icon: 'success',
    button: 'ok',
}).then(function(){
window.location='login_user.php';
});
                        </script>
                        ";
                    }else{
                        $errors['db-error'] = "Failed while inserting data into database!";
                                    mysqli_query($connection,"delete from account where Account_id='$account_id'");
                    }
                }
            }else{
                $errors['db-error'] = "Failed while inserting data into database!";
            }
        }else{
            $errors['db-error'] = "Please upload an image file - jpeg, png, jpg!4!";
        }
    }

}



    //if user click Login With email button
    if(isset($_POST['loginWithEmail'])){
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);
        $check_email = "SELECT * FROM account WHERE Email_address = '$email'";
        $res = mysqli_query($connection, $check_email);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['Password'];
            $account_id=$fetch['Account_id'];
           $account_type=$fetch['Account_type'];
           $username=$fetch['Username'];
           $profile_pic=$fetch['Profile_pic'];
            if(password_verify($password, $fetch_pass)){
                $_SESSION['username'] = $username;
                $_SESSION['account_id']=$account_id;
                $_SESSION['account_type']=$account_type;
                $_SESSION['profile_pic']=$profile_pic;
                $_SESSION['email']=$email;
                
                $_SESSION['is_log'] = 1;
                if($account_type=="admin"){
                    header("Location: admin.php");
                }elseif ($account_type=="customer") {
                    $query1="select * from customer where Customer_id='$account_id'";
                    $result1 = mysqli_query($connection,$query1);
                    
                        if($data1=  mysqli_fetch_assoc($result1)){
                            $status=$data1['Status'];
                if($status=='active'){
                    header("Location: customer.php");
                }else if($status!='active'){
                    $info = "It's look like your account is deactivated";
                    $_SESSION['info'] = $info;
                    unset($_SESSION['username']);
                    session_destroy();
                    header('location: deactiveated_page.php');
                }
                }
                    
                }elseif ($account_type=="employee") {
                    $query1="select * from employee where Employee_id='$account_id'";
                    $result1 = mysqli_query($connection,$query1);
                    
                    if(mysqli_num_rows($result1) == 1){
                        if($data1=  mysqli_fetch_assoc($result1)){
                            $status=$data1['Status'];
                            $query2="select * from account where Account_id='$account_id'";
                    $result2 = mysqli_query($connection,$query2);
                       $data2=  mysqli_fetch_assoc($result2);
                            $password=$data2['Password'];
                if($status=='active'){
                    if(password_verify('change_me',$fetch['Password'])){
                    $info = "It's look like your password is new please change it";
                    $_SESSION['info'] = $info;
                    header('location: new-password.php');
                }else{
                    
                    header("Location: employee.php");
                }
                }else if($status!='active'){
                    $info = "It's look like your account is deactivated";
                    $_SESSION['info'] = $info;
                    header('location: activation_request.php');
                }
                }
            }
            }


            }else{
                $errors['username'] = "Incorrect username or password!";
            }
        }else{
            $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
        }
    }
    //if user click login button
    if(isset($_POST['login'])){

        $username = mysqli_real_escape_string($connection, $_POST['username']);
        $password = $_POST['password'];
        $check_username = "SELECT * FROM account WHERE Username = '$username'";
        $res = mysqli_query($connection, $check_username);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['Password'];
            $account_id=$fetch['Account_id'];
           $account_type=$fetch['Account_type'];
           $email=$fetch['Email_address'];
           $profile_pic=$fetch['Profile_pic'];
            if(password_verify($password, $fetch_pass)){
                $_SESSION['username'] = $username;
                $_SESSION['account_id']=$account_id;
                $_SESSION['account_type']=$account_type;
                $_SESSION['profile_pic']=$profile_pic;
                $_SESSION['email']=$email;
                
                $_SESSION['is_log'] = 1;
                if($account_type=="admin"){
                    header("Location: admin.php");
                }elseif ($account_type=="customer") {
                    $query1="select * from customer where Customer_id='$account_id'";
                    $result1 = mysqli_query($connection,$query1);
                    
                        if($data1=  mysqli_fetch_assoc($result1)){
                            $status=$data1['Status'];
                if($status=='active'){
                    header("Location: customer.php");
                }else if($status!='active'){
                    $info = "It's look like your account is deactivated";
                    $_SESSION['info'] = $info;
                    unset($_SESSION['username']);
                    session_destroy();
                    header('location: deactiveated_page.php');
                }
                }
                    
                }else if ($account_type=="employee") {
                $query1="select * from employee where Employee_id='$account_id'";
                $result1 = mysqli_query($connection,$query1);
                if(mysqli_num_rows($result1) == 1){
                    if($data1=  mysqli_fetch_assoc($result1)){
                        $status=$data1['Status'];
                        $query2="select * from account where Account_id='$account_id'";
                $result2 = mysqli_query($connection,$query2);
                    $data2=  mysqli_fetch_assoc($result2);
                        $password=$data2['Password'];
                if($status=='active'){
                    if(password_verify('change_me',$fetch['Password'])){
                    $info = "It's look like your password is new please change it";
                    $_SESSION['info'] = $info;
                    header('location: new-password.php');
                    }else{
                        header("Location: employee.php");
                    }
                }else {
                    echo "<script>alert('your account is deactivated');</script>";
                    $info = "It's look like your account is deactivated";
                    $_SESSION['info'] = $info;
                    header('location: activation_request.php');
                }
                }
            }
            }


            }else{
                $errors['username'] = "Incorrect username or password! ";
            }
        }else{
            $errors['username'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
        }
    }

    
    if(isset($_POST['check-email'])){
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $check_email = "SELECT * FROM account WHERE Email_address='$email'";
        $run_sql = mysqli_query($connection, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            
            $fetch = mysqli_fetch_assoc($run_sql);
            $account_id=$fetch['Account_id'];
            $code = rand(999999, 111111);
            $insert_code = "UPDATE customer SET code = $code WHERE Customer_id = '$account_id'";
            $run_query =  mysqli_query($connection, $insert_code);
            if($run_query){
                $subject = "Password Reset Code";
                $message = "Your password reset code is $code";
                $sender = "From: danielyetesha2010@gmail.com";
                if(mail($email, $subject, $message, $sender)){
                    $info = "We've sent a passwrod reset code to your email - $email and the code is $code";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    $_SESSION['account_id'] = $account_id;
                    header('location: reset-code.php');
                    exit();
                }else{
                    $errors['otp-error'] = "Failed while sending code!";
                }
            }else{
                $errors['db-error'] = "Something went wrong!";
            }
        }else{
            $errors['email'] = "This email address does not exist!";
        }
    }

    //if user click check reset otp button
    if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($connection, $_POST['otp']);
        $check_code = "SELECT * FROM customer WHERE code = $otp_code";
        $code_res = mysqli_query($connection, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $account_id = $fetch_data['Customer_id'];
            $account = "SELECT * FROM account WHERE Account_id = $account_id";
        $res = mysqli_query($connection, $account);
            $data = mysqli_fetch_assoc($res);
            $email = $data['Email_address'];
            $_SESSION['email'] = $email;
            $_SESSION['account_id'] = $account_id;
            $info = "Please create a new password that you don't use on any other site.";
            $_SESSION['info'] = $info;
            header('location: new-password.php');
            exit();
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }
    //if user click change password button
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($connection, $_POST['password']);
        $cpassword = mysqli_real_escape_string($connection, $_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "Confirm password not matched!";
        }else{
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
            $account_id = $_SESSION['account_id']; //getting this account id using session
            $encpass = password_hash($password, PASSWORD_DEFAULT);
            $unset_code = "UPDATE customer SET code = $code WHERE  Customer_id = '$account_id'";
            $unset_query = mysqli_query($connection, $unset_code);
            $update_pass = "UPDATE account SET Password = '$encpass' WHERE  Account_id = '$account_id'";
            $run_query = mysqli_query($connection, $update_pass);
            if($run_query){
                $action_performer=$_SESSION['account_id'];
                      $detail= $_SESSION['account_type']."(".$_SESSION['username'].") change his or her password";
mysqli_query($connection,"INSERT INTO log_file(Account_id,Action,Detail) VALUES ('$action_performer','Change password','$detail')") or die(mysqli_error($connection)) or die(mysqli_error($connection));

                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                header('Location: password-changed.php');
            }else{
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    }        
   //if login now button click
    if(isset($_POST['login-now'])){
        header('Location: login_user.php');
    }


    ?>