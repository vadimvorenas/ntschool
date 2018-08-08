<?php

         function checkTitle($title, $pattern = "/[^0-9a-zа-пр-яё]+/i")
        {
            $res = preg_match($pattern, $title);
            return $res;

        }

        function myHash ($name)
        {
            $res = password_hash($name, PASSWORD_ARGON2I);
            return $res;
        }


        function issAuth($auth){
            if (!$auth && isset($_COOKIE['login']) && isset($_COOKIE['pass'])) {
                if ($_COOKIE['login'] == myHash('admin') && $_COOKIE['pass'] == myHash('admin')) {
                    $_SESSION['auth'] = true;
                    $auth = true;
                } else {
                    $auth = false;
                }
            }
            return $auth;
        }

