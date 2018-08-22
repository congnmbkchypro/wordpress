$(document).ready(function() {
    $('#category').on('click', function() {
        // $(this).hide();
        // error_log($(this).val());
        console.log($('#category').val());
        if ($('#category').val() == 4) {
            // alert('interview');
            // console.log('interview');
            $('#future_woman').show();
            console.log('interview');
        }
    });
});
