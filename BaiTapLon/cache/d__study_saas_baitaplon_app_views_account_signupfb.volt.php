<div id="header">
    <div class="container">
        <div class="row">
            <div class=" col-md-3 logo">
                <a href="/index/index"><img src="../img/logo.png" height="80"
                                            title="Quanaonam.com Web bán quần áo đẹp và rẻ hàng đầu Việt Nam"></a>
            </div>
            <div class="col-md-9">
                <ul class="nav nav-pills">
                    
                    
                    <li role="presentation"><a href="../index">Trang chủ</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div id="main">
    <div class="container login-container">
        <h2 style="text-align: center">SIGN UP</h2>
        <div class="form-container" >
            <form action="signupfb" method="post" class="form-horizontal">
                <div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-3">Full Name *</label>
                    <div class="col-xs-8">
                        <input name="fullName" type="text" class="form-control" id="inputEmail" placeholder="Name" value="<?= $userinfo['HovaTen'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="control-label col-xs-3">Phone Number *</label>
                    <div class="col-xs-8">
                        <input name="phone" type="text" class="form-control" id="inputPassword" placeholder="phone number">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-3">Address *</label>
                    <div class="col-xs-8">
                        <input name="address" type="text" class="form-control" id="inputEmail" placeholder="Your address" value="<?= $userinfo['DiaChi'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-3" >Email *</label>
                    <div class="col-xs-8">
                        <input name="email" type="text" class="form-control" id="inputEmail" placeholder="Email" value="<?= $userinfo['email'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3">Date of Birth <span class="text-danger">*</span></label>
                    <div class="col-xs-8">
                        <input name="ngaysinh" type="text" class="form-control" id="inputEmail" placeholder="Date of birth" value="<?= $userinfo['ngaysinh'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3">Gender <span class="text-danger">*</span></label>
                    <div class="col-md-8 col-sm-9">
                        <input type="text" class="form-control" id="inputEmail" name="gender" value="<?= $userinfo['gioitinh'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-3">Username *</label>
                    <div class="col-xs-8">
                        <input type="text" name="username" class="form-control" id="inputEmail" placeholder="Username ">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="control-label col-xs-3">Password *</label>
                    <div class="col-xs-8">
                        <input type="password" name="pass" class="form-control" id="inputPassword" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="control-label col-xs-3">Confirm Password *</label>
                    <div class="col-xs-8">
                        <input type="password" name="confirmPass" class="form-control" id="inputPassword" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <div style="text-align: center" class="confirm">
                        <?php if ($createFail) { ?>
                            username is existed !!
                        <?php } elseif ($notmatch) { ?>
                            Password and ConfirmPassword is not match !!
                        <?php } ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-offset-5 col-xs-10">
                        <input type="submit" name="submit" class="btn btn-primary submit" value="Sign Up">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>