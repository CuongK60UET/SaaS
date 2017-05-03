$('.addcart').click(function () {
    $(this).text("Bạn đã thêm vào giỏ hàng ");
    var id = $(this).attr('data_sp');
    var ten = $(this).attr('data_tensp');
    var gia = $(this).attr('data_giasp');
    var color = $(this).attr('data_colorsp');
    var size = $(this).attr('data_sizesp');
    var chuthich = $(this).attr('data_notesp');
    var image = $(this).attr('data_anhsp');
    var soluong = $(this).closest(".text_info").find("#soluong").val();
    $.ajax({
        type: "POST",
        url: "../index/addCart",
        data: {
            MaQuanAo: id,
            TenQuanao: ten,
            Gia: gia,
            color: color,
            sizes: size,
            chuthich: chuthich,
            image: image,
            soluong: soluong
        },
        dataType: 'json',
        success: function (data) {
            if (data.status == '1') {
                alert(data.message);
            }
        }
    });
});
$('.del-cart').click(function () {
    if(confirm("Bạn có chắc chắn muốn huỷ sản phẩm này trong giỏ hàng ?? ")){
        $(this).text("Đã bỏ ra khỏi giỏ hàng");
        var id = $(this).attr('data_sp');
        $.ajax({
            type: "POST",
            url: "../index/subCart",
            data: {MaQuanAo: id},
            success: function (data) {
                window.location.reload();
            }
        });

    }


});
$('.pay').click(function () {
    var pay = 0;
    if(confirm("Bạn có muốn thanh toán giỏ hàng ??")){
        pay = $(this).attr('pay');
        $.ajax({
            type: "POST",
            url: "../orders/invoice",
            data: {Pay: pay},
            dataType: 'json',
            success: function (data) {
                if (data.status == '1'){
                    alert(data.message);
                    window.location.reload();
                }
            }
        });
    }

});
$('.saveCart').click(function () {
    if(confirm("Bạn có muốn lưu lại giỏ hàng ??")){
        $.ajax({
            type: "POST",
            url: "../index/saveCart",
            data: {},
            success: function (data) {
                if(data.status == '1'){
                    alert(data.message);
                    window.location.reload();
                }
            }
        });
    }

});