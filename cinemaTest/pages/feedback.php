<?php
include './Connection.php';
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
    ?>
    <div class="container-fluid">
        <div class="container ">

            <div class="row  p-5">
                <div class="col-md-7 bg-light shadow rounded p-5">
                    <form class=" needs-validation" method="POST" action="feedback.php" novalidate>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">First Name</label>
                                <input type="text" name="first_name" class="form-control" required
                                    pattern="[A-Za-z]{3,}" placeholder="First Name">
                            </div>
                            <div class="col mb-3">
                                <label class="form-label">Last Name</label>
                                <input type="text" name="last_name" class="form-control" placeholder="Last Name"
                                    pattern="[A-Za-z]{3,}" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email_address" class="form-control" placeholder="name@email.com"
                                required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Subject</label>
                            <input type="text" name="subject" class="form-control" placeholder="Subject">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Message</label>
                            <textarea name="message" required rows="7" class="form-control"
                                placeholder="write your message here"></textarea>
                        </div>

                        <div class="d-grid">

                            <button type="submit" name="contact" class="btn btn-primary ">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-md-5 d-none d-md-block">
                    <div>
                        <img src="../img/contactus.jpg" alt="Image" class="img-fluid ">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php';?>
    <script src="../js/sweetalert.min.js"></script>
    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
    </script>


</body>

</html>

<?php

if(isset($_POST['contact'])){
  echo "hello everyone";
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$email_address=$_POST['email_address'];
$subject=$_POST['subject'];
$message=$_POST['message'];


$account_query="INSERT INTO contact_us(First_name, Last_name,Email_address,Subject,Message) VALUES 
('$first_name','$last_name','$email_address','$subject','$message')";

$result=  mysqli_query($connection,$account_query);

if(!$result){
echo "<script>swal('ERROR','UNABLE TO SEND MESSAGE','error');</script>";
}else{
   
    
echo "<script>
swal({
    title:'good job',
    text: 'Thank you for comment us!',
    icon: 'success',
    button: 'ok',
}).then(function(){
window.location='index.php';
});
</script>";   
}
}



?>