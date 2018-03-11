<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

define("DB_DRIVER", "mysql");
define("DB_HOST", "localhost");
define("DB_NAME", "rodionova");
define("DB_USER", "rodionova");
define("DB_PASS", "neto1663");
?>

<!-- Форма ввода задачи-->
<!DOCTYPE html>
<html>
<head>
	<title>Список дел</title>
	<style type="text/css">
		table {
    		border-collapse: collapse;
    		border: 1px solid #ccc;
   		}
   		tr, td, th {
    		padding: 5px;
   			border: 1px solid #ccc;
   		}
   		th {
    		background-color: #EFEEEC; 
    		font-weight: bold; 
    		text-align: center;
   		}
	</style>
</head>
<body>
	<h1>Список дел директора с двумя детьми</h1>
	<form method="POST">
		<input type="text" name="description" placeholder="Что нужно сделать" value="">
        <input type="submit" name="save" value="Добавить">
	</form>

<?php

$_POST;
var_dump($_POST);


try
{
	//подключаемся к базе данных
	$connect_str=DB_DRIVER . ";host=" . DB_HOST . ";dbname=" . DB_NAME;
	$db=new PDO($connect_str,DB_USER, DB_PASS); 

	$error_array=$db->errorInfo();
	if ($db->errorCode()!=0000) 
	{
		echo "SQL error: " . $error_array[2] . "<br /><br />";
	}

	else
	{
		$row=[];

		//делаем запрос к таблице базы данных, чтобы вывести таблицу с задачами из БД
    	
    	$result=$db->query("SELECT 'id', 'description' AS 'Задача',  `date_added` AS 'Дата создания задачи', 'is_done' AS 'Статус' FROM tasks");
		
		while ($row=$result->fetch()) 
		{
			print_r($row);
		}
	}

	//добавляем новую строку в таблицу с данными из формы
	/*$newtask = $db->exec("INSERT INTO tasks ('description', 'date_added', 'is_done') VALUES ('$_POST['description']', date(DATE_RFC822), 'New')");

	while ($row=$newtast->fetch()) 
		{
			print_r($row);
		}
*/
}




catch(PDOException $e)
{
	die("Error: ".$e->getMessage());
}

?>

 
</body>
</html> 