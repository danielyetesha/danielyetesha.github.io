<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../style/seat_style.css" />
    <title>Movie Seat Booking</title>
    <script src="../style/bootstrap-5.0.2-dist/js/bootstrap.js"></script>
</head>

<body>
    <ul class="showcase" style="margin-top:70px;">
        <li>
            <div class="seat"></div>
            <small>N/A</small>
        </li>

        <li>
            <div class="seat selected"></div>
            <small>Selected</small>
        </li>

        <li>
            <div class="seat occupied"></div>
            <small>Occupied</small>
        </li>
    </ul>
    <?php
    $schedule_id=$_GET['schedule_id'];
    $price=$_GET['price'];
    ?>
    <div class="container">
        <div class="screen"></div>
        <form action="payment_option.php" method="post">

            <?php 
        $seat_number=1;
        for ($x = 0; $x < 15; $x++) {
            ?>
            <div class="row">
                <?php for ($y = 0; $y < 40; $y++) {
                    $seat=  mysqli_query($connection,"SELECT * FROM seat WHERE seat_no='$seat_number'AND Schedule_id='$schedule_id'")or die(mysqli_error($connection));
                $fetch = mysqli_fetch_assoc($seat);
                $status=$fetch['Status'];
                ?>

                <div class="seat <?php if($status=='reserved'){echo 'occupied';}?>">
                    <?php if($status=='unreserved'){?>
                    <input onclick="isCheck(event)" type="checkbox" id="check" name="check_list[]"
                        value="<?php echo $seat_number?>" />
                    <?php }?>
                </div>
                <?php 
            $seat_number++;
        }
        ?>
            </div>
            <?php } ?>
            <hr>
            <?php for ($x = 0; $x < 5; $x++) {?>
            <div class="row">
                <?php for ($y = 0; $y < 40; $y++) {
                $seat=  mysqli_query($connection,"SELECT * FROM seat WHERE seat_no='$seat_number' AND Schedule_id='$schedule_id'")or die(mysqli_error($connection));
                $fetch = mysqli_fetch_assoc($seat);
                $status=$fetch['Status'];
                ?>
                <div class="seat <?php if($status=='reserved'){echo 'occupied';}?>">
                    <?php if($status=='unreserved'){?>
                    <input onclick="isCheck(event)" type="checkbox" id="check" name="check_list[]"
                        value="<?php echo $seat_number?>" />
                    <?php }?>
                </div>
                <?php 
         $seat_number++;
        } ?>
            </div>
            <?php } ?>


    </div>

    <p class="text">
        You have selected <span id="count">0</span> seats for a price of <span id="total">0</span> birr
    </p>
    <input type="hidden" name="schedule_id" value="<?php echo $schedule_id ?>" />
    <input type="hidden" name="price" id="price" value="<?php echo $price ?>" />
    <input type="submit" class="reserve" name="reserve" value="Reserve" />
    </fkorm>
    <script>
    function isCheck(event) {
        if (event.target.checked == true) {
            event.target.parentElement.classList.add("selected");
        } else {
            event.target.parentElement.classList.remove("selected");
        }
        var n = document.querySelectorAll("input[type='checkbox']:checked").length;
        var birr = document.getElementById("price").value
        price = birr * n
        document.getElementById("count").innerHTML = n
        document.getElementById("total").innerHTML = price
    }
    </script>
</body>

</html>