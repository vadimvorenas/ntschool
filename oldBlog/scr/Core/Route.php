<?php
/**
 * Created by PhpStorm.
 * User: Vadim
 * Date: 09.08.2018
 * Time: 17:51
 */

namespace Blog\scr\Core;


class Route
{
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
        $this->start();
    }

    public function start ()
    {
        list($controllerName, $action, $id) = explode('/', $_GET['path']);
        $controllerName = mb_strtolower($controllerName);
        $action = mb_strtolower($action);

        $controller = '\Blog\scr\Controller\\' . ucfirst($controllerName) . 'Controller';


        $controllers = [
            \Blog\scr\Controller\ArticleController::class => function () {
                return new \Blog\scr\Controller\ArticleController($this->db);
            }
        ];

        try {
            switch ($controllerName . '.' . $action) {
                case 'article.read':
                    $controller = $controllers[\Blog\scr\Controller\ArticleController::class]();
                    echo $controller->$action($id);
                    break;
            }
        } catch (\Throwable $throwable) {
            echo $throwable->getMessage();
        }
    }
}