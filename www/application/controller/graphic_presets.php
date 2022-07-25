<?php

/**
 * Class Home
 *
 */
class Graphic_presets extends Controller
{
    public function index()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/graphic_presets/index.php';
        require APP . 'view/_templates/footer.php';
    }
}
