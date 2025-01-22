<?php
#require APP . "libs/pagination.php";
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Message\ResponseInterface;

class Model
{
    /**
     * @param object $db A PDO database connection
     */
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    /**
     * Get module content
     */
    public function getModuleContent($module)
    {
        $info = array();
        // $lang = (string)$_SESSION['lang_code'];

        if($module == 'main')
        {
            $Content = "SELECT content_name, content, name FROM `modules`";
            $ContentQuery = $this->db->prepare($Content);
            $ContentQuery->execute();
            $sort = $ContentQuery->fetchAll(PDO::FETCH_ASSOC);

            $content = array();
            $about = array();
            $services = array();
            $partners = array();
            $media = array();
            foreach ($sort as $e)
            {
                if($e['name']=='main')
                {
                    $content[$e['content_name']] = $e['content'];
                }
                else if($e['name']=='about')
                {
                    $about[$e['content_name']] = $e['content'];
                }
                else if($e['name']=='services')
                {
                    $services[$e['content_name']] = $e['content'];
                }
                else if($e['name']=='partners')
                {
                    $partners[$e['content_name']] = $e['content'];
                }
                else if($e['name']=='media')
                {
                    $media[$e['content_name']] = $e['content'];
                }
            }


            $info = array('content' => $content, 'about' => $about, 'services' => $services, 'partners' => $partners, 'media' => $media);
        }
        else if($module == 'about' || $module == 'services' || $module == 'partners' || $module == 'quality_policy' || $module == 'media' || $module == 'contact')
        {
            $Content = "SELECT content_name, content FROM `modules` WHERE lang='$lang' AND name='$module'";
            $ContentQuery = $this->db->prepare($Content);
            $ContentQuery->execute();
            $sort = $ContentQuery->fetchAll(PDO::FETCH_ASSOC);

            foreach ($sort as $e)
            {
                $info[$e['content_name']] = $e['content'];
            }
        }

        return $info;
    }
    
