<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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

    <div class="container rounded bg-white py-5">
        <?php
    $account_id=$_SESSION['account_id'];

    $account=  mysqli_query($connection,"SELECT * FROM account WHERE Account_id='$account_id'");
$account_data=  mysqli_fetch_assoc($account);
             $first_name=$account_data['First_name'];
             $last_name=$account_data['Last_name'];
             $gender=$account_data['Gender'];
             $age=$account_data['Age'];
             $phone_number=$account_data['Phone_number'];
             $email_address=$account_data['Email_address'];
             $username=$account_data['Username'];
             $password=$account_data['Password'];
             $profile=$account_data['Profile_pic'];
    ?>
        <form class="needs-validation" enctype="multipart/form-data" method="POST" action="edit_profile.php" novalidate>
            <div class="row">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <img class="rounded-circle mt-5" id="profileDisplay" width="150px"
                            src="../img/profile/<?php echo $profile?>" onclick="triggerClick()">
                        <input type="file" name="image" id="profileImage" onchange="displayImage(this)"
                            style="display:none;">
                        <span class="font-weight-bold"><?php echo $username?></span>
                        <span class="text-black-50"><?php echo $email_address?></span>
                        <div class="mt-5 text-center">
                            <a class="btn btn-primary profile-button" href="change_password.php">Change Password</a>
                        </div>
                    </div>
                </div>
                <div class="col-md border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile Settings</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">First Name</label>
                                <input type="text" name="first_name" class="form-control" placeholder="First name"
                                    required pattern="[A-Za-z]{3,}" oninput="myValidation(event)"
                                    value="<?php echo $first_name?>">
                                <ul class="invalid-feedback" id="first_name_feedback"></ul>
                            </div>
                            <div class="col-md-6"><label class="labels">Last Name</label>
                                <input type="text" name="last_name" class="form-control" placeholder="First name"
                                    required pattern="[A-Za-z]{3,}" oninput="myValidation(event)"
                                    value="<?php echo $last_name?>">
                                <ul class="invalid-feedback" id="last_name_feedback"></ul>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Mobile Number</label>
                                <input type="tel" name="phone_number" placeholder="Phone number" maxlength="10"
                                    id="phone_number" class="form-control" pattern="09\d{8}"
                                    title="Please enter numbers only" value="<?php echo $phone_number?>" required
                                    oninput="myValidation(event)">
                                <ul class="invalid-feedback" id="phone_number_feedback"></ul>
                            </div>
                            <div class="col-md-12"><label class="labels">Age</label>
                                <input type="number" name="age" placeholder="age" max="200" min="5"
                                    value="<?php echo $age?>" class="form-control" title="Please user the correct age"
                                    required />
                                <ul class="invalid-feedback">
                                    <li>age must be between 5 to 200</li>
                                </ul>
                            </div>

                            <div class="col-md-12">
                                <label>Gender:</label><br />
                                <input type="radio" name="sex" class="m-1" id="sex" value="male"
                                    <?php if($gender=='male'){echo "checked";}?> />Male
                                <input type="radio" name="sex" class="m-1 ms-4 " id="sex" value="female"
                                    <?php if($gender=='female'){echo "checked";}?> />Female
                            </div>
                            <div class="col-md-12"><label class="labels">Email Address</label>
                                <input type="email" name="email_address" placeholder="Email" id="email"
                                    class="form-control" value="<?php echo $email_address?>"
                                    title="Please user the correct email format eg: username@gmail.com" required
                                    value="">
                                <ul class="invalid-feedback">
                                    <li>use email format eg: username@gmail.com</li>
                                </ul>
                            </div>
                            <div class="col-md-12"><label class="labels">Username</label>
                                <input type="text" name="username" value="<?php echo $username?>" placeholder="Username"
                                    id="username" minlength="3" class="form-control" pattern="\w{4,}" required
                                    oninput="myValidation(event)" value="">
                                <ul class="invalid-feedback" id="username_feedback"></ul>
                            </div>

                        </div>
                        <div class="mt-5 text-center"><button type="submit" class="btn btn-primary profile-button"
                                type="button" name="change_profile">Save
                                Profile</button></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    </div>
    </div>

    <?php include 'footer.php';?>
    <script src="../js/validation.js"></script>
    <script>
    function displayImage(e) {
        document.getElementById("profileDisplay").src = URL.createObjectURL(profileImage.files[0]);
    }

    function triggerClick() {
        document.querySelector('#profileImage').click();
    }
    </script>
