<?php

    class System
    {
        public function template ($pathToNameTemplateInclude, $vars = [])
        {
            extract($vars);
            ob_start();
            include_once "v/v_{$pathToNameTemplateInclude}.php";
            return ob_get_clean();

        }
    }