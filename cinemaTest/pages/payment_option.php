<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gondar Cinema</title>
    <link rel="stylesheet" href="../style/bootstrap-5.0.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../style/fontawesome-free-6.1.1-web/css/all.css" />
    <link rel="stylesheet" href="../style/payment_form.css">
    <script>
    document.querySelector(function() {
        document.querySelector('[data-toggle="tooltip"]').tooltip()
    })
    </script>
</head>

<body>
    <div class="container py-5">
        <!-- For demo purpose -->
        <div class="row mb-4">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-6">Payment Description</h1>
            </div>
        </div> <!-- End -->
        <?php 
session_start();
require "connection.php";
        if(isset($_POST['reserve'])){
            if(!isset($_SESSION["username"])){
    echo "<script>alert('You must be Loged In first!')</script>";
	echo "<script>window.location='login_user.php';</script>"; 
 
}else if(!($_SESSION["account_type"]=='customer')){
echo "<script>alert('you are not a customer first you must login as a customer!')</script>";
	echo "<script>window.location='index.php';</script>";
}
 else { 
   include './Connection.php';
   $result=0;
        if(!empty($_POST['check_list'])) {
$count=0;
    foreach($_POST['check_list'] as $check) {
          $result .= $check.','; 
          $count++;
    }
        $account_id=$_SESSION['account_id'];
 $price=$_POST['price'];
 $total_price=$_POST['price']*$count;
 $schedule_id=$_POST['schedule_id'];
 $schedule=mysqli_query($connection,"SELECT * FROM schedule WHERE Schedule_id='$schedule_id'");
 $schedule_data = mysqli_fetch_assoc($schedule);
 $movie_id=$schedule_data['Movie_id'];
 $date=$schedule_data['Date'];
 $time=$schedule_data['Time'];
 $movie=mysqli_query($connection,"SELECT * FROM movies WHERE Movie_id='$movie_id'");
 $movie_data = mysqli_fetch_assoc($movie);
 $movie_title=$movie_data['Movie_title'];
 $movie_posture=$movie_data['Movie_posture'];
$movie_type=$movie_data['Movie_type'];
$movie_length=$movie_data['Movie_length'];
    ?>
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card ">
                    <div id="credit-card" class="tab-pane fade show active pt-3">
                        <div class="container px-4 px-lg-5 my-2">
                            <div class="row gx-4 gx-lg-5 align-items-center">
                                <div class="col-md-6">
                                    <img src="../img/movie/<?php echo $movie_posture?>" alt="..." height="250px"
                                        class="card-img-top mb-5 mb-md-0">
                                    <p class="lead fw-bolder">
                                        Title : <?php echo $movie_title; ?>
                                    </p>
                                    <p class="lead">
                                        Type : <?php echo $movie_type; ?>
                                    </p>
                                    <p class="lead">
                                        duration : <?php echo $movie_length; ?>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="lead">
                                        Schedule date : <?php echo $date; ?>
                                    </p>
                                    <p class="lead">
                                        Schedule time : <?php echo $time; ?>
                                    </p>
                                    <p class="lead">
                                        Unit price : <?php echo $price; ?>
                                    </p>
                                    <p class="lead">
                                        number of Seat : <?php echo $count; ?>
                                    </p>
                                    <p>
                                        Total price : <?php echo $total_price; ?>
                                    </p>
                                    <p class="lead">Seat number : <?php echo $result?></p>
                                </div>
                                <form action="pay.php" method="POST">
                                    <?php foreach($_POST['check_list'] as $seat) {?>
                                    <input type="hidden" name="seat[]" value="<?php echo $seat ?>" />
                                    <?php } ?>
                                    <input type="hidden" name="movie_title" value="<?php echo $movie_title ?>" />
                                    <input type="hidden" name="schedule_id" value="<?php echo $schedule_id ?>" />
                                    <input type="hidden" name="price" id="price" value="<?php echo $price ?>" />
                                    <input type="hidden" name="count" value="<?php echo $count ?>" />
                                    <input type="hidden" name="DeliveryFee" value="0" />
                                    <input type="hidden" name="Discount" value="0" />
                                    <input type="hidden" name="Tax1" value="0" />
                                    <input type="hidden" name="Tax2" value="0" />
                                    <input type="hidden" name="HandlingFee" value="0" />
                                    <button class="btn btn-primary mx-1 my-3 w-100" type="submit" name="pay_for_seat">
                                        <img src="../img/yenepaylogo.png" alt="" width='100px' height='30px'
                                            class="m-0 p-0"> Pay With
                                        YenePay</i>
                                    </button>
                                </form>
                                <form action="pay_with_balance.php" method="POST">
                                    <?php foreach($_POST['check_list'] as $seat) {?>
                                    <input type="hidden" name="seat[]" value="<?php echo $seat ?>" />
                                    <?php } ?>
                                    <input type="hidden" name="schedule_id" value="<?php echo $schedule_id ?>" />
                                    <input type="hidden" name="price" id="price" value="<?php echo $price ?>" />
                                    <input type="hidden" name="count" value="<?php echo $count ?>" />
                                    <button class="btn btn-danger mx-1 my-3 w-100" type="submit"
                                        onclick="return confirm('are you sure you want to pay this fee and get a cupon')"
                                        name="pay_with_balance">
                                        Pay With Your Cinema Balance</i>
                                    </button>
                                </form>
                                <form>
                                    <button value="Go back!" class="btn btn-secondary mx-1 my-3 w-100"
                                        onclick="history.back()"> Go Back!</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        
}else{
            echo "<script>alert('check list is empty!')</script>";
            echo "<script>window.location='seats.php?schedule_id=".$_POST['schedule_id']."&price=".$_POST['price']."';</script>"; 
            
}
}}?>
    </div>
</body>

</html>