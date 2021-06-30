<?php

include "connection.php";

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$sno = $_POST['sno'];




$query = "UPDATE user_data SET first_name='$fname', last_name='$lname',
        email='$email'  WHERE serial_no = $sno";

$result = $db->query($query);

$db->close();



?>