    public function getUsers()
    {
        $sql = "SELECT * FROM `admins`";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function getServers()
    {
        $graphQLquery = '{"query":"query {version}"}';
        $sql = " SELECT * FROM `servers` WHERE is_deleted=0 ";
        $query = $this->db->prepare($sql);
        $query->execute();
        $servers = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($servers AS $keyy => $data) {
            $serverIp = $data['ip_address'];
            $status = 0;
            $info = "-";

            $data = Helper::graphqlRequest($serverIp, $graphQLquery);
            if($data) {
                $info = json_decode($data,true);
                if(isset($info['data'])) {
                    $info = $info['data']['version'];
                    $status = 1;
                }
            }

            $servers[$keyy]['status'] = $status;
            $servers[$keyy]['info'] = $info;

            //echo ($response->getBody());
        }

        return $servers;
    }

    public function getChannels()
    {
        $sql = " SELECT * FROM `channels` WHERE is_deleted=0 ";
        $query = $this->db->prepare($sql);
        $query->execute();
        $channels = $query->fetchAll(PDO::FETCH_ASSOC);

        return $channels;
    }

    public function getFreeChannels($ch_group_id)
    {
        // $sql = " SELECT *,(SELECT ch_group_id FROM ch_groups_channels WHERE is_deleted=0 AND channel_id=tb1.id LIMIT 1 )ch_group_id FROM `channels` tb1 WHERE /*id NOT IN (SELECT channel_id FROM ch_groups_channels WHERE is_deleted=0 AND ch_group_id!=:ch_group_id) AND*/  is_deleted=0 "; This is old query 
        $sql = "SELECT tb1.*, (SELECT GROUP_CONCAT(ch_group_id) FROM ch_groups_channels WHERE is_deleted = 0 AND channel_id = tb1.id) AS ch_group_ids, (SELECT CASE WHEN COUNT(*) > 0 THEN 1 ELSE 0 END FROM ch_groups_channels WHERE is_deleted = 0 AND channel_id = tb1.id AND ch_group_id = :filter_group_id) AS in_this_group FROM channels tb1 WHERE tb1.is_deleted = 0";
        $query = $this->db->prepare($sql);
        $query->execute(['filter_group_id' => $ch_group_id]);
        $channels = $query->fetchAll(PDO::FETCH_ASSOC);

        return $channels;
    }

    public function setChannelList()
    {
        $newChannels = [];
        $graphQLquery = '{"query":"query {nodes (role: PROCESSING) {id  type  alias  role   state  disabled  }}"}';
        $sql = " SELECT * FROM `servers` WHERE is_deleted=0 ";
        $query = $this->db->prepare($sql);
        $query->execute();
        $servers = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($servers AS $keyy => $data) {
            $serverIp = $data['ip_address'];
            $status = 0;

            $data = Helper::graphqlRequest($serverIp, $graphQLquery);

            if($data) {
                $data = (json_decode($data,true));
                $nodes = ($data['data']['nodes']);
                foreach ($nodes as $node) {

                    $channelId = $this->sanitize($node['id']);
                    $params = array(
                        ':id_from_ip' => $this->sanitize($node['id'])
                        ,':type' => $this->sanitize($node['type'])
                        ,':alias' => $this->sanitize($node['alias'])
                        ,':state' => $this->sanitize($node['state'])
                        ,':disabled' => (int)($node['disabled'])
                        ,':server_ip' => $this->sanitize($serverIp)
                    );

                    $newChannels[$channelId] = $params;
                }
            }
        }

        $sql = " SELECT * FROM `channels` WHERE is_deleted=0 ";
        $query = $this->db->prepare($sql);
        $query->execute();
        $curChannels = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($curChannels AS $keyy => $channel) {

            $channelApiId = $channel["id_from_api"];
            if(isset($newChannels[$channelApiId])) {
                unset($newChannels[$channelApiId]);
            }
            else {
                $channelId = (int)$channel['id'];
                $sql = "UPDATE `channels` SET is_deleted=1 WHERE id=:id";
                $query = $this->db->prepare($sql);
                $query->execute([
                    ':id' => $channelId
                ]);

                $check = $this->db->prepare("UPDATE `ch_groups_channels` SET is_deleted=1 WHERE channel_id=?");
                $check->execute([$channelId]);
            }
        }


        /*Adding new channels*/

        foreach ($newChannels as $key => $newChannel) {
            $sql = "INSERT INTO `channels` (id_from_api, type, alias, state, disabled, server_ip) VALUES (:id_from_ip, :type, :alias, :state, :disabled, :server_ip)";
            $query = $this->db->prepare($sql);
            $query->execute($newChannel);
        }



        return $servers;
    }



    public function addUser($name, $username, $password)
    {
        $check = $this->db->prepare("SELECT * FROM `admins` WHERE username='$username'");
        $check->execute();
        $exist = $check->fetchAll();

        if (count($exist) > 0) {
            print 'exist';
            return;
        }

        $salt = $this->generateRandomString();

        $sql = "INSERT INTO `admins` (username, password, name, salt) VALUES (:username, :password, :name, :salt)";
        $query = $this->db->prepare($sql);
        $params = array(':username' => $username, ':name' => $this->sanitize($name), ':password' => $this->convertPassword($password, $salt), ':salt' => $salt);
        $query->execute($params);

        if ($query) {
            print 'success';
        }
    }

    public function addServer($ip)
    {
        $check = $this->db->prepare("SELECT * FROM `servers` WHERE ip_address='$ip' AND is_deleted=0");
        $check->execute();
        $exist = $check->fetchAll();

        if (count($exist) > 0) {
            print 'exist';
            return;
        }

        $sql = "INSERT INTO `servers` (ip_address) VALUES (:ip)";
        $query = $this->db->prepare($sql);
        $params = array(':ip' => $ip);
        $query->execute($params);

        if ($query) {
            print 'success';
        }
    }
    public function removeServer($id)
    {
        $sql = "UPDATE `servers` SET is_deleted=1 WHERE id=:id";
        $query = $this->db->prepare($sql);
        $params = array(':id' => $id);
        $query->execute($params);
        if ($query) {
            print 'success';
        }
    }

    public function removeUser($id)
    {
        $sql = "DELETE FROM `admins` WHERE id=:id";
        $query = $this->db->prepare($sql);
        $params = array(':id' => $id);
        $query->execute($params);
        if ($query) {
            print 'success';
        }
    }
    public function addGraphicPreset()
    {
        $id = isset($_POST['id']) && is_numeric($_POST['id']) && (int)$_POST['id']>0 ? (int)$_POST['id']: 0;
        $name = $_POST['name'];
        $passes = (int)$_POST['passes'];
        $pause = (int)$_POST['pause'];
        $font_color = $_POST['font_color'];
        $background_color = $_POST['background_color'];
        $margin = (int)$_POST['margin'];
        $font_size = (int)$_POST['font_size'];
        $padding = (int)$_POST['padding'];
        $speed = (int)$_POST['speed'];


        $check = $this->db->prepare("SELECT * FROM `graphic_presets` WHERE name=:name AND is_deleted=0 AND id!=:id");
        $check->execute(['name' => $name, 'id' => $id]);
        $exist = $check->fetchAll();
        if (count($exist) > 0) {
            print 'exist';
            return;
        }

        $params = array(
            'name' => $name,
            'passes' => $passes,
            'pause' => $pause,
            'font_color' => $font_color,
            'background_color' => $background_color,
            'margin' => $margin,
            'font_size' => $font_size,
            'padding' => $padding,
            'speed' => $speed,
        );

        if($id) {
            $sql = "UPDATE `graphic_presets` SET name=:name,passes_count=:passes,pause_between_passes=:pause,font_color=:font_color,background_color=:background_color,bottom_margin=:margin, font_size=:font_size, text_padding=:padding, text_speed=:speed WHERE id=:id";
            $params['id'] = $id;
        }
        else {
            $sql = "INSERT INTO `graphic_presets` (name,passes_count,pause_between_passes,font_color,background_color,bottom_margin, font_size, text_padding, text_speed) VALUES (:name,:passes,:pause,:font_color,:background_color,:margin, :font_size, :padding, :speed)";
        }

        $query = $this->db->prepare($sql);

        $query->execute($params);

        if ($query) {
            print 'success';
        }
    }

    public function getGraphicPresets($id = 0)
    {
        $sql = "SELECT * FROM `graphic_presets` WHERE is_deleted=0 ".($id ? " AND id=$id" : "") ;
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function removeGraphicPreset($id)
    {
        $sql = "UPDATE `graphic_presets` SET is_deleted=1 WHERE id=:id";
        $query = $this->db->prepare($sql);
        $params = array(':id' => $id);
        $query->execute($params);
        if ($query) {
            print 'success';
        }
    }


    public function addTextPreset()
    {
        $id = isset($_POST['id']) && is_numeric($_POST['id']) && (int)$_POST['id']>0 ? (int)$_POST['id']: 0;
        $name = $_POST['name'];
        $text = $_POST['text'];


        $check = $this->db->prepare("SELECT * FROM `text_presets` WHERE name=:name AND is_deleted=0 AND id!=:id");
        $check->execute(['name' => $name, 'id' => $id]);
        $exist = $check->fetchAll();
        if (count($exist) > 0) {
            print 'exist';
            return;
        }

        $params = array(
            'name' => $name,
            'text' => $text
        );

        if($id) {
            $sql = "UPDATE `text_presets` SET name=:name,text=:text WHERE id=:id";
            $params['id'] = $id;
        }
        else {
            $sql = "INSERT INTO `text_presets` (name,text) VALUES (:name,:text)";
        }

        $query = $this->db->prepare($sql);

        $query->execute($params);

        if ($query) {
            print 'success';
        }
    }

    public function getTextPresets($id = 0)
    {
        $sql = "SELECT * FROM `text_presets` WHERE is_deleted=0 ".($id ? " AND id=$id" : "") ;
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function removeTextPreset($id)
    {
        $sql = "UPDATE `text_presets` SET is_deleted=1 WHERE id=:id";
        $query = $this->db->prepare($sql);
        $params = array(':id' => $id);
        $query->execute($params);
        if ($query) {
            print 'success';
        }
    }
    public function getChannelsGroups() {
        $query = $this->db->prepare("SELECT *,(SELECT COUNT(0) FROM ch_groups_channels WHERE ch_group_id=tb1.id AND is_deleted=0)channel_count FROM `ch_groups` tb1 WHERE is_deleted=0");
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function addChannelGroup($id, $name, $ch_list)
    {
        $check = $this->db->prepare("SELECT * FROM `ch_groups` WHERE name=? AND id!=? AND is_deleted=0");
        $check->execute([$name, $id]);
        $exist = $check->fetchAll(PDO::FETCH_ASSOC);

        if (count($exist) > 0) {
            print 'exist';
            return;
        }

        /*
         * Channel checker
         * */
        foreach ($ch_list AS $ch_id) {
            if(! (is_numeric($ch_id) && (int)$ch_id>0)) {
                exit('channel error');
            }
            $ch_id = (int)$ch_id;
            /*$check = $this->db->prepare("SELECT * FROM `ch_groups_channels` WHERE ch_group_id!=? AND channel_id=? AND is_deleted=0");
            $check->execute([$id, $ch_id]);
            $exist = $check->fetch(PDO::FETCH_ASSOC);
            if($exist) {
                exit('wrong channel');
            }*/
        }

        if(!$id) {
            $sql = "INSERT INTO `ch_groups` (name) VALUES (?)";
            $query = $this->db->prepare($sql);
            $params = array($name);
            $query->execute($params);

            $check = $this->db->prepare("SELECT * FROM `ch_groups` ORDER BY id DESC LIMIT 1");
            $check->execute();
            $chGroup = $check->fetch(PDO::FETCH_ASSOC);
            $id = $chGroup['id'];
        }
        else {
            $sql = "UPDATE `ch_groups` SET name=? WHERE id=?";
            $query = $this->db->prepare($sql);
            $params = array($name,$id);
            $query->execute($params);
        }


        $check = $this->db->prepare("UPDATE `ch_groups_channels` SET is_deleted=1 WHERE ch_group_id=?");
        $check->execute([$id]);

        foreach ($ch_list AS $ch_id) {
            $ch_id = (int)$ch_id;
            $sql = "INSERT INTO `ch_groups_channels` (ch_group_id,channel_id) VALUES (?,?)";
            $query = $this->db->prepare($sql);
            $params = array($id,$ch_id);
            $query->execute($params);
        }

        if ($id) {
            print 'success';
        }
    }

    public function removeChannelGroup($id)
    {
        $sql = "UPDATE `ch_groups` SET is_deleted=1 WHERE id=:id";
        $query = $this->db->prepare($sql);
        $params = array(':id' => $id);
        $query->execute($params);

        $sql = "UPDATE `ch_groups_channels` SET is_deleted=1 WHERE ch_group_id=:id";
        $query = $this->db->prepare($sql);
        $params = array(':id' => $id);
        $query->execute($params);

        if ($query) {
            print 'success';
        }
    }


    public function getScheduler($type = 0, $id = 0) {

        $filter = "";
        if($type==1) {
            $filter = "AND (tb1.status!=3 AND (tb1.end_time IS NULL OR tb1.end_time>CURRENT_TIMESTAMP()))";
        }
        else if($type==2) {
            $filter = "AND (tb1.status=3 OR (tb1.end_time IS NOT NULL AND tb1.end_time<CURRENT_TIMESTAMP()))";
        }

        if($id) {
            $filter.= "AND tb1.id='$id'";
        }
        $query = $this->db->prepare("SELECT
    tb1.id,
    tb1.text_preset,
    tb1.graphic_preset,
    tb1.group,
    tb1.name,
    tb1.period,
    tb1.status,
    tb1.start_time,
    tb1.end_time,
    tb2.name text_preset_name,
    (LENGTH(tb2.text)/tb3.text_speed * 60) duration,
    tb3.name AS graphic_preset_name,
    (SELECT name FROM ch_groups tb4 WHERE tb4.id=tb1.group)group_name
FROM scheduler tb1
    LEFT JOIN text_presets tb2 ON tb2.id=tb1.text_preset
    LEFT JOIN graphic_presets tb3 ON tb3.id=tb1.graphic_preset
WHERE tb1.is_deleted=0 $filter");
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getScheduledTaskStatus($task) {
        /*
         * 0 - Created
         * 1 - Running
         * 2 - Suspended
         * 3 - Canceled
         *
         * 4 - Pending
         * 5 - Finished

         * */

        if($task['status'] == 1) {
            if(!empty($task['end_time']) && strtotime($task['end_time']) < time()) {
                $task['status'] = 5;
            }
            else if(strtotime($task['start_time']) > time()) {
                $task['status'] = 4;
            }
        }

        return $task['status'];
    }

    public function setScheduleStatus($id, $status) {
        $check = $this->db->prepare("SELECT * FROM `scheduler` WHERE is_deleted=0 AND id=:id");
        $check->execute(['id' => $id]);
        $exist = $check->fetch(PDO::FETCH_ASSOC);
        if (!($exist)) {
            print 'problem';
            return;
        }
        $sql = "UPDATE `scheduler` SET status=:status WHERE id=:id";
        $query = $this->db->prepare($sql);
        $query->execute(['status' => $status, 'id' => $id]);

        $this -> addSchedulerLog($id, $status);

        if ($query) {
            print 'success';
        }
    }

    public function addScheduleTask()
    {
        $id = isset($_POST['id']) && is_numeric($_POST['id']) && (int)$_POST['id']>0 ? (int)$_POST['id']: 0;
        $name = $_POST['name'];
        $group = (int)$_POST['group'];
        $text_preset = (int)$_POST['text_preset'];
        $graphic_preset = (int)$_POST['graphic_preset'];
        //$duration = (int)$_POST['duration'];
        $start_time = @date('Y-m-d H:i',strtotime($_POST['start_time']));
        $end_time = isset($_POST['end_time']) && is_string($_POST['end_time']) && trim($_POST['end_time']) !== '' ?
            @date('Y-m-d H:i',strtotime($_POST['end_time'])) : NULL;
        $period = isset($_POST['period']) && is_numeric($_POST['period']) && (int)$_POST['period']>=5 ? (int)$_POST['period']: 0;


        $check = $this->db->prepare("SELECT * FROM `scheduler` WHERE name=:name AND is_deleted=0 AND id!=:id");
        $check->execute(['name' => $name, 'id' => $id]);
        $exist = $check->fetchAll(PDO::FETCH_ASSOC);
        if (count($exist) > 0) {
            /*print 'exist';
            return;*/
        }

        $params = array(
            'name' => $name,
            'group' => $group,
            'text_preset' => $text_preset,
            'graphic_preset' => $graphic_preset,
            'period' => $period,
            'start_time' => $start_time,
            'end_time' => $end_time
        );

        if($id && false) {
            $sql = "UPDATE `scheduler` SET name=:name,passes_count=:passes,pause_between_passes=:pause,font_color=:font_color,background_color=:background_color,bottom_margin=:margin, font_size=:font_size, text_padding=:padding, text_speed=:speed WHERE id=:id";
            $params['id'] = $id;
        }
        else {
            $sql = "INSERT INTO `scheduler` (name,`group`,`text_preset`,`graphic_preset`, `period`, `start_time`, `end_time`) VALUES (:name,:group,:text_preset,:graphic_preset,:period ,:start_time ,:end_time)";
        }

        $query = $this->db->prepare($sql);

        $query->execute($params);

        if ($query) {
            print 'success';
        }
    }

    public function addSchedulerLog($taskId, $action, $note = "") {
        $params = array(
            'task_id' => $taskId,
            'action' => $action,
            'note' => $note
        );
        $sql = "INSERT INTO `scheduler_logs` (task_id, action, note) VALUES (:task_id, :action, :note)";
        $query = $this->db->prepare($sql);
        $query->execute($params);
    }

    public function getScheduleLogs($id) {
        $query = $this->db->prepare("SELECT * FROM scheduler_logs tb1 WHERE task_id='$id'");
        $query->execute();
        $statusNameMap = [
            1 => 'Run',
            2 => 'Pause',
            3 => 'Cancel',
            6 => 'Cron'
        ];
        $result = [];
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data as $datum) {
            if(!in_array($datum['action'], [1,2,3,6])) {
                //DOnt show other logs
                continue;
            }
            $datum['action_name'] = $statusNameMap[$datum['action']];
            $result[] = $datum;
        }
        return $result;
    }


    public function startSchduleTasks() {
        $actionTime = date('Y-m-d H:i');

        $query = $this->db->prepare("SELECT
            tb5.server_ip,
            tb5.id_from_api AS channel_id_api,
            tb1.id,
            tb1.graphic_preset,
            tb1.group,
            tb1.name,
            tb1.status,
            tb1.start_time,
            tb1.end_time,
            tb4.channel_id,
            tb3.passes_count,
            tb3.pause_between_passes,
            tb3.bottom_margin,
            tb3.font_size,
            tb3.text_padding,
            tb3.font_color,
            tb3.background_color,
            tb3.text_speed,
            tb2.text text_preset_text,
            tb1.period
        FROM scheduler tb1
        LEFT JOIN text_presets tb2 ON tb2.id=tb1.text_preset
        LEFT JOIN graphic_presets tb3 ON tb3.id=tb1.graphic_preset
        LEFT JOIN ch_groups_channels tb4 ON tb4.ch_group_id=tb1.`group` AND tb4.is_deleted=0 
        LEFT JOIN channels tb5 ON tb5.id=tb4.channel_id AND tb5.is_deleted=0
		
        WHERE 
        tb1.is_deleted=0 AND (tb1.status=1 AND (tb1.end_time IS NULL OR tb1.end_time>'$actionTime') AND start_time<='$actionTime')
        AND ((period=0 AND sent=0) OR (period>0 AND TIMESTAMPDIFF(MINUTE,start_time,'$actionTime')%period=0))");

        $query->execute();

        $taskList = $query->fetchAll(PDO::FETCH_ASSOC);


        $uTaskId = [];
        foreach ($taskList AS $task) {

            if(!in_array($task['id'],$uTaskId)) {
                $this->addSchedulerLog($task['id'], '6', 'Cron request');
                if($task['period'] == 0) {
                    $this->setIsSent($task['id'],1);
                }
                $uTaskId[] = $task['id'];
            }
            $channel_id_api = $task['channel_id_api'];
            $serverIp = $task['server_ip'];
            $task['background_color'] = $this->rgba2hex($task['background_color']);
            $task['font_color'] = $this->rgba2hex($task['font_color']);

            $graphQLquery = '[{
        "operationName": "startScrollingTextOverlay",
        "variables": {
            "node": "'.$channel_id_api.'",
            "overlay": {
                "id": -1,
                "text": "'.addcslashes($task['text_preset_text'], '"\\/').'",
                "passes": '.($task['period'] == 0 ? -1 : $task['passes_count']).',
                "pause": '.$task['pause_between_passes'].',
                "bottom": '.$task['bottom_margin'].',
                "size": '.$task['font_size'].',
                "padding": '.$task['text_padding'].',
                "color": "'.$task['font_color'].'",
                "background_color": "'.$task['background_color'].'",
                "speed": '.$task['text_speed'].'
            }
        },
        "query": "mutation startScrollingTextOverlay($overlay: InputScrollingTextOverlay!, $node: ID!) {startScrollingTextOverlay(overlay: $overlay, node: $node) {id}}"
}
]
';
            $request = Helper::graphqlRequest($serverIp, $graphQLquery);
            $this -> addSchedulerLog($task['id'], '7', 'start request '. $channel_id_api. ' -- '.$request);

        }
    }

    public function setIsSent($tid, $val) {
        $sql = "UPDATE `scheduler` SET sent = :val WHERE id=:id";
        $query = $this->db->prepare($sql);
        $parameters = array(':val' => $val, ':id' => $tid);
        $query->execute($parameters);
    }
    public function stopInfiniteTask($tid) {

        $query = $this->db->prepare("SELECT
		tb5.server_ip,
		tb5.id_from_api AS channel_id_api,
        tb1.id,
        tb1.period
FROM scheduler tb1
	LEFT JOIN ch_groups_channels tb4 ON tb4.ch_group_id=tb1.`group` AND tb4.is_deleted=0 
	LEFT JOIN channels tb5 ON tb5.id=tb4.channel_id AND tb5.is_deleted=0
		
WHERE 
tb1.is_deleted=0 AND tb1.id='$tid' AND tb1.period=0");

        $query->execute();

        $taskList = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($taskList AS $task) {
            $channel_id_api = $task['channel_id_api'];
            $serverIp = $task['server_ip'];

            $graphQLquery = '[{
        "operationName": "removeOverlay",
        "variables": {
            "node": "'.$channel_id_api.'",
            "overlay": -1
        },
        "query": "mutation removeOverlay($node: ID!, $overlay: Float!) {removeOverlay(node: $node, overlay: $overlay)}"
}
]
';
            $request = Helper::graphqlRequest($serverIp, $graphQLquery);
            $this -> addSchedulerLog($task['id'], '7', 'stop request '. $channel_id_api. ' -- '.$request);
        }
    }


    // Login check
    public function checkPassword($username, $password)
    {
        // Check if user exist
        $sql = "SELECT * FROM `admins` WHERE username = :username";
        $query = $this->db->prepare($sql);
        $parameters = array(':username' => $this->clean($username));
        $query->execute($parameters);

        $checkUser = $query->fetch(PDO::FETCH_ASSOC);

        if (isset($checkUser) && isset($checkUser['password']) && isset($checkUser['salt']))
        {
            $passwordOrign = $checkUser['password'];
            $salt = $checkUser['salt'];

            if(md5($password . md5($salt))==$passwordOrign)
            {

                $_SESSION['auth'] = 1;
                $_SESSION['uid'] = $checkUser['id'];
                $_SESSION['name'] = $checkUser['name'];
                $_SESSION['username'] = $checkUser['username'];
                return 'success';
            }
            else
            {
                return 'error';
            }
        }
        else
        {
            return 'error';
        }
    }

    public function logout()
    {
        unset($_SESSION['auth']);
        unset($_SESSION['uid']);
        unset($_SESSION['name']);
    }


    // Pages in code
    public function getModules()
    {
        $sql = "SELECT DISTINCT `name` FROM `modules`";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function getModuleByName($name)
    {
        $sql = "SELECT * FROM `modules` WHERE name = :name";
        $query = $this->db->prepare($sql);
        $parameters = array(':name' => $this->clean($name));
        $query->execute($parameters);
        $moduleInfo = array();
        $query = $query->fetchAll();

        foreach ($query as $module)
        {
            if(!isset($moduleInfo[$module->lang]))
            {
                $moduleInfo[$module->lang] = array();
            }

            array_push($moduleInfo[$module->lang], array($module->id, $module->name, $module->type, $module->content_name, $module->content, $module->lang));
        }

        return json_encode($moduleInfo);
    }

    public function updatePages($name, $page_en, $page_az, $page_ru)
    {
        $page_en = json_decode($page_en, true);
        $page_az = json_decode($page_az, true);
        $page_ru = json_decode($page_ru, true);

        foreach ($page_en as $k => $v)
        {
            $sql = "UPDATE `modules` SET content = :content WHERE lang = :lang AND content_name = :content_name AND name = :name";
            $query = $this->db->prepare($sql);
            $parameters = array(':content' => $v, ':content_name' => $k, ':name' => $name, ':lang' => 'en');
            $query->execute($parameters);
        }

        foreach ($page_az as $k => $v)
        {
            $sql = "UPDATE `modules` SET content = :content WHERE lang = :lang AND content_name = :content_name AND name = :name";
            $query = $this->db->prepare($sql);
            $parameters = array(':content' => $v, ':content_name' => $k, ':name' => $name, ':lang' => 'az');
            $query->execute($parameters);
        }

        foreach ($page_ru as $k => $v)
        {
            $sql = "UPDATE `modules` SET content = :content WHERE lang = :lang AND content_name = :content_name AND name = :name";
            $query = $this->db->prepare($sql);
            $parameters = array(':content' => $v, ':content_name' => $k, ':name' => $name, ':lang' => 'ru');
            $query->execute($parameters);
        }

        print 'success';
    }

    // Profile
    public function getProfileContent()
    {
        $sql = "SELECT * FROM `admins` WHERE id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $_SESSION['uid']);
        $query->execute($parameters);
        $profileInfo = $query->fetchAll();

        return json_encode($profileInfo);
    }


    // Settings
    public function getSettingsContent()
    {
        $sql = "SELECT * FROM `settings`";
        $query = $this->db->prepare($sql);
        $query->execute();
        $settingsInfo = array();
        $query = $query->fetchAll();

        foreach ($query as $settings)
        {
            if(!isset($settingsInfo[$settings->lang]))
            {
                $settingsInfo[$settings->lang] = array();
            }

            array_push($settingsInfo[$settings->lang], array($settings->id, $settings->code, $settings->type, $settings->menu, $settings->content, $settings->lang));
        }

        return json_encode($settingsInfo);
    }

    public function updateSettings($settings_en)
    {
        $settings_en = json_decode($settings_en, true);

        foreach ($settings_en as $k => $v)
        {
            $sql = "UPDATE `settings` SET content = :content WHERE lang = :lang AND code = :code";
            $query = $this->db->prepare($sql);
            $parameters = array(':content' => $v, ':code' => $k, ':lang' => 'en');
            $query->execute($parameters);
        }

        print 'success';
    }

    // Profile update
    public function updateProfile($login, $oldpassword, $newpassword)
    {

        // Check if user exist
        $sql = "SELECT * FROM `admins` WHERE id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => (int)$_SESSION['uid']);
        $query->execute($parameters);
        $checkUser = $query->fetch();
        $passwordOrign = $checkUser->password;
        $salt = $checkUser->salt;

        if(md5($oldpassword . md5($salt))==$passwordOrign)
        {
            $sql = "UPDATE `admins` SET username = :username, password = :password WHERE id = :id";
            $query = $this->db->prepare($sql);
            $parameters = array(':id' => (int)$_SESSION['uid'], ':username' => $login, ':password' => md5($newpassword . md5($salt)));
            $query->execute($parameters);

            print 'success';   
        }
        else
        {
            return 'oldpassword';
        }
    }

    /**
    *
    * HELPERS & OTHER FUNCTIONS
    *
    */

    /**
    * For cleaning everything
    */
    public function convertPassword($password, $salt)
    {
        return md5($password . md5($salt));
    }

    public function clean($s)
    {
        return str_replace("'", "''", $s);
    }

    public function sanitize($input)
    {        
        return htmlspecialchars(($input));
    }

    /* takes the input, scrubs bad characters */
    public function generate_seo_link($input, $replace = '-', $remove_words = true, $rand = false)
    {
        $return = strtolower($input); //trim(preg_replace('/[^a-zA-Z0-9\s]/', '', strtolower($input)));

        if($remove_words) { $return = $this->azReplace($return, $replace); }

        return str_replace(' ', $replace, $return).($rand?rand($rand, 100):'');
    }

    // random string generator
    public function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++)
        {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }

    /* takes an input, scrubs unnecessary words */
    public function remove_words($input, $replace, $words_array = array(), $unique_words = true)
    {
        $input_array = explode(' ',$input);

        $return = array();

        foreach($input_array as $word)
        {
            if(!in_array($word,$words_array) && ($unique_words ? !in_array($word,$return) : true))
            {
                $return[] = $word;
            }
        }

        return implode($replace,$return);
    }

    /* File Upload */
    public function file_uploader($type, $file, $folder, $w=null)
    {
        $file_name = strtolower($file['name']);
        $extension = explode(".", $file_name);
        $extension = end($extension);
        $mime_type = $file['type'];

        if(is_dir($folder) && is_writable($folder))
        {
            if(isset($type) && $type=='image')
            {
                if((($extension=="jpg" OR $extension=="jpeg") && ($extension=="blob" OR $mime_type=="image/jpeg" OR $mime_type=="image/jpg")) OR ($extension=="blob" OR $extension=="gif" && $mime_type=="image/gif") OR ($extension=="blob" OR $extension=="png" && $mime_type=="image/png"))
                {
                    $img_inf = getimagesize($file['tmp_name']);

                    if(is_numeric($img_inf[0]) && is_numeric($img_inf[1]) && $img_inf[0]>0 && $img_inf[1]>0)
                    {
                        switch ($extension)
                        {
                            case "png":
                                $name = md5(base64_encode(time() . rand(1000000000,9000000000))) . ".png";
                            break;
                            case "gif":
                                $name = md5(base64_encode(time() . rand(1000000000,9000000000))) . ".gif";
                            break;
                            default:
                                $name = md5(base64_encode(time() . rand(1000000000,9000000000))) . ".jpg";
                            break;
                        }

                        $new_name = $folder . $name;

                        switch($img_inf[2])
                        {
                            case 1:
                                $im = imagecreatefromgif($file['tmp_name']);
                            break;
                            case 2:
                                $im = imagecreatefromjpeg($file['tmp_name']);
                            break;
                            case 3:
                                $im = imagecreatefrompng($file['tmp_name']);
                            break;
                        }

                        $newImg = imagecreatetruecolor($img_inf[0], $img_inf[1]);

                        if($img_inf[2]==1 OR $img_inf[2]==3)
                        {
                            imagecolortransparent($newImg, imagecolorallocatealpha($newImg, 0, 0, 0, 127));
                            imagealphablending($newImg, false);
                            imagesavealpha($newImg, true);
                        }

                        imagecopyresampled($newImg, $im, 0, 0, 0, 0, $img_inf[0], $img_inf[1], $img_inf[0], $img_inf[1]);

                        switch($img_inf[2])
                        {
                            case 1:
                                imagegif($newImg, $new_name);
                            break;
                            case 2:
                                imagejpeg($newImg, $new_name);
                            break;
                            case 3:
                                imagepng($newImg, $new_name);
                            break;
                        }

                        if($w!=null && is_numeric($w) && $w>0)
                        {
                            $slp = explode('.', $name);
                            $thumb_name = $slp[0].'_thumb.'.$slp[1];
                            $dest = $folder . $thumb_name;
                            
                            $this->make_thumb($new_name, $dest, $w);
                        }

                        return array('status' => true, 'name' => $name, 'thumb' => (isset($thumb_name)?$thumb_name:''));
                    }
                    else
                    {
                        return array('status' => false, 'error' => 'This file is not an image');
                    }
                }
                else
                {
                    return array('status' => false, 'error' => 'This file is not an image (' . $extension.'---'.$mime_type);
                }
            }
            else if(isset($type) && $type=='audio')
            {
                if($extension == "mp3" && $mime_type == "audio/mp3")
                {
                    $name = md5(base64_encode(time() . rand(1000000000,9000000000))) . ".mp3";
                    move_uploaded_file($file["tmp_name"], $folder . $name);

                    return array('status' => true, 'name' => $name);
                }
                else
                {
                    return array('status' => false, 'error' => 'This file is not an mp3');
                }

            }
        }
        else
        {
            return array('status' => false, 'error' => 'Folder (' . $folder .') is not defined or you don\'t have permission to writing.');
        }
    }

    public function make_thumb($src, $dest, $desired_width)
    {

        /* read the source image */
        $source_image = imagecreatefromjpeg($src);
        $width = imagesx($source_image);
        $height = imagesy($source_image);
        
        /* find the "desired height" of this thumbnail, relative to the desired width  */
        $desired_height = floor($height * ($desired_width / $width));
        
        /* create a new, "virtual" image */
        $virtual_image = imagecreatetruecolor($desired_width, $desired_height);
        
        /* copy source image at a resized size */
        imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
        
        /* create the physical thumbnail image to its destination */
        imagejpeg($virtual_image, $dest);
    }

    public function getPgCount($table)
    {
        if($table=='posts')
        {
            $sql = "SELECT COUNT(0) AS cnt FROM `posts` WHERE main = :main ";
            $query = $this->db->prepare($sql);
            $parameters = array(':main' => 1);
            $query->execute($parameters);
            $cnt = $query->fetch();

            return $cnt->cnt;
        }
        else if($table=='videos')
        {
            $where = (isset($_GET['word']) && is_string($_GET['word']) && $_GET['word']!='')? 'name LIKE "%'.$_GET['word'].'%"' : '1=1';

            $where .= (isset($_GET['cat']) && is_numeric($_GET['cat']) && $_GET['cat']>0)? ' AND cat = "'. (int)$_GET['cat'].'"' : '';

            $sql = "SELECT COUNT(0) AS cnt FROM `videos` WHERE $where";
            $query = $this->db->prepare($sql);
            $query->execute();
            $cnt = $query->fetch();

            return $cnt->cnt;
        }
        else if($table=='audios')
        {
            $where = (isset($_GET['word']) && is_string($_GET['word']) && $_GET['word']!='')? 'name LIKE "%'.$_GET['word'].'%"' : '1=1';

            $where .= (isset($_GET['cat']) && is_numeric($_GET['cat']) && $_GET['cat']>0)? ' AND cat = "'. (int)$_GET['cat'].'"' : '';

            $sql = "SELECT COUNT(0) AS cnt FROM `audio` WHERE $where";
            $query = $this->db->prepare($sql);
            $query->execute();
            $cnt = $query->fetch();

            return $cnt->cnt;
        }
        else if($table=='gallery')
        {
            $sql = "SELECT COUNT(0) AS cnt FROM `gallery`";
            $query = $this->db->prepare($sql);
            $query->execute();
            $cnt = $query->fetch();

            return $cnt->cnt;
        }
        else if($table=='questions')
        {
            $sql = "SELECT COUNT(0) AS cnt FROM `questions` WHERE answered = :answered";
            $query = $this->db->prepare($sql);
            $parameters = array(':answered' => 1);
            $query->execute($parameters);
            $cnt = $query->fetch();

            return $cnt->cnt;
        }
    }

    public function getPagination($table, $limit = 15)
    {
        $pagination = new CPagination();
        $pagination->setLimit($limit);
        $pagination->setDataCount($this->getPgCount($table));
        
        return $pagination->paginate();
    }

    public function useSpaces()
    {
        $key = "VLJ2DIY2XDNDV2UFWPTD";
        $secret = "JYDHCcEQ9ddg7PuKGPXSCCJW+jgNugKw2QNr7WVvfLc";

        $space_name = "seyidagareshid";
        $region = "ams3";

        $space = new SpacesConnect($key, $secret, $space_name, $region);

        return $space;
    }

    function str_split_unicode($str, $l = 0)
    {
        if ($l > 0) {
            $ret = array();
            $len = mb_strlen($str, "UTF-8");
            for ($i = 0; $i < $len; $i += $l) {
                $ret[] = mb_substr($str, $i, $l, "UTF-8");
            }
            return $ret;
        }
        return preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
    }

    public function azReplace($name, $replace = '.')
    {
        $srch_rps = array(
            'ə' => 'e',
            'Ə' => 'E',
            'ş' => 'sh',
            'Ş' => 'Sh',
            'ı' => 'i',
            'I' => 'I',
            'ü' => 'u',
            'Ü' => 'U',
            'ç' => 'c',
            'Ç' => 'C',
            'ğ' => 'g',
            'Ğ' => 'G',
            'İ' => 'I',
            'ö' => 'o',
            'Ö' => 'O',
            ' ' => $replace,
            "'" => '',
            '"' => '',
            '?' => '',
            '!' => '',
            ':' => '',
            ';' => '',
            ',' => '',
            '@' => '',
            '#' => '',
            '$' => '',
            '%' => '',
            '*' => '',
            '№' => '',
            '&' => ''
        );

        $return = '';

        $name = $this->str_split_unicode($name);

        foreach ($name as $val)
        {
            if(isset($srch_rps[$val]))
            {
                $return .= $srch_rps[$val];
            }
            else
            {
                $return .= $val;
            }
        }

        if($return[0] == '-')
        {
            $return = substr($return, 1);
        }

        return $return;
    }

    function rgba2hex($string) {
        $rgba  = array();
        $hex   = '';
        $regex = '#\((([^()]+|(?R))*)\)#';
        if (preg_match_all($regex, $string ,$matches)) {
            $rgba = explode(',', implode(' ', $matches[1]));
        } else {
            $rgba = explode(',', $string);
        }
        
        $rr = dechex((int)$rgba['0']);
        $gg = dechex((int)$rgba['1']);
        $bb = dechex((int)$rgba['2']);

        $rr = strlen($rr) === 1 ? '0'.$rr : $rr;
        $gg = strlen($gg) === 1 ? '0'.$gg : $gg;
        $bb = strlen($bb) === 1 ? '0'.$bb : $bb;

        $aa = '';
        
        if (array_key_exists('3', $rgba)) {
            $aa = dechex((float)$rgba['3'] * 255);
        } else {
            $aa = 'FF';
        }
        
        return strtoupper("#$rr$gg$bb$aa");
    }
}