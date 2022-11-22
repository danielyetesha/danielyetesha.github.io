<?php
 
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../style/bootstrap-5.0.2-dist/js/bootstrap.js"></script>
    <title>Gondar cinema</title>
</head>

<body>
    <?php
    include 'header_check.php';
if(!(isset($_SESSION['username'])&&($_SESSION['account_type']=='customer'))){
        echo "<script>window.location.href='page_not_allowed.php';</script>";
    }
    ?>
    <div>
        <div class="p-2">
            <h1 class="m-3 text-center" style="font-weight: bold; font-size:30px;">SEEN MOVIES</h1>
        </div>
        <div class="container row justify-content-around">
            <a href="view_ticket_history.php?status=unexpired"
                class="btn btn-success col-3 p-1 text-white ">Unexpired</a>
            <a href="view_ticket_history.php?status=expired" class="btn btn-danger col-3 p-1 text-white">Expired</a>
        </div>
        <?php if(isset($_GET['status'])&&($_GET['status']=='unexpired')){
            ?>
        <h1 class="m-3 text-success text-center">Unexpired Tickets</h1>
        <?php
            }else if(isset($_GET['status'])&&($_GET['status']=='expired')){
                ?>
        <h1 class="m-3 text-danger text-center">Expired Tickets</h1>
        <?php
            }
         ?>
        <div class="p-3" id="no-more-tables">

            <table class="table table-striped" id="datatablesSimple">
                <thead class="table-dark">
                    <th>NO</th>
                    <th>PP</th>
                    <th>MOVIE TITLE</th>
                    <th>TICKET DATE</th>
                    <th>SHOW DATE</th>
                    <th>SHOW TIME</th>
                    <th>SEAT NUMBER</th>
                    <th>PRICE</th>
                    <th>EXPIRED</th>
                    <th>USED</th>
                    <th>VIEW</th>
                </thead>
                <tbody class="table-light">
                    <?php
                    $customer_id=$_SESSION['account_id'];
                    $tickets=  mysqli_query($connection,"SELECT * FROM ticket WHERE Customer_id='$customer_id'");
                    $num=0;
                    if(mysqli_num_rows($tickets)>0){
                        while ($ticket_data=  mysqli_fetch_assoc($tickets)){
                            $num++;
                            $ticket_id=$ticket_data['Ticket_id'];
                            $schedule_id=$ticket_data['Schedule_id'];
                            $ticket_date=$ticket_data['Date'];
                            $seat_id=$ticket_data['Seat_id'];
                            $qr_code=$ticket_data['Qr_code'];
                            $status=$ticket_data['Status'];
                            $seat=  mysqli_query($connection,"SELECT * FROM seat WHERE Seat_id='$seat_id'");
                            $seat_data=  mysqli_fetch_assoc($seat);
                            $seat_no=$seat_data['Seat_no'];
                            $schedule=  mysqli_query($connection,"SELECT * FROM schedule WHERE Schedule_id='$schedule_id'");
                           if(mysqli_num_rows($schedule)>0){
                               $schedule_data=  mysqli_fetch_assoc($schedule);
                               $see_date=$schedule_data['Date'];
                            $movie_id=$schedule_data['Movie_id'];
                               $time=$schedule_data['Time'];
                               $price=$schedule_data['Price'];
                               $s_status='';
                                $date=date("Y-m-d");
                                if($date>$see_date){
                                    $s_status='expired';
                                }else{
                                    $s_status='unexpired';
                                }
                            if((isset($_GET['status']))&&(!($s_status==$_GET['status']))){continue;}

                            $movie=  mysqli_query($connection,"SELECT * FROM movies WHERE Movie_id='$movie_id'");
                            if(mysqli_num_rows($movie)>0){
                                $movie_data=  mysqli_fetch_assoc($movie);
                                $movie_title=$movie_data['Movie_title'];
                                $posture=$movie_data['Movie_posture'];
                                ?>
                    <tr>
                        <th data-title="NO"><?php echo $num; ?></th>
                        <td data-title="movie posture"><?php echo "<img src='../img/movie/$posture'
                                width='50px' height='50px' alt='pic' />"; ?></td>
                        <td data-title="movie title"><?php echo $movie_title; ?></td>
                        <td data-title="ticket date"><?php echo $ticket_date; ?></td>
                        <td data-title="show date"><?php echo $see_date; ?></td>
                        <td data-title="show time"><?php echo $time; ?></td>
                        <td data-title="seat number"><?php echo $seat_no; ?></td>
                        <td data-title="price"><?php echo $price; ?></td>
                        <td data-title="is expired"><?php echo $s_status; ?></td>
                        <td data-title="is used"><?php echo $status; ?></td>
                        <td data-title="View">
                            <a href="specific_ticket.php?ticket_id=<?php echo $ticket_id?>"
                                class="btn btn-danger btn-sm ">View</a>
                        </td>
                    </tr>

                    <?php
            }
            else{
                echo "<h1 class='text-warning'> movie does not found</h1>";
            }
              }else{
                  echo "<h1 class='text-warning'> Schedule does not found</h1>";
                }
        }
    }else{
                echo "<h1 class='text-warning'> ticket does not found</h1>";
            }
    ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php include 'footer.php';?>
</body>

</html>