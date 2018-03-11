<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

define("DB_DRIVER", "mysql");
define("DB_HOST", "localhost");
define("DB_NAME", "rodionova");
define("DB_USER", "rodionova");
define("DB_PASS", "neto1663");


try
{
	$connect_str = DB_DRIVER . ':host='. DB_HOST . ';dbname=' . DB_NAME;
	$db = new PDO($connect_str,DB_USER,DB_PASS);
 
	$rows = $db->exec("CREATE TABLE `tasks`(
		id INT PRIMARY KEY AUTO_INCREMENT,
		description VARCHAR(20) NOT NULL DEFAULT '',
		date_added DATETIME NOT NULL,
		is_done VARCHAR(50) NOT NULL DEFAULT '') 
		ENGINE=InnoDB;
		");

	//echo "База " . DB_NAME . " есть!";
 
}
catch(PDOException $e)
{
	//echo "База не создана";
	die("Error: ".$e->getMessage());

}

?>