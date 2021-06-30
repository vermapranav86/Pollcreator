<?php

session_start();

if(isset($_POST['uname'] )){

include 'connection.php';

$email = $_POST['uname'];
$pass = $_POST['pass'];

$en_pass = sha1($pass);

// Login Check Query

$login_query = "SELECT * FROM user_data WHERE email = '$email' and password = '$en_pass'";

$check_result = $db->query($login_query);

$num1 = mysqli_num_rows($check_result);

// Invalid Password Query

$email_check_query = "SELECT * FROM user_data WHERE email = '$email'";

$check_email = $db->query($email_check_query);


$num2 = mysqli_num_rows($check_email);



if ($num1 >= 1) {



    $row = $check_result->fetch_array();
    $_SESSION['sno'] = $row['serial_no'];
    $_SESSION['fname'] = $row['first_name'];
    $_SESSION['lname'] = $row['last_name'];
    $_SESSION['ethadd'] = $row['ethadd'];
    $_SESSION['email'] = $email;
    $_SESSION['pass'] = $pass;

    echo $_SESSION['fname'];

    $db->close();
} elseif ($num2 >= 1) {

    echo "Invalid password";
} else {

    echo "Invalid Credentials";
}


}
else{

  ?>
<script>
window.location.href = 'index.html';
</script>
<?php


}




?>