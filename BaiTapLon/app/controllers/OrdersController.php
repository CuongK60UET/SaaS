<?php
class OrdersController extends ControllerBase
{

    public function initialize()
    {
        parent::initialize();
    }

    public function invoiceAction()
    {
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
            $this->session->set('cart', $a = array());
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

}