<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\Data;

/**
 * Class LoadMore
 * @package App\Controllers
 */
class LoadMore extends \Core\Controller
{

    /**
     * @var Data
     */
    protected $model;

    /**
     * @throws \Exception
     */
    public function indexAction()
    {
        $nextPage =  $this->getNextPage();
        $this->model = new Data;
        $data = $this->model->loadNextPage($nextPage);
        View::renderTemplate('Home/load-more.phtml',
            $data);
    }

    /**
     * @return mixed|string
     */
    private function getNextPage()
    {
        $arr = explode("?page=", $_SERVER['REQUEST_URI']);
        return end($arr);
    }
}