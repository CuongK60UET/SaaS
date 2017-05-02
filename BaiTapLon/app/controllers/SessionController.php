<?php
class SessionController extends ControllerBase{
    public function indexAction(){
    }
    public function loginAction(){

        if($this->request->getPost()){
            $username = $this->request->getPost('username');
            $password  = $this->request->getPost('password');
            $user = User::findFirst( array(
                    "username = :username: AND password = :password: ",
                    'bind' => array(
                        'username' => $username,
                        'password' => $password
                    )
                )
            );
            $user = $user->toArray();
            if($user != false){
                $cart = Cart::find(array(
                        "userID = :userID:",
                        'bind' => array(
                            'userID' => $user['userID']
                        )
                    )
                );
                $products = array();
                foreach ($cart as $carts){
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
            $this->flash->error('Wrong username or password');
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
}