<?php

/**
 * Class Authentication
 *
 */
class Auth extends Controller
{
    public function index()
    {
        if(isset($_POST['username']) && is_string($_POST['username']) && strlen($_POST['username'])!="" && isset($_POST['password']) && is_string($_POST['password']) && strlen($_POST['password'])!="")
        {
            $loginState = $this->model->checkPassword($_POST['username'], $_POST['password']);

            if($loginState == 'success')
            {
                header('Location:'.URL);
            }
            else if($loginState == 'error')
            {
                header('Location:'.URL);
            }
            else
            {
                header('Location:'.URL);
            }
        }
        else
        {    
            require APP . 'view/auth/index.php';
        }
    }

    public function logout()
    {
        $this->model->logout();
        header('Location:'.URL);
    }
}
