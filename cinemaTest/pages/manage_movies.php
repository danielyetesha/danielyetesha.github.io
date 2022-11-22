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
if(!(isset($_SESSION['username'])&&($_SESSION['account_type']=='employee'))){
        echo "<script>window.location.href='page_not_allowed.php';</script>";
    }
    ?>
    <div class="p-2">
        <h1 class="m-3 text-center" style="font-weight: bold;">MANAGE MOVIE</h1>

        <div class="m-3 text-center">
            <a href="add_movie.php"> <button class="btn btn-lg btn-primary"> <i class="fa-solid fa-plus"></i> Add
                    Movie</button></a>
        </div>

        <div class="p-3" id="no-more-tables">

            <table class="table table-striped" style="overflow:scroll;" id="datatablesSimple">
                <thead class="table-dark">
                    <th scope="col">NO</th>
                    <th scope="col">MOVIE POSTURE</th>
                    <th scope="col">MOVIE TITLE</th>
                    <th scope="col">MOVIE TYPE</th>
                    <th scope="col">MOVIE LENGTH</th>
                    <th scope="col">ACTORS</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">VIEW</th>
                    <th scope="col" class="text-center" colspan="2">MANAGE</th>
                </thead>
                <tbody class="table-light">
                    <?php
                    $movie=  mysqli_query($connection,"SELECT * FROM movies");
                    $num=0;
                     if(mysqli_num_rows($movie)>0){
        while ($movie_data=  mysqli_fetch_assoc($movie)){
             $num++;
             $movie_id=$movie_data['Movie_id'];
             $movie_posture=$movie_data['Movie_posture'];
             $movie_title=$movie_data['Movie_title'];
             $movie_type=$movie_data['Movie_type'];
             $movie_length=$movie_data['Movie_length'];
             $actors=$movie_data['Actors'];
             $status=$movie_data['Is_scheduled'];
     
     ?>
                    <tr>
                        <th data-title="NO"><?php echo $num; ?></th>
                        <td class="m-0 p-0" data-title="Movie posture"><img
                                src='../img/movie/<?php echo $movie_posture; ?>' width='100px' height='100px'
                                alt='pic' /></td>
                        <td data-title="Movie title"><?php echo $movie_title; ?></td>
                        <td data-title="Movie type"><?php echo $movie_type; ?></td>
                        <td data-title="Duration"><?php echo $movie_length; ?></td>
                        <td data-title="Actors"><?php echo $actors; ?></td>
                        <td data-title="Status">
                            <?php 
                        if($status){
                            ?>
                            <form action="view_schedule.php" method="POST" style="display: inline">
                                <input type="hidden" name="movie_id" value="<?php echo $movie_id ?>" />
                                <input type="submit" value="scheduled" title="go to schedule detail"
                                    name="view_schedule_movie" class="btn btn-secondary" />
                            </form>
                            <?php

                        }else{
                            ?>
                            <form action="add_schedule.php" method="POST" style="display: inline">
                                <input type="hidden" name="movie_id" value="<?php echo $movie_id ?>" />
                                <input type="submit" value="set schedule" name="add_schedule"
                                    class="btn btn-warning " />
                            </form>
                            <?php
                        }?>
                        </td>
                        <td data-title="Detail">
                            <form action="view_movie.php" method="POST" style="display: inline">
                                <input type="hidden" name="movie_id" value="<?php echo $movie_id ?>" />
                                <input type="submit" value="view" name="view_movie" class="btn btn-info" />
                            </form>
                        </td>
                        <td data-title="Edit">
                            <form action="edit_movie.php" method="POST" style="display: inline">
                                <input type="hidden" name="movie_id" value="<?php echo $movie_id ?>" />
                                <input type="submit" value="manage" name="manage" class="btn btn-primary" />
                            </form>
                        </td>
                        <td data-title="Delete">
                            <a href="delete_movie.php?movie_id=<?php echo $movie_id; ?>" type="submit" name="delete"
                                class="btn" onclick="return confirm('are you sure you want to delete this movie')">
                                <span style=" color: Tomato;">
                                    <i class="fa-solid fa-trash-can fa-xl"></i>
                                </span>
                            </a>
                        </td>
                    </tr>

                    <?php

        }
        }
        else{
            echo "<h1 class='text-warning'> Movie does not found</h1>";
        }
?>

                </tbody>
            </table>
        </div>
    </div>

    <script src="../js/sweetalert.min.js"></script>

    <?php include 'footer.php';?>
</body>

</html>