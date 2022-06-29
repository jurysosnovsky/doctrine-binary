<?php

/*
 * This file is part of the DoctrineBinary package.
 *
 * (c) Jury Sosnovsky <github@sosnoffsky.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DoctrineBinary\Common;

use DoctrineBinary\AbstractOneValueFunction;

class BitInversion extends AbstractOneValueFunction
{
    protected function getTemplate(): string
    {
        return '(~%s)';
    }
}
