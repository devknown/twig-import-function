<?php

require __DIR__.'/../vendor/autoload.php';

// 1. Setup twig 3.x
$loader = new \Twig\Loader\FilesystemLoader('./examples');
$twig = new \Twig\Environment($loader);

// 2. Load extension
$extension = new \Devknown\Twig\Extension\ImportFunctionExtension();

function my_custom_function($name)
{
    echo "Your name is: " . $name;
}

$extension->import(['my_custom_function', 'file_exists']);
// Note: in this example, the 'my_custom_function..' must be accessible globally

// 4. Add extension
$twig->addExtension($extension);

echo $twig->render('home.html', ['the' => 'variables', 'go' => 'here']);
