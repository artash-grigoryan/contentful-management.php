<?php

$year = date('Y');

$fileHeaderComment = <<<COMMENT
This file is part of the contentful/contentful-management package.

@copyright 2015-$year Contentful GmbH
@license   MIT
COMMENT;

$finder = PhpCsFixer\Finder::create()
    ->in('scripts')
    ->in('src')
    ->in('tests')
    ->notPath('Fixtures/E2E')
    ->notPath('Fixtures/Integration')
;

return PhpCsFixer\Config::create()
    ->setFinder($finder)
    ->setRiskyAllowed(true)
    ->setCacheFile(__DIR__.'/.php_cs.cache')
    ->setRules([
        '@Symfony' => true,
        '@Symfony:risky' => true,
        'array_syntax' => ['syntax' => 'short'],
        'declare_strict_types' => true,
        'header_comment' => [
            'comment_type' => 'PHPDoc',
            'header' => $fileHeaderComment,
            'location' => 'after_open',
            'separate' => 'both',
        ],
        'linebreak_after_opening_tag' => true,
        'mb_str_functions' => true,
        'native_function_invocation' => true,
        'no_php4_constructor' => true,
        'no_unreachable_default_argument_value' => true,
        'no_useless_else' => true,
        'no_useless_return' => true,
        'ordered_imports' => true,
        'php_unit_strict' => true,
        'phpdoc_order' => true,
        'semicolon_after_instruction' => true,
        'strict_comparison' => true,
        'strict_param' => true,
    ])
    ;
