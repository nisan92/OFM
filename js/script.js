$(function() {
    $('#newsscroller').vTicker('init', {speed: 400,
        pause: 3000,
        showItems: 4,
        padding: 4});
});

$('#accordion').collapse({
    toggle: false,
    parent: false
});
$('#view').load("view.php");

$(function() {
    $('#newsscroller1').vTicker('init', {speed: 400,
        pause: 3000,
        showItems: 4,
        padding: 4});
});

$('#add_user').click(function() {
    $('#user_view').load('forms/reg_form.php');
});
$('#display').click(function() {
    $('#display').load('forms/sheet1.php');
});

//to find out user location

$('#lavel_user').on('change',function(){
    var x = $('#lavel_user').val();
    alart("something");
});