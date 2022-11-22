<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/bootstrap-5.0.2-dist/css/bootstrap.css" />
    <link rel="stylesheet" href="../style/fontawesome-free-6.1.1-web/css/all.css" />
    <script src="../style/bootstrap-5.0.2-dist/js/bootstrap.js"></script>
    <title>Gondar cinema</title>
</head>

<body>
    <?php
    include 'header_check.php';
if(!(isset($_SESSION['username'])&&($_SESSION['account_type']=='admin'))){
        echo "<script>window.location.href='page_not_allowed.php';</script>";
    }
    ?>
    <?php
include 'connection.php';
 

if(isset($_POST['activate'])){
    $employee_id=$_POST['employee_id'];
 $update_query="UPDATE employee SET Status='active',Request='0' WHERE Employee_id='$employee_id' ";
$result=  mysqli_query($connection,$update_query) or die(mysqli_error($connection));
if($result){
                        echo "
                    <script>
                    swal('good job','EMPLOYEE ACTIVATED SUCCESSFULY','success');
                    </script>
                    ";
    $action_performer=$_SESSION['account_id'];
    $detail= $_SESSION['account_type']."(".$_SESSION['username'].") change employee id ".$employee_id." status to active";
    mysqli_query($connection,"INSERT INTO log_file(Account_id,Action,Detail) VALUES ('$action_performer','Admin activate an employee','$detail')") or die(mysqli_error($connection));
}

}
if(isset($_POST['deactivate'])){
    $employee_id=$_POST['employee_id'];
$update_query="UPDATE employee SET Status='disable' WHERE Employee_id='$employee_id' ";
$result=  mysqli_query($connection,$update_query) or die(mysqli_error($connection));
if($result){
                        echo "
                    <script>
                    swal('good job','EMPLOYEE DEACTIVATED SUCCESSFULY','success');
                    </script>
                    ";
$action_performer=$_SESSION['account_id'];
$detail= $_SESSION['account_type']."(".$_SESSION['username'].") change employee id ".$employee_id." status to deactive";
mysqli_query($connection,"INSERT INTO log_file(Account_id,Action,Detail) VALUES ('$action_performer','Admin deactivate an employee','$detail')") or die(mysqli_error($connection));
}
}
 
