$(document).ready(function(){
    $('#cari').hide();
    $('#keyword').on('keyup', function(){
        $('#container').load('ajax_admin.php?keyword=' + $('#keyword').val());
    });
});