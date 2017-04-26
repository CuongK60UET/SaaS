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
                            <p>{{ users }}</p>
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
                    <li role="presentation"><a href="../index">Trang chủ</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div id="main">
    <div class="container">
        <div  style="text-align: center" ><h3>Các hoá đơn đã thanh toán </h3></div>
        <div class="table-container">
            <table class="table table-filter">
                <tbody>

                    {% for k,item in order %}
                        <tr  data-status="pagado" >
                            <td>
                                <div class="media" style="width: 60%; margin-left: 20%; margin-bottom: 20px">
                                    <div class="media-body">
                                        <a href="../index/order_details?id={{ item['id'] }}"  >
                                            <h4 >
                                                Hoá đơn số {{ k+1 }}
                                            </h4>
                                            <span class="pull-right ">Chi tiết</span>
                                        </a>

                                        <p > Số tiền đã thanh toán : {{ item['payments'] }} đồng</p>
                                        <span >Thời gian : {{ item['order_time'] }}</span>
                                        <span >Ngày: {{ item['order_date'] }}</span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    {% endfor %}
                </tbody>
            </table>
        </div>
    </div>
</div>
