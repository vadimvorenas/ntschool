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
    public function template(string $pathToNameTemplateInclude, array $vars)
    {
        extract($vars);
        ob_start();
        include_once "v/v_{$pathToNameTemplateInclude}.php";
        return ob_get_clean();
        // TODO: Implement template() method.
    }
}