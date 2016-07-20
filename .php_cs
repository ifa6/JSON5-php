<?php

use Symfony\CS\Config\Config;
use Symfony\CS\FixerInterface;
use Symfony\CS\Finder\DefaultFinder;

$fixers = [
    "-phpdoc_no_package",
    "-psr0",
    "align_equals",
    "encoding",
    "ereg_to_preg",
    "php4_constructor",
    "php_unit_construct",
    "short_array_syntax",
    "short_echo_tag",
    "ordered_use",
    "newline_after_open_tag",
];

$finder = DefaultFinder::create()
    ->exclude("vendor")
    ->in(__DIR__);

return Config::create()
    ->level(FixerInterface::PSR2_LEVEL)
    ->level(FixerInterface::SYMFONY_LEVEL)
    ->fixers($fixers)
    ->finder($finder);
