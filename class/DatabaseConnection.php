<?php
/**
* to connect database
*/
class DatabaseConnection
{
	/**
	 * connect to database
	 * @return object connection object
	 */
	public function connect()
	{
		$host   = 'localhost';
		$dbname = 'dihari';
		$db_username = 'root'; 
		$db_password = '';

		$conn = new PDO(
		    'mysql:host=' . $host.
		    ';dbname=' . $dbname,
		    $db_username,
		    $db_password
		);
		return $conn;
	}
}

?>