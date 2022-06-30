<?php

/*
 * This file is part of the DoctrineBinary package.
 *
 * (c) Jury Sosnovsky <github@sosnoffsky.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DoctrineBinary\Mysql;

use DoctrineBinary\AbstractAggregateFunction;

/**
 * The MySQL BIT_AND aggregate function.
 *
 * @author Jury Sosnovsky <github@sosnoffsky.com>
 */
class BitAnd extends AbstractAggregateFunction
{
    /**
     * {@inheritDoc}
     */
    protected function getFunctionName(): string
    {
        return 'BIT_AND';
    }
}
