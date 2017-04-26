<div id="header">
    <div class="container ">
        <div class="row">
            <div class=" col-md-3 logo">
                <a href="../index"><img src="../img/logo.png" height="80" title="Quanaonam.com Web bán quần áo đẹp và rẻ hàng đầu Việt Nam"></a>
            </div>
            <div class="col-md-9" >
                <ul class="nav nav-pills " >
                    <li role="presentation" class="user dropdown">
                        <a id="user" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="../img/contacts_icon21.png" width="22">
                            <p>{{ users['HovaTen'] }}</p>
                        </a>
                        <ul class="dropdown-menu">
                            <li class=""><a href="#">Thông tin người dùng</a></li>
                            <li class="divider"></li>
                            <li class=""><a href="../index/cart">Giỏ hàng</a></li>
                            <li class="divider"></li>
                            <li class=""><a href="../session/logout">Đăng xuất</a></li>
                        </ul>
                    </li>
                    <li role="presentation"><a href="">Đăng kí tài khoản</a></li>
                    <li role="presentation"><a href="/index">Trang chủ</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div id="main">
    <div class="container">
        <div  style="text-align: center" ><h3>Hoá đơn thanh toán</h3></div>
        <div class="row" style="height: 200px;width: 80%;margin-left: 10%">
            <div class="col-md-6" style="text-align: center">
                <h5>Thông tin khác hàng</h5>
                <div>
                    <p>Họ và tên : {{ users['HovaTen'] }}</p>
                    <p>Số điện thoại: {{ users['sodienthoai'] }}</p>
                    <p> Địa chỉ: {{ users['DiaChi'] }}</p>
                </div>

            </div>
            <div class="col-md-6" style="text-align: center">
                <h5>Thông tin hoá đơn</h5>
                <div>
                    <p>Tổng số tiền thanh toán {{ order['payments'] }} đồng</p>
                    <p>Thời gian : {{ order['order_time'] }} </p>
                    <p>Ngày :{{ order['order_date'] }}</p>
                </div>
            </div>
        </div>
        <div></div>
        <div></div>
        <div class="card-block p-0">
            <table class="table table-bordered table-sm m-0">
                <thead class="">
                <tr>
                    <th>Stt</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
                </thead>
                <tbody>
                {% for item in products %}
                    <tr>
                        <td>{{ item['stt'] }}</td>
                        <td>{{ item['TenQuanao'] }}</td>
                        <td>{{ item['Gia'] }} Đồng</td>
                        <td>{{ item['soluong'] }}</td>
                        <td>{{ item['pay']}} đồng</td>
                    </tr>
                {% endfor %}
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><h5><b>Tổng tiền</b></h5></td>
                    <td><h5><b>{{ order['payments'] }} Đồng</b></h5></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
