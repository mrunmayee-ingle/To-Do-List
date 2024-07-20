<?php

$db_server = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "task7";

$conn = new mysqli($db_server, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



// class db
// {
//     private $con;

//     public function __construct($db_server = "localhost", $db_username = "root", $db_password = "", $db_name = "task7")
//     {
//         $this->con = new mysqli($db_server, $db_username, $db_password, $db_name);
//         if ($this->con->connect_error) {
//             die("Connection failed: " . $this->con->connect_error);
//         }
//     }

//     public function dbconnect()
//     {
//         return $this->con;
//     }
// }
?>
