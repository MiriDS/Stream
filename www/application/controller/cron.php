<?php

/**
 * Class Cron
 *
 */
class Cron extends Controller
{
    public function index()
    {
        $this->model->startSchduleTasks();
        print 'Success';
    }
}
