<?php

// This is the API docs generator configuration.
// To generate docs, execute:
// php sami.phar update sami.php
//
// For more about Sami, visit
// https://github.com/FriendsOfPHP/Sami

use Sami\Sami;
use Symfony\Component\Finder\Finder;

$dir = __DIR__.'/src';

$iterator = Finder::create()
    ->files()
    ->name('*.php')
    ->in($dir)
;

return new Sami($iterator, [
    'title' => 'Contentful CDA SDK for PHP',
    'build_dir' => __DIR__.'/build/docs',
    'cache_dir' => __DIR__.'/build/doc_cache',
]);
