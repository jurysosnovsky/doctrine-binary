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

class BitCountTest extends MysqlTestCase
{
    public function testSelect()
    {
        $this->assertDqlWithGeneratedSql(
            'SELECT BIT_COUNT(2) from DoctrineBinary\Tests\Entities\BlankTest b',
            'SELECT BIT_COUNT(2) AS sclr_0 FROM BlankTest b0_'
        );
    }

    public function testWhere()
    {
        $this->assertDqlWithGeneratedSql(
            'SELECT b from DoctrineBinary\Tests\Entities\BlankTest b WHERE BIT_COUNT(b.id) = 16',
            'SELECT b0_.id AS id_0, b0_.type AS type_1 FROM BlankTest b0_ WHERE BIT_COUNT(b0_.id) = 16'
        );
    }

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
