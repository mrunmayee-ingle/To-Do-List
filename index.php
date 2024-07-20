<?php

include ('db.php');
// include ('alltables.class.php');
// $db = new AllTables();

// $sql = "SELECT * FROM tasks";
// $result = $db->getInfo('', $sql);
$sql = "SELECT * FROM tasks";
$result = $conn->query($sql);

$data_rows = "";
while($row = $result->fetch_assoc()) {
    $taskClass = $row['done'] ? 'done-task' : '';
    $data_rows .=  "<tr data-id='" . $row['id'] . "'>
                        <td style='text-align: center;'>
                            <input type='checkbox' " . ($row['done'] ? 'checked' : '') . ">
                        </td>
                        <td class='$taskClass'>" . ($row['task']) . "</td>
                        <td>
                            <button type='button' class='delete-button'>Cancel</button>
                        </td>
                    </tr>";
}
include('index.html');
?>
