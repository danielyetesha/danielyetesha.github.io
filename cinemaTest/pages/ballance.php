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
    include 'header_check.php';
if(!(isset($_SESSION['username'])&&($_SESSION['account_type']=='customer'))){
        echo "<script>window.location.href='page_not_allowed.php';</script>";
    }
    ?>
    <?php
    $account_id=$_SESSION['account_id'];
    $customer=  mysqli_query($connection,"SELECT * FROM customer Where Customer_id='$account_id'");
    $num=0;
    if(mysqli_num_rows($customer)==1){
        $customer_data=  mysqli_fetch_assoc($customer);
        $balance=$customer_data['Balance'];
                ?>

    <div class="row gx-4 gx-lg-5 align-items-center">
        <div class="col-auto">
            <img src="../img/dolar.gif" alt="..." height="350px" width="200px" class="card-img-top m-5 mb-md-0">
        </div>
        <div class="col">
            <h1 class="display-1 fw-bolder text-primary text-center">
                BALANCE
            </h1>
            <h2 class="display-2 fw-bold text-center text-success">
                <?php echo $balance; ?>. Birr
            </h2>
            <div class="col d-flex align-item-center justify-content-center mt-5">
                <a href="recharge_page.php" class=" btn btn-warning p-4 rounded-circle">
                    <i class="fa-solid fa-circle-dollar"></i>
                    Recharge
                </a>
            </div>

        </div>
    </div>
    <?php
    }else{
    echo "<h1 class='text-warning'> Customer does not found</h1>";

    }
    ?>
</body>

</html>