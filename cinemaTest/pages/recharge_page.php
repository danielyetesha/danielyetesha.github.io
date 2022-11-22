<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="stylesheet" href="../style/login_style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="../style/bootstrap-5.0.2-dist/js/bootstrap.js"></script>
</head>

<body>

    <?php
    
include 'connection.php';
    include 'header_check.php';
if(!(isset($_SESSION['username'])&&($_SESSION['account_type']=='customer'))){
        echo "<script>window.location.href='page_not_allowed.php';</script>";
    }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <div class="modal-header">
                    <span class="h3 mb-2">Recharge Ballance</span>

                    <a href="ballance.php" class="btn btn-close"></a>
                </div>

                <div class=" d-flex align-items-center">
                    <div class="card-body text-black">
                        <form method="POST" class="needs-validation" action="pay.php" novalidate>
                            <label for="c2">Currency</label>
                            <input type="hidden" name="DeliveryFee" value="0" />
                            <input type="hidden" name="Discount" value="0" />
                            <input type="hidden" name="Tax1" value="0" />
                            <input type="hidden" name="Tax2" value="0" />
                            <input type="hidden" name="HandlingFee" value="0" />
                            <input type="number" min="1" step="1" class="mb-3 form-control currency" id="c2"
                                name="price" placeholder="Amount of birr" required />
                            <button class="btn btn-primary form-control" type="submit" name="recharge_balance">
                                Pay with YenePay
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="../js/sweetalert.min.js"></script>

        <script src="../js/validation.js"></script>
</body>

</html>