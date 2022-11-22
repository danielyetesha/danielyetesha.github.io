<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    body {
        background-image: url(../img/cinema_background.jpg);
        background-size: cover;
        background-position: center;
    }
    </style>
    <title>Gondar cinema</title>
    <script src="../style/bootstrap-5.0.2-dist/js/bootstrap.js"></script>
</head>

<body>
    <div class="container text-white text-center p-3" style="text-transform: uppercase; height:500px;">
        <h1>HELLO <?php echo $_SESSION['username']?></h1>
        <h1 style="text-transform: uppercase; font-weight: bold; font-size:50px;" class="py-5">WELCOME TO GONDAR
            CINEMA</h1>
        <a href="<?php 
        if($_SESSION['account_type']=='admin'){
                echo 'admin';
            }elseif ($_SESSION['account_type']=='employee') {
                $account_id=$_SESSION['account_id'];
                $query1="select * from employee where Employee_id='$account_id'";
                    $result1 = mysqli_query($connection,$query1);
                    $data1=  mysqli_fetch_assoc($result1);
                    $role=$data1['Role'];
                    if($role=='normal'){
                        echo 'employee';
                    }else if($role=='ticket_checker'){
                         echo 'ticket_checker';
                    }
            }elseif ($_SESSION['account_type']=='customer') {
                echo 'customer';
            }?>_home.php">
            <button class="btn btn-primary p-3 fs-2">START ACTION</button>
        </a>

    </div>
</body>

</html>