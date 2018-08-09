<?php
/**
 * Created by PhpStorm.
 * User: Vadim
 * Date: 09.08.2018
 * Time: 16:48
 */

namespace Blog\scr\Controller;
use Blog\Model\ArticlesModel;
use Blog\scr\Core\Templater;


class ArticleController extends BaseController
{
    private $articles;
    private $nameView = 'articles';
    public function __construct($db)
    {
        $this->articles = new ArticlesModel($db);
    }

    public function read ($id)
    {
        $a = $this->articles->getAllArticles();
        $a = explode()
        var_dump();
//        return Templater::template($this->nameView, $this->articles->getAllArticles());
    }
}