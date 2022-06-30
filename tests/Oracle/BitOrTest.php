<?php

/*
 * This file is part of the DoctrineBinary package.
 *
 * (c) Jury Sosnovsky <github@sosnoffsky.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DoctrineBinary\Tests\Oracle;

use DoctrineBinary\Tests\OracleTestCase;

/**
 * Test case for Oracle BitOr function.
 *
 * @author Jury Sosnovsky <github@sosnoffsky.com>
 */
class BitOrTest extends OracleTestCase
{
    /**
     * Test case for select.
     *
     * @return void
     */
    public function testSelect()
    {
        $this->assertDqlWithGeneratedSql(
            'SELECT BITOR(2, 3) from DoctrineBinary\Tests\Entities\BlankTest b',
            'SELECT BitOr(2, 3) AS sclr_0 FROM BlankTest b0_'
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
            'SELECT b from DoctrineBinary\Tests\Entities\BlankTest b WHERE BITOR(b.id, 3) = 16',
            'SELECT b0_.id AS id_0, b0_.type AS type_1 FROM BlankTest b0_ WHERE BitOr(b0_.id, 3) = 16'
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
            'SELECT b from DoctrineBinary\Tests\Entities\BlankTest b WHERE BITOR(b.id, :value) = :bitesize',
            'SELECT b0_.id AS id_0, b0_.type AS type_1 FROM BlankTest b0_ WHERE BitOr(b0_.id, ?) = ?',
            [
                'value' => 3,
                'bitesize' => 16,
            ]
        );
    }
}
