<?php

use PhpCsFixer\Finder;
use PhpCsFixer\Config;

$finder = Finder::create()
    ->exclude('vendor')
    ->in(__DIR__)
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

return Config::create()
    ->setRules([
        '@PSR2' => true,
        'array_syntax' => ['syntax' => 'short'],
        'ordered_imports' => ['sort_algorithm' => 'length'],
        'no_unused_imports' => false,
        'no_useless_else' => true,
        'no_useless_return' => true,
        'no_superfluous_elseif' => true,
        'no_unneeded_curly_braces' => true,
        'phpdoc_order' => true,
        'phpdoc_types_order' => true,
        'align_multiline_comment' => true,
    ])
    ->setUsingCache(false)
    ->setFinder($finder);
