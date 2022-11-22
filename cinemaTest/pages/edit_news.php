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
if(isset($_POST['edit_news'])){
    $news_id=$_POST['news_id'];
    $news =  mysqli_query($connection,"SELECT * FROM news WHERE News_id='$news_id'");
$news_data=  mysqli_fetch_assoc($news);
           $headline=$news_data['Headline'];
                            $news_pic=$news_data['Picture'];
                            $description=$news_data['Description'];
                            $date=$news_data['Date'];
    ?>
        <div class="px-4 px-lg-5 row">

            <a href="manage_news.php" class="col-2"><i class="fs-3 fa-solid fa-arrow-left"></i></a>
            <h2 class="col mx-auto fw-bold mb-0 text-center">EDIT NEWS</h2>

        </div>
        <div class="row px-5 py-3 justify-content-center">

            <form class="mx-1 mx-md-4 needs-validation" enctype="multipart/form-data" method="POST"
                action="edit_news.php" novalidate>
                <div class="col-lg">
                    <input type="hidden" name="news_id" value="<?php echo $news_id ?>" />

                    <div class="mb-4">
                        <div class="form-outline flex-fill mb-0 ">
                            <label for="headline" id="headline">Headline:</label><br />
                            <input type="text" name="headline" id="headline" value="<?php echo $headline?>"
                                class="form-control" placeholder="Headline" required />

                            <ul class="invalid-feedback" id="headline_feedback"></ul>
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label">Description</label>
                            <textarea name="description" required rows="7" class="form-control"
                                placeholder="write news full description"><?php echo $description?></textarea>
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="picture">upload picture</label>
                            <input type="file" name="image" id="picture" class="form-control"
                                accept="image/png, image/jpeg , image/jpg" />
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
    $news_id=$_POST['news_id'];
$headline=$_POST['headline'];
    $description=$_POST['description'];
    $picture=$_POST['picture'];
    $date= date("Y-m-d");
        $news_check=  mysqli_query($connection,"SELECT * FROM news WHERE news_id='$news_id'");
    $movie_data=  mysqli_fetch_assoc($news_check);
        $pic=$movie_data['Picture'];
        $pheadline=$movie_data['Headline'];
        $pdescription=$movie_data['Description'];

if(isset($_FILES['image'])){
                    $img_name = $_FILES['image']['name'];
                    $img_type = $_FILES['image']['type'];
                    $tmp_name = $_FILES['image']['tmp_name'];
                    
                    $img_explode = explode('.',$img_name);
                    $img_ext = end($img_explode);
    
                    $extensions = ["jpeg", "png", "jpg"];
                    
                    if(in_array($img_ext, $extensions) === true){
                        $types = ["image/jpeg", "image/jpg", "image/png"];
                        if(in_array($img_type, $types) === true){
                            $time = time();
                            $new_img_name = $time.$img_name;
                            if(move_uploaded_file($tmp_name,"../img/".$new_img_name)){
$update_query="UPDATE news 
SET Headline='$headline', Description='$description', Picture='$new_img_name',Date='$date'
WHERE News_id='$news_id' ";

$result=  mysqli_query($connection,$update_query);

if(!$result){
echo "<script>
swal({
    text: 'UPDATE FAILED!',
    icon: 'error',
    button: 'ok',
}).then(function(){
window.location='edit_news.php';
});
</script>";
}else{
    $action_performer=$_SESSION['account_id'];
                      $detail= $_SESSION['account_type']." change news information the changed information is : ,   Headline :". $pheadline."====> ".$headline ."  ,   Description :". $pdescription."====> ".$description;
mysqli_query($connection,"INSERT INTO log_file(Account_id,Action,Detail) VALUES ('$action_performer','Employee edit news information','$detail')") or die(mysqli_error($connection)) or die(mysqli_error($connection));

           echo "<script>
swal({
    text: 'NEWS INFORMATION UPDATED SUCCESSFULY!',
    icon: 'success',
    button: 'ok',
}).then(function(){
window.location='manage_news.php';
});
</script>";
        }
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
}
else{
        echo "<script>swal('ERROR','image error','warning');</script>";       
$count=  mysqli_num_rows($news_check);
if($count>0){
        if($picture==''){
            $picture=$pic;
        }                   
    }
$update_query="UPDATE news 
SET Headline='$headline', Description='$description', Picture='$picture',Date='$date'
WHERE News_id='$news_id' ";

$result=  mysqli_query($connection,$update_query);

if(!$result){
echo "<script>
swal({
    text: 'UPDATE FAILED!',
    icon: 'error',
    button: 'ok',
}).then(function(){
window.location='edit_news.php';
});
</script>";
}else{
    $action_performer=$_SESSION['account_id'];
                      $detail= $_SESSION['account_type']." change news information the changed information is : ,   Headline :". $pheadline."====> ".$headline ."  ,   Description :". $pdescription."====> ".$description;
mysqli_query($connection,"INSERT INTO log_file(Account_id,Action,Detail) VALUES ('$action_performer','Employee edit news information','$detail')") or die(mysqli_error($connection)) or die(mysqli_error($connection));

           echo "<script>
swal({
    text: 'NEWS INFORMATION UPDATED SUCCESSFULY!',
    icon: 'success',
    button: 'ok',
}).then(function(){
window.location='manage_news.php';
});
</script>";
        }
}
}
?>