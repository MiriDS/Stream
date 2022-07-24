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
}