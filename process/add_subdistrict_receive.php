<?php

session_start();
include('../config.php');
$errflag = 0;
$found = 0;

if (isset($_POST['add_subdistrict'])) {
    if (isset($_POST['district']) && !empty($_POST['district'])) {
        $district = $_POST['district'];
    } else {
        $errflag++;
    }
    if (isset($_POST['name']) && !empty($_POST['name'])) {
        $name = $_POST['name'];
    } else {
        $errflag++;
    }
}

if ($errflag == 0) {
    $result = mysql_query("SELECT * FROM subdistrict");
    while ($row = mysql_fetch_array($result)) {
        if ((strcmp($name, $row['name']) == 0) && $district == $row['dist_id']) {
            $found++;
            break;
        }
    }
    if ($found)
        echo 'yes';
    else {
        $sql = "INSERT INTO subdistrict (name , dist_id) VALUES ('$name','$district' )";
        if (!mysql_query($sql, $Link)) {
            die('Error: ' . mysql_error());
        }
        echo "1 record added \n";
    }
}
header("location:../admin.php");
?>
