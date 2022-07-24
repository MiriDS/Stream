<?php

class Code extends Controller
{
    /**
     * PAGE: index
     */
    public function index()
    {
        if(isset($_SESSION['auth']) && $_SESSION['auth']==1)
        {
            $counts = $this->model->getCountsDashboard();
            require APP . 'view/code/_templates/header.php';
            require APP . 'view/code/dashboard/index.php';
            require APP . 'view/code/_templates/footer.php';
        }
        else
        {
            require APP . 'view/code/lock/index.php';
        }
    }

    public function auth()
    {
        if(isset($_POST['username']) && is_string($_POST['username']) && strlen($_POST['username'])!="" && isset($_POST['password']) && is_string($_POST['password']) && strlen($_POST['password'])!=""))
        {
            $loginState = $this->model->checkPassword($_POST['username'], $_POST['password']);

            if($loginState == 'success')
            {
                header('Location:'.URL);
            }
            else if($loginState == 'error')
            {
                header('Location:'.URL);
            }
            else
            {
                header('Location:'.URL);
            }
        }
        else
        {
            header('Location:'.URL);
        }
    }

    public function logOut()
    {
        $this->model->logout();
        header('Location:'.URL);
    }

    // Posts Start ------------------------------------------------
    public function posts($method=null, $cpu=null)
    {
        if(isset($_SESSION['auth']) && $_SESSION['auth']==1)
        {
            require APP . 'view/code/_templates/header.php';
    
            if(isset($method) && $method=="edit" && isset($cpu))
            {
                $postsInfo = $this->model->getPostInfoByCpu($cpu);
                require APP . 'view/code/posts/edit.php';
            }
            else if(isset($method) && $method=="add")
            {
                require APP . 'view/code/posts/add.php';
            }
            else
            {
                $postsCount = $this->model->getPostsCount();
                $posts = $this->model->getPosts();
                $pagination = $this->model->getPagination('posts', 20);
                require APP . 'view/code/posts/index.php';
            }
    
            require APP . 'view/code/_templates/footer.php';
        }
        else
        {
            require APP . 'view/code/lock/index.php';
        }
    }

    public function addPost()
    {
        if(isset($_SESSION['auth']) && $_SESSION['auth']==1)
        {
            if(isset($_POST['post-name-en']) && is_string($_POST['post-name-en']) && $_POST['post-name-en']!='' && isset($_POST['post-description-en']) && is_string($_POST['post-description-en']) && $_POST['post-description-en']!='' && isset($_POST['post-full-review-en']) && is_string($_POST['post-full-review-en']) && $_POST['post-full-review-en']!='')
            {
                $result = $this->model->addPost($_POST['post-name-en'], $_POST['post-description-en'], $_POST['post-full-review-en'], (isset($_FILES['post-image-en'])?$_FILES['post-image-en']:'') );
            }
        }
        else
        {
            require APP . 'view/code/lock/index.php';
        }
    }

    public function updatePost()
    {
        if(isset($_SESSION['auth']) && $_SESSION['auth']==1)
        {
            if(isset($_POST['cpu']) && is_string($_POST['cpu']) && $_POST['cpu']!='' && isset($_POST['post-name-en']) && is_string($_POST['post-name-en']) && $_POST['post-name-en']!='' && isset($_POST['post-description-en']) && is_string($_POST['post-description-en']) && $_POST['post-description-en']!='' && isset($_POST['post-full-review-en']) && is_string($_POST['post-full-review-en']) && $_POST['post-full-review-en']!='')
            {
                $result = $this->model->updatePost($_POST['cpu'], $_POST['post-name-en'], $_POST['post-description-en'], $_POST['post-full-review-en'], (isset($_FILES['post-image-en'])?$_FILES['post-image-en']:''));
            }
        }
        else
        {
            require APP . 'view/code/lock/index.php';
        }
    }

    public function deletePost()
    {
        if(isset($_SESSION['auth']) && $_SESSION['auth']==1)
        {
            if(isset($_POST['cpu']) && is_string($_POST['cpu']) && !empty($_POST['cpu']))
            {
                $this->model->deletePost($_POST['cpu']);
            }
            else
            {
                return 'error';
            }
        }
        else
        {
            require APP . 'view/code/lock/index.php';
        }
    }

    public function postOnMain()
    {
        if(isset($_SESSION['auth']) && $_SESSION['auth']==1)
        {
            if(isset($_POST['stat']) && is_numeric($_POST['stat']) && isset($_POST['cpu']) && is_string($_POST['cpu']) && !empty($_POST['cpu']))
            {
                $this->model->postOnMain($_POST['stat'], $_POST['cpu']);
            }
            else
            {
                return 'error';
            }
        }
        else
        {
            require APP . 'view/code/lock/index.php';
        }
    }

    // End of Services ---------------------------------------------------------------------------

    // Videos start ------------------------------------------------------------------------------
    public function videos($method = null, $id = null)
    {
        if(isset($_SESSION['auth']) && $_SESSION['auth']==1)
        {
            require APP . 'view/code/_templates/header.php';
            $cats = $this->model->getVideoCats();

            if(isset($method) && $method=="edit" && isset($id))
            {
                $videoInfo = $this->model->getVideoInfoById($id);
                require APP . 'view/code/videos/edit.php';
            }
            else if(isset($method) && $method=="add")
            {
                require APP . 'view/code/videos/add.php';
            }
            else
            {
                $getVideosCount = $this->model->getVideosCount();
                $media = $this->model->getVideos();
                $pagination = $this->model->getPagination('videos', 12);

                require APP . 'view/code/videos/index.php';
            }
            
            require APP . 'view/code/_templates/footer.php';
        }
        else
        {
            require APP . 'view/code/lock/index.php';
        }
    }

    public function addVideo()
    {
        if(isset($_SESSION['auth']) && $_SESSION['auth']==1)
        {
            if(isset($_POST['cat']) && is_string($_POST['cat']) && $_POST['cat'] != '' && isset($_POST['link']) && is_string($_POST['link']) && $_POST['link']!='' && isset($_POST['name']) && is_string($_POST['name']) && $_POST['name'] != '')
            {
                $result = $this->model->addVideo($_POST['cat'], $_POST['link'], $_POST['name'], (isset($_FILES['image']['name'])?$_FILES['image']:''));
            }
        }
        else
        {
            require APP . 'view/code/lock/index.php';
        }
    }

    public function editVideo()
    {
        if(isset($_SESSION['auth']) && $_SESSION['auth']==1)
        {
            if(isset($_POST['id']) && is_numeric($_POST['id']) && $_POST['id'] > 0 && isset($_POST['cat']) && is_string($_POST['cat']) && $_POST['cat'] != '' && isset($_POST['link']) && is_string($_POST['link']) && $_POST['link']!='' && isset($_POST['name']) && is_string($_POST['name']) && $_POST['name'] != '')
            {
                $result = $this->model->editVideo($_POST['cat'], $_POST['link'], $_POST['name'], (isset($_FILES['image']['name'])?$_FILES['image']:''), $_POST['id']);
            }
        }
        else
        {
            require APP . 'view/code/lock/index.php';
        }
    }

    public function deleteVideo()
    {
        if(isset($_SESSION['auth']) && $_SESSION['auth']==1)
        {
            if(isset($_POST['id']) && is_numeric($_POST['id']) && (int)$_POST['id'] > 0 )
            {
                $this->model->deleteVideo($_POST['id']);
            }
            else
            {
                return 'error';
            }
        }
        else
        {
            require APP . 'view/code/lock/index.php';
        }
    }

    //  Videos End -----------------------------------------------------------------------------

    // Audio start ------------------------------------------------------------------------------
    public function audio($method = null, $id = null)
    {
        if(isset($_SESSION['auth']) && $_SESSION['auth']==1)
        {          
            require APP . 'view/code/_templates/header.php';
            $cats = $this->model->getAudioCats();

            if(isset($method) && $method=="edit" && isset($id))
            {
                $audioInfo = $this->model->getAudioInfoById($id);
                require APP . 'view/code/audio/edit.php';
            }
            else if(isset($method) && $method=="add")
            {
                require APP . 'view/code/audio/add.php';
            }
            else
            {
                $getAudioCount = $this->model->getAudioCount();
                $media = $this->model->getAudio();
                $pagination = $this->model->getPagination('audios', 12);

               require APP . 'view/code/audio/index.php';
            }
            
            require APP . 'view/code/_templates/footer.php';
        }
        else
        {
            require APP . 'view/code/lock/index.php';
        }
    }

    public function addAudio()
    {
        if(isset($_SESSION['auth']) && $_SESSION['auth']==1)
        {
            if(isset($_POST['cat']) && is_numeric($_POST['cat']) && $_POST['cat'] > 0 && $_FILES['audio']['name'] != '' && isset($_POST['name']) && is_string($_POST['name']) && $_POST['name'] != '' )
            {
                $result = $this->model->addAudio($_POST['cat'], $_FILES['audio'], $_POST['name']);
            }
        }
        else
        {
            require APP . 'view/code/lock/index.php';
        }
    }

    public function editAudio()
    {
        if(isset($_SESSION['auth']) && $_SESSION['auth']==1)
        {
            if(isset($_POST['id']) && is_numeric($_POST['id']) && $_POST['id'] > 0 && isset($_POST['cat']) && is_numeric($_POST['cat']) && $_POST['cat'] > 0 && isset($_POST['name']) && is_string($_POST['name']) && $_POST['name'] != '' )
            {
                $result = $this->model->editAudio($_POST['cat'], (isset($_FILES['audio'])&&$_FILES['audio']['name']!=''?$_FILES['audio']:''), $_POST['name'], $_POST['id']);
            }
        }
        else
        {
            require APP . 'view/code/lock/index.php';
        }
    }

    public function deleteAudio()
    {
        if(isset($_SESSION['auth']) && $_SESSION['auth']==1)
        {
            if(isset($_POST['id']) && is_numeric($_POST['id']) && (int)$_POST['id'] > 0)
            {
                $this->model->deleteAudio($_POST['id']);
            }
            else
            {
                return 'error';
            }
        }
        else
        {
            require APP . 'view/code/lock/index.php';
        }
    }

    //  Audio End ---------------------------------------------------------------------------------

    // Questions start ------------------------------------------------------------------------------
    public function questions($method=null, $id=null)
    {
        if(isset($_SESSION['auth']) && $_SESSION['auth']==1)
        {
            require APP . 'view/code/_templates/header.php';
    
            if(isset($method) && $method=="edit" && isset($id))
            {
                $questionInfo = $this->model->getQuestionsAsnwerById($id);
                require APP . 'view/code/questions/edit.php';
            }
            else if(isset($method) && $method=="answer" && isset($id))
            {
                $questionInfo = $this->model->getQuestionsById($id);
                require APP . 'view/code/questions/answer.php';
            }
            else
            {
                $questions = $this->model->getQuestions();
                require APP . 'view/code/questions/index.php';
            }

            require APP . 'view/code/_templates/footer.php';
        }
        else
        {
            require APP . 'view/code/lock/index.php';
        }
    }

    public function questionAnswer()
    {
        if(isset($_SESSION['auth']) && $_SESSION['auth']==1)
        {
            if(isset($_POST['id']) && is_numeric($_POST['id']) && (int)$_POST['id'] > 0 && isset($_POST['answer']) && is_string($_POST['answer']) && $_POST['answer'] != '')
            {
                $this->model->questionAnswer($_POST['id'], $_POST['answer']);
            }
            else
            {
                return 'error';
            }
        }
        else
        {
            require APP . 'view/code/lock/index.php';
        }
    }

    public function questionAnswerEdit()
    {
        if(isset($_SESSION['auth']) && $_SESSION['auth']==1)
        {
            if(isset($_POST['id']) && is_numeric($_POST['id']) && (int)$_POST['id'] > 0 && isset($_POST['answer']) && is_string($_POST['answer']) && $_POST['answer'] != '')
            {
                $this->model->questionAnswerEdit($_POST['id'], $_POST['answer']);
            }
            else
            {
                return 'error';
            }
        }
        else
        {
            require APP . 'view/code/lock/index.php';
        }
    }

    public function deleteQuestion()
    {
        if(isset($_SESSION['auth']) && $_SESSION['auth']==1)
        {
            if(isset($_POST['id']) && is_numeric($_POST['id']) && $_POST['id'] > 0)
            {
                $this->model->deleteQuestion((int)$_POST['id']);
            }
            else
            {
                return 'error';
            }
        }
        else
        {
            require APP . 'view/code/lock/index.php';
        }
    }
    // Questions end ------------------------------------------------------------------------------

    // Gallery start ------------------------------------------------------------------------------
    public function gallery()
    {
        if(isset($_SESSION['auth']) && $_SESSION['auth']==1)
        {
            $gallery = $this->model->getGallery();

            require APP . 'view/code/_templates/header.php';
            require APP . 'view/code/gallery/index.php';
            require APP . 'view/code/_templates/footer.php';
        }
        else
        {
            require APP . 'view/code/lock/index.php';
        }
    }

    public function addGallery()
    {
        if(isset($_SESSION['auth']) && $_SESSION['auth']==1)
        {
            if(isset($_FILES['gallery-image']['name']) && $_FILES['gallery-image']['name']!='')
            {
                $result = $this->model->addGallery($_FILES['gallery-image']);
            }
        }
        else
        {
            require APP . 'view/code/lock/index.php';
        }
    }

    public function deleteGallery()
    {
        if(isset($_SESSION['auth']) && $_SESSION['auth']==1)
        {
            if(isset($_POST['id']) && is_numeric($_POST['id']) && (int)$_POST['id'] > 0)
            {
                $this->model->deleteGallery($_POST['id']);
            }
            else
            {
                return 'error';
            }
        }
        else
        {
            require APP . 'view/code/lock/index.php';
        }
    }

    //  Gallery End -----------------------------------------------------------------------------

    // Pages Start ------------------------------------------------------------------------------
    public function pages($method=null, $name=null)
    {
        if(isset($_SESSION['auth']) && $_SESSION['auth']==1)
        {
            require APP . 'view/code/_templates/header.php';
    
            if(isset($method) && $method=="edit" && isset($name))
            {
                $moduleInfo = $this->model->getModuleByName($name);
                require APP . 'view/code/pages/edit.php';
            }
            else if(isset($method) && $method=="add")
            {
                require APP . 'view/code/pages/add.php';
            }
            else
            {
                $modules = $this->model->getModules();
                require APP . 'view/code/pages/index.php';
            }
    
            require APP . 'view/code/_templates/footer.php';
        }
        else
        {
            require APP . 'view/code/lock/index.php';
        }
    }

    public function updatePages()
    {
        if(isset($_SESSION['auth']) && $_SESSION['auth']==1)
        {
            if(isset($_POST['name']) && is_string($_POST['name']) && !empty($_POST['name']) && isset($_POST['pages-en']) && is_array(json_decode($_POST['pages-en'], true)) && isset($_POST['pages-az']) && is_array(json_decode($_POST['pages-az'], true)) && isset($_POST['pages-ru']) && is_array(json_decode($_POST['pages-ru'], true)))
            {
                $result = $this->model->updatePages($_POST['name'], $_POST['pages-en'], $_POST['pages-az'], $_POST['pages-ru']);
            }
        }
        else
        {
            require APP . 'view/code/lock/index.php';
        }            
    }

    // Pages End --------------------------------------------------------------------------------

    // Profile Start --------------------------------------------------------------------------------------
    public function profile()
    {
        if(isset($_SESSION['auth']) && $_SESSION['auth']==1)
        {
            require APP . 'view/code/_templates/header.php';
            $profile = $this->model->getProfileContent();
            require APP . 'view/code/profile/index.php';
            require APP . 'view/code/_templates/footer.php';
        }
        else
        {
            require APP . 'view/code/lock/index.php';
        }
    }

    public function updateProfile()
    {
        if(isset($_SESSION['auth']) && $_SESSION['auth']==1)
        {
            if(isset($_POST['login']) && is_string($_POST['login']) && $_POST['login']!='' && isset($_POST['oldpassword']) && is_string($_POST['oldpassword']) && $_POST['oldpassword']!='' && isset($_POST['newpassword']) && is_string($_POST['newpassword']) && $_POST['newpassword']!='')
            {
                $result = $this->model->updateProfile($_POST['login'], $_POST['oldpassword'], $_POST['newpassword']);
            }
        }
        else
        {
            require APP . 'view/code/lock/index.php';
        }            
    }

    // Settings Start --------------------------------------------------------------------------------------
    public function settings()
    {
        if(isset($_SESSION['auth']) && $_SESSION['auth']==1)
        {
            require APP . 'view/code/_templates/header.php';
            $settingsFile = $this->model->getSettingsContent();
            require APP . 'view/code/settings/edit.php';
            require APP . 'view/code/_templates/footer.php';
        }
        else
        {
            require APP . 'view/code/lock/index.php';
        }
    }

    public function updateSettings()
    {
        if(isset($_SESSION['auth']) && $_SESSION['auth']==1)
        {
            if(isset($_POST['settings-en']) && is_array(json_decode($_POST['settings-en'], true)))
            {
                $result = $this->model->updateSettings($_POST['settings-en']);
            }
        }
        else
        {
            require APP . 'view/code/lock/index.php';
        }            
    }

}

?>