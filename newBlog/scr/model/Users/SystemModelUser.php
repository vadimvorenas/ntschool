<?php
/**
 * Created by PhpStorm.
 * User: Vadim
 * Date: 07.08.2018
 * Time: 23:43
 */

namespace Blog\scr\model\Users;


class SystemModelUser implements SystemModelUserInterface
{
    private $auth;

    public function __construct(bool $auth)
    {
        $this->auth = $auth;
    }

    public function encodeHashPassword(string $password)
    {
        return password_hash($password, PASSWORD_ARGON2I);
        // TODO: Implement encodeHashId() method.
    }

    public function decodeHashPassword(string $password, string $hash)
    {
        return password_verify($password, $hash);
        // TODO: Implement decodeHashId() method.
    }

    public function issAuth(){
        if (!$this->auth && isset($_COOKIE['login']) && isset($_COOKIE['pass'])) {
            if ($_COOKIE['login'] == myHash('admin') && $_COOKIE['pass'] == myHash('admin')) {
                $_SESSION['auth'] = true;
                $this->auth = true;
            } else {
                $this->auth = false;
            }
        }
        return $this->auth;
    }

    /**
     * @return mixed
     */
    public function getAuth()
    {
        return $this->auth;
    }

    /**
     * @param mixed $auth
     */
    public function setAuth($auth): void
    {
        $this->auth = $auth;
    }

}