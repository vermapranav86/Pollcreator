<?php
session_start();

if(isset( $_SESSION['sno'])){


$pid = $_GET['pid'];
$sno = $_SESSION['sno'];
// echo $pid;
include 'connection.php';
$insert_query = " INSERT INTO `pvparticipate`(`serial_no`, `pvid`) 
              VALUES ('$sno','$pid');";

$result = $db->query($insert_query);

echo $result;


?>
<script>
    var pid = <?php echo $pid; ?>;
    window.location.href = "pvresult.php?pid=" + pid;
</script>
<?php
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