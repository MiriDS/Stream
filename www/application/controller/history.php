<?php

/**
 * Class Home
 *
 */
class History extends Controller
{
    public function index()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/history/index.php';
        require APP . 'view/_templates/footer.php';
    }
}

