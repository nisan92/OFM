<?php

include '../config.php';
session_start();
if ($_POST['id']) {
    $crop = $_POST['id'];
    $season = $_POST['season'];
    $farmer = 0;
    $land = 0;
    if ($season == 1) {
        $sql = mysql_query("SELECT * FROM `sheet1` WHERE `ecoyear` ='" . $_SESSION['ecoyear_id'] . "'");
        if ($sql) {
            while ($row = mysql_fetch_array($sql)) {
                if ($row['crop1'] == $crop) {
                    $land += $row['ammount1'];
                    $farmer++;
                }
            }
        }
    } elseif ($season == 2) {
        $sql = mysql_query("SELECT * FROM `sheet1` WHERE `ecoyear` ='" . $_SESSION['ecoyear_id'] . "' and `crop2`='" . $crop . "'");
        while ($row = mysql_fetch_array($sql)) {
            $land += $row['ammount2'];
            $farmer++;
        }
    } else {
        $sql = mysql_query("SELECT * FROM `sheet1` WHERE `ecoyear` ='" . $_SESSION['ecoyear_id'] . "' and `crop3`='" . $crop . "'");
        while ($row = mysql_fetch_array($sql)) {
            $land += $row['ammount3'];
            $farmer++;
        }
    }
    $data = $farmer . "," . $land;
    echo $data;
}
?>