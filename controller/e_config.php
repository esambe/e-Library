<?php 

// define('DB_HOST', 'localhost');
// define('DB_USER', 'root');
// define('DB_PASSWORD', '');
// define('DB_NAME', 'elibrary');

// $connection = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
// mysql_select_db(DB_NAME);



$conn = mysqli_connect("localhost", "root", "", "elibrary");
if (mysqli_connect_errno($conn)) {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


 ?>