<div id="header">
    <div class="container">
        <div class="row">
            <div class=" col-md-3 logo">
                <a href="/index/index"><img src="../img/logo.png" height="80"
                                          title="Quanaonam.com Web bán quần áo đẹp và rẻ hàng đầu Việt Nam"></a>
            </div>
            <div class="col-md-9">
                <ul class="nav nav-pills">
                    
                    <li role="presentation"><a href="">Đăng kí tài khoản</a></li>
                    <li role="presentation"><a href="/index/index">Trang chủ</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div id="main">
    <div class="container login-container">
        <div class="form-container" >
            <form action="" method="post">
                <div>
                    <div id="form-title">Đăng nhập</div>
                    <div>
                        <label>Username:</label>
                        <div class="controls">
                            <?= $this->tag->textField(['email', 'class' => 'form-control', 'placeholder' => 'Username']) ?>
                        </div>
                    </div>
                    <div>
                        <label>Password:</label>
                        <div class="controls">
                            <?= $this->tag->passwordField(['password', 'class' => 'form-control', 'placeholder' => 'Password']) ?>
                        </div>
                    </div>
                    <div class="checkbox"><input type="checkbox"> Ghi nhớ đăng nhập</div>
                    <div class="form-group">
                        <?= $this->tag->submitButton(['session', 'class' => 'btn btn-primary btn-large']) ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>