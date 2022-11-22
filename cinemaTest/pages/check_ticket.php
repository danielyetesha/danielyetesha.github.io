<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gondar Cinema</title>
    <link rel="stylesheet" href="../style/search_bar.css">

    <script src="../style/bootstrap-5.0.2-dist/js/bootstrap.js"></script>

</head>

<body>
    <?php
    include 'header_check.php';
if(!(isset($_SESSION['username'])&&($_SESSION['account_type']=='employee'))){
        echo "<script>window.location.href='page_not_allowed.php';</script>";
    }
    require "connection.php";
$schedule_id=$_GET['schedule_id'];
$schedule=  mysqli_query($connection,"SELECT * FROM schedule WHERE Schedule_id='$schedule_id'") or die(mysqli_error($connection));
$schedule_date=  mysqli_fetch_assoc($schedule);
$movie_id=$schedule_date['Movie_id'];
$movie=  mysqli_query($connection,"SELECT * FROM movies WHERE Movie_id='$movie_id'") or die(mysqli_error($connection));
$movie_data=  mysqli_fetch_assoc($movie);
$movie_title=$movie_data['Movie_title'];
    ?>
    <div class="p-2">
        <h1 class="m-3 text-center" style="font-weight: bold;text-transform: uppercase;">SEARCH TICKET FOR
            <?php echo $movie_title?> MOVIE
        </h1>
        <div class="p-3">
            <div class="container h-100">
                <div class="d-flex justify-content-center h-100">
                    <form class="searchbar" method="GET">
                        <input class="search_input" type="text" name="ticket_no" placeholder="Search...">
                        <input class="search_input" type="hidden" name="schedule_id" value="<?php echo $schedule_id?>"
                            placeholder="Search...">
                        <button type="submit" name="search" class="search_icon"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <div>
            <?php
            if(isset($_GET['ticket_no'])){
                $ticket_no=$_GET['ticket_no'];
                $schedule_id=$_GET['schedule_id'];
                $ticket=  mysqli_query($connection,"SELECT * FROM ticket WHERE Qr_code='$ticket_no' AND Schedule_id='$schedule_id'") or die(mysqli_error($connection));
                if(mysqli_num_rows($ticket) > 0){
                $ticket_data=  mysqli_fetch_assoc($ticket);
                $account_id=$ticket_data['Customer_id'];
                $ticket_date=$ticket_data['Date'];
                $ticket_id=$ticket_data['Ticket_id'];
                $seat_id=$ticket_data['Seat_id'];
                $payment_id=$ticket_data['Payment_id'];
                $status=$ticket_data['Status'];
                $seat=  mysqli_query($connection,"SELECT * FROM seat WHERE Seat_id='$seat_id'");
$seat_data=  mysqli_fetch_assoc($seat);
$seat_no=$seat_data['Seat_no'];
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
        ?>
            <div class="container w-75">
                <div
                    class="card <?php if($status=='used'){echo 'bg-danger';}else{echo 'bg-light';}?> justify-content-center my-4">
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
                                Ticket Number : <?php echo $ticket_no; ?>
                            </h3>
                            <h4>Seat number : <?php echo $seat_no?></h4>
                        </div>
                    </div>
                    <?php if($status=='unused'){ ?>
                    <form method="GET">
                        <input type="hidden" name="ticket_no" value="<?php echo $ticket_no?>">
                        <input type="hidden" name="schedule_id" value="<?php echo $schedule_id?>">
                        <button type="submit" class="btn btn-success w-100" name="check">CHECK IT</button>
                    </form>
                    <?php
                    }else if($status=='used'){
                        ?>
                    <button type="submit" class="btn btn-secondary w-100" name="check">ALREADY CHECKED</button>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <?php
                }else{
                    echo '<h1 class="text-center text-danger">invalid ticket number</h1>';
                }
            }else{
                echo '<h1 class="text-center">please enter the ticket number on the search bar</h1>';
            }
            ?>
        </div>
    </div>

</body>

</html>
<?php

include 'connection.php';
 
if(isset($_GET['check'])){
    $ticket_no=$_GET['ticket_no'];
    $schedule_id=$_GET['schedule_id'];
             $update_query="UPDATE ticket SET Status='used' WHERE Qr_code='$ticket_no' AND Schedule_id='$schedule_id' ";
$result=  mysqli_query($connection,$update_query) or die(mysqli_error($connection));
$action_performer=$_SESSION['account_id'];
$detail= $_SESSION['account_type']."(".$_SESSION['username'].") check a customer ticket. the ticket number is ".$ticket_no;
mysqli_query($connection,"INSERT INTO log_file(Account_id,Action,Detail) VALUES ('$action_performer','ticket checker check customer ticket','$detail')") or die(mysqli_error($connection));

}
?>