<?php require_once "controllerUserData.php"; ?>
<?php 
$username = $_SESSION['username'];
if($username == false){
  header('Location: login_user.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Deactive Page</title>
    <link rel="stylesheet" href="../style/login_style.css">
    <link rel="stylesheet" href="../style/bootstrap-5.0.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../style/fontawesome-free-6.1.1-web/css/all.css" />
    <link rel="stylesheet" href="../style/beforeLogin.css" />
    <link rel="stylesheet" href="../style/table.css" />

    <script src="../js/validation.js"></script>
    <script src="../style/bootstrap-5.0.2-dist/js/bootstrap.js"></script>
    <script src="../js/sweetalert.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="activation_request.php" method="POST" autocomplete="off">
                    <h2 class="text-center">Request</h2>
                    <?php 
                    if(isset($_SESSION['info'])){
                        ?>
                    <div class="alert alert-success text-center">
                        <?php echo $_SESSION['info']; ?>
                    </div>
                    <?php
                    }
                    ?>
                    <?php
                    if(count($errors) > 0){
                        ?>
                    <div class="alert alert-danger text-center">
                        <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                    </div>
                    <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="request" value="Send Activation Request">
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
<?php
if(isset($_POST['request'])){
    $employee_id=$_SESSION['account_id'];

$employee=  mysqli_query($connection,"SELECT * FROM employee WHERE Employee_id='$employee_id'");
$emp_data=  mysqli_fetch_assoc($employee);
$request= $emp_data['Request'];
if($request==0){
    $update_query="UPDATE employee SET Request='1' WHERE Employee_id='$employee_id' ";
$result=  mysqli_query($connection,$update_query) or die(mysqli_error($connection));
if(!$result){
    echo "<script>alert('request sent failed');</script>";
}else{
    $detail= $_SESSION['account_type']." whose account id is ". $employee_id ." and name is ".$_SESSION['username']." request the admin for his/her account activation";
    mysqli_query($connection,"INSERT INTO log_file(Account_id,Action,Detail) VALUES ('$employee_id','Send Activation Request','$detail')") or die(mysqli_error($connection));
    
                    unset($_SESSION['username']);
                    session_destroy();
    echo "<script>
swal({
    text: 'Request sent successfuly!',
    icon: 'success',
    button: 'ok',
}).then(function(){
window.location='index.php';
});
</script>";
        }
       
}else{
 unset($_SESSION['username']);
                    session_destroy();
                    echo "<script>
swal({
    text: 'request already sent!',
    icon: 'warning',
    button: 'ok',
}).then(function(){
window.location='index.php';
});
</script>";
}
}
?>