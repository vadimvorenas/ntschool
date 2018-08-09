<?php

    class System
    {
        public function template ($pathToNameTemplateInclude, $vars = [])
        {
            extract($vars);
            ob_start();
            include_once "view/v_{$pathToNameTemplateInclude}.php";
            return ob_get_clean();

        }
    }