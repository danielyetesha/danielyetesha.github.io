<?php
include 'connection.php';
 

if(isset($_POST['activate'])){
    $customer_id=$_POST['customer_id'];

             $update_query="UPDATE customer SET Status='active' WHERE Customer_id='$customer_id' ";

$result=  mysqli_query($connection,$update_query) or die(mysqli_error($connection));
}
if(isset($_POST['deactivate'])){
    $customer_id=$_POST['customer_id'];

             $update_query="UPDATE customer SET Status='disable' WHERE Customer_id='$customer_id' ";

$result=  mysqli_query($connection,$update_query) or die(mysqli_error($connection));
}
 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gondar cinema</title>
    <script src="../style/bootstrap-5.0.2-dist/js/bootstrap.js"></script>
    <script>

    </script>
</head>

<body>
    <?php
    include 'header_check.php';
if(!(isset($_SESSION['username'])&&($_SESSION['account_type']=='admin'))){
        echo "<script>window.location.href='page_not_allowed.php';</script>";
    }
    ?>
    <div class="">
        <div class="p-3" id="no-more-tables">

            <table class="table table-striped" id="datatablesSimple">
                <thead class="table-dark">
                    <th>NO</th>
                    <th>PP</th>
                    <th>FIRST NAME</th>
                    <th>LAST NAME</th>
                    <th>SEX</th>
                    <th>PHONE NUMBER</th>
                    <th>EMAIL ADDRESS</th>
                    <th>BALLANCE</th>
                    <th>USERNAME</th>
                    <th>STATUS</th>
                </thead>
                <tbody class="table-light">
                    <?php
                    $customers=  mysqli_query($connection,"SELECT * FROM customer");
                    $num=0;
                    if(mysqli_num_rows($customers)>0){
                        while ($customer_data=  mysqli_fetch_assoc($customers)){
                            $num++;
                            $customer_id=$customer_data['Customer_id'];
                            $customer_status=$customer_data['Status'];
                            $balance=$customer_data['Balance'];
                            $findCustomerInAccount=  mysqli_query($connection,"SELECT * FROM account WHERE Account_id='$customer_id'");
                            if(mysqli_num_rows($findCustomerInAccount)>0){
                                $customerInAccount=  mysqli_fetch_assoc($findCustomerInAccount);
                                $first_name=$customerInAccount['First_name'];
                                $last_name=$customerInAccount['Last_name'];
                                $gender=$customerInAccount['Gender'];
                                $phone_number=$customerInAccount['Phone_number'];
                                $email_address=$customerInAccount['Email_address'];
                                $username=$customerInAccount['Username'];
                                $pp=$customerInAccount['Profile_pic'];
                                
                                ?>
                    <tr>
                        <th data-title="NO"><?php echo $num; ?></th>
                        <td data-title="Profile picture"><?php echo "<img src='../img/profile/$pp' class='rounded-circle'
                                width='40px' height='40px' alt='pic' />"; ?></td>
                        <td data-title="First name"><?php echo $first_name; ?></td>
                        <td data-title="Last name"><?php echo $last_name; ?></td>
                        <td data-title="Gender"><?php echo $gender; ?></td>
                        <td data-title="Phone number"><?php echo $phone_number; ?></td>
                        <td data-title="Email address"><?php echo $email_address; ?></td>
                        <td data-title="Balance"><?php echo $balance; ?></td>
                        <td data-title="Username"><?php echo $username; ?></td>
                        <td data-title="Status"><?php 
                        if($customer_status=='active'){
                            ?>
                            <form action="view_customer.php" method="POST" style="display: inline">
                                <input type="hidden" name="customer_id" value="<?php echo $customer_id ?>" />
                                <input type="submit" value="active" name="deactivate" class="btn btn-success btn-sm"
                                    style="border-radius:50%;" />
                            </form>
                            <?php

                        }else{
                            ?>
                            <form action="view_customer.php" method="POST" style="display: inline">
                                <input type="hidden" name="customer_id" value="<?php echo $customer_id ?>" />
                                <input type="submit" value="deactivated" name="activate" class="btn btn-danger btn-sm "
                                    style="border-radius:50%;" />
                            </form>
                            <?php
                        }?>
                        </td>
                    </tr>

                    <?php
              }else{
                  echo "<h1 class='text-warning'> customer account information does not found</h1>";
                }
        }
    }
    else{
        echo "<h1 class='text-warning'> customer does not found</h1>";
    }
    ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php include 'footer.php';?>
</body>

</html>