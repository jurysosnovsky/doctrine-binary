<?php

/*
 * This file is part of the DoctrineBinary package.
 *
 * (c) Jury Sosnovsky <github@sosnoffsky.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DoctrineBinary\Tests\Mysql;

use DoctrineBinary\Tests\MysqlTestCase;

/**
 * Test case for MySQL BIT_OR aggregate function.
 *
 * @author Jury Sosnovsky <github@sosnoffsky.com>
 */
class BitOrTest extends MysqlTestCase
{
    /**
     * Test case for select.
     *
     * @return void
     */
    public function testSelect()
    {
        $this->assertDqlWithGeneratedSql(
            'SELECT BIT_OR(b.id) from DoctrineBinary\Tests\Entities\BlankTest b GROUP BY b.type',
            'SELECT BIT_OR(b0_.id) AS sclr_0 FROM BlankTest b0_ GROUP BY b0_.type'
        );
    }
}
