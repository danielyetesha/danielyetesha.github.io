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
    <div class="container my-3 bg-light w-75">
        <div class="header px-4 px-lg-5 row">

            <a href="manage_movies.php" class="col-3 fs-2 fw-bold mb-0 text-start"><i
                    class="fa-solid fa-arrow-left"></i></a>
            <h2 class="col mx-auto fw-bold mb-0 text-center">Add Movie</h2>

        </div>

        <div class=" d-flex align-items-center m-0">
            <div class="card-body px-4 px-lg-5 text-black">

                <form class="mx-1 mx-md-4 needs-validation" enctype="multipart/form-data" method="POST"
                    action="add_movie.php" novalidate>
                    <div class="col-lg">
                        <div class="mb-4">
                            <div class="form-outline flex-fill mb-0 ">
                                <label for="movie_title" id="flab">Movie Title:</label><br />
                                <input type="text" name="movie_title" id="movie_title" class="form-control"
                                    placeholder="Movie title" required />

                                <ul class="invalid-feedback" id="movie_title_feedback"></ul>

                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="movie_type">Movie Type</label>
                                <select name="movie_type" id="movie_type" class="form-control">
                                    <option value="action" selected>Action</option>
                                    <option value="comedy">Comedy</option>
                                    <option value="romantic">Romantic</option>
                                    <option value="family">Family</option>
                                </select>
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline flex-fill mb-0">
                                <label>Movie Length:</label><br />
                                <input type="text" name="movie_length" placeholder="movie_length"
                                    pattern="[0-9]{2}:[0-9]{2}:[0-9]{2}" value="00:00:00"
                                    title="Write a duration in the format hh:mm:ss" class="form-control" required />
                                <ul class="invalid-feedback">
                                </ul>

                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline flex-fill mb-0">
                                <label>Actors:</label><br />
                                <input type="text" name="actors" placeholder="Actors" id="actors" class="form-control"
                                    required />
                                <ul class="invalid-feedback">
                                </ul>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label">Description</label>
                                <textarea name="movie_description" required rows="7" class="form-control"
                                    placeholder="write about the movie"></textarea>
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="movie_posture">upload movie posture</label>
                                <input type="file" name="movie_posture" id="movie_posture" class="form-control"
                                    accept="image/png, image/jpeg , image/jpg" required />
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="movie_trailer">upload movie trailer </label>
                                <input type="file" name="movie_trailer" id="movie_trailer" class="form-control"
                                    accept="video/mp4, video/MPEG , video/vs" required />
                            </div>
                        </div>

                        <div class="m-3">
                            <button type="submit" name="add" class="btn btn-primary btn-lg w-100">
                                Register
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
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
    $movie_type=$_POST['movie_type'];
    $movie_length=$_POST['movie_length'];
    $actors=$_POST['actors'];
    $description=$_POST['movie_description'];
    $is_scheduled=0;
    
    
$movie_title_check=  mysqli_query($connection,"SELECT * FROM movies WHERE Movie_title='$movie_title'") or die(mysqli_error($connection));
$count=  mysqli_num_rows($movie_title_check);
if($count>0){
    echo "<script>swal('ERROR','movie title already exist','error');</script>";
}else{        
    // for posture
    if(isset($_FILES['movie_posture'])){
                    $img_name = $_FILES['movie_posture']['name'];
                    $img_type = $_FILES['movie_posture']['type'];
                    $tmp_name = $_FILES['movie_posture']['tmp_name'];
                    
                    $img_explode = explode('.',$img_name);
                    $img_ext = end($img_explode);
    
                    $extensions = ["jpeg", "png", "jpg"];
                    if(in_array($img_ext, $extensions) === true){
                        $types = ["image/jpeg", "image/jpg", "image/png"];
                        if(in_array($img_type, $types) === true){
                            $time = time();
                            $new_img_name = $time.$img_name;
                            if(move_uploaded_file($tmp_name,"../img/movie/".$new_img_name)){
                                // for video
                               if(isset($_FILES['movie_trailer'])){
                    $vid_name = $_FILES['movie_trailer']['name'];
                    $vid_type = $_FILES['movie_trailer']['type'];
                    $tmp_name1 = $_FILES['movie_trailer']['tmp_name'];
                    
                    $vid_explode = explode('.',$vid_name);
                    $vid_ext = end($vid_explode);
    
                    $extensions1 = ["mp4", "mpeg", "vs"];
                    if(in_array($vid_ext, $extensions1) === true){
                        $types1 = ["video/mp4", "video/mpeg", "video/vs"];
                        if(in_array($vid_type, $types1) === true){
                            $time1 = time();
                            $new_vid_name = $time.$vid_name;
                            if(move_uploaded_file($tmp_name1,"../video/".$new_vid_name)){
    
        $movie_query="INSERT INTO movies(Movie_title, Movie_type,Movie_length,Actors,Movie_posture,Description,Is_scheduled,Trailer) VALUES ('$movie_title','$movie_type','$movie_length','$actors','$new_img_name','$description','$is_scheduled','$new_vid_name')";
        
        $result=  mysqli_query($connection,$movie_query) or die(mysqli_error($connection));
        
        if(!$result){
            echo "<script>swal('ERROR','FAILD TO ADD $result','error');</script>";
        }else{
             $action_performer=$_SESSION['account_id'];
                      $detail= $_SESSION['account_type']."(".$_SESSION['username'].") add a movie  ,   the movie information is ,  movie title =  ".$movie_title." ,  movie type = ".$movie_type." ,  movie length = ".$movie_length." ,  movie actors = ".$actors." ,  movie description = ".$description;
mysqli_query($connection,"INSERT INTO log_file(Account_id,Action,Detail) VALUES ('$action_performer','Add movie to the site','$detail')") or die(mysqli_error($connection)) or die(mysqli_error($connection));

           
                    echo "
                    <script>
                    swal('good job','REGISTRATION SUCCESSFUL','success');
                    </script>
                    ";
                    
    }
    
}

        else{
                echo "<script>swal('ERROR','Please upload a video file - mp4, mpeg, vs!','warning');</script>";
            }

    }

    else{
            echo "<script>swal('ERROR','Please upload a video file - mp4, mpeg, vs!','warning');</script>";                            
        }
}

else{
        echo "<script>swal('ERROR','Video problem','warning');</script>";                          
    }


}
// end of video
}

        else{
                echo "<script>swal('ERROR','Please upload an image file- jpeg, png, jpg!','warning');</script>";
            }

    }

    else{
            echo "<script>swal('ERROR','Please upload an image file- jpeg, png, jpg!','warning');</script>";                            
        }
}

else{
        echo "<script>swal('ERROR','Please upload an image file - jpeg, png, jpg!','warning');</script>";                          
    }


}else{
        echo "<script>swal('ERROR','Image problem','warning');</script>";                          
    }
// end of photo

}
}

?>

</html>