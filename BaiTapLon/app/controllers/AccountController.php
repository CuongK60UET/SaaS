<?php
class AccountController extends ControllerBase{
    private $check1, $check2;

    public function indexAction(){
        if($this->check1 == 1){
            $this->view->createFail = true;
        }
        if($this->check2 == 1){
            $this->view->notmatch = true;
        }
    }
    public function indexfbAction(){
        $this->view->userinfo = $this->session->get('userinfofb');
        if($this->check1 == 1){
            $this->view->createFail = true;
        }
        if($this->check2 == 1){
            $this->view->notmatch = true;
        }
    }
    public function signupAction(){
        if($this->request->getPost('submit')){
            $username = $this->request->getPost('username');
            $login = User::findFirst(array(
                "username = :username:",
                'bind' => array(
                    'username' => $username
                )
            ));
            if($login != true){
                $this->check1 = 0;
                $pass = $this->request->getPost('pass');
                $confirmpass = $this->request->getPost('confirmPass');
                if ($pass == $confirmpass){
                    return $this->dispatcher->forward(array(
                        'controller' => 'account',
                        'action' => 'index'
                    ));
                }
                $this->check2 = 1;
                return $this->dispatcher->forward(array(
                    'controller' => 'account',
                    'action' => 'index'
                ));
            }
            $this->check1 = 1;
        }
        return $this->dispatcher->forward(array(
            'controller' => 'account',
            'action' => 'index'
        ));
    }
    public function loginfbAction(){

        $app_id = "413764872356508";
        $app_secret = "691e4c2fbbf51d85850d68a436cc404b";
        $redirect_uri = urlencode("http://localhost:1334/account/loginfb");

        // Get code value
        $code = $_GET['code'];

        $facebook_access_token_uri = "https://graph.facebook.com/v2.8/oauth/access_token?client_id=$app_id&redirect_uri=$redirect_uri&client_secret=$app_secret&code=$code";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $facebook_access_token_uri);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $response = curl_exec($ch);
        curl_close($ch);
        // Get access token
        $aResponse = json_decode($response);
        $access_token = $aResponse->access_token;
        //    print_r($access_token);die;

        // Get user infomation
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/v2.8/me?fields=id,name,email,picture,gender,birthday,hometown&access_token=$access_token");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        $response = curl_exec($ch);
        curl_close($ch);

        $user = json_decode($response, true);
        $a = User::findFirst(array(
           'conditions' => 'idfb = :id:',
            'bind' => array(
                'id' => $user['id'],
            )
        ));
        if ( $a != false ){
            $this->setAuth($a->toArray());
            return $this->dispatcher->forward(array(
                'controller' => 'session',
                'action' => 'start'
            ));
        }
        else{
            $use['HovaTen'] = $user['name'];
            $use['image'] = $user['picture']['data']['url'];
            $use['gioitinh'] = $user['gender'];
            $use['email'] = $user['email'];
            $use['ngaysinh'] = $user['birthday'];
            $use['DiaChi'] = $user['hometown']['name'];
            $use['id'] = $user['id'];
            $this->session->set('userinfofb', $use);
            return $this->dispatcher->forward(array(
                'controller' => 'account',
                'action' => 'signupfb'
            ));
        }


    }
    public function signupfbAction()
    {

        if ($this->request->getPost('submit')) {
            $username = $this->request->getPost('username');
            $login = User::findFirst(array(
                "username = :username:",
                'bind' => array(
                    'username' => $username
                )
            ));
            if ($login != true) {
                $this->check1 = 0;
                $pass = $this->request->getPost('pass');
                $confirmpass = $this->request->getPost('confirmPass');
                if ($pass == $confirmpass) {

                    $user = new User();
                    $user->username = $username;
                    $user->HovaTen = $this->request->getPost('fullName');
                    $user->sodienthoai = $this->request->getPost('phone');
                    $user->ngaysinh = $this->request->getPost('ngaysinh');
                    $user->DiaChi = $this->request->getPost('address');
                    $user->email = $this->request->getPost('email');
                    $user->gioitinh = $this->request->getPost('gender');
                    $user->password = $pass;
                    $user->avatar = $this->session->get('userinfofb')['image'];
                    $user->idfb = $this->session->get('userinfofb')['id'];
                    try{
                        if(!$user->save()){

                            var_dump($user->getMessages());die;

                        }
                        else{
                            $this->setAuth($user->toArray());
                            return $this->dispatcher->forward(array(
                                'controller' => 'session',
                                'action' => 'start'
                            ));
                        }
                    } catch (Exception $e){
                        var_dump($e->getMessage());die;
                    }
                    return $this->dispatcher->forward(array(
                        'controller' => 'account',
                        'action' => 'indexfb'
                    ));
                }
                $this->check2 = 1;
                return $this->dispatcher->forward(array(
                    'controller' => 'account',
                    'action' => 'indexfb'
                ));
            }
            $this->check1 = 1;
        }
        return $this->dispatcher->forward(array(
            'controller' => 'account',
            'action' => 'indexfb'
        ));
    }
}