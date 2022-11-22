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
    <script src="../style/bootstrap-5.0.2-dist/js/bootstrap.js"></script>
    <link type="text/css" rel="Stylesheet" href="../style/jquery-ui.css" />

</head>

<body>
    <?php
    include 'header_check.php';
if(!(isset($_SESSION['username'])&&($_SESSION['account_type']=='employee'))){
        echo "<script>window.location.href='page_not_allowed.php';</script>";
    }
    ?>
    <div class="pt-2">
        <?php
if(isset($_POST['manage'])){
    $schedule_id=$_POST['schedule_id'];
    $schedule =  mysqli_query($connection,"SELECT * FROM schedule WHERE schedule_id='$schedule_id'");
     if(mysqli_num_rows($schedule)>0){
$schedule_data=  mysqli_fetch_assoc($schedule);
            $movie_id=$schedule_data['Movie_id'];
            $date=$schedule_data['Date'];
            $time=$schedule_data['Time'];
            $price=$schedule_data['Price'];
            $no_of_seat=$schedule_data['No_of_seat'];
$movie =  mysqli_query($connection,"SELECT * FROM movies WHERE Movie_id='$movie_id'");
 if(mysqli_num_rows($movie)>0){
$movie_data=  mysqli_fetch_assoc($movie);
$movie_title=$movie_data['Movie_title'];

    ?>
        <div class="px-4 px-lg-5 row">

            <a href="manage_schedule.php" class="col-2"><i class="fs-3 fa-solid fa-arrow-left"></i></a>
            <h2 class="col mx-auto fw-bold mb-0 text-center">EDIT schedule</h2>

        </div>
        <div class="row px-5 py-3 justify-content-center">


            <form class="mx-1 mx-md-4 needs-validation" method="POST" action="edit_schedule.php" novalidate>
                <div class="col-lg">
                    <div class="mb-4">
                        <div class="form-outline flex-fill mb-0 ">
                            <label for="schedule_title" id="flab">Movie Title:</label><br />
                            <select id="select-state" class="form-control" placeholder="Pick a state...">
                                <?php
                                    $movies=  mysqli_query($connection,"SELECT * FROM movies");
                                    $num=0;
                                    if(mysqli_num_rows($movies)>0){
                                        while ($movies_data=  mysqli_fetch_assoc($movies)){
                                            $num++;
                                            $movies_title=$movies_data['Movie_title'];
                                    ?>
                                <option value="<?php echo $movies_title;?>"
                                    <?php  if($movies_title==$movie_title)echo "selected"?>><?php echo $movies_title;?>
                                </option>
                                <?php 
                                        }
                                    }?>
                            </select>
                            <ul class="invalid-feedback" id="movie_title_feedback"></ul>

                        </div>
                    </div>
                    <input type="hidden" name="schedule_id" value="<?php echo $schedule_id ?>" />


                    <div class="d-flex flex-row align-items-center mb-4">
                        <div class="form-outline flex-fill mb-0">
                            <label>Date :</label><br />
                            <input type="text" name="date" placeholder="Date" class="form-control"
                                value="<?php echo $date?>" required id="datepicker" />
                            <ul class=" invalid-feedback">
                            </ul>

                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                        <div class="form-outline flex-fill mb-0">
                            <label>Time :</label><br />
                            <input type="time" name="time" placeholder="Time" value="<?php echo $time?>"
                                class="form-control" required />
                            <ul class="invalid-feedback">
                            </ul>

                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                        <div class="form-outline flex-fill mb-0">
                            <label>Price :</label>
                            <input type="number" name="price" value="<?php echo $price?>" placeholder=" Price"
                                class="form-control" required />
                            <ul class="invalid-feedback">
                            </ul>
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                        <div class="form-outline flex-fill mb-0">
                            <label>Number of seat :</label>
                            <input type="number" name="no_of_seat" value="<?php echo $no_of_seat?>"
                                placeholder="number of seat" class="form-control" required />
                            <ul class="invalid-feedback">
                            </ul>
                        </div>
                    </div>

                    <div class="m-3">
                        <button type="submit" name="change" class="btn btn-primary btn-lg w-100">
                            Save Changes
                        </button>
                    </div>
                </div>
            </form>
            <?php
 }
 else{
    echo "<script>swal('ERROR','MOVIE DOES NOT FOUND','error');</script>";
}
}else{
    echo "<script>swal('ERROR','SCHEDULE DOES NOT FOUND','error');</script>";
}
}
            ?>
        </div>
    </div>

    </div>
    <script src="../style/bootstrap-5.0.2-dist/js/bootstrap.js"></script>
    <script src="../js/sweetalert.min.js"></script>
    <script src="../js/validation.js"></script>
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
    <?php include 'footer.php';?>
</body>

</html>

<?php

if(isset($_POST['change'])){
    $schedule_id=$_POST['schedule_id'];
$movie_title=$_POST['movie_title'];
    $date=$_POST['date'];
    $time=$_POST['time'];
    $price=$_POST['price'];
    $no_of_seat=$_POST['no_of_seat'];
$schedule=  mysqli_query($connection,"SELECT * FROM movies WHERE Movie_id='$movie_id'");
    $schedule_data=  mysqli_fetch_assoc($schedule);
        $pmovie_id=$schedule_data['Movie_id'];
        $pdate=$schedule_data['Date'];
        $ptime=$schedule_data['Time'];
        $pprice=$schedule_data['Price'];
        $pno_of_seat=$schedule_data['No_of_seat'];
$movie =  mysqli_query($connection,"SELECT * FROM movies WHERE Movie_title='$movie_title'");
 if(mysqli_num_rows($movie)>0){
$movie_data=  mysqli_fetch_assoc($movie);
$movie_id=$movie_data['Movie_id'];
$update_query="UPDATE schedule 
SET Movie_id='$movie_id', Date='$date', Time='$time',Price='$price' , No_of_seat='$no_of_seat'
WHERE Schedule_id='$schedule_id' ";

$result=  mysqli_query($connection,$update_query) or die(mysqli_error($connection));

if(!$result){
echo "<script>
swal({
    text: 'UPDATE FAILED!',
    icon: 'error',
    button: 'ok',
}).then(function(){
window.location='edit_schedule.php';
});
</script>";
}else{
    $action_performer=$_SESSION['account_id'];
$detail= $_SESSION['account_type']."(".$_SESSION['username'].") change schedule information the changed information is : ,   movie id :". $pmovie_id."====> ".$movie_id ."  ,   schedule date :". $pdate."====> ".$date ."  ,   schedule time :". $ptime."====> ".$time."  ,   schedule price :". $pprice."====> ".$price."  ,   number of seat :". $pno_of_seat."====> ".$no_of_seat;
mysqli_query($connection,"INSERT INTO log_file(Account_id,Action,Detail) VALUES ('$action_performer','Employee edit schedule information','$detail')") or die(mysqli_error($connection));

           echo "<script>
swal({
    text: 'SCHEDULE INFORMATION UPDATED SUCCESSFULY!',
    icon: 'success',
    button: 'ok',
}).then(function(){
window.location='manage_schedule.php';
});
</script>";
        }

}
}

?>