                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       <?php
include '../config.php';
session_start();
if ($_POST['id']) {
    $sp = "_";
    $district = 0;
    $subdistrict = 0;
    $union = 0;
    $row_id = $_POST['id'];
    $sql = mysql_query("SELECT * FROM `user` WHERE `id` ='" . $row_id . "'");
    $row = mysql_fetch_array($sql);
    $fname = $row['full_name'];
    $address = $row['address'];
    $mob = $row['mob'];
    $rd = $row['reg_date'];
    $enable = $row['enabled'];
    $right = $row['right_lavel'];
    $name = $row['full_name'];
    $uname = $row['username'];
    if ($right < 4) {
        $dist_id = $row['district'];
        $query = mysql_query("SELECT * FROM `district` WHERE `id` ='" . $dist_id . "'");
        $data = mysql_fetch_array($query);
        $district = $data['name'];
        if ($right < 3) {
            $subdist_id = $row['subdistrict'];
            $query = mysql_query("SELECT * FROM `subdistrict` WHERE `id` ='" . $subdist_id . "'");
            $data = mysql_fetch_array($query);
            $subdistrict = $data['name'];
            if ($right < 2) {
                $union_id = $row['union_loc'];
                $query = mysql_query("SELECT * FROM `union` WHERE `id` ='" . $union_id . "'");
                $data = mysql_fetch_array($query);
                $union = $data['name'];
            }
        }
    }
    $data = $fname . $sp . $address . $sp . $mob . $sp . $district . $sp . $subdistrict . $sp . $union . $sp . $rd . $sp . $right . $sp . $name .$sp . $uname;
    echo $data;
}
?>