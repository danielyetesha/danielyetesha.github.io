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
    <link href="../style/table_filter.css" rel="stylesheet" type="text/css">
    <script src="../js/table_filter.js"></script>
    <script src="../style/bootstrap-5.0.2-dist/js/bootstrap.js"></script>
    <script src="../js/sweetalert.min.js"></script>
</head>

<body>
    <header class="header">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Gondar cinema</a>
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
                        <li class="nav-item nav-act">
                            <a class="nav-link" id="schedule" href="schedule.php">Schedule</a>
                        </li>
                        <li class="nav-item nav-act">
                            <a class="nav-link" id="comingSoon" href="coming_soon.php">Coming Soon</a>
                        </li>
                        <li class="nav-item nav-act">
                            <a class="nav-link" id="news" href="news.php">News</a>
                        </li>
                        <li class="nav-item nav-act">
                            <a class="nav-link" id="about" href="about_us.php">About us</a>
                        </li>
                        <li class="nav-item nav-act">
                            <a class="nav-link" id="contact" href="feedback.php">Feedback</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="login_user.php">
                                <button type="button" class="signup btn m-2 ">
                                    login
                                </button>
                            </a>
                            <!-- Button trigger modal 
                            <button type="button" class="btn btn-light m-2" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Login
                            </button>

                             Modal -->
                            <!--       
                      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <span class="h1 fw-bold mb-0">Gondar Cinema</span>

                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <div class=" d-flex align-items-center m-0">
                                            <div class="card-body px-4 px-lg-5 text-black">
                                                <form method="POST" action="login_check.php">


                                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px">
                                                        Sign into your account
                                                    </h5>

                                                    <div class="form-outline mb-4">
                                                        <input type="text" name="username" id="usernameExample"
                                                            class="form-control form-control-lg" />
                                                        <label class="form-label" for="usernameExample">Username</label>
                                                    </div>

                                                    <div class="form-outline mb-4">
                                                        <input type="password" name="password" id="passwordExample"
                                                            class="form-control form-control-lg" />
                                                        <label class="form-label" for="passwordExample">Password</label>
                                                    </div>

                                                    <div class="pt-1 mb-4 d-grid">
                                                        <button class="btn btn-dark" type="submit" name="login">
                                                            Login
                                                        </button>
                                                    </div>

                                                    <a class="small text-muted" href="#!">Forgot password?</a>
                                                    <p class="mb-5 pb-lg-2" style="color: #393f81">
                                                        Don't have an account?
                                                        <a href="signup.php" style="color: #393f81">Register here</a>
                                                    </p>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            -->
                        </li>
                        <li class="nav-item">
                            <a href="signup.php">
                                <button type="button" class="signup btn btn-primary m-2 ">
                                    Signup
                                </button>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <script src="../js/navbar_active.js"></script>
</body>

</html>