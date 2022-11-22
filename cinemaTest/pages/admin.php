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
    <link rel="stylesheet" href="../style/sidebar.css" />
</head>

<body>
    <?php
    include 'header_check.php';
    if(!(isset($_SESSION['username'])&&($_SESSION['account_type']=='admin'))){
            echo "<script>window.location.href='page_not_allowed.php';</script>";
        }
           include 'welcome.php';
           include 'footer.php';
           ?>

</body>

</html>