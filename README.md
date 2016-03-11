# PHP simple view

Simple PHP view renderer

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
