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

    <script src="../style/bootstrap-5.0.2-dist/js/bootstrap.js"></script>
</head>

<body>
    <?php
    include 'header_check.php';
if(!(isset($_SESSION['username'])&&($_SESSION['account_type']=='admin'))){
        echo "<script>window.location.href='page_not_allowed.php';</script>";
    }
    ?>
    <div class="pt-2 container w-75 bg-light my-3">
        <?php
if(isset($_POST['manage'])){
    $employee_id=$_POST['employee_id'];

    $employee=  mysqli_query($connection,"SELECT * FROM account WHERE Account_id='$employee_id'");
    $num=0;
$employee_data=  mysqli_fetch_assoc($employee);
             $num++;
             $first_name=$employee_data['First_name'];
             $last_name=$employee_data['Last_name'];
             $gender=$employee_data['Gender'];
             $age=$employee_data['Age'];
             $phone_number=$employee_data['Phone_number'];
             $email_address=$employee_data['Email_address'];
             $username=$employee_data['Username'];
             $password=$employee_data['Password'];
             $profile=$employee_data['Profile_pic'];
    ?>
        <div class="px-4 px-lg-5 row">

            <a href="manage_employee.php" class="col-2"><i class="fs-3 fa-solid fa-arrow-left"></i></a>
            <h2 class="col mx-auto fw-bold mb-0 text-center">EDIT Employee</h2>

        </div>
        <div class="row px-5 py-3 justify-content-center">
            <form class="mx-1 mx-md-4 needs-validation" method="POST" enctype="multipart/form-data"
                action="edit_employee.php" novalidate>
                <div class="col-lg">
                    <input type="hidden" name="employee_id" value="<?php echo $employee_id ?>" />
                    <div class="mb-4">
                        <div class="form-outline flex-fill mb-0 ">
                            <label for="fname" id="flab">First name:</label><br />
                            <input type="text" value="<?php echo $first_name?>" name="first_name" id="first_name"
                                class="form-control" required pattern="[A-Za-z]{3,}" oninput="myValidation(event)" />

                            <ul class="invalid-feedback" id="first_name_feedback"></ul>

                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="form-outline flex-fill mb-0 ">
                            <label for="lname" id="flab">Last name:</label><br />
                            <input type="text" value="<?php echo $last_name?>" name="last_name" id="last_name"
                                class="form-control" required pattern="[A-Za-z]{3,}" oninput="myValidation(event)" />

                            <ul class="invalid-feedback" id="last_name_feedback"></ul>

                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                        <div class="form-outline mb-0">
                            <label>Gender:</label><br />
                            <input type="radio" name="sex" class="m-1" id="sex" value="male"
                                <?php if($gender=='male'){echo "checked";}?> />Male
                            <input type="radio" name="sex" class="m-1 ms-4 " id="sex" value="female"
                                <?php if($gender=='female'){echo "checked";}?> />Female
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                        <div class="form-outline flex-fill mb-0">
                            <label>Age:</label><br />
                            <input type="number" name="age" placeholder="age" max="200" min="5"
                                value="<?php echo $age?>" class="form-control" title="Please user the correct age"
                                required />
                            <ul class="invalid-feedback">
                                <li>age must be between 5 to 200</li>
                            </ul>

                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                        <div class="form-outline flex-fill mb-0">
                            <label>Phone number:</label><br />
                            <input type="tel" name="phone_number" placeholder="Phone number" maxlength="10"
                                id="phone_number" value="<?php echo $phone_number?>" class="form-control"
                                pattern="09\d{8}" title="Please enter numbers only" required
                                oninput="myValidation(event)" />
                            <ul class="invalid-feedback" id="phone_number_feedback"></ul>
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                        <div class="form-outline flex-fill mb-0">
                            <label>Email:</label><br />
                            <input type="email" name="email_address" placeholder="Email"
                                value="<?php echo $email_address?>" id="email" class="form-control"
                                title="Please user the correct email format eg: username@gmail.com" required />
                            <ul class="invalid-feedback">
                                <li>use email format eg: username@gmail.com</li>
                            </ul>
                        </div>
                    </div>



                    <div class="d-flex flex-row align-items-center mb-4">
                        <div class="form-outline flex-fill mb-0">
                            <label>Username:</label><br />
                            <input type="text" name="username" value="<?php echo $username?>" id="username"
                                minlength="3" class="form-control" pattern="\w{4,}" required
                                oninput="myValidation(event)" />
                            <ul class="invalid-feedback" id="username_feedback"></ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label" for="fileExample">select profile picture</label>
                            <input type="file" name="image" id="fileExample" class="form-control"
                                accept="image/png, image/jpeg , image/jpg" />
                        </div>
                    </div>
                    <div class="m-3">
                        <button type="submit" name="change" class="btn btn-primary btn-lg w-100">
                            Save Changes
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <?php
    }
    ?>
    </div>
    <script src="../style/bootstrap-5.0.2-dist/js/bootstrap.js"></script>
    <script src="../js/sweetalert.min.js"></script>
    <script src="../js/validation.js"></script>

    <?php include 'footer.php';?>
