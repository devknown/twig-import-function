# Twig v3 Import Function 

[![Build Status](https://github.com/devknown/twig-import-function/actions/workflows/ci.yml/badge.svg?branch=main)](https://github.com/devknown/twig-import-function/actions?query=branch%3Amain)
[![Latest Stable Version](https://poser.pugx.org/devknown/twig-import-function/v/stable.svg)](https://packagist.org/packages/devknown/twig-import-function)
[![Total Downloads](https://poser.pugx.org/devknown/twig-import-function/downloads.svg)](https://packagist.org/packages/devknown/twig-import-function)
[![License](https://poser.pugx.org/devknown/twig-import-function/license.svg)](https://packagist.org/packages/devknown/twig-import-function)

Call (almost) any PHP function from your Twig (v3) templates.

## Requirements

PHP 7.3 and later.
Twig 3.x

## Composer

You can install the bindings via [Composer](http://getcomposer.org/). Run the following command:

```bash
composer require devknown/twig-import-function
```

To use the bindings, use Composer's [autoload](https://getcomposer.org/doc/01-basic-usage.md#autoloading):

```php
require_once('vendor/autoload.php');
```

## Manual Installation

If you do not wish to use Composer, you can download and include the `ImportFunctionExtension.php` file.

```php
require_once('./src/Devknown/Twig/Extension/ImportFunctionExtension.php');
```

## Getting Started

Simple usage looks like:

```php
// 1. Setup twig 3.x
$loader = new \Twig\Loader\FilesystemLoader('/path/to/template');
$twig = new \Twig\Environment($loader);

// 2. Load extension
$extension = new \Devknown\Twig\Extension\ImportFunctionExtension();

// 3. Import a function
$extension->import('uniqid');

// -> Or multiple functions
function my_custom_function($name) {
    echo "Your name is: " . $name;
}
$extension->import(['uniqid', 'file_exists', 'my_custom_function']);
// Note: in this example, the 'my_custom_function..' must be accessible globally 

// 4. Add extension
$twig->addExtension($extension);

// 5. Render as normal
echo $twig->render('home.html', ['the' => 'variables', 'go' => 'here']);
```

the template file `home.html` (/path/to/template/home.html) would look like:
```html
<div>
    Hi, I am unique: <b>{{ uniqid() }}</b>.
    <br/> 
    {{ my_custom_function('Devknown') }}
</div>
```
