<?php

/*
 * This file is part of the DoctrineBinary package.
 *
 * (c) Jury Sosnovsky <github@sosnoffsky.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

$finder = PhpCsFixer\Finder::create()
    ->exclude('vendor')
    ->name('*.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true)
    ->in(__DIR__)
;

$fileHeaderComment = <<<EOF
This file is part of the DoctrineBinary package.

(c) Jury Sosnovsky <github@sosnoffsky.com>

For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.
EOF;


$config = new PhpCsFixer\Config();

$config->setRules([
        '@Symfony' => true,
        'header_comment' => ['header' => $fileHeaderComment],
    ])
    ->setFinder($finder)
;

return $config;