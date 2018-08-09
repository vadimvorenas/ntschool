<?php
/**
 * Created by PhpStorm.
 * User: Vadim
 * Date: 08.08.2018
 * Time: 13:19
 */

namespace Blog\scr\Core;


class Templater
{
    public static function template(string $pathToNameTemplateInclude, array $vars)
    {
        extract($vars);
        ob_start();
        include_once "v/{$pathToNameTemplateInclude}.php";
        return ob_get_clean();
        // TODO: Implement template() method.
    }
}