<?php
/**
 * Created by PhpStorm.
 * User: Vadim
 * Date: 07.08.2018
 * Time: 23:43
 */


class SystemModelUser
{
    private $auth;
    protected $login;
    protected $password;

    public function __construct(bool $auth, $login, $password)
    {
        $this->auth = $auth;
        $this->login = (string) $login;
        $this->password = (string) $password;
    }

    public function encodeHash(string $string)
    {
        return password_hash($string, PASSWORD_ARGON2I);
        // TODO: Implement encodeHashId() method.
    }

    public function decodeHash(string $string, string $hash)
    {
        return password_verify($string, $hash);
        // TODO: Implement decodeHashId() method.
    }

    public function issAuth()
    {
        if (!$this->auth && isset($_COOKIE['login']) && isset($_COOKIE['pass']))
        {
            if ( $this->decodeHash($this->login, $_COOKIE['login'] )
                && $this->decodeHash($this->password, $_COOKIE['pass']) )
            {
                $_SESSION['auth'] = true;
                $this->auth = true;
            }
            else
            {
                $this->auth = false;
            }
        }
        else {
            $this->auth = $_SESSION['auth'];
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

    /**
     * @return mixed
     */
    public function getLogin()
    {
        if ($this->issAuth())
            return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login): void
    {
        if ($this->issAuth())
            $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        if ($this->issAuth())
            return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        if ($this->issAuth())
            $this->password = $password;
    }



}