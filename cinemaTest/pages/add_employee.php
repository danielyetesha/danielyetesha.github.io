<?php

include 'connection.php';
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gondar cinema</title>
    <link rel="stylesheet" href="../style/bootstrap-5.0.2-dist/css/bootstrap.css" />
    <link rel="stylesheet" href="../style/fontawesome-free-6.1.1-web/css/all.css" />

</head>

<body>
    <?php
    include 'header_check.php';
if(!(isset($_SESSION['username'])&&($_SESSION['account_type']=='admin'))){
        echo "<script>window.location.href='page_not_allowed.php';</script>";
    }
    ?>
    <div class="container my-3 w-75 bg-light">
        <div class="header px-4 px-lg-5 row">

            <a href="manage_employee.php" class="col-3 fs-2 fw-bold mb-0 text-start"><i
                    class="fa-solid fa-arrow-left"></i></a>
            <h2 class="col mx-auto fw-bold mb-0 text-center">Add Employee</h2>

        </div>

        <div class=" d-flex align-items-center m-0">
            <div class="card-body px-4 px-lg-5 text-black">

                <form class="mx-1 mx-md-4 needs-validation" method="POST" enctype="multipart/form-data"
                    action="add_employee.php" novalidate>
                    <div class="col-lg">
                        <div class="mb-4">
                            <div class="form-outline flex-fill mb-0 ">
                                <label for="fname" id="flab">First name:</label><br />
                                <input type="text" name="first_name" id="first_name" class="form-control"
                                    placeholder="First name" required pattern="[A-Za-z]{3,}"
                                    oninput="myValidation(event)" />

                                <ul class="invalid-feedback" id="first_name_feedback"></ul>

                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline flex-fill mb-0">
                                <label>Last name:</label><br />
                                <input type="text" name="last_name" id="last_name" class="form-control"
                                    placeholder="Last name" title="Please enter characters only" pattern="[A-Za-z]{3,}"
                                    required oninput="myValidation(event)" />
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
                                <input type="number" name="age" placeholder="age" max="200" min="5" class="form-control"
                                    title="Please user the correct age" required />
                                <ul class="invalid-feedback">
                                    <li>age must be between 5 to 200</li>
                                </ul>

                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline flex-fill mb-0">
                                <label>Email:</label><br />
                                <input type="email" name="email_address" placeholder="Email" id="email"
                                    class="form-control"
                                    title="Please user the correct email format eg: username@gmail.com" required />
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
                                    title="Please enter numbers only" required oninput="myValidation(event)" />
                                <ul class="invalid-feedback" id="phone_number_feedback"></ul>
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline flex-fill mb-0">
                                <label>Username:</label><br />
                                <input type="text" name="username" placeholder="Username" id="username" minlength="3"
                                    class="form-control" pattern="\w{4,}" required oninput="myValidation(event)" />
                                <ul class="invalid-feedback" id="username_feedback"></ul>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="form3Example4c">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="active" selected>Activated</option>
                                    <option value="disable">Deactivated</option>
                                </select>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label">Role</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="normal" selected>Normal</option>
                                    <option value="ticket_checker">Ticket Checker</option>
                                </select>
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="fileExample">select profile
                                    picture</label>
                                <input type="file" name="image" id="fileExample" class="form-control"
                                    accept="image/png, image/jpeg , image/jpg" />
                            </div>
                        </div>

                        <div class="m-3">
                            <button type="submit" name="register" class="btn btn-primary btn-lg w-100">
                                Register
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <script src="../style/bootstrap-5.0.2-dist/js/bootstrap.js"></script>
    <script src=" ../js/sweetalert.min.js"></script>
    <script src=" ../js/validation.js"></script>
    <?php include 'footer.php';?>
</body>

</html>

<?php

include 'connection.php';
if(isset($_POST['register'])){
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $sex=$_POST['sex'];
    $age=$_POST['age'];
    $email_address=$_POST['email_address'];
    $phone_number=$_POST['phone_number'];
    $username=$_POST['username'];
    $password=password_hash('change_me', PASSWORD_DEFAULT); 
    $status=$_POST['status'];
    $role=$_POST['role'];
    $account_type="employee";
    
    
$usernameCheck=  mysqli_query($connection,"SELECT * FROM account WHERE Username='$username'") or die(mysqli_error($connection));
$count=  mysqli_num_rows($usernameCheck);
if($count>0){
    echo "<script>swal('ERROR','username already exist','error');</script>";
}else{
    
    $email_check=  mysqli_query($connection,"SELECT * FROM account WHERE Email_address='$email_address'") or die(mysqli_error($connection));
    $email_count=  mysqli_num_rows($email_check);
    if($email_count>0){
        echo "<script>swal('ERROR','email address already exist','error');</script>";
    }else{
    $profile_pic = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        echo 'profile pic is '.$profile_pic;
    if($profile_pic==''){
    $profile_pic='default.jpg';
    }else{
    $img_explode = explode('.',$profile_pic);
    $img_ext = end($img_explode);
        $time = time();
        $profile_pic = $time.$profile_pic;
        move_uploaded_file($tmp_name,"../img/profile/".$profile_pic);
}
        $account_query="INSERT INTO account(First_name, Last_name,Gender,Age,Phone_number,Email_address,Username,Password,Profile_pic,Account_type) VALUES ('$first_name','$last_name','$sex','$age','$phone_number','$email_address','$username','$password','$profile_pic','$account_type')";
        
        $result=  mysqli_query($connection,$account_query) or die(mysqli_error($connection));
        
        if(!$result){
            echo "<script>swal('ERROR','REGISTRATION FAILD','error');</script>";
        }else{
            $findAccount=  mysqli_query($connection,"SELECT Account_id FROM account WHERE Username='$username'") or die(mysqli_error($connection));
            if(mysqli_num_rows($findAccount)>0){
                $data=  mysqli_fetch_assoc($findAccount);
                $account_id=$data['Account_id'];
                
                $employeeResult=  mysqli_query($connection,"INSERT INTO employee(Employee_id,Status,Role) VALUES ('$account_id','$status','$role')") or die(mysqli_error($connection));
                
                if($employeeResult){
                    $action_performer=$_SESSION['account_id'];
                      $detail= $_SESSION['account_type']." Added an employee whose name is ". $first_name." ".$last_name ." and email address = ".$email." , age = ".$age." , Role = ".$role;
mysqli_query($connection,"INSERT INTO log_file(Account_id,Action,Detail) VALUES ('$action_performer','Register employee','$detail')") or die(mysqli_error($connection)) or die(mysqli_error($connection));

                    echo "
                    <script>
                    swal('good job','REGISTRATION SUCCESSFUL','success');
                    </script>
                    ";
                    
                }else{
                    echo "<script>swal('ERROR','REGISTRATION FAILD','warning');</script>";
                    mysqli_query($connection,"delete from account where Account_id='$account_id'");
                }
    }
}

}
}
}


?>

</html>