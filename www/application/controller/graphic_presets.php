<?php

/**
 * Class Home
 *
 */
class Graphic_presets extends Controller
{
    public function index()
    {
        $graphicPresets = $this->model->getGraphicPresets();
        require APP . 'view/_templates/header.php';
        require APP . 'view/graphic_presets/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function add()
    {
        if(isset($_SESSION['auth']) && $_SESSION['auth']==1)
        {

            if(
                isset($_POST['name']) && is_string($_POST['name']) && trim($_POST['name']) !== ''
                && isset($_POST['background_color']) && is_string($_POST['background_color'])
                && isset($_POST['font_color']) && is_string($_POST['font_color'])
                && isset($_POST['font_size']) && (is_numeric($_POST['font_size']) || empty($_POST['font_size']))
                && isset($_POST['margin']) && (is_numeric($_POST['margin']) || empty($_POST['margin']))
                && isset($_POST['padding']) && (is_numeric($_POST['padding']) || empty($_POST['padding']))
                && isset($_POST['passes']) && (is_numeric($_POST['passes']) || empty($_POST['passes']))
                && isset($_POST['pause']) && (is_numeric($_POST['pause']) || empty($_POST['pause']))
                && isset($_POST['speed']) && (is_numeric($_POST['speed']) || empty($_POST['speed']))
            )
            {
                $result = $this->model->addGraphicPreset();
            }
        }
    }

    public function remove()
    {
        if(isset($_SESSION['auth']) && $_SESSION['auth']==1)
        {
            if(isset($_POST['id']) && is_numeric($_POST['id']) && (int)$_POST['id'] > 0)
            {
                $result = $this->model->removeGraphicPreset((int)$_POST['id']);
            }
        }
    }

    public function get()
    {

        if(isset($_SESSION['auth']) && $_SESSION['auth']==1)
        {
            if(isset($_POST['id']) && is_numeric($_POST['id']) && (int)$_POST['id'] > 0)
            {
                $result = $this->model->getGraphicPresets((int)$_POST['id']);
                if(count($result)) {
                    $result = $result[0];
                    $result['name'] = htmlspecialchars($result['name']);
                    $result['background_color'] = htmlspecialchars($result['background_color']);
                    $result['font_color'] = htmlspecialchars($result['font_color']);
                }

                print json_encode(['status'=> 'ok', 'data' => $result],true);
            }
        }
    }
}
