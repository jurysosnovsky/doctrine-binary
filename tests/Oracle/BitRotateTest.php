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

class BitRotateTest extends OracleTestCase
{
    public function testSelect()
    {
        $this->assertDqlWithGeneratedSql(
            'SELECT BITROTATE(2, 3) from DoctrineBinary\Tests\Entities\BlankTest b',
            'SELECT BitRotate(2, 3) AS sclr_0 FROM BlankTest b0_'
        );
    }

    public function testWhere()
    {
        $this->assertDqlWithGeneratedSql(
            'SELECT b from DoctrineBinary\Tests\Entities\BlankTest b WHERE BITROTATE(b.id, 3) = 16',
            'SELECT b0_.id AS id_0, b0_.type AS type_1 FROM BlankTest b0_ WHERE BitRotate(b0_.id, 3) = 16'
        );
    }

    public function testWhereWithParameters()
    {
        $this->assertDqlWithGeneratedSql(
            'SELECT b from DoctrineBinary\Tests\Entities\BlankTest b WHERE BITROTATE(b.id, :value) = :bitesize',
            'SELECT b0_.id AS id_0, b0_.type AS type_1 FROM BlankTest b0_ WHERE BitRotate(b0_.id, ?) = ?',
            [
                'value' => 3,
                'bitesize' => 16,
            ]
        );
    }
}
