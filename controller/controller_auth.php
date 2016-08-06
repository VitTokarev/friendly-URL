<?php

class ControllerAuth extends Controller
{
	
	public $layout = 'login.php';
	
    function __call($name, $params)
    {
        e404();
    }

    function login_controller()
    {

        if (count($_POST)) {
            if ($_POST['action'] === 'login') {
                $username = $_POST['username'];
                $password = $_POST['password'];

                $user = new ModelUser();

                if ($user->auth($username,$password)) {
                    header("Location: /");
                    die();

                }
                else
                {
                    header("Location: /auth/login");
                    die();
                }

            }
        }

        return $this->render('auth/login', [

        ]);

    }


}