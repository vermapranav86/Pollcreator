

<?php


include 'connection.php';

$query = "SELECT * FROM user_data";
$result = $db->query($query);

$output = "";

$output .= "<table>
            <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>DELETE</th>
            <th>UPDATE</th>
            </tr>";


            $id =1;      

while($row = $result->fetch_array())
{
    
    
    $output .= "<tr>
    <td>".$id."</td>
    <td>".$row['first_name']."</td>
    <td>".$row['last_name']."</td>
    <td>".$row['email']."</td>
    <td><button class='btn btn-danger' onclick='delete1(".$row['serial_no'].")'>DELETE</button></td>
   
  <td><button type='button' id='mod' onclick= 'getsno(".$row['serial_no'].")' class='btn btn-primary' data-toggle='modal' data-target='#updatem'>
  Update
</button></td>
   
</tr>";

$id += 1;

}

$output .= "</table>";

echo $output;

$db->close();




?>