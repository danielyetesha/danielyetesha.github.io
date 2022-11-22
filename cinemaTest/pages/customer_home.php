<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/user_home.css" />

    <script src="../style/bootstrap-5.0.2-dist/js/bootstrap.js"></script>
    <title>Gondar cinema</title>
</head>

<body>
    <?php
    include 'header_check.php';
if(!(isset($_SESSION['username'])&&($_SESSION['account_type']=='customer'))){
        echo "<script>window.location.href='page_not_allowed.php';</script>";
    }
    ?>
    <div class="container">
        <div class="hexagon">
            <a href="view_ticket_history.php">
                <div class="shape">
                    <img src="../img/customer/tickets.png" alt="">
                    <div class="content">
                        <h1>View Ticket History</h1>
                    </div>
                </div>
            </a>
        </div>
        <div class="hexagon">
            <a href="view_comment_history.php">
                <div class="shape">
                    <img src="../img/customer/comment.jpg" alt="">
                    <div class="content">
                        <h1>Comment History</h1>
                    </div>
                </div>
            </a>
        </div>
        <div class="hexagon">
            <a href="ballance.php">
                <div class="shape">
                    <img src="../img/customer/ballance.jpg" alt="">
                    <div class="content">
                        <h1>Ballance</h1>
                    </div>
                </div>
            </a>
        </div>
        <div class="hexagon">
            <a href="schedule.php">
                <div class="shape">
                    <img src="../img/customer/schedule.jpg" alt="">
                    <div class="content">
                        <h1>View Schedule</h1>
                    </div>
                </div>
            </a>
        </div>
        <div class="hexagon">
            <a href="news.php">
                <div class="shape">
                    <img src="../img/customer/news.jpg" alt="">
                    <div class="content">
                        <h1>Show News</h1>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <?php include 'footer.php';?>
</body>

</html>