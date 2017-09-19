<?php

namespace EasyTemplate;

class Template {
    
    private $basePath;
    private $vars = [];

    public function __construct($basePath = '')
    {
        if ($basePath != '') {
            $lastChar = substr($basePath, -1);
            $basePath = ($lastChar == '/') ?
                $basePath : $basePath . '/';
        }
        
        $this->basePath = $basePath;
    }
    
    public function __get($name)
    {
        return $this->vars[$name];
    }

    public function __set($name, $value)
    {
        $this->vars[$name] = $value;
    }

    public function render($viewTemplateFile, array $parameters = [])
    {
        extract($this->vars);
        extract($parameters);
        
        ob_start();

        $filePath = $this->basePath . $viewTemplateFile . '.php';
        include($filePath);
        
        return ob_get_clean();
    }
}