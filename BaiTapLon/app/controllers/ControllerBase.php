<?php

use Phalcon\Mvc\Controller;
class ControllerBase extends Controller
{
    protected function initialize(){
    }

    /**
     * @return mixed
     */
    public function getAuth()
    {
        return $this->session->get("auth");
    }

    /**
     * @param mixed $auth
     */
    public function setAuth(array $auth)
    {
        $this->session->set("auth", $auth);
    }
    public function destroy(){
        $this->session->destroy();
    }
}
