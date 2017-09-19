<?php

require __DIR__ . './../vendor/autoload.php';

use EasyTemplate\Template;
use EasyTemplate\View;

$basePath = __DIR__ . '/views'; // path to views folder

$view = new Template($basePath);

$view->example = 'hello world';

$html = $view->render(
    'home', // view file name without .php
    [
        'anotherExample' => 'It is an example!.' // another way to set variables
    ]
);

echo $html;



// Call  render method staticaly

View::setBasePath($basePath);

$html = View::render('home', [
    'example' => 'hello world',
    'anotherExample' => 'It is another example!.'
]);

echo $html;