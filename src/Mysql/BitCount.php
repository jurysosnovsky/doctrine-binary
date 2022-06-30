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

use DoctrineBinary\AbstractOneValueFunction;

/**
 * The MySQL BIT_COUNT function.
 *
 * @author Jury Sosnovsky <github@sosnoffsky.com>
 */
class BitCount extends AbstractOneValueFunction
{
    /**
     * {@inheritDoc}
     */
    protected function getTemplate(): string
    {
        return 'BIT_COUNT(%s)';
    }
}
