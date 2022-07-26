<?php

/**
 * Class Home
 *
 */
class Servers extends Controller
{
    public function index()
    {
        $servers = $this->model->getServers();
        require APP . 'view/_templates/header.php';
        require APP . 'view/servers/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function add()
    {
        if(isset($_SESSION['auth']) && $_SESSION['auth']==1)
        {
            if(isset($_POST['ip']) && is_string($_POST['ip']) && $_POST['ip'] !== '')
            {
                $result = $this->model->addServer($_POST['ip']);
            }
        }
    }

    public function remove()
    {
        if(isset($_SESSION['auth']) && $_SESSION['auth']==1)
        {
            if(isset($_POST['id']) && is_string($_POST['id']) && $_POST['id'] !== '')
            {
                $result = $this->model->removeServer($_POST['id']);
            }
        }
    }
}
