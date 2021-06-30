<?php

include 'connection.php';

$uname = $_POST['uname'];
$pass = $_POST['pass'];



// $en_pass = sha1($pass);

// Login Check Query

$login_query = "SELECT * FROM admin_data WHERE uname = '$uname' and pass = '$pass'";

$check_result = $db->query($login_query);

$num = mysqli_num_rows($check_result);


if($num == 1){

    session_start();


    $row = $check_result->fetch_array();

    $_SESSION['uname'] = $row['uname'];
    $_SESSION['pass'] = $pass;
    $_SESSION['key'] = "prateek";

    echo "success";

    $db->close();


}

else{

    echo "Login failed";

    $db->close();

}




?>