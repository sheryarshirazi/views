<?php
/**
* Use to register user account and Authentication
*/
class UserRegistration
{
	private $regID, $username, $age, $gender, $city, $country, $postCode, $cellNumber, $cnic, $dob,
	$address, $email, $password, $cvUrl;
	
	private $userType;
	private $account_status_type,$account_status_desc;
	private $db;

	function registerUser($firstName,$username, $age, $gender, $city, $country, $postCode, $cellNumber, $cnic, $dob,
	$address, $email, $password, $cvUrl = "", $userType)
	{
		$db = new DatabaseConnection();
		$conn = $db->connect();

		$account_status_type = "dummy"; 
		$account_status_desc = "dummy"; 

		try {

		    $conn->beginTransaction();
		    
			// account_status return account_status_id
		    $conn->query("INSERT INTO `account_status` (account_status_type,account_status_desc) 
		     	VALUES('". $account_status_type ."', '".$account_status_desc."');");
		    
		    $account_status_id = $conn->lastInsertId();

		    // user_type return user_type_id
		    $conn->query("INSERT INTO `user_type` (user_typeName) VALUES('". $userType ."');");
		    $user_type_id = $conn->lastInsertId();


		    // city return city_id
		    $conn->query("INSERT INTO `city` (city_name) VALUES('". $city ."');");
		    $city_id = $conn->lastInsertId();

		    // country return country_id
		    $conn->query("INSERT INTO `country` (country_name) VALUES('". $country ."');");
		    $country_id = $conn->lastInsertId();

		    // user
		    $conn->query("INSERT INTO `users` (name,email,address,user_type_id,date_time,cnic_no,age,gender,city_id,country_id,
		    	postalCode,DOB,password,account_status_id) 
		    VALUES('".$firstName."','".$email."','".$address."','".$user_type_id."','".date("Y-m-d H:i:s")."','".$cnic."',
		    	".$age.",'".$gender."','".$city_id."','".$country_id."','".$postCode."','".$dob."','".$password."',".$account_status_id.");");
		    
		    $status = $conn->commit();
		    return $status;

		} catch (Exception $e) {
		    
		    $conn->rollBack();
		    die($e->getMessage());
		    Error::$instantError = $e->getMessage();

		}

	}
}
?>