<?php

/*
 * This file is part of the DoctrineBinary package.
 *
 * (c) Jury Sosnovsky <github@sosnoffsky.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DoctrineBinary\Postgresql;

use DoctrineBinary\AbstractTwoValuesFunction;

/**
 * The PostgreSQL bitwise XOR (#) operator.
 *
 * @author Jury Sosnovsky <github@sosnoffsky.com>
 */
class BitXor extends AbstractTwoValuesFunction
{
    /**
     * {@inheritDoc}
     */
    protected function getTemplate(): string
    {
        return '(%s # %s)';
    }
}
