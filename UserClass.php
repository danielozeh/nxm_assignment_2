<?php

include 'db_config.php';

define('TIMEZONE', 'Africa/Lagos');
date_default_timezone_set(TIMEZONE);

class UserClass
{
    public $mysql;

    function __construct() {
        $this->mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        $this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

        if(mysqli_connect_errno()){
            echo "Error: Could not connect to database";
            exit;
        }
    }

    public function register($full_name, $date_of_birth, $address, $card_number, $cvv, $card_month, $card_year, $image_target) {

        $user_exists = $this->isUserExist($email);

        if(!$user_exists) {

            $sql = "INSERT INTO users(full_name, date_of_birth, address, card_number, cvv, card_month, card_year, profile_picture) VALUES('$full_name', '$date_of_birth', '$address', '$card_number', '$cvv', '$card_month', '$card_year', '$image_target')";

            $res = mysqli_query($this->db, $sql);

            if($res) {

                $data = array('message' => 'Sign up successful!', 'category' => 'success');
                return $data;
            }

            else { 
                $data = array('message' => 'Failed!, an error occured', 'category' => 'danger');
                return $data;
            }
        }
        $data = array('message' => 'User already exist!', 'category' => 'danger');
        return $data;
    }

    public function isUserExist($full_name) {
		try {
			$sql = "SELECT full_name FROM users WHERE full_name = '$full_name'";
			$res = mysqli_query($this->db, $sql);

			//get row to fetch if user exist
			$row = mysqli_num_rows($res);

			if($row > 0) {
				return true;
				exit();
			}

			else {
				return false;
				exit();
			}
			
		} 
		catch (Exception $e) {
			echo "Message: " .$e->getMessage();
		}
	}

}

?>