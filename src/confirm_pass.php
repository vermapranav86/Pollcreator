<?php

session_start();


if(isset( $_SESSION['sno'])){


include 'connection.php';

$old_pass = $_POST['old_pass'];
$new_pass = $_POST['new_pass'];
$confirm_pass = $_POST['confirm_pass'];
$sno = $_SESSION['sno'];


$old_pass_query = "SELECT * FROM user_data WHERE serial_no = '$sno'";

$result_old_pass = $db->query($old_pass_query);

$row = $result_old_pass->fetch_array();

$check_old_pass = $row['password'];

$en_old_pass = sha1($old_pass);



if($en_old_pass != $check_old_pass){
    echo "1";
}
else{
    $en_new_pass = sha1($new_pass);

    $query = "UPDATE user_data SET password ='$en_new_pass'  WHERE serial_no = '$sno'";

$result = $db->query($query);

echo "Password changed successfully!";

}

$db->close();

}
else{

  ?>
<script>
window.location.href = 'logout.php';
</script>
<?php


}

?>


?>