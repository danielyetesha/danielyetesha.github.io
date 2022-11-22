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
    <script src="../style/bootstrap-5.0.2-dist/js/bootstrap.js"></script>

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
    $movie_id=$_POST['movie_id'];
    $movie =  mysqli_query($connection,"SELECT * FROM movies WHERE Movie_id='$movie_id'");
$movie_data=  mysqli_fetch_assoc($movie);
            $movie_title=$movie_data['Movie_title'];
            $movie_type=$movie_data['Movie_type'];
            $movie_length=$movie_data['Movie_length'];
            $actors=$movie_data['Actors'];
            $description=$movie_data['Description'];
            $movie_posture=$movie_data['Movie_posture'];
            $movie_trailer=$movie_data['Trailer'];
    ?>
        <div class="px-4 px-lg-5 row">

            <a href="manage_movies.php" class="col-2"><i class="fs-3 fa-solid fa-arrow-left"></i></a>
            <h2 class="col mx-auto fw-bold mb-0 text-center">EDIT MOVIE</h2>

        </div>
        <div class="row px-5 py-3 justify-content-center">

            <form class="mx-1 mx-md-4 needs-validation" method="POST" action="edit_movie.php" novalidate>
                <div class="col-lg">
                    <input type="hidden" name="movie_id" value="<?php echo $movie_id ?>" />

                    <div class="mb-4">
                        <div class="form-outline flex-fill mb-0 ">
                            <label for="movie_title" id="flab">Movie Title:</label><br />
                            <input type="text" name="movie_title" id="movie_title" value="<?php echo $movie_title?>"
                                class="form-control" placeholder="First name" required />

                            <ul class="invalid-feedback" id="movie_title_feedback"></ul>

                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="movie_type">Movie Type</label>
                            <select name="movie_type" id="movie_type" class="form-control">
                                <option value="action" <?php if($movie_type=='action')echo 'selected'?>>Action</option>
                                <option value="comedy" <?php if($movie_type=='comedy')echo 'selected'?>>Comedy</option>
                                <option value="romantic" <?php if($movie_type=='romantic')echo 'selected'?>>Romantic
                                </option>
                                <option value="family" <?php if($movie_type=='family')echo 'selected'?>>Family</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <div class="form-outline flex-fill mb-0">
                            <label>Movie Length:</label><br />
                            <input type="text" name="movie_length" placeholder="movie_length" class="form-control"
                                value="<?php echo $movie_length?>" required />
                            <ul class="invalid-feedback">
                            </ul>

                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                        <div class="form-outline flex-fill mb-0">
                            <label>Actors:</label><br />
                            <input type="text" name="actors" placeholder="Actors" id="actors" class="form-control"
                                value="<?php echo $actors?>" required />
                            <ul class="invalid-feedback">
                            </ul>
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label">Description</label>
                            <textarea name="movie_description" required rows="7" class="form-control"
                                placeholder="write about the movie"><?php echo $description?></textarea>
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="movie_posture">upload movie posture</label>
                            <input type="file" name="movie_posture" id="movie_posture" class="form-control"
                                accept="image/png, image/jpeg , image/jpg" />
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="movie_trailer">upload movie trailer </label>
                            <input type="file" name="movie_trailer" id="movie_trailer" class="form-control"
                                accept="video/mp4, video/MPEG , video/vs" />
                        </div>
                    </div>

                    <div class="m-3">
                        <button type="submit" name="change" class="btn btn-primary btn-lg w-100">
                            Save Change
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php
    }
    ?>
    </div>
    <script src="../style/bootstrap-5.0.2-dist/js/bootstrap.js"></script>
    <script src="../js/sweetalert.min.js"></script>
    <script src="../js/validation.js"></script>

    <?php include 'footer.php';?>
</body>

</html>

<?php

if(isset($_POST['change'])){
    $movie_id=$_POST['movie_id'];
$movie_title=$_POST['movie_title'];
    $movie_type=$_POST['movie_type'];
    $movie_length=$_POST['movie_length'];
    $actors=$_POST['actors'];
    $description=$_POST['movie_description'];
    $movie_posture=$_POST['movie_posture'];
    $movie_trailer=$_POST['movie_trailer'];
    $is_scheduled=0;

$movie_check=  mysqli_query($connection,"SELECT * FROM movies WHERE Movie_id='$movie_id'");
$count=  mysqli_num_rows($movie_check);
if($count>0){
    $movie_data=  mysqli_fetch_assoc($movie_check);
        $movie_img=$movie_data['Movie_posture'];
        $pmovie_title=$movie_data['Movie_title'];
        $pmovie_type=$movie_data['Movie_type'];
        $pmovie_length=$movie_data['Movie_length'];
        $pactors=$movie_data['Actors'];
        $pdescription=$movie_data['Description'];
        if(!$movie_posture=''){
            $movie_posture=$movie_img;
        }
        $desc=$movie_data['Description'];
        if(!$description=''){
            $description=$desc;
        }
         $movie_vid=$movie_data['Trailer'];
        if(!$movie_trailer=''){
            $movie_trailer=$movie_vid;
        }
$movie_name_check=  mysqli_query($connection,"SELECT * FROM movies WHERE Movie_title='$movie_title'");
$count=  mysqli_num_rows($movie_name_check);
if($count>1){
    echo "<script>swal('ERROR','Movie name already exist','error');</script>";
}else{
    
$update_query="UPDATE movies 
SET Movie_title='$movie_title', Movie_length='$movie_length', Actors='$actors',Description='$description' , Movie_posture='$movie_posture', Trailer='$movie_trailer'
WHERE Movie_id='$movie_id' ";

$result=  mysqli_query($connection,$update_query) or die(mysqli_error($connection));

if(!$result){
echo "<script>
swal({
    text: 'UPDATE FAILED!',
    icon: 'error',
    button: 'ok',
}).then(function(){
window.location='edit_movie.php';
});
</script>";
}else{
    $action_performer=$_SESSION['account_id'];
                      $detail= $_SESSION['account_type']." change movie information the changed information is : ,   movie title :". $pmovie_title."====> ".$movie_title ."  ,   movie type :". $pmovie_type."====> ".$movie_type ."  ,   movie length :". $pmovie_length."====> ".$movie_length."  ,   Actors :". $pactors."====> ".$actors."  ,   Description :". $pdescription."====> ".$description;
mysqli_query($connection,"INSERT INTO log_file(Account_id,Action,Detail) VALUES ('$action_performer','Employee edit movie information','$detail')") or die(mysqli_error($connection));

           echo "<script>
swal({
    text: 'Movie INFORMATION UPDATED SUCCESSFULY!',
    icon: 'success',
    button: 'ok',
}).then(function(){
window.location='manage_movies.php';
});
</script>";
        }

}
}
}



?>