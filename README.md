[![Latest Stable Version](https://poser.pugx.org/dtkahl/php-simple-view/v/stable)](https://packagist.org/packages/php-simple-view)
[![License](https://poser.pugx.org/dtkahl/php-simple-view/license)](https://packagist.org/packages/dtkahl/php-simple-view)
[![Build Status](https://travis-ci.org/dtkahl/php-simple-view.svg?branch=master)](https://travis-ci.org/dtkahl/php-simple-view)

# PHP simple view

Simple PHP view renderer.


## Dependencies

* `PHP >= 5.6.0`


## Installation

Install with [Composer](http://getcomposer.org):

    composer require dtkahl/php-simple-view


## Usage

anywhere in PHP

    $renderer = new \Dtkahl\SimpleView\ViewRenderer(__DIR__.'/views/');
    echo $render->render('example.php', ['name' => 'test']);

/views/example.php

    <!DOCTYPE html>
    <html>
      <head></head>
      <body><?php echo $name ?></body>
    <html>

## Methods

#### `addViewPaths($paths)`
add Path(s) where render should search for view files. Returns renderer instance.

####`render(string $file, array $data = [])`
render given view file with given data (as local vars).
