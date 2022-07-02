<?php

require __DIR__.'/../vendor/autoload.php';

$loader = new \Twig\Loader\ArrayLoader(array(
    'uniqid' => 'Hi, I am unique: {{ uniqid() }}.',
    'floor'  => 'And {{ floor(8.8) }} is floor of 8.8.',
));

$twig = new \Twig\Environment($loader);
$twig->addExtension(new \Devknown\Twig\Extension\ImportFunctionExtension());

echo $twig->render('uniqid') . PHP_EOL;
echo $twig->render('floor') . PHP_EOL;
