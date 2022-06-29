<?php

/*
 * This file is part of the DoctrineBinary package.
 *
 * (c) Jury Sosnovsky <github@sosnoffsky.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DoctrineBinary\Tests\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class BlankTest
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="string")
     * @ORM\GeneratedValue
     */
    public $id;

    /**
     * @ORM\Column(type="string")
     */
    public $type;
}
