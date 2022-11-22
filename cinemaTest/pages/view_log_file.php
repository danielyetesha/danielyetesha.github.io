<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gondar cinema</title>
    <link rel="stylesheet" href="../style/accordion.css">
    <script src="../style/bootstrap-5.0.2-dist/js/bootstrap.js"></script>

</head>

<body>
    <?php
    include 'header_check.php';
if(!(isset($_SESSION['username'])&&($_SESSION['account_type']=='admin'))){
        echo "<script>window.location.href='page_not_allowed.php';</script>";
    }
    ?>
    <h1>Log file</h1>
    <div class="container row justify-content-center">
        <a href="view_log_file.php?account_type=customer" class="btn btn-success col p-3 text-white mx-3">Customer</a>
        <a href="view_log_file.php?account_type=employee" class="btn btn-success col p-3 text-white mx-3">Employee</a>
        <a href="view_log_file.php?account_type=admin" class="btn btn-success col p-3 text-white mx-3">Admin</a>
    </div>
    <div class="accordion">
        <table class="table table-striped" id="datatablesSimple">
            <?php
                    $log_file=  mysqli_query($connection,"SELECT * FROM log_file");
                    $num=0;
                    if(mysqli_num_rows($log_file)>0){
                        while ($log_file_data=  mysqli_fetch_assoc($log_file)){
                            $account_id=$log_file_data['Account_id'];
                            $account=  mysqli_query($connection,"SELECT * FROM account WHERE Account_id='$account_id'");
                            $account_data=  mysqli_fetch_assoc($account);
                            $account_type=$account_data['Account_type'];
                            if((isset($_GET['account_type']))&&(!($account_type==$_GET['account_type']))){continue;}
                            $num++;
                            $log_id=$log_file_data['Log_id'];
                            $action=$log_file_data['Action'];
                            $date_time=$log_file_data['Date_time'];
                            $detail=$log_file_data['Detail'];
                            $name= $account_data['First_name']." ".$account_data['Last_name'];
                            $profile=$account_data['Profile_pic'];
                                ?>
            <tr>
                <div class="accordion-item">
                    <div class="accordion-item-header">
                        <h5 class="col-1"><?php echo "<img src='../img/profile/$profile' class='rounded-circle'
                                width='40px' height='40px' alt='pic' />"; ?></h5>
                        <h5 class="col-3"><?php echo $name; ?></h5>
                        <h5 class="col-3"><?php echo $date_time; ?></h5>
                        <h5 class="col"><?php echo $action; ?></h5>
                    </div>
                    <div class="accordion-item-body">
                        <div class="accordion-item-body-content">
                            <h5><?php echo $detail;?> </h5>
                        </div>
                    </div>
                </div>
            </tr>
            <?php
             
        }
    }
    else{
        echo "<h1 class='text-warning'> there is no logged file</h1>";
    }
    ?>
        </table>
    </div>
    <?php include 'footer.php';?>
    <script src="../js/accordion.js"></script>

</body>

</html>