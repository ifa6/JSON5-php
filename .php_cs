<?php

use Symfony\CS\Config\Config;
use Symfony\CS\FixerInterface;
use Symfony\CS\Finder\DefaultFinder;

$fixers = [
    "-phpdoc_no_package",
    "align_equals",
    "blankline_after_open_tag",
    "function_call_space",
    "lowercase_constants",
    "lowercase_keywords",
    "method_argument_space",
    "multiple_use",
    "no_empty_lines_after_phpdocs",
    "php_closing_tag",
    "phpdoc_indent",
    "phpdoc_inline_tag",
    "phpdoc_no_access",
    "return",
    "short_array_syntax",
    "unused_use",
];

$finder = DefaultFinder::create()
    ->exclude("vendor")
    ->in(__DIR__);

return Config::create()
    ->level(FixerInterface::PSR2_LEVEL)
    ->fixers($fixers)
    ->finder($finder);
