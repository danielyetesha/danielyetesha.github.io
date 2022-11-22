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
    <h1 class="text-center fw-bold display-1">CONGRATULATION YOU ARE SUCCESSFULY RESERVE TICKET</h1>
    <div class="col-lg-6 mx-auto">
        <a href="view_ticket_history.php" class="col-3 fs-2 fw-bold mb-0 text-start"><i
                class="fa-solid fa-arrow-left"></i></a>
        <?php
session_start();
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
$schedule=  mysqli_query($connection,"SELECT * FROM schedule WHERE Schedule_id='$schedule_id'");
$schedule_data=  mysqli_fetch_assoc($schedule);
$available_seat=$schedule_data['Available_seat'];
$schedule_date=$schedule_data['Date'];
$schedule_time=$schedule_data['Time'];
$price=$schedule_data['Price'];
$movie_id=$schedule_data['Movie_id'];
$movie=  mysqli_query($connection,"SELECT * FROM movies WHERE Movie_id='$movie_id'");
$movie_data=  mysqli_fetch_assoc($movie);
$movie_title=$movie_data['Movie_title'];
$movie_type=$movie_data['Movie_title'];
$movie_length=$movie_data['Movie_length'];
$movie_posture=$movie_data['Movie_posture'];
$seats=  mysqli_query($connection,"SELECT * FROM temp_seat WHERE Payment_id='$payment_id'");
 while ($seats_data=  mysqli_fetch_assoc($seats)){
$seat_no=$seats_data['Seat_no'];
$seat=  mysqli_query($connection,"SELECT * FROM seat WHERE Seat_no='$seat_no' AND Schedule_id='$schedule_id'");
$seat_data=  mysqli_fetch_assoc($seat);
$seat_id=$seat_data['Seat_id'];
                $status=$ticket_data['Status'];
        ?>
        <div
            class="card  <?php if($status=='used'){echo 'bg-danger';}else{echo 'bg-light';}?>  justify-content-center my-4">
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
            <input class="btn btn-danger" type="button" onclick="printDiv('ticket')" value="Print Ticket" />
        </div>
        <?php
 }
?>
    </div>
</body>

</html>