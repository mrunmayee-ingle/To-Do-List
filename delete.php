<?php
include 'db.php';
// include 'alltables.class.php';

// $db = new AllTables();

// if (isset($_POST['id'])) {
//     $id = $_POST['id'];
//     $condition = "id = $id";
//     if ($db->DeleteInfo($condition, 'tasks') === "true") {
//         header("Location: index.php");
//         exit();
//     } else {
//         echo "Error deleting record.";
//     }
// } else {
//     echo "No ID provided.";
// }

$id = $_POST['id'];
$sql = "DELETE FROM tasks WHERE id='$id'";

if ($conn->query($sql) === TRUE) 
{
    header("Location: index.php");
} else 
{
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
