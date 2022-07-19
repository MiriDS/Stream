<?php
/**
 * Created by PhpStorm.
 * User: Cavid
 * Date: 6/24/2017
 * Time: 22:24
 */

class CPagination
{

    // bunun adini niye _key qoymusam bilmirem
    // ?page=
    private $_key = 'page';

    // default limit 10
    private $limit = 10;

    // melumat sayi
    private $dataCount = null;

    // ekranda gosterilen sehife sayi
    private $pageShowLimit = 7;

    public function __construct()
    {
        
    }

    public function setLimit($limit)
    {
        if(!is_numeric($limit) || $limit <= 0)
        {
            throw new Exception('Limit yalnız rəqəmsal və müsbət dəyərlər ola bilər');
        }

        $this->limit = $limit;
    }

    public function getLimit()
    {
        return $this->limit;
    }

    public function setKey($key)
    {
        $this->_key = $key;
    }

    public function getKey()
    {
        return $this->_key;
    }

    public function getDataCount()
    {
        return $this->dataCount;
    }

    public function setDataCount($count)
    {
        $this->dataCount = $count;
    }

    public function getPage()
    {
        $page = isset($_GET['page']) &&
        is_numeric($_GET['page']) &&
        $_GET['page'] > 0 ?
            (int)$_GET['page'] : 1;

        return $page;
    }

    public function getPagesCount()
    {
        if($this->getDataCount() <= 0)
        {
            return 0;
        }

        return(int)ceil($this->getDataCount() / $this->getLimit());
    }

    public function getOffset()
    {
        if($this->getPage() > $this->getPagesCount())
        {
            return 0;
        }
        return ($this->getPage()-1) * $this->getLimit();
    }

    public function setPageShowLimit($limit)
    {
        // ekranda gosterilen sehife sayini cut reqem qoyanda normal islemir
        // menlik deyil her yerde beledi ))
        if($limit % 2 == 0)
        {
            throw new Exception('Səhifələrin göstərilmə sayı cüt rəqəm ola bilməz');
        }

        $this->pageShowLimit = $limit;
    }

    public function getPageShowLimit()
    {
        return $this->pageShowLimit;
    }


    public function paginate()
    {
        // metod bu massivi geri qaytaracaq.
        // pages - sehifeler bura yigilir
        // active - halhazirda secilen sehife
        // prev - evvelki sehive
        // next - sonraki sehife
        $pages = ['pages' => [], 'active' => $this->getPage(), 'prev' => null, 'next' => null];

        // ekranda gosterilen sehifelerin sayini gotururuk
        $page_limit = $this->getPageShowLimit();

        // defaul olaraq sehifeler 1`den baslayir
        $start = 1;

        // eger sehifelerin sayi ekranda gosterilen sehifelerin sayindan kicik ve ya beraberdirse
        // butun sehifeleri gotururuk. eks halda teyin etdiyimiz limiti veririk
        $end = ($this->getPagesCount() <= $page_limit) ? $this->getPagesCount() : $page_limit;

        /*
         * sehife limitini 2 ye bolub yuxari ve asagi yuvarlaqlasdiririq
         * 2ye bolmeyimizin sebebi odurki deyek ki,
         *
         * $page_limit = 7 di
         * ve biz 4cu sehifedeyik
         * netice asagidaki kimidir
         *    1 2 3 |4| 5 6 7
         * indi 5ci sehifeye kecsek netice asagidaki kimi olacaq
         *    2 3 4 |5| 6 7 8
         */
        $ceil = ceil($page_limit/2);

        $floor = floor($page_limit/2);

        if($this->getPage() > $ceil)
        {
            $start = $this->getPage() - $floor;

            $end = $this->getPage() + $floor;

            if(($this->getPagesCount() - $floor) <= $this->getPage())
            {
                $start = $this->getPagesCount() > $page_limit ? ($this->getPagesCount() - $page_limit) +1 : 1;

                $end = $this->getPagesCount();
            }
        }

        if($this->getPage() > 1)
        {
            $pages['prev'] = $this->getPage()-1;
        }

        if($this->getPage() < $this->getPagesCount())
        {
            $pages['next'] = $this->getPage()+1;
        }

        for($i = $start; $i <= $end; $i++)
        {
            $pages['pages'][] = $i;
        }

        return $pages;
    }
}