<?php

session_start();
require '../config.php';
date_default_timezone_set('Asia/Dhaka');
$date = date('Y-m-d');
$_SESSION['date'] = $date;
$errflag = 0;
if (isset($_POST['submit'])) {
    if (!empty($_POST['ecoyear'])) {
        $_SESSION['ecoyear_id'] = $_POST['ecoyear'];
        $query = mysql_query("SELECT * FROM ecoyear WHERE id = '" . $_SESSION['ecoyear_id'] . "'");
        $row = mysql_fetch_array($query);
        $_SESSION['ecoyear'] = $row['ecoyear'];
    } else
        $errflag++;
    if (!empty($_POST['district'])) {
        $_SESSION['dist_id'] = $_POST['district'];
        $result = mysql_query("SELECT * FROM `district` WHERE `id`='" . $_SESSION['dist_id'] . "'");
        $row = mysql_fetch_array($result);
        $_SESSION['district'] = $row['name'];
    } else
        $errflag++;
    if (!empty($_POST['subdistrict'])) {
        $_SESSION['subdist_id'] = $_POST['subdistrict'];
        $result = mysql_query("SELECT * FROM `subdistrict` WHERE `id`='" . $_SESSION['subdist_id'] . "'");
        $row = mysql_fetch_array($result);
        $_SESSION['subdistrict'] = $row['name'];
    } else
        $errflag++;
    if (!empty($_POST['union'])) {
        $_SESSION['union_id'] = $_POST['union'];
        $result = mysql_query("SELECT * FROM `union` WHERE `id`='" . $_SESSION['union_id'] . "'");
        $row = mysql_fetch_array($result);
        $_SESSION['union'] = $row['name'];
    } else
        $errflag++;
    if (!empty($_POST['block'])) {
        $_SESSION['block_id'] = $_POST['block'];
        $result = mysql_query("SELECT * FROM block WHERE id='" . $_POST['block'] . "'");
        $row = mysql_fetch_array($result);
        $_SESSION['block'] = $row['name'];
        $_SESSION['aez'] = $row['aez'];
    } else{
        $errflag++;
        $_SESSION['error_msg'] = "ব্লক নির্বাচন করুন" ;
        }
    
} else
    $errflag++;

if ($errflag == 0) {
    echo 'hello';
    header("location:../sheet1.php");
    exit();
}
header("location:../home.php#sheet1");
?>
