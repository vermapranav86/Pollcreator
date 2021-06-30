<?php

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "new_poll";
    
    
    $db = new mysqli($hostname, $username, $password, $dbname);
    
    
    if($db->connect_error)
    {
        die("Connection failed ".$db->connect_error);
    }
    
?>