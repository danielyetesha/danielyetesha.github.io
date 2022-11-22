<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="stylesheet" href="../style/login_style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="../style/bootstrap-5.0.2-dist/js/bootstrap.js"></script>
</head>

<body>

    <?php
    
include 'connection.php';
    include 'header_check.php';
if(!(isset($_SESSION['username']))){
        echo "<script>window.location.href='page_not_allowed.php';</script>";
    }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <div class="modal-header">
                    <span class="h3 mb-2">Change Password</span>

                    <a href="edit_profile.php" class="btn btn-close"></a>
                </div>

                <div class=" d-flex align-items-center">
                    <div class="card-body text-black">
                        <form method="POST" class="needs-validation" action="change_password.php" novalidate>
                            <div class="form-group mb-4">
                                <input class="form-control" type="text" name="current_password"
                                    placeholder="Current Password" required>
                            </div>
                            <div class="form-group my-4">
                                <input class="form-control" type="password" id="pass" pattern="\w{4,}"
                                    name="new_password" placeholder="New password" required>
                            </div>
                            <div class="form-group my-4">
                                <input class="form-control" type="password" pattern="\w{4,}" name="cnew_password"
                                    placeholder="Confirm New password" required>
                            </div>
                            <input type="checkbox" onclick="myFunction1()">Show Password
                            <button class="btn btn-primary" type="submit" name="change_pass">
                                Change Password
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
        function myFunction1() {
            var x = document.getElementById("pass");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
        </script>
        <script src="../js/sweetalert.min.js"></script>

        <script src="../js/validation.js"></script>
</body>

</html>
<?php
    if(isset($_POST['change_pass'])){
        $account_id=$_SESSION['account_id'];
        $current_pass=$_POST['current_password'];
        $new_pass=$_POST['new_password'];
        $cnew_pass=$_POST['cnew_password'];
        $userCheck=  mysqli_query($connection,"SELECT * FROM account WHERE Account_id='$account_id'");
        $count=  mysqli_num_rows($userCheck);
        if($count>0){
            $user_data=  mysqli_fetch_assoc($userCheck);
            $pass=$user_data['Password'];
            if($new_pass==$cnew_pass){
                if($pass==$current_pass){
                    $update_query="UPDATE account SET Password='$new_pass' WHERE Account_id='$account_id' ";
                    $result=  mysqli_query($connection,$update_query) or die(mysqli_error($connection));
                    if(!$result){
                                                echo "
                        <script>
                            swal('good job','UPDATE FAILD','error');
                        </script>
                        ";
                    }else{
                         $action_performer=$_SESSION['account_id'];
                      $detail= $_SESSION['account_type']."(".$_SESSION['username'].") change his or her password";
mysqli_query($connection,"INSERT INTO log_file(Account_id,Action,Detail) VALUES ('$action_performer','Change password','$detail')") or die(mysqli_error($connection)) or die(mysqli_error($connection));

                        echo "
                        <script>
                            swal('good job','PASSWORD CHANGED','success');
                        </script>
                        ";
                    }
                    
                }else{
                        echo "
                        <script>
                            swal('error','PASSWORD DOES NOT MATCH','error');
                        </script>
                        ";
                }
            }else{

                        echo "
                        <script>
                            swal('error','CONFIRM PASSWORD DOES NOT MATCH','error');
                        </script>
                        ";            }
        }
    }
    ?>