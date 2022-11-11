<?php

/**
 * Class Cron
 *
 */
class Cron extends Controller
{
    public function index()
    {
        $start_sec = microtime(true);

        $this->model->startSchduleTasks();

        $sonn = (microtime(true)-$start_sec);
        $logg = fopen(__DIR__."/cron_log.txt","a+");
        fwrite($logg,"\t-\t$sonn\t-\t".date("d-m-Y H:i:s")."   ------------- \n");
        fclose($logg);
        print 'Success';
    }
}
