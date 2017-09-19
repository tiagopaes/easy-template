<?php

namespace EasyTemplate;

class View {

    public static function setBasePath($basePath)
    {
        define('VIEW_BASE_PATH', $basePath);
    }

    public static function render(
        $viewTemplateFile,
        array $parameters = []
    ) {
        $basePath = defined('VIEW_BASE_PATH') ? VIEW_BASE_PATH : '';
        $template = new Template($basePath);
        
        return $template->render($viewTemplateFile, $parameters);
    }
}