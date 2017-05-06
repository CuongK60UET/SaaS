
<div id="header">
    <div class="container">
        <div class="row">
            <div class=" col-md-3 logo">
                <a href="index/index"><img src="../img/logo.png" height="80"
                                         title="Quanaonam.com Web bán quần áo đẹp và rẻ hàng đầu Việt Nam"></a>
            </div>
            <div class="col-md-9">
                <ul class="nav nav-pills">
                    {% if run1 %}
                        <li role="presentation" class="user dropdown">
                            <a id="user" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{ image }}" width="22">
                                <p>{{ users }}</p>
                            </a>
                            <ul class="dropdown-menu">
                                <li class=""><a href="#">Thông tin người dùng</a></li>
                                <li class="divider"></li>
                                <li class=""><a href="../orders/orders">Lịch sử thanh toán</a></li>
                                <li class="divider"></li>
                                <li class=""><a href="../session/logout">Đăng xuất</a></li>
                            </ul>
                        </li>

                    {% else %}
                        <li role="presentation" class="active"><a href="/session/index">Đăng nhập</a></li>
                        {#<li role="presentation"><a href="">#}
                                {#<div class="fb-like" data-share="true" data-width="450" data-show-faces="true">#}
                                    {#Login Facebook#}
                                {#</div>#}
                            {#</a>#}
                        {#</li>#}
                    {% endif %}
                    <li role="presentation"><a href="/index/cart">Đi tới giỏ hàng</a></li>
                    <li role="presentation"><a href="../session/signup">Đăng kí</a></li>
                    <li role="presentation"><a href="../index/index">Trang chủ</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container">
<div id="main">
    <div class="container main_content">
        <div class="row">
            <div class="col-md-3 ">
                <div class="left_main">
                    <h5><b>Danh mục sản phẩm</b></h5>

                    <ul class="ds_sanpham">
                        {% for item in loai %}
                            <a href="../index/productType?typeID={{ item.MaLoai }}"><li >{{ item.TenLoaisp }}</li></a>
                        {% endfor %}
                    </ul>
                </div>
                <div class="slide">
                    <div class="img-slide">
                        <span id="next"><a><img src="../img/next.png" width="30" height="30"></a></span>
                        <span id="prev"><a><img src="../img/prev.png" width="30" height="30"></a></span>
                        <img class="img" src="../img/1.jpg" stt="0">
                        <img class="img" src="../img/2.jpg" stt="1" style="display: none">
                        <img class="img" src="../img/3.jpg" stt="2" style="display: none">
                        <img class="img" src="../img/4.jpg" stt="3" style="display: none">
                        <img class="img" src="../img/5.jpg" stt="4" style="display: none">
                        <ul class="icon_bot">
                            <li><a><img class="img_icon_bot active_icon" src="../img/img_bot.png" width="11" height="11" stt = "0"></a></li>
                            <li><a><img class="img_icon_bot" src="../img/img_bot.png" width="11" height="11" stt = "1"></a></li>
                            <li><a><img class="img_icon_bot" src="../img/img_bot.png" width="11" height="11" stt = "2"></a></li>
                            <li><a><img class="img_icon_bot" src="../img/img_bot.png" width="11" height="11" stt = "3"></a></li>
                            <li><a><img class="img_icon_bot" src="../img/img_bot.png" width="11" height="11" stt = "4"></a></li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="col-md-7 sp_noibat">
                <h5 class="spnoibat"><b>Các sản phẩm nổi bật trong ngày</b></h5>
                <ul class="main_sanpham">
                {% for item in data %}
                    <li id='sanpham' class='row'>
                        <div class="col-sm-5">
                            <img src="/img/{{ item.image }}" width="200px">
                        </div>
                        <div class='col-sm-7 text_info'>
                            <a href='#'><b>Tên sản phẩm: {{ item.TenQuanao }}</b></a>
                            <p><b>Giá: {{ item.Gia }}</b></p>
                            <p><b>Màu sắc:</b>{{ item.color }} </p>
                            <p><b>Size: </b>{{ item.sizes }}</p>
                            <p><b>Chú thích: </b><br>{{ item.chuthich }}</p>
                            <b>Số lượng: </b>
                            <input type = "number" id = "soluong"  style="width: 50px" value="1">Chiếc <br>
                            <div class='button' >
                                <button class='btn addcart ' type='button' data_sp="{{ item.MaQuanAo }}" data_tensp ="{{ item.TenQuanao }}" data_giasp="{{ item.Gia }}"
                                        data_colorsp="{{ item.color }}" data_sizesp="{{ item.sizes }}" data_notesp="{{ item.chuthich }}" name ="add" data_anhsp="{{ item.image }}">Thêm vào giỏ hàng</button>
                            </div>
                        </div>
                    </li>
                {% endfor %}
                </ul>
                <div class="text-center">
                    <ul class="pagination pagination-large" max_page = "{{ all_page }}">
                        <li class="prev_page">
                            <a href="../?page={{ cur_page-1 }}" >
                                <span>prev</span>
                            </a>
                        </li>
                        {% for item in pages %}
                            <li data_page = "{{ cur_page }}" class="page">
                                <a href="../?page={{ item }}" >{{ item }}</a>
                            </li>
                        {% endfor %}
                        <li class="next_page">
                            <a href="../?page={{ cur_page+1 }} " ><span>next</span></a>
                        </li>
                    </ul>

                </div>
            </div>
            <div class="col-md-2 chuthich"></div>
        </div>
    </div>

</div>
</div>