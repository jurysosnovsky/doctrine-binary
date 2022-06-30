<?php

/*
 * This file is part of the DoctrineBinary package.
 *
 * (c) Jury Sosnovsky <github@sosnoffsky.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DoctrineBinary;

use Doctrine\ORM\Query\AST\Functions\FunctionNode;

/**
 * The abstract class from FunctionNode.
 * Define template for custom DQL function.
 *
 * @author Jury Sosnovsky <github@sosnoffsky.com>
 */
abstract class AbstractTemplateFunction extends FunctionNode
{
    /**
     * Get template for the DQL function.
     *
     * @return string Template of the DQL function
     */
    abstract protected function getTemplate(): string;
}