?>
    <div class="p-2">
        <h1 class="m-3 text-center" style="font-weight: bold;">MANAGE EMPLOYEE</h1>

        <div class="m-3 text-center">
            <a href="add_employee.php"> <button class="btn btn-lg btn-primary" data-bs-toggle="modal"
                    data-bs-target="#add_employee"> <i class="fa-solid fa-plus"></i> Add Employee</button></a>
        </div>

        <div class="p-3" id="no-more-tables">

            <table class="table table-striped" id="datatablesSimple">
                <thead class="table-dark">
                    <th scope="col">NO</th>
                    <th scope="col">PP</th>
                    <th scope="col">FIRST NAME</th>
                    <th scope="col">LAST NAME</th>
                    <th scope="col">EMAIL ADDRESS</th>
                    <th scope="col">USERNAME</th>
                    <th scope="col">STATUS</th>
                    <th scope="col" class="text-center">MANAGE</th>
                    <th scope="col" class="text-center">Password</th>
                    <th scope="col">Request for approval</th>

                </thead>
                <tbody class="table-light">
                    <?php
                    $employes=  mysqli_query($connection,"SELECT * FROM employee");
                    $num=0;
                     if(mysqli_num_rows($employes)>0){
        while ($employee_data=  mysqli_fetch_assoc($employes)){
             $num++;
             $employee_id=$employee_data['Employee_id'];
             $employee_status=$employee_data['Status'];
             $request=$employee_data['Request'];
             $findEmployeeInAccount=  mysqli_query($connection,"SELECT * FROM account WHERE Account_id='$employee_id'");
              if(mysqli_num_rows($findEmployeeInAccount)>0){
        $employeeInAccount=  mysqli_fetch_assoc($findEmployeeInAccount);
            $pp=$employeeInAccount['Profile_pic'];
            $first_name=$employeeInAccount['First_name'];
            $last_name=$employeeInAccount['Last_name'];
            $email_address=$employeeInAccount['Email_address'];
            $username=$employeeInAccount['Username'];
            $password=$employeeInAccount['Password'];
            
     ?>
                    <tr>
                        <th data-title="NO"><?php echo $num; ?></th>
                        <td data-title="Profile picture"><?php echo "<img src='../img/profile/$pp' class='rounded-circle'
                                width='40px' height='40px' alt='pic' />"; ?></td>
                        <td data-title="First name"><?php echo $first_name; ?></td>
                        <td data-title="Last name"><?php echo $last_name; ?></td>
                        <td data-title="Email address"><?php echo $email_address; ?></td>
                        <td data-title="Username"><?php echo $username; ?></td>
                        <td data-title="Status"><?php 
                        if($employee_status=='active'){
                            ?>
                            <form action="manage_employee.php" method="POST" style="display: inline">
                                <input type="hidden" name="employee_id" value="<?php echo $employee_id ?>" />
                                <input type="submit" value="active" name="deactivate" class="btn btn-success btn-sm"
                                    onclick="return confirm('are you sure you want to deactivate this employee')"
                                    style="border-radius:50%;" />
                            </form>
                            <?php

                        }else{
                            ?>
                            <form action="manage_employee.php" method="POST" style="display: inline">
                                <input type="hidden" name="employee_id" value="<?php echo $employee_id ?>" />
                                <input type="submit" value="deactivated" name="activate" class="btn btn-danger btn-sm "
                                    onclick="return confirm('are you sure you want to activate the employee')"
                                    style="border-radius:50%;" />
                            </form>
                            <?php
                        }?>
                        </td>
                        <td data-title="Edit">
                            <form action="edit_employee.php" method="POST" style="display: inline">
                                <input type="hidden" name="employee_id" value="<?php echo $employee_id ?>" />
                                <input type="submit" value="manage" name="manage" class="btn btn-primary" />
                            </form>
                        </td>
                        <td data-title="Reset">
                            <!-- Button trigger modal -->
                            <form action="manage_employee.php" method="POST" style="display: inline">
                                <input type="hidden" name="employee_id" value="<?php echo $employee_id; ?>" />
                                <button type="submit" name="Reset" class="btn"
                                    onclick="return confirm('are you sure you want to reset to the default password')">
                                    Reset
                                </button>
                            </form>

                        </td>
                        <td data-title="Status"><?php 
                        if($request==1){
                    echo "requested";
                        }else{
                            echo '-';
                        }?>
                        </td>
                    </tr>

                    <?php
              }else{
                          echo "<h1 class='text-warning'> Employee account information does not found</h1>";
            }
        }
        }
        else{
            echo "<h1 class='text-warning'> Employee does not found</h1>";
        }
?>

                </tbody>
            </table>
        </div>
    </div>

    <script src="../js/sweetalert.min.js"></script>

    <?php include 'footer.php';?>
</body>

</html>
<?php
if(isset($_POST['Reset'])){
$employee_id=$_POST['employee_id'];
$default_password='change_me';
$password=password_hash($default_password, PASSWORD_DEFAULT); 
$delete_employee= mysqli_query($connection,"UPDATE account SET Password='$password' WHERE Account_id='$employee_id'") or die(mysqli_error($connection));
if($delete_employee){
    $action_performer=$_SESSION['account_id'];
$detail= $_SESSION['account_type']."(".$_SESSION['username'].") reset the password on an employee id = ".$employee_id;
mysqli_query($connection,"INSERT INTO log_file(Account_id,Action,Detail) VALUES ('$action_performer','Admin reset employee password','$detail')") or die(mysqli_error($connection));

echo "<script>
swal({
    text: 'employee password was reset!',
    icon: 'success',
    button: 'ok',
});
</script>";
}
else{
echo " <script>
swal('error','process failed!', 'error');
</script>";
}
}
?>