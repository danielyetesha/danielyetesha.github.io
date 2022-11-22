<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: login_user.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create a New Password</title>
    <link rel="stylesheet" href="../style/login_style.css">
    <link rel="stylesheet" href="../style/bootstrap-5.0.2-dist/css/bootstrap.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="new-password.php" class=" needs-validation" method="POST" autocomplete="off" novalidate>
                    <h2 class="text-center">New Password</h2>
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
                    <div class="form-group my-4">
                        <input class="form-control" type="password" name="password" placeholder="Create new password"
                            required pattern="\w{4,}" oninput="myValidation(event)">
                        <ul class="invalid-feedback">
                            <li>password must greater than 4 character</li>
                        </ul>
                    </div>
                    <div class="form-group my-4">
                        <input class="form-control" type="password" name="cpassword" placeholder="Confirm your password"
                            required pattern="\w{4,}" oninput="myValidation(event)">
                    </div>
                    <div class="form-group my-4">
                        <input class="form-control button" type="submit" name="change-password" value="Change">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../js/validation.js"></script>
</body>

</html>