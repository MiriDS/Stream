<?php
#require APP . "libs/pagination.php";

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

    public function getPostsModule()
    {
        $perPage = 15;
        $page = isset($_GET['page']) && $_GET['page']>0 ? (int)$_GET['page'] : 1;
        $firstTop = ($page-1)*$perPage;
        $lastTop = $page*$perPage;

        $sql = "SELECT * FROM `posts` WHERE main = :main order by id desc LIMIT $perPage OFFSET $firstTop";
        
        $query = $this->db->prepare($sql);
        $parameters = array(':main' => 1);
        $query->execute($parameters);
        return $query->fetchAll();
    }

    public function getPostInfoByCpuSite($cpu)
    {
        $sql = "SELECT * FROM `posts` WHERE cpu = :cpu AND lang = :lang";
        $query = $this->db->prepare($sql);
        $parameters = array(':cpu' => $this->clean($cpu), ':lang' => $this->getLang());
        $query->execute($parameters);

        return $query->fetch();
    }

    public function getOtherPosts($cpu = null)
    {

        $sql = "SELECT * FROM `posts` WHERE main = :main AND lang = :lang AND cpu != :cpu order by id desc LIMIT 5";
        $query = $this->db->prepare($sql);
        $parameters = array(':main' => 1, ':cpu' => $this->clean($cpu), ':lang' => $this->getLang());
        $query->execute($parameters);

        return $query->fetchAll();
    }

    // Front Audio
    public function getAudiosModule()
    {
        $perPage = 12;
        $page = isset($_GET['page']) && $_GET['page']>0 ? (int)$_GET['page'] : 1;
        $firstTop = ($page-1)*$perPage;
        $lastTop = $page*$perPage;

        $where = (isset($_GET['word']) && is_string($_GET['word']) && $_GET['word']!='')? 'name LIKE "%'.$_GET['word'].'%"' : '1=1';

        $where .= (isset($_GET['cat']) && is_numeric($_GET['cat']) && $_GET['cat']>0)? ' AND cat = "'. (int)$_GET['cat'].'"' : '';

        $sql = "SELECT * FROM `audio` WHERE $where order by id desc LIMIT $perPage OFFSET $firstTop";
        $query = $this->db->prepare($sql);
        $query->execute();
        $audios = $query->fetchAll();

        $return = array();
        foreach ($audios as $audio)
        {
            $sql = "SELECT * FROM `audiocats` WHERE id = :id";
            $query = $this->db->prepare($sql);
            $parameters = array(':id' => $audio->cat);
            $query->execute($parameters);
            $audiocat = $query->fetch();

            array_push($return, array($audio->id, $audio->cat, $audio->name, $audio->audio, $audiocat->name));
        }

        return $return;
    }

    public function getAudioCatsWithCount()
    {
        $sql = "SELECT * FROM `audiocats`";
        $query = $this->db->prepare($sql);
        $query->execute();
        $cats = $query->fetchAll();
        $return = array();

        foreach ($cats as $cat)
        {
            $sql = "SELECT COUNT(0) as cnt FROM `audio` WHERE cat = :cat";
            $query = $this->db->prepare($sql);
            $parameters = array(':cat' => $cat->id);
            $query->execute($parameters);
            $audiosincat = $query->fetch();

            array_push($return, array($cat->id, $cat->name, $audiosincat->cnt));
        }

        return $return;
    }

    public function getAudioName($code)
    {
        $sql = "SELECT name, cat FROM `audio` WHERE audio = :audio";
        $query = $this->db->prepare($sql);
        $parameters = array(':audio' => $code);
        $query->execute($parameters);
        $audio = $query->fetch();

        if(isset($audio->name) && $audio->name != '')
        {
            $catSql = "SELECT name FROM `audiocats` WHERE id = :cat";
            $query = $this->db->prepare($catSql);
            $parameters = array(':cat' => $audio->cat);
            $query->execute($parameters);
            $cats = $query->fetch();

            if(isset($cats->name) && $cats->name != '')
            {
                return $this->azReplace($audio->name.'('.$cats->name.')');
            }
        }
    }

    public function getVideoCatsWithCount()
    {
        $sql = "SELECT * FROM `videocats`";
        $query = $this->db->prepare($sql);
        $query->execute();
        $cats = $query->fetchAll();
        $return = array();

        foreach ($cats as $cat)
        {
            $sql = "SELECT COUNT(0) as cnt FROM `videos` WHERE cat = :cat";
            $query = $this->db->prepare($sql);
            $parameters = array(':cat' => $cat->id);
            $query->execute($parameters);
            $videosincat = $query->fetch();

            array_push($return, array($cat->id, $cat->name, $videosincat->cnt));
        }

        return $return;
    }

    // Front Gallery
    public function getGalleryModule()
    {
        $perPage = 20;
        $page = isset($_GET['page']) && $_GET['page']>0 ? (int)$_GET['page'] : 1;
        $firstTop = ($page-1)*$perPage;
        $lastTop = $page*$perPage;

        $sql = "SELECT * FROM `gallery` order by id desc LIMIT $perPage OFFSET $firstTop";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    // Front Main Videos
    public function getVideosMain()
    {
        $sql = "SELECT * FROM `videos` WHERE lang = :lang ORDER BY id DESC LIMIT 8";
        $query = $this->db->prepare($sql);
        $parameters = array(':lang' => $this->getLang());
        $query->execute($parameters);

        return $query->fetchAll();
    }

    public function getVideosModule()
    {
        $perPage = 12;
        $page = isset($_GET['page']) && $_GET['page']>0 ? (int)$_GET['page'] : 1;
        $firstTop = ($page-1)*$perPage;
        $lastTop = $page*$perPage;

        $where = (isset($_GET['word']) && is_string($_GET['word']) && $_GET['word']!='')? 'name LIKE "%'.$_GET['word'].'%"' : '1=1';

        $where .= (isset($_GET['cat']) && is_numeric($_GET['cat']) && $_GET['cat']>0)? ' AND cat = "'. (int)$_GET['cat'].'"' : '';

        $sql = "SELECT * FROM `videos` WHERE $where order by id desc LIMIT $perPage OFFSET $firstTop";
        $query = $this->db->prepare($sql);
        $query->execute();
        $videos = $query->fetchAll();

        $return = array();
        foreach ($videos as $video)
        {
            $sql = "SELECT * FROM `videocats` WHERE id = :id";
            $query = $this->db->prepare($sql);
            $parameters = array(':id' => $video->cat);
            $query->execute($parameters);
            $videocat = $query->fetch();

            array_push($return, array($video->id, $video->cat, $video->name, $video->content, $video->image, $videocat->name));
        }

        return $return;
    }

    // Front Questions

    public function getQuestionsModule()
    {
        $perPage = 20;
        $page = isset($_GET['page']) && $_GET['page']>0 ? (int)$_GET['page'] : 1;
        $firstTop = ($page-1)*$perPage;
        $lastTop = $page*$perPage;

        $where = (isset($_GET['word']) && is_string($_GET['word']) && $_GET['word']!='')? 'tb1.question LIKE "%'. $this->clean($_GET['word']) .'%" OR tb2.question LIKE "%'. $this->clean($_GET['word']) .'%" AND' : '1=1 AND';

        $sql = "SELECT tb1.name, tb1.question, tb1.added, tb2.question AS answer, tb2.added AS timer FROM `questions` tb1 INNER JOIN `questions` tb2 ON tb1.id = tb2.question_id WHERE $where tb1.answered = :answered order by tb1.id DESC LIMIT $perPage OFFSET $firstTop";
        
        $query = $this->db->prepare($sql);
        $parameters = array(':answered' => 1);
        $query->execute($parameters);

        return $query->fetchAll();
    }

    public function setQuestion($name, $email, $subject, $question)
    {
        $sql_en = "INSERT INTO `questions` (name, email, subject, question) VALUES (:name, :email, :subject, :question)";
        $query = $this->db->prepare($sql_en);
        $parameters_en = array(':name' => $this->clean($name), ':email' => $this->clean($email), ':subject' => $this->clean($subject), ':question' => $this->clean($question));
        $query->execute($parameters_en);

        print json_encode(array('status' => true));
    }


    //  ####  ####  ###   ####
    //  #     #  #  #  #  #__
    //  #     #  #  #  #  #
    //  ####  ####  ###   ####


    // Code admin area
    public function checkPassword($username, $password)
    {
        // Check if user exist
        $sql = "SELECT * FROM `admins` WHERE username = :username";
        $query = $this->db->prepare($sql);
        $parameters = array(':username' => $this->clean($username));
        $query->execute($parameters);

        $checkUser = $query->fetch();

        $passwordOrign = $checkUser->password;
        $salt = $checkUser->salt;

        if(md5($password . md5($salt))==$passwordOrign)
        {
            $_SESSION['auth'] = 1;
            $_SESSION['uid'] = $checkUser->id;
            $_SESSION['name'] = $checkUser->username;
            return 'success';
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

    // Dashboard COunts
    public function getCountsDashboard()
    {
        $allCount = array();
        $sql = "SELECT COUNT(0) as posts, (SELECT COUNT(0) FROM `videos` WHERE lang = :lang) as videos, (SELECT COUNT(0) FROM `gallery`) as gallery, (SELECT COUNT(0) FROM `audio`) as audios, (SELECT COUNT(0) FROM `questions`) as questions FROM `posts` WHERE lang = :lang";
        $query = $this->db->prepare($sql);
        $parameters = array(':lang' => 'en');
        $query->execute($parameters);

        $cnt = $query->fetch();

        $allCount['posts'] = $cnt->posts;
        $allCount['videos'] = $cnt->videos;
        $allCount['audios'] = $cnt->audios;
        $allCount['gallery'] = $cnt->gallery;
        $allCount['questions'] = $cnt->questions;

        return $allCount;
    }

    // Posts in code
    public function getPostsCount()
    {
        $sql = "SELECT COUNT(0) as count FROM `posts` WHERE lang = :lang";
        $query = $this->db->prepare($sql);
        $parameters = array(':lang' => 'en');
        $query->execute($parameters);

        return $query->fetch();
    }

    public function getPosts()
    {
        $perPage = 20;
        $page = isset($_GET['page']) && $_GET['page']>0 ? (int)$_GET['page'] : 1;
        $firstTop = ($page-1)*$perPage;
        $lastTop = $page*$perPage;

        $sql = "SELECT * FROM `posts` order by id desc LIMIT $perPage OFFSET $firstTop";
        $query = $this->db->prepare($sql);
        $query->execute();
        $services = array();
        $query = $query->fetchAll();

        foreach ($query as $service)
        {
            if(!isset($services[$service->cpu]))
            {
                $services[$service->cpu] = array();
            }

            array_push($services[$service->cpu], array($service->id, $service->name, $service->content, $service->image, $service->cpu, $service->lang, $service->main));
        }

        return json_encode($services);
    }

    public function getPostInfoByCpu($cpu)
    {
        $sql = "SELECT * FROM `posts` WHERE cpu = :cpu";
        $query = $this->db->prepare($sql);
        $parameters = array(':cpu' => $this->clean($cpu));
        $query->execute($parameters);
        $postInfo = array();
        $query = $query->fetchAll();

        foreach ($query as $post)
        {
            if(!isset($postInfo[$post->lang]))
            {
                $postInfo[$post->lang] = array();
            }

            $postInfo[$post->lang] = array($post->id, $post->name, $post->content, $post->full_review, $post->image, $post->thumb, $post->cpu, $post->lang);
        }

        return json_encode($postInfo);
    }

    public function addPost($name_en, $description_en, $full_review_en, $image_en)
    {

        if(isset($image_en) && $image_en != '')
        {        
            $image_en = $this->file_uploader('image', $image_en, 'uploads/posts/');

            if(!$image_en['status'])
            {
                die;
            }

            $image_en = $image_en['name'];
        }
        else
        {
            $image_en = '947282e8d6509a2f91b755030ab49557.jpg';
        }

        $cpu = $this->generate_seo_link($this->sanitize($name_en), '-', true);

        $sql_en = "INSERT INTO `posts` (cpu, name, content, full_review, image, lang) VALUES (:cpu, :name, :content, :full_review, :image, :lang)";
        $query = $this->db->prepare($sql_en);
        $parameters_en = array(':cpu' => $cpu, ':name' => $this->sanitize($name_en), ':content' => $this->sanitize($description_en), ':full_review' => $this->sanitize($full_review_en), ':image' => $image_en, ':lang' => 'en');
        $query->execute($parameters_en);

        print 'success';
    }

    public function updatePost($cpu, $name_en, $description_en, $full_review_en, $image_en)
    {
        $sql = "SELECT name, image, thumb, lang FROM `posts` WHERE cpu = :cpu";
        $query = $this->db->prepare($sql);
        $parameters = array(':cpu' => $cpu);
        $query->execute($parameters);
        $imageNames = $query->fetchAll();

        $postInfo = array();
        foreach ($imageNames as $post)
        {        
            $postInfo[$post->lang] = array($post->name, $post->image, $post->thumb);
        }

        // image-en

        if(!empty($image_en['name']))
        {
            $image_en_upl = $this->file_uploader('image', $image_en, 'uploads/posts/');
            $image_en = $image_en_upl['name'];
            if(isset($postInfo['en'][1]) && $postInfo['en'][1]!='')
                unlink('uploads/posts/'.$postInfo['en'][1]);
        }
        else
        {
            $image_en = $postInfo['en'][1];
        }


        // cpu

        if(isset($postInfo['en'][0]) && $postInfo['en'][0]!=$name_en)
        {
            $cpu_n = $this->generate_seo_link($this->clean($name_en), '-', true);
        }
        else
        {
            $cpu_n = $cpu;
        }

        $sql_en = "UPDATE `posts` SET cpu = :cpu_n, name = :name, content = :content, full_review = :full_review, image = :image WHERE cpu = :cpu AND lang = :lang";
        $query = $this->db->prepare($sql_en);
        $parameters_en = array(':cpu_n' => $this->sanitize($cpu_n), ':name' => $this->sanitize($name_en), ':content' => $this->sanitize($description_en), ':full_review' => $this->sanitize($full_review_en), ':image' => $image_en, ':cpu' => $cpu, ':lang' => 'en');
        $query->execute($parameters_en);

        print 'success';
    }

    public function deletePost($cpu)
    {
        $unst = "SELECT * FROM `posts` WHERE cpu = :cpu";
        $qry = $this->db->prepare($unst);
        $parameters = array(':cpu' => $this->clean($cpu));
        $qry->execute($parameters);
        $img_icon = $qry->fetchAll();

        foreach ($img_icon as $val)
        {
            //if(is_file('uploads/posts/'.$val->image))
            //{
            //    unlink('uploads/posts/'.$val->image);
            //}
        }

        $sql = "DELETE FROM `posts` WHERE cpu = :cpu";
        $query = $this->db->prepare($sql);
        $parameters = array(':cpu' => $this->clean($cpu));
        $query->execute($parameters);

        if($query)
            print 'success';
    }

    public function postOnMain($stat, $cpu)
    {
        $sql = "UPDATE `posts` SET main = :main WHERE cpu = :cpu";
        $query = $this->db->prepare($sql);
        $parameters = array(':main' => (int)$stat, ':cpu' => $this->clean($cpu));
        $query->execute($parameters);

        if($query)
            print 'success';
    }

        

    //  Videos in code
    public function getVideoCats()
    {
        $sql = "SELECT id, name FROM `videocats`";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function getVideosCount()
    {
        $sql = "SELECT COUNT(0) as count FROM `videos`";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch();
    }

    public function getVideos()
    {
        $perPage = 12;
        $page = isset($_GET['page']) && $_GET['page']>0 ? (int)$_GET['page'] : 1;
        $firstTop = ($page-1)*$perPage;
        $lastTop = $page*$perPage;

        $where = (isset($_GET['word']) && is_string($_GET['word']) && $_GET['word']!='')? 'name LIKE "%'.$_GET['word'].'%"' : '1=1';

        $where .= (isset($_GET['cat']) && is_numeric($_GET['cat']) && $_GET['cat']>0)? ' AND cat = "'. (int)$_GET['cat'].'"' : '';

        $sql = "SELECT * FROM `videos` WHERE $where order by id desc LIMIT $perPage OFFSET $firstTop";
        $query = $this->db->prepare($sql);
        $query->execute();
        $videos = $query->fetchAll();

        $return = array();
        foreach ($videos as $video)
        {
            $sql = "SELECT * FROM `videocats` WHERE id = :id";
            $query = $this->db->prepare($sql);
            $parameters = array(':id' => $video->cat);
            $query->execute($parameters);
            $videocat = $query->fetch();

            array_push($return, array($video->id, $video->cat, $video->name, $video->content, $video->image, $videocat->name));
        }

        return $return;
    }

    public function getVideoInfoById($id)
    {
        $sql = "SELECT tb1.*, tb2.name as catName FROM `videos` tb1 INNER JOIN `videocats` tb2 ON tb1.cat = tb2.id WHERE tb1.id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => (int)$id);
        $query->execute($parameters);

        return $query->fetch();
    }

    public function addVideo($cat, $link, $name, $image)
    {
        if(isset($image) && $image!='')
        {
            $img = $this->file_uploader('image', $image, 'uploads/videos/');
            $image = $img['name'];
        }
        else
        {
            $image = '';
            $thumb = '';
        }

        $sql_en = "INSERT INTO `videos` (name, content, image, cat, lang) VALUES (:name, :content, :image, :cat, :lang)";
        $query = $this->db->prepare($sql_en);
        $parameters = array(':name' => $name, ':content' => $link, ':image' => $image, ':cat' => $cat, ':lang' => 'en');
        $query->execute($parameters);
    
        print 'success';
        
    }

    public function editVideo($cat, $link, $name, $image, $id)
    {
        //if(isset($image) && $image!='')
        //{
        //    $img = $this->file_uploader('image', $image, 'uploads/videos/');
        //    $image = $img['name'];
        //}
        //else
        //{
        //    $image = '';
        //}

        $sql_en = "UPDATE `videos` SET name = :name, content = :content, cat = :cat WHERE id = :id";
        $query = $this->db->prepare($sql_en);
        $parameters = array(':name' => $name, ':content' => $link, ':cat' => $cat, ':id' => $id,);
        $query->execute($parameters);
    
        print 'success';
        
    }

    public function deleteVideo($id)
    {
        $unst = "SELECT * FROM `videos` WHERE id = :id AND lang = :lang";
        $qry = $this->db->prepare($unst);
        $parameters = array(':id' => (int)$id, ':lang' => 'en');
        $qry->execute($parameters);
        $media = $qry->fetch();

        if($media->image != '')
            unlink('uploads/videos/'. $media->image);

        $sql = "DELETE FROM `videos` WHERE id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);
        $query->execute($parameters);

        if($query)
            print 'success';
    }

    // Questions in code
    public function getQuestions()
    {
        $sql = "SELECT * FROM `questions` WHERE question_id = :zero ORDER BY id DESC";
        $query = $this->db->prepare($sql);
        $parameters = array(':zero' => 0);
        $query->execute($parameters);

        return $query->fetchAll();
    }

    public function getQuestionsById($id)
    {
        $sql = "SELECT * FROM `questions` WHERE id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => (int)$id);
        $query->execute($parameters);

        return $query->fetch();
    }

    public function getQuestionsAsnwerById($id)
    {
        $sql = "SELECT tb1.id, tb1.name, tb1.question, tb1.subject, tb1.email, tb1.added, tb2.question AS answer, tb2.added AS timer FROM `questions` tb1 INNER JOIN `questions` tb2 ON tb1.id = tb2.question_id WHERE tb1.id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => (int)$id);
        $query->execute($parameters);

        return $query->fetch();
    }

    public function questionAnswer($id, $answer)
    {
        $sql_ans = "INSERT INTO `questions` (name, question, question_id) VALUES (:name, :question, :question_id)";
        $query_ans = $this->db->prepare($sql_ans);
        $parameters = array(':name' => 'Ağarəşid Talıbov', ':question' => $this->clean($answer), ':question_id' => $id);
        $query_ans->execute($parameters);

        $sql = "UPDATE `questions` SET answered = :one WHERE id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':one' => 1, ':id' => (int)$id);
        $query->execute($parameters);
    
        print 'success';
    }

    public function questionAnswerEdit($id, $answer)
    {
        $sql_ans = "UPDATE `questions` SET question = :question WHERE question_id = :id";
        $query_ans = $this->db->prepare($sql_ans);
        $parameters = array(':question' => $this->clean($answer), ':id' => $id);
        $query_ans->execute($parameters);
    
        print 'success';
    }

    public function deleteQuestion($id)
    {        
        $sql = "DELETE FROM `questions` WHERE id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => (int)$id);
        $query->execute($parameters);

        if($query)
            print 'success';
    }

    //  Gallery in code
    public function getGallery()
    {
        $sql = "SELECT * FROM `gallery` ORDER BY id ASC";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function addGallery($image)
    {
        $type = 'image';
        $img = $this->file_uploader('image', $image, 'uploads/gallery/', 400);

        $image = $img['name'];
        $thumb = $img['thumb'];

        $sql_en = "INSERT INTO `gallery` (image, thumb) VALUES (:image, :thumb)";
        $query = $this->db->prepare($sql_en);
        $parameters = array(':image' => $image, ':thumb' => $thumb);
        $query->execute($parameters);
    
        print 'success';
    }

    public function deleteGallery($id)
    {
        $unst = "SELECT * FROM `gallery` WHERE id = :id";
        $qry = $this->db->prepare($unst);
        $parameters = array(':id' => (int)$id);
        $qry->execute($parameters);
        $gallery = $qry->fetch();
        
        unlink('uploads/gallery/'.$gallery->image);
        unlink('uploads/gallery/'.$gallery->thumb);

        $sql = "DELETE FROM `gallery` WHERE id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => (int)$id);
        $query->execute($parameters);

        if($query)
            print 'success';
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
    public function clean($s)
    {
        return str_replace("'", "''", $s);
    }

    public function sanitize($input)
    {
        if (get_magic_quotes_gpc())
        {
            $input = stripslashes($input);
        }
        //$input  = cleanInput($input);
        $output = htmlspecialchars(($input));

        return $output;
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
}