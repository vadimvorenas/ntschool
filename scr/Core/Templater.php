<?php

class Templater
{
    public static function template(string $pathToNameTemplateInclude, array $vars)
    {
        extract($vars);
        ob_start();
        include_once "{$pathToNameTemplateInclude}.php";
        return ob_get_clean();
        // TODO: Implement template() method.
    }
}