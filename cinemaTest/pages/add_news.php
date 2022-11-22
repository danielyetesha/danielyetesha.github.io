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
    <div>
        <div class="header px-4 px-lg-5 row">

            <a href="manage_news.php" class="col-3 fs-2 fw-bold mb-0 text-start"><i
                    class="fa-solid fa-arrow-left"></i></a>
            <h2 class="col mx-auto fw-bold mb-0 text-center">Add News</h2>

        </div>

        <div class=" d-flex align-items-center m-0">
            <div class="card-body px-4 px-lg-5 text-black">

                <form class="mx-1 mx-md-4 needs-validation" enctype="multipart/form-data" method="POST"
                    action="add_news.php" novalidate>
                    <div class="col-lg">
                        <div class="mb-4">
                            <div class="form-outline flex-fill mb-0 ">
                                <label for="headline" id="headline">Headline:</label><br />
                                <input type="text" name="headline" id="headline" class="form-control"
                                    placeholder="Headline" required />

                                <ul class="invalid-feedback" id="headline_feedback"></ul>
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label">Description</label>
                                <textarea name="description" required rows="7" class="form-control"
                                    placeholder="write news full description"></textarea>
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
                            <button type="submit" name="add" class="btn btn-primary btn-lg w-100">
                                Add
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <script src="../js/validation.js"></script>

    <?php include 'footer.php';?>
</body>

</html>

<?php
if(isset($_POST['add'])){
$headline=$_POST['headline'];
$employee_id=$_SESSION['account_id'];
    $description=$_POST['description'];
    $date= date("Y-m-d");


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
                                $news_query="INSERT INTO news(Employee_id,Headline,Description,Date,Picture) VALUES ('$employee_id','$headline','$description','$date','$new_img_name')";
                                $result = mysqli_query($connection,$news_query) or die(mysqli_error($connection));
                                    if(!$result){
                                        echo "<script>swal('ERROR','FAILD TO ADD MOVIE','error');</script>";
                                    }else{
                                        $action_performer=$_SESSION['account_id'];
                      $detail= $_SESSION['account_type']."(".$_SESSION['username'].") add a new information  ,   the information has :  ,    headline =  ".$headline." ,    description = ".$description;
mysqli_query($connection,"INSERT INTO log_file(Account_id,Action,Detail) VALUES ('$action_performer','Add news to the site','$detail')") or die(mysqli_error($connection));

                                                echo "
                                                <script>
                                                swal('good job','REGISTRATION SUCCESSFUL','success');
                                                </script>
                                                ";
                                                
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
    }
}
?>