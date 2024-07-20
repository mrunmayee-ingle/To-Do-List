<?php
include 'db.php';

$task = $_POST['task'];
$sql = "INSERT INTO tasks (task) VALUES ('$task')";

if ($conn->query($sql) === TRUE) {
    $id = $conn->insert_id;
    echo "<tr data-id='$id'>
            <td><input type='checkbox'></td>
            <td>".($task)."</td>
            <td><button class='delete-button'>Cancel</button></td>
          </tr>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

// include 'db.php';
// // include 'alltables.class.php';

// // $insert = new AllTables();
// $task = $_POST['task'];
// // $taskData = ['task' => $task];

// // if($insert->AddInfo($taskData, 'tasks') === "true")
// // {
// //     header("Location: index.php");
// // } else 
// // {
// //  echo "Error: " . $insert . "<br>" . $conn->error;
// // }
// $sql = "INSERT INTO tasks (task) VALUES ('$task')";

// if ($conn->query($sql) === TRUE) {
//     header("Location: index.php");
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

// $conn->close();
?>
