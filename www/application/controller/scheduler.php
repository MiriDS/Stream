<?php

class Scheduler extends Controller
{
    public function index()
    {
        $textPresets = $this->model->getTextPresets();
        $graphicPresets = $this->model->getGraphicPresets();
        $chGroups = $this->model->getChannelsGroups();


        require APP . 'view/_templates/header.php';
        require APP . 'view/scheduler/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function add()
    {
        if(isset($_SESSION['auth']) && $_SESSION['auth']==1)
        {
            if(
                isset($_POST['name']) && is_string($_POST['name']) && trim($_POST['name']) !== ''
                && isset($_POST['text_preset']) && is_numeric($_POST['text_preset']) && (int)$_POST['text_preset']>0
                && isset($_POST['graphic_preset']) && is_numeric($_POST['graphic_preset']) && (int)$_POST['graphic_preset']>0
                && isset($_POST['group']) && is_numeric($_POST['group']) && (int)$_POST['group']>0
                && isset($_POST['start_time']) && is_string($_POST['start_time']) && trim($_POST['start_time']) !== ''
            )
            {
                $result = $this->model->addScheduleTask();
            }
        }
    }
    public function status()
    {
        if (isset($_SESSION['auth']) && $_SESSION['auth'] == 1) {
            if(isset($_POST['sid']) && is_numeric($_POST['sid']) && (int)$_POST['sid']>0
            && isset($_POST['status']) && is_numeric($_POST['status']) && in_array($_POST['status'],[1,2,3])) {

                $sid = (int)$_POST['sid'];
                $status = (int)$_POST['status'];
                $this->model->setScheduleStatus($sid, $status);
                if(in_array($status,[2,3])) {
                    $this->model->stopInfiniteTask($sid);
                }
                if(in_array($status,[2])) {
                    $this->model->setIsSent($sid, 0);
                }
            }
        }
    }

    public function get()
    {

        if(isset($_SESSION['auth']) && $_SESSION['auth']==1)
        {
            if(isset($_POST['id']) && is_numeric($_POST['id']) && (int)$_POST['id'] > 0)
            {
                $result = $this->model->getScheduler(0, (int)$_POST['id']);
                if(count($result)) {
                    $result = $result[0];
                    //$result['name'] = htmlspecialchars($result['name']);
                    //$result['background_color'] = htmlspecialchars($result['background_color']);
                    //$result['font_color'] = htmlspecialchars($result['font_color']);
                }

                print json_encode(['status'=> 'ok', 'data' => $result],true);
            }
        }
    }

    public function get_logs()
    {
        if(isset($_SESSION['auth']) && $_SESSION['auth']==1)
        {
            if(isset($_POST['id']) && is_numeric($_POST['id']) && (int)$_POST['id'] > 0)
            {
                $result = $this->model->getScheduleLogs((int)$_POST['id']);

                print json_encode(['status'=> 'ok', 'data' => $result],true);
            }
        }
    }
}

