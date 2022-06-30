<?php

/*
 * This file is part of the DoctrineBinary package.
 *
 * (c) Jury Sosnovsky <github@sosnoffsky.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DoctrineBinary\Tests\Common;

use DoctrineBinary\Tests\CommonTestCase;

/**
 * Test case for common bitwise XOR (^) operator.
 *
 * @author Jury Sosnovsky <github@sosnoffsky.com>
 */
class BitXorTest extends CommonTestCase
{
    /**
     * Test case for select.
     *
     * @return void
     */
    public function testSelect()
    {
        $this->assertDqlWithGeneratedSql(
            'SELECT BITXOR(2, 3) from DoctrineBinary\Tests\Entities\BlankTest b',
            'SELECT (2 ^ 3) AS sclr_0 FROM BlankTest b0_'
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
            'SELECT b from DoctrineBinary\Tests\Entities\BlankTest b WHERE BITXOR(b.id, 3) = 16',
            'SELECT b0_.id AS id_0, b0_.type AS type_1 FROM BlankTest b0_ WHERE (b0_.id ^ 3) = 16'
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
            'SELECT b from DoctrineBinary\Tests\Entities\BlankTest b WHERE BITXOR(b.id, :value) = :bitesize',
            'SELECT b0_.id AS id_0, b0_.type AS type_1 FROM BlankTest b0_ WHERE (b0_.id ^ ?) = ?',
            [
                'value' => 3,
                'bitesize' => 16,
            ]
        );
    }
}
