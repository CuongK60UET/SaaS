
$(document).ready(function () {
    var stt, a, stt1;
    firstImg = $(".img:first").attr("stt");
    lastImg = $(".img:last").attr("stt");
    $(".img").each(function () {
        if($(this).is(":visible")){
            stt = $(this).attr("stt");
        }
    })
    $(".img_icon_bot").click(function () {
        $(".img").hide();
        $(".img").eq($(this).attr("stt")).show(2);
        stt = $(this).attr("stt");
    });
    function next() {
        a = ++stt;
        if(a>lastImg){
            a = firstImg;
            stt = firstImg;
        }
        $(".img").hide();
        $(".img").eq(a).show(2);
        $(".img_icon_bot").eq(a-1).removeClass("active_icon");
        $(".img_icon_bot").eq(a).addClass("active_icon");
    }
    function prev() {
        a = --stt;
        if(a<firstImg){
            a = firstImg;
            stt = firstImg;
        }
        $(".img").hide();
        $(".img").eq(a).show(2);
        $(".img_icon_bot").eq(a+1).removeClass("active_icon");
        $(".img_icon_bot").eq(a).addClass("active_icon");
    }
    $("#next").click(function () {
        next();
    })
    $("#prev").click(function () {
        prev();
    })
    setInterval(function () {
        next();
    }, 3000);
    var last_page = page;
    var page = $(".page").attr('data_page');
    $('.page').eq(page-1).addClass('active');
    if (last_page != page){
        $('.page').eq(last_page-1).removeClass('active');
    }
    if(page == 1 ){
        $(".prev_page").hide();
    }
    else if(page == $(".pagination").attr('max_page')){
        $(".next_page").hide();
    }
    else if($(".pagination").attr('max_page') == 1){
        $(".next_page").hide();
        $(".prev_page").hide();
    }
})
