<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gondar cinema</title>
    <link rel="stylesheet" href="../style/bootstrap-5.0.2-dist/css/bootstrap.css" />
    <link rel="stylesheet" href="../style/fontawesome-free-6.1.1-web/css/all.css" />
    <link type="text/css" rel="Stylesheet" href="../style/jquery-ui.css" />
</head>

<body>
    <?php
    include 'header_check.php';
if(!(isset($_SESSION['username'])&&($_SESSION['account_type']=='employee'))){
        echo "<script>window.location.href='page_not_allowed.php';</script>";
    }
    ?>
    <div class="container my-3 bg-light w-75">
        <div class="header px-4 px-lg-5 row">

            <a href="manage_schedule.php" class="col-3 fs-2 fw-bold mb-0 text-start"><i
                    class="fa-solid fa-arrow-left"></i></a>
            <h2 class="col mx-auto fw-bold mb-0 text-center">Add schedule</h2>

        </div>

        <div class=" d-flex align-items-center m-0">
            <div class="card-body px-4 px-lg-5 text-black">

                <form class="mx-1 mx-md-4 needs-validation" method="POST" action="add_schedule.php" novalidate>
                    <div class="col-lg">
                        <div class="mb-4">
                            <div class="form-outline flex-fill mb-0 ">
                                <label for="schedule_title" id="flab">Movie Title:</label><br />

                                <select id="select-state" name="movie_title" placeholder="Pick a state...">
                                    <?php
                                    $movies=  mysqli_query($connection,"SELECT * FROM movies");
                                    if(mysqli_num_rows($movies)>0){
                                        while ($movie_data=  mysqli_fetch_assoc($movies)){
                                            $movie_title=$movie_data['Movie_title'];
                                    ?>
                                    <option value="<?php echo $movie_title;?>"><?php echo $movie_title;?></option>
                                    <?php 
                                        }
                                    }?>
                                </select>
                                <ul class="invalid-feedback" id="movie_title_feedback"></ul>

                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline flex-fill mb-0">
                                <label>Date :</label><br />
                                <input type="text" name="date" id="datepicker" placeholder="Date" class="form-control"
                                    required />
                                <ul class="invalid-feedback">
                                </ul>

                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline flex-fill mb-0">
                                <label>Time :</label><br />
                                <input type="time" name="time" placeholder="Time" class="form-control" required />
                                <ul class="invalid-feedback">
                                </ul>

                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline flex-fill mb-0">
                                <label>Price :</label>
                                <input type="number" name="price" placeholder="Price" class="form-control" required />
                                <ul class="invalid-feedback">
                                </ul>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline flex-fill mb-0">
                                <label>Number of seat :</label>
                                <input type="number" name="no_of_seat" max="800" min="100" value="800"
                                    placeholder="number of seat" class="form-control" required />
                                <ul class="invalid-feedback">
                                </ul>
                            </div>
                        </div>

                        <div class="m-3">
                            <button type="submit" name="add" class="btn btn-primary btn-lg w-100">
                                Add
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/jquery-ui.min.js"></script>

    <script>
    $(function() {
        function addDays(theDate, days) {
            return new Date(theDate.getTime() + days * 24 * 60 * 60 * 1000);
        }
        Date.prototype.ddmmyyyy = function() {
            var dd = this.getDate().toString();
            var mm = (this.getMonth() + 1).toString();
            var yyyy = this.getFullYear().toString();
            return yyyy + "-" + (mm[1] ? mm : "0" + mm[0]) + "-" + (dd[1] ? dd : "0" + dd[0]);
        };
        $("#datepicker").datepicker({
            dateFormat: "yy-mm-dd"
        });
        $("#datepicker").on('change', function() {
            var selectedDate = $(this).val();
            var newDate = addDays(new Date(), 5);
            var todaysDate = newDate.ddmmyyyy();
            if (selectedDate < todaysDate) {
                alert('Selected date must be greater than today date');
                $(this).val('');
            }
        });
    });
    </script>
    <script src="../style/bootstrap-5.0.2-dist/js/bootstrap.js"></script>
    <script src="../js/sweetalert.min.js"></script>
    <script src="../js/validation.js"></script>

    <?php include 'footer.php';?>
</body>

</html>

<?php

include 'connection.php';
if(isset($_POST['add'])){
    $movie_title=$_POST['movie_title'];
    $date=$_POST['date'];
    $time=$_POST['time'];
    $price=$_POST['price'];
    $no_of_seat=$_POST['no_of_seat'];
    $available_seat=$no_of_seat;
    
    
$movie_title_check=  mysqli_query($connection,"SELECT * FROM movies WHERE Movie_title='$movie_title'") or die(mysqli_error($connection));
$count=  mysqli_num_rows($movie_title_check);
if($count>0){
    $movie_data=  mysqli_fetch_assoc($movie_title_check);
    $movie_id=$movie_data['Movie_id'];
    $schedule_query="INSERT INTO schedule(Movie_id, Date,Time,Price,No_of_seat,Available_seat) VALUES ('$movie_id','$date','$time','$price','$no_of_seat','$available_seat')";
        $result=  mysqli_query($connection,$schedule_query) or die(mysqli_error($connection));
        if(!$result){
            echo "<script>swal('ERROR','FAILD TO ADD MOVIE SCHEDULE','error');</script>";
        }else{
	$res=  mysqli_query($connection,"SELECT * FROM schedule WHERE Movie_id='$movie_id' AND Date='$date' AND Time='$time'") or die(mysqli_error($connection));
    $count=  mysqli_num_rows($res);
if($count>0){

        $schedule_data=  mysqli_fetch_assoc($res);
            $schedule_id=$schedule_data['Schedule_id'];
            $num=0;
            while($num<800){
                $num++;
                    $schedule_query="INSERT INTO seat(Schedule_id, Seat_no,Status) VALUES ('$schedule_id','$num','unreserved')";
        $result=  mysqli_query($connection,$schedule_query) or die(mysqli_error($connection));

            }
           $update_query="UPDATE movies SET Is_scheduled='1' WHERE Movie_id='$movie_id' ";

$result=  mysqli_query($connection,$update_query) or die(mysqli_error($connection));
 $action_performer=$_SESSION['account_id'];
                      $detail= $_SESSION['account_type']."(".$_SESSION['username'].") add a movie schedule  ,   the schedule information has ,  movie title =  ".$movie_title." ,  date = ".$date." ,  price = ".$price." ,  mumber of seat = ".$no_of_seat;
mysqli_query($connection,"INSERT INTO log_file(Account_id,Action,Detail) VALUES ('$action_performer','Add movie to the site','$detail')") or die(mysqli_error($connection)) or die(mysqli_error($connection));

                    echo "
                    <script>
                    swal('good job','SCHEDULE ADDED SUCCESSFULY','success');
                    </script>
                    ";
                    
    }else{
     echo "<script>alert('seat is not created');</script>";
}
}
}else{
     echo "<script>swal('ERROR','movie does not found','error');</script>";
}

}
?>

</html>