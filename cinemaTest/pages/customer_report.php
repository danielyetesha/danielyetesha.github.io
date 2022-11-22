<?php
 
include 'connection.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/bootstrap-5.0.2-dist/css/bootstrap.css" />
    <link rel="stylesheet" href="../style/fontawesome-free-6.1.1-web/css/all.css" />

    <script src="../style/bootstrap-5.0.2-dist/js/bootstrap.js"></script>
    <title>Gondar cinema</title>
</head>

<body>
    <?php
    include 'header_check.php';
if(!(isset($_SESSION['username'])&&($_SESSION['account_type']=='admin'))){
        echo "<script>window.location.href='page_not_allowed.php';</script>";
    }
    ?>
    <div class="p-2">
        <?php
if(isset($_POST['view'])){
$schedule_id=$_POST['schedule_id'];
$findSchedule=  mysqli_query($connection,"SELECT * FROM schedule WHERE Schedule_id='$schedule_id'");
if(mysqli_num_rows($findSchedule)>0){
    $schedule=  mysqli_fetch_assoc($findSchedule);
    $schedule_date=$schedule['Date'];
    $schedule_time=$schedule['Time'];
    $movie_id=$schedule['Movie_id'];
    $price=$schedule['Price'];
    $findMovie=  mysqli_query($connection,"SELECT * FROM movies WHERE Movie_id='$movie_id'");
    if(mysqli_num_rows($findMovie)>0){
        $movie=  mysqli_fetch_assoc($findMovie);
        $movie_title=$movie['Movie_title'];
        $movie_type=$movie['Movie_type'];
        $movie_posture=$movie['Movie_posture'];
        $movie_length=$movie['Movie_length'];
        $movie_description=$movie['Description'];
        ?>
        <a href="movie_report.php" class="col-2"><i class="fs-3 fa-solid fa-arrow-left"></i></a>
        <div class="container px-4 px-lg-5 my-3">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6">
                    <img src="../img/movie/<?php echo $movie_posture;?>" alt="..." height="300px"
                        class="card-img-top mb-5 mb-md-0">
                </div>
                <div class="col-md-6">
                    <h1 class="display-5 fw-bolder">
                        <?php echo $movie_title; ?>
                    </h1>
                    <h3 class="display-8">
                        Movie Type: <?php echo $movie_type; ?>
                    </h3>
                    <h3 class="display-7">
                        Date: <?php echo $schedule_date; ?>
                    </h3>
                    <h3 class="display-7">
                        Time: <?php echo $schedule_time; ?>
                    </h3>
                    <h3 class="display-7">
                        Movie Length: <?php echo $movie_length; ?>
                    </h3>
                    <h3 class="display-7">
                        Movie Price: <?php echo $price; ?>
                    </h3>
                    <p class="lead">Description: <?php echo $movie_description; ?></p>
                </div>
            </div>
        </div>

        <div class="p-3" id="no-more-tables">

            <table class="table table-striped" id="datatablesSimple">
                <thead class="table-dark">
                    <th scope="col">NO</th>
                    <th scope="col">PP</th>
                    <th scope="col">FIRST NAME</th>
                    <th scope="col">LAST NAME</th>
                    <th scope="col">PHONE NUMBER</th>
                    <th scope="col">EMAIL ADDRESS</th>
                    <th scope="col">SEAT NUMBER</th>
                    <th scope="col">DATE</th>
                </thead>
                <tbody class="table-light">
                    <?php
                            $tickets=  mysqli_query($connection,"SELECT * FROM ticket Where Schedule_id='$schedule_id'");
                            if(mysqli_num_rows($tickets)>0){
                                $num=0;
                                while ($ticket_data=  mysqli_fetch_assoc($tickets)){
                            $customer_id=$ticket_data['Customer_id'];
                            $seat_id=$ticket_data['Seat_id'];
                            $seat=  mysqli_query($connection,"SELECT * FROM seat WHERE Seat_id='$seat_id'");
                            $seat_data=  mysqli_fetch_assoc($seat);
                            $seat_number=$seat_data['Seat_no'];
                            $date=$ticket_data['Date'];
                            $num++;
                            $findCustomer=  mysqli_query($connection,"SELECT * FROM account WHERE Account_id='$customer_id'");
                            if(mysqli_num_rows($findCustomer)>0){
                                $customer=  mysqli_fetch_assoc($findCustomer);
                                $first_name=$customer['First_name'];
                                $last_name=$customer['Last_name'];
                                $gender=$customer['Gender'];
                                $phone_number=$customer['Phone_number'];
                                $email_address=$customer['Email_address'];
                                $pp=$customer['Profile_pic'];
                        ?>

                    <tr>
                        <th scope="row"><?php echo $num; ?></th>
                        <td><?php echo "<img src='../img/profile/$pp' class='rounded-circle'
                                width='40px' height='40px' alt='pic' />"; ?></td>
                        <td><?php echo $first_name; ?></td>
                        <td><?php echo $last_name; ?></td>
                        <td><?php echo $phone_number; ?></td>
                        <td><?php echo $email_address; ?></td>
                        <td><?php echo $seat_number; ?></td>
                        <td><?php echo $date; ?></td>
                    </tr>

                    <?php
                }else{
                    echo "<h1 class='text-warning'> customer information does not found</h1>";
                  }
                }
                }else{
                    echo "<h1 class='text-warning'>there is no who buy ticket</h1>";
                }
            
                ?>

                </tbody>
            </table>
        </div>
    </div>
    <?php
              }else{
                  echo "<h3 class='text-warning'> movie information does not found</h3>";
                }
            }else{
                echo "<h3 class='text-warning'> schedule does not found</h3>";
              }
        }
    ?>

    <?php include 'footer.php';?>
</body>

</html>