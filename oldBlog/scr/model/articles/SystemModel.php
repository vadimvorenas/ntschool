<?php
/**
 * Created by PhpStorm.
 * User: Vadim
 * Date: 07.08.2018
 * Time: 22:52
 */

namespace Blog\Model;


class SystemModel implements SystemModelInterface
{
    public static function trimName(string $name)
    {
        return trim(htmlspecialchars(strip_tags($name)));
        // TODO: Implement trimName() method.
    }

    public static function checkTitle($title, $pattern = "/[^0-9a-zа-пр-яё]+/i")
    {
        $res = preg_match($pattern, $title);
        return $res;

    }

}