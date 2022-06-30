<?php

/*
 * This file is part of the DoctrineBinary package.
 *
 * (c) Jury Sosnovsky <github@sosnoffsky.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DoctrineBinary\Tests;

/**
 * Test case for Oracle bitwise operators and functions.
 *
 * @author Jury Sosnovsky <github@sosnoffsky.com>
 */
class OracleTestCase extends DbTestCase
{
    /**
     * {@inheritDoc}
     */
    public const CONFIG_TYPE = ConfigurationLoader::ORACLE;
}
