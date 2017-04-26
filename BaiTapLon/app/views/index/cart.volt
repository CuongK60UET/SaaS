<div id="header">
    <div class="container ">
        <div class="row">
            <div class=" col-md-3 logo">
                <a href="../index"><img src="../img/logo.png" height="80" title="Quanaonam.com Web bán quần áo đẹp và rẻ hàng đầu Việt Nam"></a>
            </div>
            <div class="col-md-9" >
                <ul class="nav nav-pills " >
                    {% if run2 %}
                        <li role="presentation " class="active"><a href="../session/login">Đăng nhập </a></li>

                    {% else %}

                        <li role="presentation" class="user dropdown">
                            <a id="user" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="../img/contacts_icon21.png" width="22">
                                <p>{{ users }}</p>
                            </a>
                            <ul class="dropdown-menu">
                                <li class=""><a href="#">Thông tin người dùng</a></li>
                                <li class="divider"></li>
                                <li class=""><a href="../index/orders">Lịch sử thanh toán</a></li>
                                <li class="divider"></li>
                                <li class=""><a href="../session/logout">Đăng xuất</a></li>
                            </ul>
                        </li>
                    {% endif %}
                    <li role="presentation"><a href="../index/signup">Đăng kí </a></li>
                    <li role="presentation"><a href="/index">Trang chủ</a></li>

                </ul>
            </div>
        </div>
    </div>
</div>
<div id="main">
    <div class="container" style="width: 900px">
        <div class="row">
            <div class="col-md-9">
                <h5>Các sản phẩm có trong giỏ hàng </h5>
                <ul class="ds_sanpham">
                    {% if run1  %}
                        {% for item in cart %}
                            <li id='sanpham' class='row'>
                                <div class='col-sm-5'>
                                    <img src='/img/{{ item['image'] }}' width='200px'>
                                </div>
                                <div class='col-sm-7 text_info'>
                                    <a href='#'><b>Tên sản phẩm: {{ item['TenQuanao'] }}</b></a>
                                    <p><b>Giá: {{ item['Gia'] }} đồng</b></p>
                                    <p><b>Màu sắc: </b>{{ item['color'] }} </p>
                                    <p><b>Size: </b> {{ item['sizes'] }}</p>
                                    <p><b>Chú thích: </b>{{ item['chuthich'] }}<br></p>
                                    <p><b>Số lượng: </b>{{ item['soluong'] }} Chiếc</p>
                                    <div class='button'>
                                        <button class="btn del-cart" data_sp = "{{ item['MaQuanAo'] }}">
                                            Huỷ mua sản phẩm này
                                        </button>
                                    </div>
                                </div>
                            </li>
                        {% endfor %}
                    {% else %}
                        <p>Giỏ hàng của bạn đang trống </p>
                        <a href="../index/index"> Tiếp tục mua hàng </a>
                    {% endif %}
                    {#{% if run2 %}#}
                        {#<p>Giỏ hàng của bạn đang trống </p>#}
                        {#<a href="../index/index"> Tiếp tục mua hàng </a>#}
                    {#{% endif %}#}
                </ul>
            </div>
            <div class="col-md-3">
                <div id="sanpham" pay="{{ Payall }}" style="margin-top: 40px">
                    <div>
                        <span style="padding-left: 22%; font-weight: 600; font-size: 17px">Tổng tiền</span>
                    </div>
                    <div style="line-height: 30px;text-align: center;font-weight: 700;">
                        {{ Payall }} Đồng
                    </div>
                    <button  style="margin-left: 30px; padding-left: 6px" class="pay" pay="{{ Payall }}">Thanh Toán</button>
                </div>
                {% if run1 %}
                    <div id="sanpham" class="saveCart">
                        <button style="margin-left: 30px; padding-left: 6px" title="Nếu bạn chưa thể thanh toán, hãy lưu lại giỏ hàng cho lần mua tiếp theo">Lưu giỏ hàng</button>
                    </div>
                {% endif %}

            </div>
        </div>

    </div>
</div>