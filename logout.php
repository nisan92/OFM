<?php

session_start();
unset($_SESSION['id']);
unset($_SESSION['table']);
unset($_SESSION['district']);
unset($_SESSION['dist_id']);
unset($_SESSION['subdistrict']);
unset($_SESSION['subdist_id']);
unset($_SESSION['union']);
unset($_SESSION['union_id']);
unset($_SESSION['block']);
unset($_SESSION['block_id']);
unset($_SESSION['sdistrict']);
unset($_SESSION['sdist_id']);
unset($_SESSION['ssubdistrict']);
unset($_SESSION['ssubdist_id']);
unset($_SESSION['sunion']);
unset($_SESSION['sunion_id']);
unset($_SESSION['sblock']);
unset($_SESSION['sblock_id']);
unset($_SESSION['sblock_id']);
unset($_SESSION['ecoyear_id']);
unset($_SESSION['secoyear_id']);
unset($_SESSION['ecoyear']);
unset($_SESSION['secoyear']);
unset($_SESSION['aez']);
unset($_SESSION['error_msg']);
session_destroy();
header('Refresh:0; url=index.php');
?>
