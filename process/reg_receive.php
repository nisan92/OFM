<?php
session_start();
include '../config.php';

$errflag = 0; $found = 0;
$district = -1; $subdistrict = -1; $union = -1; $block = -1;
 echo 'Start Process    -->  ';
if(isset($_POST['add_user']))
{
    echo" Submeeted   ";
if (!empty($_POST['lavel'])) {
    $lavel = $_POST['lavel'];
} else {
    $errflag++;
    $_SESSION['err_msg'] = 'select lavel';
}

if (!empty($_POST['full_name'])) {
    $fname = $_POST['full_name'];
} else {
    $errflag++;
    $_SESSION['err_msg'] = 'Enter Full Name';
}
if (!empty($_POST['address'])) {
    $address = $_POST['address'];
} else {
    $errflag++;
    $_SESSION['err_msg'] = 'select address';
}

if (!empty($_POST['username'])) {
    $uname = $_POST['username'];
} else {
    $errflag++;
    $_SESSION['err_msg'] = 'Enter Username';
}
if (!empty($_POST['pass'])) {
    $pass = $_POST['pass'];
} else {
    $errflag++;
    $_SESSION['err_msg'] = 'Enter Password';
}
//if (!empty($_POST['con_pass'])) {//    $cpass = $_POST['con_pass']; } else {   $errflag++;  $_SESSION['err_msg'] = 'Enter Confirm Password'; }
if (!empty($_POST['mobile_no'])) {
    $mob = $_POST['mobile_no'];
} else {
    $errflag++;
    $_SESSION['err_msg'] = 'Enter Mobile Number';
}
if (!empty($_POST['sec_ques'])) {
    $sq = $_POST['sec_ques'];
} else {
    $errflag++;
    $_SESSION['err_msg'] = 'Enter Secrate Question';
}
if (!empty($_POST['ans'])) {
    $ans = $_POST['ans'];
} else {
    $errflag++;
    $_SESSION['err_msg'] = 'Enter ans';
    }
    if((!empty($_POST['district']))&& isset($_POST['district']))
        $district = $_POST['district'];
    if((!empty($_POST['subdistrict']))&& isset($_POST['subdistrict']))
        $subdistrict = $_POST['subdistrict'];
    if((!empty($_POST['union']))&& isset($_POST['union']))
        $union = $_POST['union'];
}
if($errflag == 0)
{
    $result = mysql_query("SELECT * FROM `user`");
    while ($row = mysql_fetch_array($result)) {
        if (strcmp($mob, $row['mob']) == 0) {
            $found++;
            break;
        }
    }
    if($found == 0)
    {
        echo "yes";
    }
    else {
            date_default_timezone_set('Africa/Nairobi');
            $date = date('Y-m-d');

        $sql = "INSERT INTO `ofm`.`user` (`reg_date`, `mob`, `full_name`, `adress`, `username`, `pass`, `sec_ques`, `ans`, `right_lavel`, `district`, `subdistrict`, `union_loc`) "
                . "                      VALUES ('$date' , '$mob' , '$address' , '$fname' , '$uname' , '$pass' , '$sq' , '$ans' , '$lavel ', '$district' , '$subdistrict' , '$union')";
        if (!mysql_query($sql, $Link)) {
            die('Error: ' . mysql_error());
        }
        echo "1 record added \n";
        
    }
}
?>
