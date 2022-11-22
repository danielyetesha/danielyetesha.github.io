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
    <link rel="stylesheet" href="../style/bootstrap-5.0.2-dist/css/bootstrap.css" />
    <link rel="stylesheet" href="../style/fontawesome-free-6.1.1-web/css/all.css" />
    <link rel="stylesheet" href="../style/beforeLogin.css" />
    <link rel="stylesheet" href="../style/sidebar.css" />

    <script src="../style/bootstrap-5.0.2-dist/js/bootstrap.js"></script>
</head>

<body>
    <div class="position-sticky">
        <div class="nav-act list-group list-group-flush mx-3 mt-4">
            <a href="customer_home.php" target="adminFrame"
                class="list-group-item list-group-item-action py-2 my-2 ripple">
                <i class="fa-solid fa-house me-3"></i><span>Home</span>
            </a>

            <a href="view_ticket_history.php" class="list-group-item list-group-item-action py-2 my-2 ripple"
                aria-current="true">
                <i class="fas fa-clock-rotate-left me-3"></i><span>View Ticket History</span>
            </a>
            <a href="view_comment_history.php" class="list-group-item list-group-item-action py-2 my-2 ripple">
                <i class="fa-solid fa-comment me-3"></i><span>Comment History</span>
            </a>
            <a href="ballance.php" class="list-group-item list-group-item-action py-2 my-2 ripple">
                <i class="fa-solid fa-dollar-sign me-3"></i><span>Ballance</span>
            </a>
            <a href="schedule.php" class="list-group-item list-group-item-action py-2 my-2 ripple">
                <i class="fa-solid fa-calendar-days me-3"></i><span>View schedule</span>
            </a>
            <a href="news.php" class="list-group-item list-group-item-action py-2 my-2 ripple">
                <i class="fa-solid fa-microphone-lines me-3"></i><span>Show News</span>
            </a>

        </div>
    </div>

</body>

</html>