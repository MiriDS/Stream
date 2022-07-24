<?php

/**
 * Class Home
 *
 */
class Servers extends Controller
{
    public function index()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/servers/index.php';
        require APP . 'view/_templates/footer.php';
    }
}
