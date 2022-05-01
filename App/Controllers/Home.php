<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\Data;

/**
 * Class Home
 * @package App\Controllers
 */
class Home extends \Core\Controller
{

    /**
     * @var Data
     */
    protected $model;

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        $this->model = new Data;
        $data = $this->model->getAllCharacters();
        View::renderTemplate('header.html');
        View::renderTemplate('Home/index.phtml', $data);
        View::renderTemplate('footer.html');
    }
}