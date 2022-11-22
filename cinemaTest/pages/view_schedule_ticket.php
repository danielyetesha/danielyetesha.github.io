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
    <script src="../style/bootstrap-5.0.2-dist/js/bootstrap.js"></script>
</head>

<body>
    <?php
    include 'header_check.php';
if(!(isset($_SESSION['username'])&&($_SESSION['account_type']=='employee'))){
        echo "<script>window.location.href='page_not_allowed.php';</script>";
    }
    ?>
    <div>

        <div class="p-2">
            <h1 class="m-3 text-center" style="font-weight: bold; font-size:50px;">CUSTOMER LIST</h1>
            <div class="p-3" id="no-more-tables">

                <table class="table table-striped" id="datatablesSimple">
                    <thead class="table-dark">
                        <th scope="col">NO</th>
                        <th scope="col">PROFILE</th>
                        <th scope="col">CUSTOMER NAME</th>
                        <th scope="col">SEAT NO</th>
                        <th scope="col">DATE</th>
                        <th scope="col">PRICE</th>
                    </thead>
                    <tbody class="table-light">
                        <?php
                    if(isset($_POST['view_ticket'])){
                        $schedule_id=$_POST['schedule_id'];
                    $tickets=  mysqli_query($connection,"SELECT * FROM ticket Where Schedule_id='$schedule_id'");
                    $num=0;
                    if(mysqli_num_rows($tickets)>0){
                        while ($ticket_data=  mysqli_fetch_assoc($tickets)){
                            $num++;
                            $customer_id=$ticket_data['Customer_id'];
                            $ticket_id=$ticket_data['Ticket_id'];
                            $date=$ticket_data['Date'];
                            $seat_id=$ticket_data['Seat_id'];
                            $findSchedule=  mysqli_query($connection,"SELECT * FROM schedule WHERE Schedule_id='$schedule_id'");
                       if(mysqli_num_rows($findSchedule)>0){
                           $schedule=  mysqli_fetch_assoc($findSchedule);
                           $price=$schedule['Price'];
                           $movie_id=$schedule['Movie_id'];
                            $seat=  mysqli_query($connection,"SELECT * FROM seat WHERE Seat_id='$seat_id'");
                                $seat_data=  mysqli_fetch_assoc($seat);
                                $seat_number=$seat_data['Seat_no'];

                            $findCustomer=  mysqli_query($connection,"SELECT * FROM account WHERE Account_id='$customer_id'");
                            if(mysqli_num_rows($findCustomer)>0){
                                $customer=  mysqli_fetch_assoc($findCustomer);
                                $first_name=$customer['First_name'];
                                $last_name=$customer['Last_name'];
                                $pp=$customer['Profile_pic'];
                                 $findMovie=  mysqli_query($connection,"SELECT * FROM movies WHERE Movie_id='$movie_id'");
                            if(mysqli_num_rows($findMovie)>0){
                                $movie=  mysqli_fetch_assoc($findMovie);
                                $movie_title=$movie['Movie_title'];
                                ?>
                        <tr>
                            <th data-title="NO"><?php echo $num; ?></th>
                            <td data-title="Profile pic"><?php echo "<img src='../img/profile/$pp' class='rounded-circle'
                                width='40px' height='40px' alt='pic' />"; ?></td>
                            <td data-title="Customer name"><?php echo $first_name." ". $last_name; ?></td>
                            <td data-title="Seat number"><?php echo $seat_number; ?></td>
                            <td data-title="Date"><?php echo $date; ?></td>
                            <td data-title="Price"><?php echo $price; ?></td>
                        </tr>

                        <?php
              }else{
                  echo "<h3 class='text-warning'> movie information does not found</h3>";
                }
            }else{
                echo "<h1 class='text-warning'> customer information does not found</h1>";
            }
        }else{
            echo "<h3 class='text-warning'> schedule does not found</h3>";
          }
        }
    }
    else{
        echo "<h1 class='text-warning'>there is no who buy ticket</h1>";
    }
}
    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php include 'footer.php';?>
</body>

</html>