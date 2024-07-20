<?php
include 'db.php';
// include 'alltables.class.php';

// $db = new AllTables();
// echo "<pre>";
// print_r($_POST);
// die();

// if (isset($_POST['id'])){
//     $id = $_POST['id'];
//     $toggle = $_POST['toggle'];
//     if($toggle == 'on'){
//         $tog = 1;
//     }else{
//         $tog = 0;
//     }
//     echo $tog;
//     $data = ['done' => $tog];
//     $condition = "id = $id";
//     echo $var = $db->EditInfo($data, $condition, 'tasks');
//     if ($var){
//         header("Location: index.php");
//     }else 
//     {
//         echo "Error updating record.";
//     }
// }
$id = $_POST['id'];
$sql = "UPDATE tasks SET done = NOT done WHERE id='$id'";

if ($conn->query($sql) === TRUE) 
{
    header("Location: index.php");
} else 
{
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>
