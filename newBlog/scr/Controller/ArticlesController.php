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
use Blog\scr\model\Users;


class ArticlesController extends BaseController
{
    private $articles;
    private $nameView = 'index';
    private $user;
    private $checkEdit;
    private $title;
    private $inner;

    public function __construct($db)
    {
        $this->title = 'Главная';
        $this->checkEdit  = $_GET['checkEdit'] ?? 'false';
        $this->user = new Users\SystemModelUser($_SESSION['auth'] ?? false);
        $this->articles = new ArticlesModel($db);
    }

    public function read ($id)
    {
        $this->inner = Templater::template($this->nameView, [
            'articles' => $this->articles->getAllArticles(),
            'auth' => $this->user->getAuth(),
            'chekEdit' => $this->checkEdit
        ]);
//        var_dump($this->inner);
        return Templater::template('main', [
                'title' => $this->title,
                'content' =>$this->inner
            ]);

    }
}