</body>

</html>

<?php

if(isset($_POST['change'])){
$account_id=$_POST['employee_id'];
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$sex=$_POST['sex'];
$age=$_POST['age'];
$email_address=$_POST['email_address'];
$phone_number=$_POST['phone_number'];
$username=$_POST['username'];

$usernameCheck=  mysqli_query($connection,"SELECT * FROM account WHERE Account_id='$account_id'");
$count=  mysqli_num_rows($usernameCheck);
if($count>1){
    echo "<script>swal('ERROR','username already exist','error');</script>";
}else{
$employeeInAccount=  mysqli_fetch_assoc($usernameCheck);
    $eprofile=$employeeInAccount['Profile_pic'];
    $pfirst_name=$employeeInAccount['First_name'];
    $plast_name=$employeeInAccount['Last_name'];
    $pgender=$employeeInAccount['Gender'];
    $page=$employeeInAccount['Age'];
    $pemail_address=$employeeInAccount['Email_address'];
    $pphone_number=$employeeInAccount['Phone_number'];
    $pusername=$employeeInAccount['Username'];
                    
    $profile_pic = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        echo 'profile pic is '.$profile_pic;
    if($profile_pic==''){
    $profile_pic=$eprofile;
    }else{
    $img_explode = explode('.',$profile_pic);
    $img_ext = end($img_explode);
        $time = time();
        $profile_pic = $time.$profile_pic;
        move_uploaded_file($tmp_name,"../img/profile/".$profile_pic);
}
    $email_check=  mysqli_query($connection,"SELECT * FROM account WHERE Email_address='$email_address'");
$email_count=  mysqli_num_rows($email_check);
if($email_count>1){
    echo "<script>swal('ERROR','email address already exist','error');</script>";
}else{
$update_query="UPDATE account 
SET First_name='$first_name', Last_name='$last_name', Gender='$sex',Age='$age' , Phone_number='$phone_number', Email_address='$email_address', Username='$username', Profile_pic='$profile_pic'
WHERE Account_id='$account_id' ";

$result=  mysqli_query($connection,$update_query) or die(mysqli_error($connection));

if(!$result){
echo "<script>
swal({
    text: 'UPDATE FAILED!',
    icon: 'error',
    button: 'ok',
}).then(function(){
window.location='edit_employee.php';
});
</script>";
}else{
    $action_performer=$_SESSION['account_id'];
                      $detail= $_SESSION['account_type']." change an employee information the changed information is : ,   first name :". $pfirst_name."====> ".$first_name ."  ,   last name :". $plast_name."====> ".$last_name ."  ,   email address :". $pemail_address."====> ".$email_address."  ,   phone number :". $pphone_number."====> ".$phone_number."  ,   username :". $pusername."====> ".$username."  ,   age :". $page."====> ".$age."  ,   Gender :". $pgender."====> ".$sex;
mysqli_query($connection,"INSERT INTO log_file(Account_id,Action,Detail) VALUES ('$action_performer','Admin edit employee information','$detail')") or die(mysqli_error($connection));

           echo "<script>
swal({
    text: 'EMPLOYEE INFORMATION UPDATED SUCCESSFULY!',
    icon: 'success',
    button: 'ok',
}).then(function(){
window.location='manage_employee.php';
});
</script>";
        }

}
}



}
?>