<?php

//   /index
class IndexController extends ControllerBase
{
    /***
     *
     */
    public function initialize()
    {
        parent::initialize();
    }

    // index Action
    public function indexAction()
    {
        if(!$this->session->has('cart')){
            $this->session->set('cart', array());
        }

        $config = array(
            'current_page' => 1,
            'total_record' => count(Product::find()),
            'total_page' => 1,
            'limit' => 3,
            'start' => 0,
        );
        $config['total_page'] = ceil($config['total_record'] / $config['limit']);
        if (isset($_GET['page'])) {
            $config['current_page'] = $_GET['page'];
        } else {
            $config['current_page'] = 1;
        }
        $config['start'] = ($config['current_page'] - 1) * $config['limit'];
        if ($config['total_page'] > 1) {
            $page = array();
            for ($i = 1; $i <= $config['total_page']; $i++) {
                $page[] = $i;
            }
            $this->view->pages = $page;
        }
        $this->view->cur_page = $config['current_page'];
        $this->view->all_page = $config['total_page'];
        $this->view->run2 = true;
        $this->view->loai = ProductTypes:: find();
        $this->view->data = Product::find(
            [
                'limit' => [$config['limit'], $config['start']]

            ]
        );// paging
        if ($this->getAuth()) {
            $this->view->users = $this->getAuth()['HovaTen'];
            $this->view->run1 = true;
            $this->view->run2 = false;
        }

    }
    // show products in Cart
    public function cartAction()
    {
        if ($this->getAuth()) {
            $this->view->users = $this->getAuth()['HovaTen'];
            $cart = array_merge($this->session->get('cart'), $this->session->get('carts'));
            $this->view->run2 = false;
            if (count($cart)) {
                $Pay = 0;
                for($i = 0; $i<count($cart)-1; $i++){
                    for($j = $i+1; $j< count($cart); $j++){
                        if ($cart[$j]['MaQuanAo'] == $cart[$i]['MaQuanAo']){
                            $cart[$i]['soluong'] += $cart[$j]['soluong'];
                            unset($cart[$j]); array_merge($cart);
                        }
                    }
                }
//                print_r($cart);die;
                $this->view->run1 = true;
                foreach ($cart as $prodct) {
                    $Pay += $prodct['Gia'] * $prodct['soluong'];
                }
                $this->view->cart = $cart;
                $this->view->Payall = $Pay;
            }
            else if (!count($cart)) {
                $this->view->Payall = 0;
            }


        } else {
            $cart = $this->session->get('cart');
//            var_dump($cart);die;
            $this->view->run2 = true;
            if (count($cart)) {
                $Pay = 0;
                $this->view->run1 = true;
//                $cart = $this->session->get('cart');
                foreach ($cart as $prodct) {
                    $Pay += $prodct['Gia'] * $prodct['soluong'];
                }
                $this->view->cart = $cart;
                $this->view->Payall = $Pay;
            }
            if (!count($cart)) {
                $this->view->Payall = 0;
            }
        }

    }
    // add products to cart
    public function addCartAction()
    {
        $a = 0;
        $cart = $this->session->get('cart');
        if ($this->request->isPost()) {

            $this->view->disable();
            $data = $this->request->getPost();
            foreach ($cart as $product) {
                if ($product['MaQuanAo'] == $data['MaQuanAo']) {
                    $a = 1;
                }
            }
            $prodct = array(
                'MaQuanAo' => $data['MaQuanAo'],
                'TenQuanao' => $data['TenQuanao'],
                'Gia' => $data['Gia'],
                'color' => $data['color'],
                'sizes' => $data['sizes'],
                'chuthich' => $data['chuthich'],
                'image' => $data['image'],
                'soluong' => $data['soluong'],
            );
            if ($a == 0) {
                array_push($cart, $prodct);
            } else if ($a == 1) {
                foreach ($cart as $key => $product) {
                    if ($product['MaQuanAo'] == $data['MaQuanAo']) {
                        $cart[$key]['soluong'] += $data['soluong'];
                    }
                }
            }
            $this->session->remove('cart');
            $this->session->set('cart', $cart);
            return $this->response->setJsonContent(['status' => '1', 'message' => 'Bạn đã thêm vào giỏ hàng thành công']);
        }
    }
    // delete products ò cart
    public function subCartAction()
    {
        if ($this->request->isPost()) {
            $cart = $this->session->get('cart');
            $this->view->disable();
            $MaQuanAo = $this->request->getPost('MaQuanAo');
            foreach ($cart as $key => $product) {
                if ($product['MaQuanAo'] == $MaQuanAo) unset($cart[$key]); //
            }
            $this->session->set('cart', $cart);
            return $this->response->setJsonContent(array(
                'status' => '1',
                'message' => 'Bạn đã huỷ thành công ',
            ));
        }
    }
    // create new account
    public function signupAction()
    {

    }

