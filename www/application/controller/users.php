<?php

/**
 * Class Home
 *
 */
class Users extends Controller
{
    public function index()
    {
        $users = $this->model->getUsers();

        require APP . 'view/_templates/header.php';
        require APP . 'view/users/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function add()
    {
        if(isset($_SESSION['auth']) && $_SESSION['auth']==1)
        {
            if(isset($_POST['name']) && is_string($_POST['name']) && $_POST['name'] !== '' && isset($_POST['username']) && is_string($_POST['username']) && $_POST['username'] !== '' && isset($_POST['password']) && is_string($_POST['password']) && $_POST['password'] !== '')
            {                
                $result = $this->model->addUser($_POST['name'], $_POST['username'], $_POST['password']);
            }
        }
    }
}
