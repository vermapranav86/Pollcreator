

<?php


include 'connection.php';

$query = "SELECT * FROM pvpoll";
$result = $db->query($query);

$output = "";

$output .= "<table>
            <tr>
            <th>ID</th>
            <th>Poll Id</th>
            <th>Question</th>
            
            </tr>";


$id = 1;

while ($row = $result->fetch_array()) {


    $output .= "<tr>
    <td>" . $id . "</td>
    <td>" . $row['pvid'] . "</td>
    <td>" . $row['ques'] . "</td>
   
   
</tr>";

    $id += 1;
}

$output .= "</table>";

echo $output;

$db->close();




?>