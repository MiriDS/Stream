<?php

/**
 * Class Home
 *
 */
class Scheduler extends Controller
{
    public function index()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/scheduler/index.php';
        require APP . 'view/_templates/footer.php';
    }
}

