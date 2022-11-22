<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gondar cinema</title>
    <link rel="stylesheet" href="../style/bootstrap-5.0.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../style/fontawesome-free-6.1.1-web/css/all.css" />
    <link rel="stylesheet" href="../style/beforeLogin.css" />
    <link rel="stylesheet" href="../style/table.css" />

    <link href="../style/table_filter.css" rel="stylesheet" type="text/css">
    <script src="../js/table_filter.js"></script>
    <script src="../js/validation.js"></script>
    <script src="../style/bootstrap-5.0.2-dist/js/bootstrap.js"></script>
    <script src="../js/sweetalert.min.js"></script>


</head>

<body>

    <header class="header">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" onclick="myFunction()" href="#">Gondar cinema</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div class="nav-act collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                    <ul class="navbar-nav m-auto mb-2 mb-lg-0 top-nav">
                        <li class="nav-item nav-act">
                            <a class="nav-link" id="home" href="index.php">Home</a>
                        </li>
                        <li class="nav-item  nav-act">
                            <a class="nav-link" id="schedule" href="schedule.php" target="main">Schedule</a>
                        </li>
                        <li class="nav-item nav-act">
                            <a class="nav-link" id="comingSoon" href="coming_soon.php" target="#main">Coming Soon</a>
                        </li>
                        <li class="nav-item nav-act">
                            <a class="nav-link" id="news" href="news.php" target="#main">News</a>
                        </li>
                        <li class="nav-item nav-act">
                            <a class="nav-link" id="about" href="about_us.php" target="#main">About us</a>
                        </li>
                        <li class="nav-item nav-act">
                            <a class="nav-link" id="contact" href="feedback.php" target="#main">Feedback</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <?php
                 echo $_SESSION['username'];
                  ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="edit_profile.php">Profile</a></li>
                                <li>
                                    <form action="logout.php" method="POST" onsubmit="return logout(this);">
                                        <button class="dropdown-item btn-del" type="submit">logout</button>
                                    </form>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="edit_profile.php">
                                <img src="../img/profile/<?php echo $_SESSION['profile_pic']; ?>" class="rounded-circle"
                                    width="50px" height="50px" alt="pp" />
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 py-auto d-lg-block sidebar bg-white" id="sidebarMenu">
                <?php
include './Connection.php';
            if($_SESSION['account_type']=='admin'){
                include 'admin_navbar.php';
            }elseif ($_SESSION['account_type']=='employee') {
                $account_id=$_SESSION['account_id'];
                $query1="select * from employee where Employee_id='$account_id'";
                    $result1 = mysqli_query($connection,$query1);
                    $data1=  mysqli_fetch_assoc($result1);
                    $role=$data1['Role'];
                    if($role=='normal'){
                        include 'employee_navbar.php';
                    }else if($role=='ticket_checker'){
                         include 'ticket_checker_navbar.php';
                    }
            }elseif ($_SESSION['account_type']=='customer') {
                include 'customer_navbar.php';
            }

            ?>
            </div>
            <div class="col-lg-9 p-0" style="min-height:700px;">

                <script>
                function logout(form) {
                    swal({
                            title: "Are you sure?",
                            text: "Do you want to leave this site?",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((isOkay) => {
                            if (isOkay) {
                                form.submit();
                            }
                        });
                    return false;
                }

                function delete_data(form) {
                    swal({
                            title: "Are you sure?",
                            text: "Do you want to delete this data?",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((isOkay) => {
                            if (isOkay) {
                                form.submit();
                            } else {
                                swal(`delete canceled`);
                            }
                        });
                    return false;
                }

                function myFunction() {
                    var element = document.getElementById("sidebarMenu");
                    element.classList.toggle("col-0");
                }
                </script>
                <script src="../js/navbar_active.js"></script>
</body>

</html>