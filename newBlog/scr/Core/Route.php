<?php
/**
 * Created by PhpStorm.
 * User: Vadim
 * Date: 09.08.2018
 * Time: 17:51
 */

namespace Blog\scr\Core;


use Blog\scr\Controller\LogController;
use Blog\scr\Controller\UserController;

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
            \Blog\scr\Controller\ArticlesController::class => function () {
                return new \Blog\scr\Controller\ArticlesController($this->db);
            },
            \Blog\scr\Controller\UserController::class => function (){
                return new \Blog\scr\Controller\UserController($this->db);
            },
            LogController::class => function(){
                return new LogController($this->db);
            }
        ];

        try {
            switch ($controllerName . '.' . $action) {
                case '.':
                    $controller = $controllers[\Blog\scr\Controller\ArticlesController::class]();
                    $log = $controllers[LogController::class]()->entry();
                    echo $controller->read();
                    break;
                case 'articles.show':
                    $controller = $controllers[\Blog\scr\Controller\ArticlesController::class]();
                    echo $controller->$action($id);
                    break;
                case 'articles.':
                    $controller = $controllers[\Blog\scr\Controller\ArticlesController::class]();
                    echo $controller->read();
                    $log = $controllers[LogController::class]()->entry();
                    break;
                case 'articles.edit':
                    $controller = $controllers[\Blog\scr\Controller\ArticlesController::class]();
                    echo $controller->$action($id);
                    break;
                case 'articles.delete':
                    $controller = $controllers[\Blog\scr\Controller\ArticlesController::class]();
                    echo $controller->$action($id);
                    break;
                case 'articles.add':
                    $controller = $controllers[\Blog\scr\Controller\ArticlesController::class]();
                    echo $controller->$action();
                    break;
                case 'login.add':
                    $controller = $controllers[UserController::class]();
                    echo $controller->$action();
                    break;
                case 'login.in':
                    $controller = $controllers[UserController::class]();
                    echo $controller->$action();
                    break;
                case 'login.out':
                    $controller = $controllers[UserController::class]();
                    echo $controller->$action();
                    break;
            }
        } catch (\Throwable $throwable) {
            echo $throwable->getMessage();
        }
    }
}