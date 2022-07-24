<?php

/**
 * Class Channels
 *
 */
class Channel_groups extends Controller
{
    public function index()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/channel_groups/index.php';
        require APP . 'view/_templates/footer.php';
    }
}
