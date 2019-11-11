$(function() {
    var borderColor = $('#name').css('border-color');
    $('#name').blur(function() {
        let val = $('#name').val();
        if(!val) {
           $('#name').css('border-color', 'var(--volcanic-red)');
        } else {
            $('#name').css('border-color', borderColor);
        }
    });
});