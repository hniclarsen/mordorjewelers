$(function() {
    var imgs = [ $('#img0'),$('#img1'),$('#img2'),$('#img3'),$('#img4'),$('#img5') ];
    var selectedImg = $('#product-img-selected');

    $.each(imgs, function(i, val) {
        val.click(function() {
            selectedImg.attr('src', val.attr('src'));
        });
    });
});