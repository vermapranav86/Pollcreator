<?php

include 'connection.php';

$sno = $_POST['sno'];

$query = "DELETE FROM `user_data` WHERE serial_no = '$sno'";
$result = $db->query($query);




$db->close();


?>