<?php

/**
 * Class Channels
 *
 */
class Channels extends Controller
{
    public function index()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/channels/index.php';
        require APP . 'view/_templates/footer.php';
    }
}
