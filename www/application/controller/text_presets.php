<?php

/**
 * Class Home
 *
 */
class Text_presets extends Controller
{
    public function index()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/text_presets/index.php';
        require APP . 'view/_templates/footer.php';
    }
}
