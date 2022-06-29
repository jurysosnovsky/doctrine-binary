<?php

/*
 * This file is part of the DoctrineBinary package.
 *
 * (c) Jury Sosnovsky <github@sosnoffsky.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DoctrineBinary\Oracle;

use DoctrineBinary\AbstractTwoValuesFunction;

class BitRotate extends AbstractTwoValuesFunction
{
    protected function getTemplate(): string
    {
        return 'BitRotate(%s, %s)';
    }
}
