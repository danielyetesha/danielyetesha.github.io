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
    <script src="../style/bootstrap-5.0.2-dist/js/bootstrap.js"></script>
    <script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
    </script>
</head>

<body>
    <?php
            include 'header_check.php';
if(!(isset($_SESSION['username']))){
        echo "<script>window.location.href='page_not_allowed.php';</script>";
    }
require "connection.php";
$ticket_id=$_GET['ticket_id'];
$ticket=  mysqli_query($connection,"SELECT * FROM ticket WHERE ticket_id='$ticket_id'") or die(mysqli_error($connection));
$ticket_data=  mysqli_fetch_assoc($ticket);
$account_id=$ticket_data['Customer_id'];
$ticket_date=$ticket_data['Date'];
$qr_code=$ticket_data['Qr_code'];
$schedule_id=$ticket_data['Schedule_id'];
$seat_id=$ticket_data['Seat_id'];
$payment_id=$ticket_data['Payment_id'];
$status=$ticket_data['Status'];
$account=  mysqli_query($connection,"SELECT * FROM account WHERE Account_id='$account_id'");
$account_data=  mysqli_fetch_assoc($account);
$name=$account_data['First_name']." ".$account_data['Last_name'];
$profile=$account_data['Profile_pic'];
$seat=  mysqli_query($connection,"SELECT * FROM seat WHERE Seat_id='$seat_id'");
$seat_data=  mysqli_fetch_assoc($seat);
$seat_no=$seat_data['Seat_no'];
$schedule=  mysqli_query($connection,"SELECT * FROM schedule WHERE Schedule_id='$schedule_id'");
$schedule_data=  mysqli_fetch_assoc($schedule);
$available_seat=$schedule_data['Available_seat'];
$schedule_date=$schedule_data['Date'];
$schedule_time=$schedule_data['Time'];
$s_status='';
$date=date("Y-m-d");
if($date>$schedule_date){
    $s_status='expired';
}else{
    $s_status='unexpired';
}
$price=$schedule_data['Price'];
$movie_id=$schedule_data['Movie_id'];
$movie=  mysqli_query($connection,"SELECT * FROM movies WHERE Movie_id='$movie_id'");
$movie_data=  mysqli_fetch_assoc($movie);
$movie_title=$movie_data['Movie_title'];
$movie_type=$movie_data['Movie_title'];
$movie_length=$movie_data['Movie_length'];
$movie_posture=$movie_data['Movie_posture'];
$style="";
if($s_status=='expired'){
    if($status=='used'){$style="background-image: linear-gradient(green, red);";}
    else{$style="background-image: linear-gradient(red, red);";}
}else{
    if($status=='used'){$style="background-image: linear-gradient(green, green);";}
}
        ?>

    <div class="container w-75">
        <div class="card   justify-content-center my-4" style="<?php echo $style; ?>">
            <div class=" row gx-4 gx-lg-5 align-items-center" id="ticket">
                <div class="col-md-6 container px-4 px-lg-5 my-2">
                    <img src="../img/movie/<?php echo $movie_posture?>" alt="..." height="250px"
                        class="card-img-top mb-5 mb-md-0">
                    <h2 class="lead fw-bolder">
                        Title : <?php echo $movie_title; ?>
                    </h2>
                    <h4>
                        Type : <?php echo $movie_type; ?>
                    </h4>
                    <h4>
                        duration : <?php echo $movie_length; ?>
                    </h4>
                </div>
                <div class="col-md-6">
                    <img src='../img/profile/<?php echo $profile;?>' class='rounded-circle display-inline' width='70px'
                        height='70px' alt='pic' />
                    <h4 class="display-inline"> <?php echo $name; ?></h4>
                    <h4>
                        Schedule date : <?php echo $schedule_date; ?>
                    </h4>
                    <h4>
                        Schedule time : <?php echo $schedule_time; ?>
                    </h4>
                    <h4>
                        price : <?php echo $price; ?>
                    </h4>
                    <h4>
                        ticket date : <?php echo $ticket_date; ?>
                    </h4>
                    <h3 class="text-primary">
                        Ticket Number : <?php echo $qr_code; ?>
                    </h3>
                    <h4>Seat number : <?php echo $seat_no?></h4>
                </div>
            </div>
            <?php 
            if($s_status=='expired'){
                if($status=='used'){
            ?>
            <input class="btn btn-secondary" type="button" value="Used Ticket In Previous Schedule" />
            <?php
                }else{?>
            <input class="btn btn-secondary" type="button" value="Unused Ticket for Passed Schedule" />
            <?php
                }
            }else{
                if($status=='unused'){
                ?>
            <input class="btn btn-danger" type="button" onclick="printDiv('ticket')" value="Print Ticket" />
            <?php
                }else{
                ?>
            <input class="btn btn-secondary" type="button" value="Ticket already checked" />
            <?php
                }}?>

        </div>
    </div>
    </div>
</body>

</html>