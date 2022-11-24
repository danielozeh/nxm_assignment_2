<?php

include 'UserClass.php';
$user_class = new UserClass();

if(isset($_POST['q']) && $_POST['q']!="") {
    $q = $_POST['q'];

    switch($q) {

        case 'register':
            $full_name = $_POST['full_name'];
            $date = $_POST['date'];
            $month = $_POST['month'];
            $year = $_POST['year'];

            $date_of_birth = $date. '/' . $month . '/' . $year;
            $address = $_POST['address'];
            $card_number = $_POST['card_number'];
            $cvv = $_POST['cvv'];
            $card_month = $_POST['card_month'];
            $card_year = $_POST['card_year'];

            $image = $_FILES['profile_picture']['name'];
            $image_target_location = "images/".time().basename($image);
            $image_target = time().basename($image);

            if(!move_uploaded_file($_FILES['profile_picture']['tmp_name'], $image_target_location)) {
                $_SESSION['flash_messages'] = array("message" => 'Failed to upload profile picture', "category" => "danger");
                return;
            }

            if($full_name == "") {
                $_SESSION['flash_messages'] = array("message" => 'Full name is required', "category" => "danger");
                return;
            }

            if($date == "" || $month == "" || $year == "") {
                $_SESSION['flash_messages'] = array("message" => 'Please fill date of birth', "category" => "danger");
                return;
            }

            if($address == "") {
                $_SESSION['flash_messages'] = array("message" => 'Address cannot be empty', "category" => "danger");
                return;
            }

            if($card_number == "") {
                $_SESSION['flash_messages'] = array("message" => 'Card number cannot be empty', "category" => "danger");
                return;
            }

            if($cvv == "") {
                $_SESSION['flash_messages'] = array("message" => 'Card cvv cannot be empty', "category" => "danger");
                return;
            }

            if($card_year == "") {
                $_SESSION['flash_messages'] = array("message" => 'Card year cannot be empty', "category" => "danger");
                return;
            }

            if($card_month == "") {
                $_SESSION['flash_messages'] = array("message" => 'Card month cannot be empty', "category" => "danger");
                return;
            }

            $register = $user_class->register($full_name, $date_of_birth, $address, $card_number, $cvv, $card_month, $card_year, $image_target);

            if($register['category'] == 'success') {
                $_SESSION['flash_messages'] = array("message" => $register['message'], "category" => "success");
                return true;
            }
            $_SESSION['flash_messages'] = array("message" => $register['message'], "category" => "danger");
            return;
        break;

    }

}

?>