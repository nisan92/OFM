<?php
session_start();
include '../config.php';
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    date_default_timezone_set('Asia/Dhaka');
    $date = date('Y-m-d');
    $query = mysql_query("SELECT * FROM user WHERE id= $id");
    while ($row = mysql_fetch_array($query)) {
        $lavel = $row['right_lavel'];
        $dist_id = $row['district'];
        $subdist_id = $row['subdistrict'];
        $union_id = $row['union_loc'];
    }
    $query = mysql_query("SELECT name FROM district WHERE id='" . $dist_id . "'");
    if ($query) {
        $row = mysql_fetch_array($query);
        $district = $row['name'];
    }

    $query = mysql_query("SELECT name FROM subdistrict WHERE id='" . $subdist_id . "'");
    if ($query) {
        $row = mysql_fetch_array($query);
        $subdistrict = $row['name'];
    }

    $query = mysql_query("SELECT name FROM `union` WHERE `id` ='" . $union_id . "'");
    if ($query) {
        $row = mysql_fetch_array($query);
        $union = $row['name'];
    }
//    echo $id . "  " . $lavel . " " . $district . " " . $subdistrict . " " . $union . " " . $date;
} else {
    $_SESSION['error_msg'] = "You Need to login first to use this application ";
    header("location:index.php");
}
?>
<div class="row">
    <form class="form-horizontal" role="form" action="process/sheet7_loc_receive.php" method="post">
        <!--1st collum--> 
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <?php require './ecoyear_selector.php'; ?>
                    <div class="form-group">
                        <label for="district" class="col-sm-4 control-label">জেলাঃ  </label>
                        <div class="col-sm-8">
                            <select class="form-control" name="district" id="district" >

                                <?php
                                Echo"<option selected='selected' value='" . $dist_id . "'>" . $district . " </option>";
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12 right-align">
                        <button type="submit" class="btn btn-default button" name="submit" id="submit">Submit </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>