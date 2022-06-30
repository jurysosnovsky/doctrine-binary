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
 * Test case for Oracle BitNot function.
 *
 * @author Jury Sosnovsky <github@sosnoffsky.com>
 */
class BitNotTest extends OracleTestCase
{
    /**
     * Test case for select.
     *
     * @return void
     */
    public function testSelect()
    {
        $this->assertDqlWithGeneratedSql(
            'SELECT BITNOT(3) from DoctrineBinary\Tests\Entities\BlankTest b',
            'SELECT BitNot(3) AS sclr_0 FROM BlankTest b0_'
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
            'SELECT b from DoctrineBinary\Tests\Entities\BlankTest b WHERE BITNOT(b.id) = 16',
            'SELECT b0_.id AS id_0, b0_.type AS type_1 FROM BlankTest b0_ WHERE BitNot(b0_.id) = 16'
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
            'SELECT b from DoctrineBinary\Tests\Entities\BlankTest b WHERE BITNOT(b.id) = :bitesize',
            'SELECT b0_.id AS id_0, b0_.type AS type_1 FROM BlankTest b0_ WHERE BitNot(b0_.id) = ?',
            [
                'bitesize' => 16,
            ]
        );
    }
}
