<?php
/**
 * Created by PhpStorm.
 * User: Vadim
 * Date: 09.08.2018
 * Time: 23:28
 */

namespace Blog\scr\Controller;

use Blog\scr\model\Users\UserModel;
use Blog\scr\Core\Templater;


class UserController
{
    private $user;
    protected $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
        $this->user = new UserModel($this->db);
    }

    public function in()
    {
        if (count($_POST) > 0){
            $login      = $_POST['login'];
            $password   = $_POST['password'];
            $user = $this->user->getUserByLogin($login);
            $refferer   = $_GET['refferer'] ?? '../articles';

            if ($this->user->decodeHash($password, $user['password'])){
                $_SESSION['auth']   = true;

                if (isset($_POST['saveMe'])){
                    setcookie('login', $this->user->encodeHash($login), time() + 3600*24*7);
                    setcookie('pass', $this->user->encodeHash($password), time() + 3600*24*7);
                }
                header("location:$refferer");
                exit();
            }
            else{
                $msg = 'Логин или пароль неверны';
            }
        }

        return $this->inner = Templater::template('login', [
            'login' => $login,
            'msg' => $msg
        ]);
    }

    public function add()
    {
        if (count($_POST) > 0){
            $login      = $_POST['login'];
            $password   = $_POST['password'];
            $passwrod_confirmation = $_POST['passwrod_confirmation'];
            $refferer   = $_GET['refferer'] ?? '../articles';
            $login_hash = '';
            $password_hash = '';

            if ($password === $passwrod_confirmation) {
                if (empty($this->user->getUserByLogin($login))) {
                    $login_hash = $this->user->encodeHash($login);
                    $password_hash = $this->user->encodeHash($password);
                    $this->user->addUser($login, $password_hash);
                    $_SESSION['auth'] = true;

                    if ($this->user->decodeHash($login, $login_hash) && $this->user->decodeHash($password, $password_hash)) {
                        $_SESSION['auth'] = true;

                        if (isset($_POST['saveMe'])) {
                            setcookie('login', $this->user->encodeHash($login), time() + 3600 * 24 * 7);
                            setcookie('pass', $this->user->encodeHash($password), time() + 3600 * 24 * 7);
                        }
                        header("location:$refferer");
                        exit();
                    } else {
                        $msg = 'Логин или пароль неверны';
                    }
                }
            else{
                    $msg = 'Такой пользователь уже существует';
                }
            }
            else {
                $msg = 'Пароли не совпадают';
            }
        }

        return $this->inner = Templater::template('loginAdd', [
            'login' => $login,
            'msg' => $msg
        ]);
    }

    public function out ()
    {
        $msg = '';
        if (count($_POST ) > 0) {
            $refferer = $_GET['refferer'] ?? '../articles';
            if (!empty($_POST['out'])) {
                $_SESSION['auth'] = false;
                setcookie('login', 0, time() - 3600 * 24 * 365);
                setcookie('pass', 0, time() - 3600 * 24 * 365);
            }

            header("location:$refferer");
            exit();
        }
        return $this->inner = Templater::template('logout', [
            'msg' => $msg
        ]);
    }

    public function delete ($id)
    {

    }
}