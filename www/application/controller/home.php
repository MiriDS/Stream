<?php

/**
 * Class Home
 *
 */
class Home extends Controller
{
    public function index()
    {
        // get info
        $content = $this->model->getModuleContent('main');
        $posts = $this->model->getPostsMain();
        $videos = $this->model->getVideosMain();

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';
    }

    // Language change controler
    public function language()
    {
        if(isset($_POST['lang']) && is_string($_POST['lang']) && $_POST['lang']!="")
        {
            $_SESSION['lang_code'] = trim($_POST['lang']);

            return true;
        }
        return false;
    }
}
