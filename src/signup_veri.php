<?php

if(isset( $_POST['fname'])){

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$ethadd = $_POST['ethadd'];


$regx1 = preg_match("/^[a-zA-Z]{1,20}$/", $fname);
$regx2 = preg_match("/^[a-zA-Z]{1,20}$/", $lname);
// $regx3 = preg_match("/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]{2,3})$/",$email);
$regx3 = filter_var($email, FILTER_VALIDATE_EMAIL);
$regx4 = preg_match("/^.{8,15}$/", $pass);

$encrypted_pass = sha1($pass);

if ($regx1 == true && $regx2 == true &&  $regx3 == true && $regx4 == true) {

    include 'connection.php';

    // Checking Part

    $check_query = "SELECT * FROM user_data WHERE email = '$email'";

    $check_result = $db->query($check_query);

    $num = mysqli_num_rows($check_result);

    if ($num >= 1) {

        echo "email already present";
    } else {

        // Inserting data in database


        $insert_query = " INSERT INTO `user_data`(`first_name`, `last_name`, `email`, `password`,`ethadd`) 
        VALUES ('$fname','$lname','$email','$encrypted_pass','$ethadd');";

        $result = $db->query($insert_query);

        $db->close();

        echo "1";
    }
} else {
    echo "error";
}

}
else{

  ?>
<script>
window.location.href = 'signup.html';
</script>
<?php


}

?>