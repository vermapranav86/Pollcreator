<?php


session_start();

if(isset( $_SESSION['sno'])){


$server = "localhost";
$username = "root";
$password = "";

$con = mysqli_connect($server, $username, $password);

if (!$con) {
    die("connection failed due to" . mysqli_connect_error());
} else

    // session_start();
$pollid = $_GET['pid'];
$ques = $_GET['ques'];
$ptype = $_GET['ptype'];
$userid = $_SESSION['sno'];


//$extra = $_POST['extra'];
$sql = "";
$con->select_db("new_poll");
if ($ptype == "poll") {
    $sql = " INSERT INTO `$ptype`(`pid`,`serial_no`,`ques`)
    VALUES ('$pollid','$userid','$ques');";

    //$result= mysqli_query($con, "SELECT * FROM details where name='Joe'");

    //$row = mysqli_fetch_array($result);    

} else {


    $sql = " INSERT INTO `$ptype`(`pvid`,`serial_no`,`ques`)
    VALUES ('$pollid','$userid','$ques');";
}

if ($con->query($sql) == true) {
?>
    <script>
        alert('Poll Has Been Created');
        window.location.href = "welcome.php";
    </script>
<?php
} else {
    echo "ERROR <br> $con->error";
}
$con->close();





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