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

use Doctrine\ORM\Configuration;
use Symfony\Component\Yaml\Parser;

class ConfigurationLoader
{
    public const COMMON = 'common';

    public const MYSQL = 'mysql';

    public const ORACLE = 'oracle';

    public const POSTGRES = 'postgres';

    public const SQLITE = 'sqlite';

    /**
     * @var Configuration
     */
    private $configuration;

    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
    }

    public function load(string $configurationType)
    {
        $parser = new Parser();

        $configurationValues = $parser->parse(file_get_contents(realpath(__DIR__.'/../config/'.$configurationType.'.yml')));
        $availavleFunctions = $configurationValues['doctrine']['orm']['dql'];

        foreach ($availavleFunctions['numeric_functions'] as $key => $value) {
            $this->configuration->addCustomNumericFunction($key, $value);
        }
    }
}
