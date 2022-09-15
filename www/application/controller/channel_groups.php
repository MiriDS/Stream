<?php

/**
 * Class Channels
 *
 */
class Channel_groups extends Controller
{
    public function index()
    {
        $ch_groups = $this->model->getChannelsGroups();
        require APP . 'view/_templates/header.php';
        require APP . 'view/channel_groups/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function add()
    {
        if(isset($_SESSION['auth']) && $_SESSION['auth']==1)
        {
            $ch_group_id = isset($_POST['ch_group_id']) && is_numeric($_POST['ch_group_id']) && (int)$_POST['ch_group_id']>0 ? (int)$_POST['ch_group_id']: 0;
            $ch_list = isset($_POST['ch_list']) && is_string($_POST['ch_list']) && !empty($_POST['ch_list'])? explode(',', $_POST['ch_list']): [];
            if(isset($_POST['name']) && is_string($_POST['name']) && $_POST['name'] !== '')
            {
                $result = $this->model->addChannelGroup($ch_group_id, $_POST['name'], $ch_list);
            }
        }
    }

    public function channels() {
        $ch_group_id = isset($_POST['ch_group_id']) && is_numeric($_POST['ch_group_id']) && (int)$_POST['ch_group_id']>0 ? (int)$_POST['ch_group_id']: 0;
        $channels = $this->model->getFreeChannels($ch_group_id);
        print json_encode([
            'status' => 'success',
            'data' => $channels
            ]);
    }
    public function remove()
    {
        if(isset($_SESSION['auth']) && $_SESSION['auth']==1)
        {
            if(isset($_POST['id']) && is_numeric($_POST['id']) && (int)$_POST['id'] > 0)
            {
                $result = $this->model->removeChannelGroup((int)$_POST['id']);
            }
        }
    }
}
