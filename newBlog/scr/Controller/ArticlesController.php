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
use Blog\Model\SystemModel;


class ArticlesController extends BaseController
{
    private $articles;
    private $nameView = 'index';
    private $user;
    private $checkEdit;
    private $title;
    private $content;
    private $name_article;
    private $inner;

    public function __construct($db)
    {
        $this->title = 'Главная';
        $this->checkEdit  = $_GET['checkEdit'] ?? 'false';
        $this->user = new Users\SystemModelUser($_SESSION['auth'] ?? false);
        $this->articles = new ArticlesModel($db);
    }

    public function read ()
    {
            $this->inner = Templater::template($this->nameView, [
                'articles' => $this->articles->getAllArticles(),
                'auth' => $this->user->getAuth(),
                'chekEdit' => $this->checkEdit
            ]);
            return Templater::template('main', [
                'title' => $this->title,
                'content' => $this->inner
            ]);
    }

    public function show ($id)
    {
        $this->id = $id;
        $this->name_article = array_shift($this->articles->getByArticle($this->id)) ['name_article'];
        $this->content = array_shift( $this->articles->getByArticle($this->id))['content'];
        return $this->inner = Templater::template('article', [
            'back' => 'http://phpcoursepart2/Blog/newBlog/articles',
            'name_article' => $this->name_article,
            'content' => $this->content
        ]);
    }

    public function edit ($id)
    {
        if ($this->user->issAuth()) {
            $this->id = $id;
            $name_old_article = $this->name_article = array_shift($this->articles->getByArticle($this->id)) ['name_article'];
            $this->content = array_shift($this->articles->getByArticle($this->id))['content'];
            $articles = $this->articles;

            if (count($_POST) > 0) {
                $name_article = strip_tags($_POST['nameArticle']);
                $content = strip_tags($_POST['content']);

                if (SystemModel::checkTitle($name_article)) {
                    $msg = 'Название только из цифр и латинских букв';
                } elseif (iconv_strlen($content) < 2) {
                    $msg = 'Содержание должно быть больше 2 символов';
                } elseif ($name_article != $name_old_article) {
                    $msg = 'Менять название статьи сейчас недоступно';
                } elseif ($name_article == $_POST['nameArticle']) {
                    try {
                        $articles->updateArticle($id, $content);
                        $_SESSION['msg'] = 'Статья успешно обновлена!';
                        header('location: ../../articles');
                        exit();
                    }
                    catch (\Exception $exception){
                        echo $exception;
                    }
                }
            } else {
                echo $msg = '';
            }
            return $this->inner = Templater::template('edit', [
                'back' => 'http://phpcoursepart2/Blog/newBlog/articles',
                'name_article' => $name_old_article,
                'content' => $this->content,
                'msg' => $msg
            ]);
        }
        else{
            header('location: ../../articles');
        }

    }

    public function delete($id)
    {
        if ($this->user->issAuth()){
            try {
                $this->articles->deletedArticle($id);
                $_SESSION['msg'] = 'Статья Удалена!';
                header('location: ../../articles');
                exit();
            }
            catch (\Exception $exception){
                echo $exception;
            }
        }
        else{
            header('location: ../../articles');
        }
    }

    public function add()
    {
        $name_article = '';
        $this->content = '';
        $articles = $this->articles;

        if (count($_POST) > 0) {
            $name_article = strip_tags($_POST['name_article']);
            $content = strip_tags($_POST['content']);

            if (SystemModel::checkTitle($name_article)) {
                $msg = 'Название только из цифр и латинских букв';
            }
            elseif (iconv_strlen($content) < 2) {
                $msg = 'Содержание должно быть больше 2 символов';
            }
            elseif ($name_article != $name_article) {
                $msg = 'Менять название статьи сейчас недоступно';
            }
            elseif ($name_article == $_POST['name_article']) {
                try {
                    $articles->setArticles($name_article, $content);
                    $_SESSION['msg'] = 'Статья успешно добавлена!';
                    header('location: ../articles');
                    exit();
                }
                catch (\Exception $exception){
                    echo $exception;
                }
            }
        }
        else {
            echo $msg = '';
        }
        return $this->inner = Templater::template('add', [
            'back' => 'http://phpcoursepart2/Blog/newBlog/articles',
            'name_article' => $name_article,
            'content' => $this->content,
            'msg' => $msg
        ]);
    }
}