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
 * Test case for MySQL BIT_COUNT function.
 *
 * @author Jury Sosnovsky <github@sosnoffsky.com>
 */
class BitCountTest extends MysqlTestCase
{
    /**
     * Test case for select.
     *
     * @return void
     */
    public function testSelect()
    {
        $this->assertDqlWithGeneratedSql(
            'SELECT BIT_COUNT(2) from DoctrineBinary\Tests\Entities\BlankTest b',
            'SELECT BIT_COUNT(2) AS sclr_0 FROM BlankTest b0_'
        );
    }

    /**
     * Test case for where.
     *
     * @return void
     */
    public function testWhere()
    {
        $this->assertDqlWithGeneratedSql(
            'SELECT b from DoctrineBinary\Tests\Entities\BlankTest b WHERE BIT_COUNT(b.id) = 16',
            'SELECT b0_.id AS id_0, b0_.type AS type_1 FROM BlankTest b0_ WHERE BIT_COUNT(b0_.id) = 16'
        );
    }

    /**
     * Test case for where with parameters.
     *
     * @return void
     */
    public function testWhereWithParameters()
    {
        $this->assertDqlWithGeneratedSql(
            'SELECT b from DoctrineBinary\Tests\Entities\BlankTest b WHERE BIT_COUNT(b.id) = :bitesize',
            'SELECT b0_.id AS id_0, b0_.type AS type_1 FROM BlankTest b0_ WHERE BIT_COUNT(b0_.id) = ?',
            [
                'bitesize' => 16,
            ]
        );
    }
}
