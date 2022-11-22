<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/bootstrap-5.0.2-dist/css/bootstrap.css" />
    <link rel="stylesheet" href="../style/beforeLogin.css" />
    <script src="../style/bootstrap-5.0.2-dist/js/bootstrap.js"></script>

    <link rel="stylesheet" href="../style/user_home.css" />
    <title>Gondar cinema</title>
</head>

<body>
    <?php
    include 'header_check.php';
    if(!(isset($_SESSION['username'])&&($_SESSION['account_type']=='admin'))){
        echo "<script>window.location.href='page_not_allowed.php';</script>";
    }
    ?>
    <div class="container">
        <div class="hexagon">
            <a href="movie_report.php">

                <div class="shape">
                    <img src="../img/admin/view_report.jpg" alt="">
                    <div class="content">
                        <h1>View Report</h1>
                    </div>
                </div>
            </a>
        </div>
        <div class="hexagon">
            <a href="manage_employee.php">
                <div class="shape">
                    <img src="../img/admin/manage_employee.jpg" alt="">
                    <div class="content">
                        <h1>Manage Employee</h1>
                    </div>
                </div>
            </a>
        </div>
        <div class="hexagon">
            <a href="view_comment.php">
                <div class="shape">
                    <img src="../img/admin/comment.jpg" alt="">
                    <div class="content">
                        <h1>View Comment</h1>
                    </div>
                </div>
            </a>
        </div>
        <div class="hexagon">
            <a href="view_customer.php">
                <div class="shape">
                    <img src="../img/admin/customer.png" alt="">
                    <div class="content">
                        <h1>View Customer</h1>
                    </div>
                </div>
            </a>
        </div>
        <div class="hexagon">
            <a href="view_log_file.php">
                <div class="shape">
                    <img src="../img/admin/customer.png" alt="">
                    <div class="content">
                        <h1>View Log File</h1>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <?php include 'footer.php';?>
</body>

</html>