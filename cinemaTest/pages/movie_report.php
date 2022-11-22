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
    <title>Gondar cinema</title>
    <script src="../style/bootstrap-5.0.2-dist/js/bootstrap.js"></script>
</head>

<body>
    <?php
    include 'header_check.php';
if(!(isset($_SESSION['username'])&&($_SESSION['account_type']=='admin'))){
        echo "<script>window.location.href='page_not_allowed.php';</script>";
    }
    ?>
    <div class="p-3" id="no-more-tables">
        <h1 class="m-3 text-center" style="font-weight: bold; font-size:30px;">Report For Ticket</h1>


        <table class="table table-striped" id="datatablesSimple">
            <thead class="table-dark">
                <th scope="col">NO</th>
                <th scope="col">MOVIE TITLE</th>
                <th scope="col">MOVIE TYPE</th>
                <th scope="col">SCHEDULE DATE</th>
                <th scope="col">NUMBER OF VIEWER</th>
                <th scope="col">TOTAL PRICE</th>
                <th scope="col">VIEW</th>
            </thead>
            <tbody class="table-light">
                <?php
                    $schedule_movies=  mysqli_query($connection,"SELECT * FROM schedule");
                    $num=0;
                    if(mysqli_num_rows($schedule_movies)>0){
                        while ($schedule_data=  mysqli_fetch_assoc($schedule_movies)){
                            $num++;
                            $schedule_id=$schedule_data['Schedule_id'];
                            $movie_id=$schedule_data['Movie_id'];
                            $date=$schedule_data['Date'];
                            $unit_price=$schedule_data['Price'];
                            $find_movie=  mysqli_query($connection,"SELECT * FROM movies WHERE Movie_id='$movie_id'");
                            if(mysqli_num_rows($find_movie)>0){
                                $movie_data=  mysqli_fetch_assoc($find_movie);
                                $movie_title=$movie_data['Movie_title'];
                                $movie_type=$movie_data['Movie_type'];
                                $find_ticket=  mysqli_query($connection,"SELECT * FROM ticket WHERE Schedule_id='$schedule_id'");
                                $count_ticket=mysqli_num_rows($find_ticket);
                                $total_price=$count_ticket*$unit_price;
                                
                                ?>
                <tr>
                    <th data-title="NO"><?php echo $num; ?></th>
                    <td data-title="Movie title"><?php echo $movie_title; ?></td>
                    <td data-title="Movie type"><?php echo $movie_type; ?></td>
                    <td data-title="Date"><?php echo $date; ?></td>
                    <td data-title="No of ticket"><?php echo $count_ticket; ?></td>
                    <td data-title="Price"><?php echo $total_price; ?></td>
                    <td data-title="detail">
                        <form action="customer_report.php" method="POST" style="display: inline">
                            <input type="hidden" name="schedule_id" value="<?php echo $schedule_id ?>" />
                            <input type="submit" value="view" name="view" class="btn btn-danger" />
                        </form>
                    </td>
                </tr>

                <?php
              }else{
                  echo "<h1 class='text-warning'> Movie information does not found</h1>";
                }
        }
    }
    else{
        echo "<h1 class='text-warning'> There is no scheduled movie</h1>";
    }
    ?>
            </tbody>
        </table>
    </div>
    <?php include 'footer.php';?>
</body>

</html>