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

abstract class AbstractTemplateFunction extends FunctionNode
{
    abstract protected function getTemplate(): string;
}
