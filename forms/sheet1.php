<?php
if (!isset($_SESSION['id']))
    header("locaton:../index.php");
?>
<?php
//include '../config.php';
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
    <div class="col-md-12">
        <div class="center-align">
            <h2>ব্লক পর্যায় </h2>
            <h3>কৃষক / কৃষাণীর মৌসুমভিত্তিক আবাদি জমির পরিমান (হেক্টরে) নিরূপণ</h3>
        </div>
    </div>
</div>


<div class="row">
    <form class="form-horizontal" role="form" action="process/sheet1_receive.php" method="post">
        <!--1st collum--> 
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name" class="col-sm-4 control-label">কৃষক/ কৃষাণীর নামঃ  </label>
                        <div class="col-sm-8">
                            <input type="text" required class="form-control" id="name" name="name" placeholder="কৃষক/ কৃষাণীর নাম">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="g_name" class="col-sm-4 control-label">পিতা / স্বামীর নামঃ  </label>
                        <div class="col-sm-8">
                            <input type="text" required class="form-control" id="g_name" name="g_name" placeholder="পিতা / স্বামীর নাম">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ammount" class="col-sm-4 control-label">নীট আবাদি জমির পরিমানঃ  </label>
                        <div class="col-sm-8">
                            <input type="text"required class="form-control" id="ammount" name="ammount" placeholder="নীট আবাদি জমির পরিমান">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="center-align">
                                <h3>মৌসুমভিত্তিক আবাদি ফসলের নাম ও আওতাধীন জমির পরিমান (হেক্টরে)</h3>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2 col-sm-offset-2">
                            <h4>খরিপ ২</h4>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="crop1" class="col-sm-4 control-label">ফসলঃ  </label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="crop1" id="crop1" >

                                        <?php
                                        Echo"<option selected='selected' '>বাছাই করুন </option>";
                                        $result = mysql_query("SELECT * FROM crop");
                                        while ($row = mysql_fetch_array($result)) {
                                            echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="amm1" class="col-sm-4 control-label">পরিমানঃ  </label>
                                <div class="col-sm-8">
                                    <input type="text" required class="form-control" id="amm1" name="amm1" placeholder="পরিমান">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2 col-sm-offset-2">
                            <h4>রবি</h4>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="crop2" class="col-sm-4 control-label">ফসলঃ  </label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="crop2" id="crop2" >

                                        <?php
                                        Echo"<option selected='selected' '>বাছাই করুন </option>";
                                        $result = mysql_query("SELECT * FROM crop");
                                        while ($row = mysql_fetch_array($result)) {
                                            echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="amm2" class="col-sm-4 control-label">পরিমানঃ  </label>
                                <div class="col-sm-8">
                                    <input type="text" required class="form-control" id="amm2" name="amm2" placeholder="পরিমান">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2 col-sm-offset-2">
                            <h4>খরিপ</h4>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="crop3" class="col-sm-4 control-label">ফসলঃ  </label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="crop3" id="crop3" >

                                        <?php
                                        Echo"<option selected='selected' '>বাছাই করুন </option>";
                                        $result = mysql_query("SELECT * FROM crop");
                                        while ($row = mysql_fetch_array($result)) {
                                            echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="amm3" class="col-sm-4 control-label">পরিমানঃ  </label>
                                <div class="col-sm-8">
                                    <input type="text" required class="form-control" id="amm3" name="amm3" placeholder="পরিমান">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--2nd collum-->        
        <div class="col-md-4">
            <div class="form-group">
                <label for="aez" class="col-sm-4 control-label">এইজেড নং  </label>
                <div class="col-sm-8">
                    <input type="text" readonly class="form-control" id="aez" name="aez" <?php echo"value ='" . $_SESSION['aez'] . "'" ?>>
                </div>
            </div>
            <div class="form-group">
                <label for="district" class="col-sm-4 control-label">জেলা  </label>
                <div class="col-sm-8">
                    <select class="form-control" name="district" id="district">
                        <?php
                        echo $dist_id;
                        Echo" <option selected='selected' value='" . $dist_id . "'>" . $district . " </option>";
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="district" class="col-sm-4 control-label">উপজেলাঃ  </label>
                <div class="col-sm-8">
                    <select class="form-control" name="subdistrict" id="subdistrict" >

                        <?php
                        Echo"<option selected='selected' value='" . $subdist_id . "'>" . $subdistrict . " </option>";
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="union" class="col-sm-4 control-label">ইউনিয়নঃ  </label>
                <div class="col-sm-8">
                    <select class="form-control" name="union" id="union" >
                        <?php
                        Echo"<option selected='selected' value='" . $union_id . "'>" . $union . " </option>";
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="block" class="col-sm-4 control-label">ব্লকঃ  </label>
                <div class="col-sm-8">
                    <select class="form-control" name="block" id="block" >
                        <?php
                        Echo"<option selected='selected' value='" . $_SESSION['block_id'] . "'>" . $_SESSION['block'] . " </option>";
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="ecoyear" class="col-sm-4 control-label">অর্থবছরঃ  </label>
                <div class="col-sm-8">
                    <select class="form-control" name="ecoyear" id="ecoyear" >
                        <?php
                        Echo"<option selected='selected' value='" . $_SESSION['ecoyear_id'] . "'>" . $_SESSION['ecoyear'] . " </option>";
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12 right-align ">
                <button type="submit" class="button btn btn-default" name="submit" id="submit">Submit </button>
            </div>
        </div>
    </form>
</div>