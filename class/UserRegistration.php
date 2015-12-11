<?php
/**
* Use to register user account and Authentication
*/
class UserRegistration
{
	private $regID, $username, $age, $gender, $city, $country, $postCode, $cellNumber, $cnic, $dob,
	$address, $joinDate, $email, $password, $cvUrl;
	
	private $userType;

	private $db;

	function registerUser($username, $age, $gender, $city, $country, $postCode, $cellNumber, $cnic, $dob,
	$address, $joinDate, $email, $password, $cvUrl = "", $username, $userType="employee")
	{
		$db = new DatabaseConnection();
		$conn = $db->connect();

		try {

		    $conn->beginTransaction();
		    
		    // user_type return user_type_id
		    $conn->query("INSERT INTO `user_type` (user_typeName) VALUES('". $userType ."');");
		    $user_type_id = $conn->lastInsertId();

			// account_status return account_status_id
		    $conn->query("INSERT INTO `account_status` (account_status_type,account_status_desc) 
		    	VALUES('". $account_status_type ."', '".$account_status_desc."');");

		    $account_status_id = $conn->lastInsertId();


		    // city return city_id
		    $conn->query("INSERT INTO `city` (city_name) VALUES('". $city ."');");
		    $city_id = $conn->lastInsertId();

		    // country return country_id
		    $conn->query("INSERT INTO `country` (country_name) VALUES('". $country ."');");
		    $country_id = $conn->lastInsertId();

		    $conn->query("INSERT INTO `users` (name,email,address,user_type_id,date_time,cnic,age,gender,city_id,country_id,
		    	postalCode,DOB,password,account_status_id) 
		    VALUES('".."','email','address','user_type_id','date_time','cnic','age','gender','city_id','country_id',
		    	'postalCode','DOB','password','account_status_id');");
		    
		    $conn->commit();  

		} catch (Exception $e) {
		    
		    $conn->rollBack();
		    Error::$instantError = $e->getMessage();

		}



	}
}
?>