</body>

</html>

<?php

if(isset($_POST['change_profile'])){
$account_id=$_SESSION['account_id'];
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$sex=$_POST['sex'];
$age=$_POST['age'];
$email_address=$_POST['email_address'];
$phone_number=$_POST['phone_number'];
$username=$_POST['username'];
$profile_pic=$_POST['profile_pic'];


$usernameCheck=  mysqli_query($connection,"SELECT * FROM account WHERE Username='$username'");
$count=  mysqli_num_rows($usernameCheck);
$fetch = mysqli_fetch_assoc($usernameCheck);
$proPro=$fetch['Profile_pic'];
$pfirst_name=$fetch['First_name'];
$plast_name=$fetch['Last_name'];
$pgender=$fetch['Gender'];
$page=$fetch['Age'];
$pemail_address=$fetch['Email_address'];
$pphone_number=$fetch['Phone_number'];
$pusername=$fetch['Username'];
if($count>1){
    echo "<script>swal('ERROR','username already exist','error');</script>";
}else{
    $email_check=  mysqli_query($connection,"SELECT * FROM account WHERE Email_address='$email_address'");
$email_count=  mysqli_num_rows($email_check);
if($email_count>1){
    echo "<script>swal('ERROR','email address already exist','error');</script>";
}else{
if(isset($_FILES['image'])){
$img_name = $_FILES['image']['name'];
$tmp_name = $_FILES['image']['tmp_name'];

$img_explode = explode('.',$img_name);
$img_ext = end($img_explode);
$time = time();
$new_img_name = $time.$img_name;
move_uploaded_file($tmp_name,"../img/profile/".$new_img_name);
$update_query="UPDATE account 
SET First_name='$first_name', Last_name='$last_name', Gender='$sex',Age='$age' , Phone_number='$phone_number', Email_address='$email_address', Username='$username',Profile_pic='$new_img_name'
WHERE Account_id='$account_id' ";

$result=  mysqli_query($connection,$update_query) or die(mysqli_error($connection));

if(!$result){
echo "<script>
swal({
    text: 'UPDATE FAILED!',
    icon: 'error',
    button: 'ok',
}).then(function(){
window.location='edit_profile.php';
});
</script>";
}else{
    $action_performer=$_SESSION['account_id'];
                      $detail= $username." change his profile information to : ,   first name :". $pfirst_name."====> ".$first_name ."  ,   last name :". $plast_name."====> ".$last_name ."  ,   email address :". $pemail_address."====> ".$email_address."  ,   phone number :". $pphone_number."====> ".$phone_number."  ,   username :". $pusername."====> ".$username."  ,   age :". $page."====> ".$age."  ,   Gender :". $pgender."====> ".$sex;
mysqli_query($connection,"INSERT INTO log_file(Account_id,Action,Detail) VALUES ('$action_performer','User edit profile information','$detail')") or die(mysqli_error($connection)) or die(mysqli_error($connection));
$_SESSION['username'] = $username;
                $_SESSION['profile_pic']=$new_img_name;
                $_SESSION['email']=$email_address;

           echo "<script>
swal({
    text: 'ACCOUNT EDITED SUCCESSFULY!',
    icon: 'success',
    button: 'ok',
}).then(function(){
window.location='index.php';
});
</script>";
}
}

else{
        echo "<script>swal('ERROR','Please upload an image file - jpeg, png, jpg!','warning');</script>";                          
    }
}
}
}
?>