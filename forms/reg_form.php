<!--এই ফর্ম টা নতুন ইউজার নিবন্ধনের জন্য ,
যখন ব্যাবহারকারীর পর্যায় নির্দিষ্ট করা হবে তখনই তার নির্দিষ্ট ঠিকানার ফর্ম চলে আসবে-->

﻿<div class="right-align">
    <h2>নিবন্ধন </h2>
</div>
<form class="form-horizontal" role="form" action="reg_receive.php" method="post">
    <div class="form-group">
        <label for="lavel_user" class="col-sm-4 control-label">পর্যায়ঃ  </label>
        <div class="col-sm-8">
            <select class="form-control" name="lavel_user" id="lavel_user" >
                <option selected="selected" value="0">বাছাই করুন </option>
                <option value="1">ইউনিয়ন </option>
                <option value="2">উপজেলা </option>
                <option value="3">জেলা</option>
                <option value="4">ডিসি </option>
                <option value="5">মন্ত্রণালয় </option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="full_name" class="col-sm-4 control-label">পূর্ণ নাম </label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="full_name" name="full_name" placeholder="full_name">
        </div>
    </div>
    <div class="form-group">
        <label for="address" class="col-sm-4 control-label">ঠিকানাঃ </label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="address" name="address" placeholder="address">
        </div>
    </div>
    <div class="form-group">
        <label for="username" class="col-sm-4 control-label">ইউজার আইডিঃ </label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="username" name="username" placeholder="username">
        </div>
    </div>
    <div class="form-group">
        <label for="pass" class="col-sm-4 control-label">পাসওয়ার্ডঃ </label>
        <div class="col-sm-8">
            <input type="password" class="form-control" id="Pass" name="pass" placeholder="Password">
        </div>
    </div>
    <div class="form-group">
        <label for="con_pass" class="col-sm-4 control-label">নিশ্চিত করুনঃ </label>
        <div class="col-sm-8">
            <input type="password" class="form-control" id="con_Pass" name="con_pass" placeholder="Confirm Password">
        </div>
    </div>
    
    <div class="form-group">
        <label for="mobile_no" class="col-sm-4 control-label">মোবাইল নাম্বারঃ </label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="mobile_no" name="mobile_no" placeholder="Mobile number">
        </div>
    </div>
    <div class="form-group">
        <label for="sec_ques" class="col-sm-4 control-label">গোপন প্রস্নঃ </label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="sec_ques" name="sec_ques" placeholder="Sectete Question">
        </div>
    </div>
    <div class="form-group">
        <label for="ans" class="col-sm-4 control-label">উত্তরঃ </label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="ans" name="ans" placeholder="Answer">
        </div>
    </div>
    
    <div id="location"> </div>
    
    <div id="district_form" class="form-group hidden">
        <label for="district" class="col-sm-4 control-label">জেলাঃ </label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="district" name="district" placeholder="District">
        </div>
    </div>
    <div id="subdistrict_form" class="form-group hidden">
        <label for="subdistrict" class="col-sm-4 control-label">উপজেলাঃ </label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="subdistrict" name="subdistrict" placeholder="Subdistrict">
        </div>
    </div>
    <div id="union_form"class="form-group hidden">
        <label for="union" class="col-sm-4 control-label">ইউনিয়নঃ </label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="union" name="union" placeholder="Union">
        </div>
    </div>
    <div id="block_form"class="form-group hidden">
        <label for="block" class="col-sm-4 control-label">ব্লকঃ </label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="block" name="block" placeholder="Block">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-6">
            <button type="submit" class="btn btn-default" name="submit" id="submit">নিবন্ধন </button>
        </div>
    </div>
</form>

<script>
    $('#lavel_user').on('change',function(){
    var x = $('#lavel_user').val();
    switch(x)
    {
        case "1":
            $('#union_form').removeClass('hidden');
            $('#block_form').addClass('hidden');
            $('#subdistrict_form').removeClass('hidden');
            $('#district_form').removeClass('hidden');
            break;
        case "2": 
            $('#union_form').addClass('hidden');
            $('#block_form').addClass('hidden');
            $('#subdistrict_form').removeClass('hidden');
            $('#district_form').removeClass('hidden');
            break;
        case "3":
            $('#union_form').addClass('hidden');
            $('#block_form').addClass('hidden');
            $('#subdistrict_form').addClass('hidden');
            $('#district_form').removeClass('hidden');
            break;
        case "4": 
            $('#union_form').addClass('hidden');
            $('#block_form').addClass('hidden');
            $('#subdistrict_form').addClass('hidden');
            $('#district_form').removeClass('hidden');
            break;
        default :
            $('#union_form').addClass('hidden');
            $('#block_form').addClass('hidden');
            $('#subdistrict_form').addClass('hidden');
            $('#district_form').addClass('hidden');
            break;
    };
});
    </script>