    public function productTypeAction()
    {

        if ($_GET['typeID']) {
            $typeID = $_GET['typeID'];
        } else {
            $typeID = 1;
        }
        $cart = ListShow::find(array(
            "MaLoai = :MaLoai:",
            'bind' => array(
                'MaLoai' => $typeID,
            )
        ));
        $cart = $cart->toArray();
//        print_r($cart);die;
        $products = array();
        foreach ($cart as $carts) {
            $product = Product::findFirst(array(
                "MaQuanAo = :MaQuanAo:",
                'bind' => array(
                    'MaQuanAo' => $carts['MaQuanAo'],
                )
            ));
            $product = $product->toArray();
            $products[] = $product;
        }
        $this->view->loai = ProductTypes::find()->toArray();
        $this->view->type = ProductTypes::findFirst(array(
            "MaLoai = :MaLoai:",
            'bind' => array(
                'MaLoai' => $typeID,
            )
        ))->toArray();
//        print_r($products);die;
        $this->view->data = $products;

        $this->view->run2 = true;

        if ($this->getAuth()) {
            $this->view->users = $this->getAuth()['HovaTen'];
            $this->view->run1 = true;
            $this->view->run2 = false;
        }
    }

    public function invoiceAction()
    {
        if($this->getAuth()){
            $pay = $this->request->getPost();
            if ($pay['Pay'] == 0) {
                return $this->response->setJsonContent(array(
                    'status' => '1',
                    "message" => 'Giỏ hàng của bạn đang trống. Không thẻ thanh toán ngay bây giờ !!'
                ));
            } else {
                $cart = $this->session->get('cart');
                $use = $this->getAuth()['userID'];
                $now = getdate();
                $currentTime = $now["hours"] . ":" . $now["minutes"];
                $currentDate = $now["mday"] . "-" . $now["mon"] . "-" . $now["year"];
                $invoice = new Orders();
                $invoice->user_id = $use;
                $invoice->payments = $pay['Pay'];
                $invoice->order_time = $currentTime;
                $invoice->order_date = $currentDate;
                $invoice->save();
                foreach ($cart as $products){
                    $product = new OrderDetail();
                    $product->order_id = $invoice->id;
                    $product->product_id = $products['MaQuanAo'];
                    $product->soluong = $products['soluong'];
                    $product->save();
                }
                $this->session->remove('cart');
                $this->session->remove('carts');
                $cart_del = Cart::find(array(
                        "userID = :userID:",
                        'bind' => array(
                            'userID' => $use
                        )
                    )
                );
                if($cart_del!== false){
                    $cart_del->delete();
                }
                return $this->response->setJsonContent(array(
                    'status' => '1',
                    "message" => 'Bạn đã thanh toán thành công !!'
                ));

            }
        }
        return $this->response->setJsonContent(array(
            'status' => '1',
            'message' => 'Bạn cần phải đăng nhập trước khi thanh toán !!',
        ));
    }

    public function ordersAction()
    {
        $this->view->users = $this->getAuth()['HovaTen'];
        $user = $this->getAuth();
        $order = Orders::find(array(
                "user_id = :id:",
                'bind' => array(
                    "id" => $user['userID']
                )
            )
        );
        $order = $order->toArray();
        $orders = array();
//        $this->view->order = $order;
        foreach ($order as $key => $a){
            $a['stt'] = $key+1;
            $orders[] = $a;
        }
//        print_r($orders);die;
        $this->view->order = $orders;
    }

    public function order_detailsAction(){
        $this->view->users = $this->getAuth();
        $order_id = $_GET['id'];
        $order = Orders::findFirst(array(
            "id = :order_id:",
            "bind" => array(
                "order_id" => $order_id
            )
        ));
        $order = $order->toArray();
        $order_details = OrderDetail::find(array(
            "order_id = :a:",
            "bind" => array(
                "a" => $order_id
            )
        ));
        $order_details = $order_details->toArray();
        $products = array();
        foreach ($order_details as $key => $a){
            $product = Product::findFirst(array(
                "MaQuanAo = :a:",
                "bind" => array(
                    "a" => $a['product_id']
                )
            ));
            $product = $product->toArray();
            $product['stt'] = $key+1;
            $product['soluong'] = $a['soluong'];
            $product['pay'] = $a['soluong']*$product['Gia'];
            $products[] = $product;
        }
        $this->view->order = $order;
        $this->view->products = $products;
    }

    public function saveCartAction(){
        if($this->getAuth()){
            $cart = $this->session->get('cart');
            foreach ($cart as $run){
                $new_cart = new Cart();
                $new_cart->userID = $this->getAuth()['userID'];
                $new_cart->masp = $run['MaQuanAo'];
                $new_cart->soluong = $run['soluong'];
                $new_cart->save();
            }
            return $this->response->setJsonContent(array(
                'status' => '1',
                'message' => 'Bạn đã lưu thành công giỏ hàng'
            ));
        }
        return $this->response->setJsonContent(array(
            'status' => '1',
            'message' => 'Bạn cần phải đăng nhập để lưu lại giỏ hàng !!!'
        ));
    }
}

