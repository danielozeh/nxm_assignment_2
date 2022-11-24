<?php
session_start();

include 'UserController.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <link href="paymentform.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class="wrapper">
        <h2>Sign up</h2>
        <?php 
            if(isset($_SESSION['flash_messages']) != "") {
                ?>
                <div class="alert alert-<?php echo $_SESSION['flash_messages']['category']; ?>" role="alert alert-dismissible">
                    <center> <?php echo $_SESSION['flash_messages']['message']; ?> </center>
                </div>
            <?php }

            unset($_SESSION['flash_messages']);
        ?>
        <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="q" value="register">
            <h4>Account</h4>
            <div class="input-group">
                <div class="input-box">
                    <input type="text" placeholder="Full Name" required class="name" name="full_name">
                    <i class="fa fa-user icon"></i>
                </div>
            </div>
            <div class="input-group">
                <div class="input-box">
                    <input type="file" required class="name" name="profile_picture">
                    <i class="fa fa-file icon"></i>
                </div>
            </div>
            <div class="input-group">
                <div class="input-box">
                    <h4> Date of Birth</h4>
                    <input type="text" placeholder="DD" class="dob" name="date">
                    <input type="text" placeholder="MM" class="dob" name="month">
                    <input type="text" placeholder="YYYY" class="dob" name="year">
                </div>
            </div>
            <div class="input-group">
                <div class="input-box">
                    <h4>Address</h4>
                    <textarea  required class="name" name="address"> </textarea>
                </div>
            </div>
            <div class="input-group">
                <div class="input-box">
                    <h4>Payment Details</h4>
                    <input type="radio" name="pay" id="bc1" checked class="radio">
                    <label for="bc1"><span><i class="fa fa-cc-visa"></i> Credit Card</span></label>
                </div>
            </div>
            <div class="input-group">
                <div class="input-box">
                    <input type="tel" placeholder="Card Number" required class="name" name="card_number">
                    <i class="fa fa-credit-card icon"></i>
                </div>
            </div>
            <div class="input-group">
                <div class="input-box">
                    <input type="tel" placeholder="Card CVC" required class="name" name="cvv">
                    <i class="fa fa-user icon"></i>
                </div>
                <div class="input-box">
                    <select name="card_month">
                        <option>01 jun</option>
                        <option>02 jun</option>
                        <option>03 jun</option>
                    </select>
                    <select name="card_year">
                        <option>2020</option>
                        <option>2021</option>
                        <option>2022</option>
                    </select>
                </div>
            </div>
            <div class="input-group">
                <div class="input-box">
                    <button type="submit">SIGN UP</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>