<?php require_once "controllerUserData.php"; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Signup Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="../style/bootstrap-5.0.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../style/fontawesome-free-6.1.1-web/css/all.css" />
</head>

<body class="bg-dark">
    <div class="container bg-dark">
        <div class="row ">
            <div class="container p-4 my-4 form w-75 bg-light">
                <form class="mx-1 mx-md-4 needs-validation" enctype="multipart/form-data" method="POST"
                    action="signup.php" novalidate autocomplete="">
                    <h2 class="text-center">Signup Form</h2>
                    <p class="text-center">It's quick and easy.</p>
                    <?php
                    if(count($errors) == 1){
                        ?>
                    <div class="alert alert-danger text-center">
                        <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                    </div>
                    <?php
                    }elseif(count($errors) > 1){
                        ?>
                    <div class="alert alert-danger">
                        <?php
                            foreach($errors as $showerror){
                                ?>
                        <li><?php echo $showerror; ?></li>
                        <?php
                            }
                            ?>
                    </div>
                    <?php
                    }
                    ?>
                    <div class="mb-4">
                        <div class="form-outline flex-fill mb-0 ">
                            <label for="fname" id="flab">First name:</label><br />
                            <input type="text" name="first_name" id="first_name"
                                value="<?php if(isset($first_name)){echo $first_name;} ?>" class="form-control"
                                placeholder="First name" required pattern="[A-Za-z]{3,}"
                                oninput="myValidation(event)" />

                            <ul class="invalid-feedback" id="first_name_feedback"></ul>

                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                        <div class="form-outline flex-fill mb-0">
                            <label>Last name:</label><br />
                            <input type="text" name="last_name" id="last_name" class="form-control"
                                value="<?php if(isset($last_name)){echo $last_name;} ?>" placeholder="Last name"
                                title="Please enter characters only" pattern="[A-Za-z]{3,}" required
                                oninput="myValidation(event)" />
                            <ul class="invalid-feedback" id="last_name_feedback"></ul>
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                        <div class="form-outline mb-0">
                            <label>Sex:</label><br />
                            <input type="radio" name="sex" class="m-1" id="sex" value="male" checked />Male
                            <input type="radio" name="sex" class="m-1 ms-4 " id="sex" value="female" />Female
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                        <div class="form-outline flex-fill mb-0">
                            <label>Age:</label><br />
                            <input type="number" name="age" placeholder="age"
                                value="<?php if(isset($age)){echo $age;} ?>" max="200" min="5" class="form-control"
                                title="Please user the correct age" required />
                            <ul class="invalid-feedback">
                                <li>age must be between 5 to 200</li>
                            </ul>

                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                        <div class="form-outline flex-fill mb-0">
                            <label>Email:</label><br />
                            <input type="email" name="email_address" placeholder="Email" id="email" class="form-control"
                                title="Please user the correct email format eg: username@gmail.com" required
                                value="<?php if(isset($email_address)){ echo $email_address;} ?>" />
                            <ul class="invalid-feedback">
                                <li>use email format eg: username@gmail.com</li>
                            </ul>
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                        <div class="form-outline flex-fill mb-0">
                            <label>Phone:</label><br />
                            <input type="tel" name="phone_number" placeholder="Phone number" maxlength="10"
                                id="phone_number" class="form-control" pattern="09\d{8}"
                                title="Please enter numbers only" required oninput="myValidation(event)"
                                value="<?php if(isset($phone_number)){echo $phone_number; }?>" />
                            <ul class="invalid-feedback" id="phone_number_feedback"></ul>
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <div class="form-outline flex-fill mb-0">
                            <label>Username:</label><br />
                            <input type="text" name="username" placeholder="Username" id="username" minlength="3"
                                class="form-control" pattern="\w{4,}" required oninput="myValidation(event)"
                                value="<?php if(isset($username)){echo $username;} ?>" />
                            <ul class="invalid-feedback" id="username_feedback"></ul>
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="form3Example4c">Password</label>
                            <input type="password" name="password" placeholder="password" id="password" minlength="5"
                                pattern="\w{4,}" class="form-control" required oninput="myValidation(event)"
                                value="<?php if(isset($password)){echo $password; }?>" />
                            <ul class="invalid-feedback">
                                <li>password must be greater than 4 character</li>
                            </ul>
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="confirmExample">Repeat your password</label>
                            <input type="password" id="confirmExample" name="confirm_password" minlength="3"
                                placeholder="confirm password" class="form-control" pattern="\w{4,}" required
                                oninput="myValidation(event)"
                                value="<?php if(isset($cpassword)){echo $cpassword; }?>" />
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="fileExample">select profile picture</label>
                            <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg"
                                class="form-control" value="<?php if(isset($profile)){echo $profile; }?>">
                        </div>
                    </div>

                    <div class="m-3">
                        <button type="submit" name="signup" class="btn btn-primary btn-lg w-100">
                            Register
                        </button>
                    </div>
                    <div class="link login-link text-center">Already a member? <a href="login_user.php">Login here</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../style/bootstrap-5.0.2-dist/js/bootstrap.js"></script>
    <script src="../js/sweetalert.min.js"></script>
    <script src="../js/validation.js"></script>
</body>

</html>