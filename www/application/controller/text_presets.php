<?php

/**
 * Class Home
 *
 */
class Text_presets extends Controller
{
    public function index()
    {
        $textPresets = $this->model->getTextPresets();
        require APP . 'view/_templates/header.php';
        require APP . 'view/text_presets/index.php';
        require APP . 'view/_templates/footer.php';
    }
    public function add()
    {
        if(isset($_SESSION['auth']) && $_SESSION['auth']==1)
        {
            if(
                isset($_POST['name']) && is_string($_POST['name']) && trim($_POST['name']) !== ''
                && isset($_POST['text']) && is_string($_POST['text'])
            )
            {
                $result = $this->model->addTextPreset();
            }
        }
    }

    public function remove()
    {
        if(isset($_SESSION['auth']) && $_SESSION['auth']==1)
        {
            if(isset($_POST['id']) && is_numeric($_POST['id']) && (int)$_POST['id'] > 0)
            {
                $result = $this->model->removeTextPreset((int)$_POST['id']);
            }
        }
    }

    public function get()
    {

        if(isset($_SESSION['auth']) && $_SESSION['auth']==1)
        {
            if(isset($_POST['id']) && is_numeric($_POST['id']) && (int)$_POST['id'] > 0)
            {
                $result = $this->model->getTextPresets((int)$_POST['id']);
                if(count($result)) {
                    $result = $result[0];
                    $result['name'] = htmlspecialchars($result['name']);
                    $result['text'] = htmlspecialchars($result['text']);
                }

                print json_encode(['status'=> 'ok', 'data' => $result],true);
            }
        }
    }

}
