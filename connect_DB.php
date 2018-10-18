<?php
	$host = 'localhost'; // адрес сервера 
	$database = 'rush00'; // имя базы данных
	$user = 'root'; // имя пользователя
	$password = '124355124355'; // пароль
	$conn = new mysqli($host, $user, $password, $database);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: ".$conn->connect_error);
	}
	//$sql = "INSERT INTO `users` (`id`, `name`, `pass`, `admin`) VALUES (NULL, 'asd', 'fd', '1');";

	// if ($conn->query($sql) === TRUE) {
	//     echo "New record created successfully";
	// } else {
	//     echo "Error: " . $sql . "<br>" . $conn->error;
	// }
?>