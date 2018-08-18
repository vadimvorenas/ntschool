<?php

include_once 'scr/model/UserModel.php';
include_once 'scr/Core/Templater.php';



class UserController
{
    private $user;
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
        $this->user = new UserModel($this->db);
    }

    public function in()
    {
        if (count($_POST) > 0 && isset($_POST['login']) && isset($_POST['password'])
                    && $_POST['login'] != null
                    && $_POST['password'] != null
        ){
            $login      = (string) $_POST['login'];
            $password   = (string) $_POST['password'];
            $user =  $this->user->getUserByLogin($login);
            $refferer   = $_GET['refferer'] ?? 'index.php';

            if ($this->user->decodeHash($password,(string) $user['password'])){
                $_SESSION['auth']   = true;
                $_SESSION['login']  = $login;

                if (isset($_POST['saveMe'])){
                    setcookie('login', $this->user->encodeHash($login), time() + 3600*24*7);
                    setcookie('pass', $this->user->encodeHash($password), time() + 3600*24*7);
                }
                header("location:$refferer");
                exit();
            }
            else{
                $msg = 'Логин или пароль неверны';
                return include_once 'view/login.php';
            }
        }
        else{
            $msg = 'Заполните все поля';
            return include_once 'view/login.php';
        }

//        return include_once 'view/login.php';

//        return Templater::template('view/login', [
//            'login' => $login,
//            'msg' => $msg
//        ]);
    }

    public function add()
    {
        if (count($_POST) > 0){
            $onePC      = (string) $_COOKIE['PHPSESSID'];
            $login      = (string) $_POST['login'];
            $password   = (string) $_POST['password'];
            $passwrod_confirmation = (string) $_POST['passwrod_confirmation'];
            $refferer   = $_GET['refferer'] ?? 'index.php';
            $login_hash = '';
            $id = '';
            $password_hash = '';

            if ($password === $passwrod_confirmation && $password != '') {
                if (empty($this->user->getUserByLogin($login)) && $login != '' && $password != '') {
                    $login_hash = $this->user->encodeHash($login);
                    $password_hash = $this->user->encodeHash($password);
                    $this->user->addUser($login, $password_hash);
                    $id = $this->user->getUserByLogin($login);
                    $this->user->addUserHash($id['id'], $onePC);
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
            $refferer = $_GET['refferer'] ?? 'index.php';
            if (!empty($_POST['out'])) {
                $_SESSION ['login'] = false;
                $_SESSION['auth'] = false;
                setcookie('login', 0, time() - 3600 * 24 * 365);
                setcookie('pass', 0, time() - 3600 * 24 * 365);
            }
            if (!empty($_POST['no'])){
                header("location:$refferer");
                exit();
            }

            header("location:$refferer");
            exit();
        }
        return $this->inner = Templater::template('view/logout', [
            'msg' => $msg
        ]);
    }

}