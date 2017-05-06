<?php
class SessionController extends ControllerBase{
    private $check = 0;
    public function indexAction(){
        $this->view->loginFail = false;
        if ($this->check == 1){
            $this->view->loginFail = true;
        }
    }
    public function loginAction(){

        if($this->request->getPost('submit')) {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $user = User::findFirst(array(
                    "conditions" => "username = :username: AND password = :password: ",
                    'bind' => array(
                        'username' => $username,
                        'password' => $password,
                    )
                )
            );
            if ($user != false) {
                $this->check = 0;
                $user = $user->toArray();
                $cart = Cart::find(array(
                        "userID = :userID:",
                        'bind' => array(
                            'userID' => $user['userID']
                        )
                    )
                );
                $products = array();
                foreach ($cart as $carts) {
                    $id = $carts->masp;
                    $product = Product::findFirst(array(
                        "MaQuanAo = :masp:",
                        "bind" => array(
                            'masp' => $id
                        )
                    ));
                    $product = $product->toArray();
                    $product['soluong'] = $carts->soluong;
                    $products[] = $product;
                }
                $this->session->set('carts', $products);
                $this->setAuth($user);
                return $this->dispatcher->forward(array(
                        'controller' => 'index',
                        'action' => 'index'
                    )
                );
            }
            else{
                $this->check = 1;
            }
        }
        return $this->dispatcher->forward(array(
            'controller' => 'session',
            'action' => 'index'
        ));
    }
    public function logoutAction(){
        $this->destroy();
        return $this->dispatcher->forward(array(
            'controller' => 'session',
            'action' => 'index'
        ));
    }
    public function startAction(){
        $username = $this->getAuth()['username'];
        $password = $this->getAuth()['password'];
        $user = User::findFirst(array(
                "conditions" => "username = :username: AND password = :password: ",
                'bind' => array(
                    'username' => $username,
                    'password' => $password,
                )
            )
        );
        $user = $user->toArray();
        $cart = Cart::find(array(
                "userID = :userID:",
                'bind' => array(
                    'userID' => $user['userID']
                )
            )
        );
        $products = array();
        foreach ($cart as $carts) {
            $id = $carts->masp;
            $product = Product::findFirst(array(
                "MaQuanAo = :masp:",
                "bind" => array(
                    'masp' => $id
                )
            ));
            $product = $product->toArray();
            $product['soluong'] = $carts->soluong;
            $products[] = $product;
        }
        $this->session->set('carts', $products);
        $this->setAuth($user);
        return $this->dispatcher->forward(array(
            'controller' => 'index',
            'action' => 'index'
        ));
    }
}