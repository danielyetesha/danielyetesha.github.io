<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/user_home.css" />
    <title>Document</title>
    <script src="../style/bootstrap-5.0.2-dist/js/bootstrap.js"></script>
</head>

<body>
    <?php
    include 'header_check.php';
if(!(isset($_SESSION['username'])&&($_SESSION['account_type']=='employee'))){
        echo "<script>window.location.href='page_not_allowed.php';</script>";
    }
    ?>
    <div class="container">
        <div class="hexagon">
            <a href="ticket_check.php">
                <div class="shape">
                    <img src="../img/employee/movies.jpg" alt="">
                    <div class="content">
                        <h1>Ticket Check</h1>
                    </div>
                </div>
            </a>

        </div>

        <div class="hexagon">
            <a href="view_ticket.php">
                <div class="shape">
                    <img src="../img/employee/tickets.png" alt="">
                    <div class="content">
                        <h1>View Reserved Ticket</h1>
                    </div>
                </div>
            </a>

        </div>

    </div>
    <?php include 'footer.php';?>
</body>

</html>