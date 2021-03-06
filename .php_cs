<?php

/*
 * This file is part of JSON5-php.
 *
 * (c) Hiroto Kitazawa <hiro.yo.yo1610@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Symfony\CS\Config;
use Symfony\CS\Finder;
use Symfony\CS\Fixer\Contrib\HeaderCommentFixer;
use Symfony\CS\FixerInterface;

$header = <<<'EOS'
This file is part of JSON5-php.

(c) Hiroto Kitazawa <hiro.yo.yo1610@gmail.com>

For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.
EOS;

HeaderCommentFixer::setHeader($header);

$fixers = [
    '-phpdoc_no_package',
    '-psr0',
    'align_equals',
    'encoding',
    'ereg_to_preg',
    'header_comment',
    'php4_constructor',
    'php_unit_construct',
    'short_array_syntax',
    'short_echo_tag',
    'ordered_use',
    'newline_after_open_tag',
];

$finder = Finder::create()
    ->files()
    ->name('.php_cs')
    ->exclude('vendor')
    ->in(__DIR__);

return Config::create()
    ->level(FixerInterface::PSR2_LEVEL)
    ->level(FixerInterface::SYMFONY_LEVEL)
    ->fixers($fixers)
    ->finder($finder)
    ->setUsingCache(true);
