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

/**
 * Loading configuration by database type.
 *
 * @author Jury Sosnovsky <github@sosnoffsky.com>
 */
class ConfigurationLoader
{
    /**
     * Common operators.
     */
    public const COMMON = 'common';

    /**
     * MySQL functions.
     */
    public const MYSQL = 'mysql';

    /**
     * Oracle functions.
     */
    public const ORACLE = 'oracle';

    /**
     * PostgreSQL functions.
     */
    public const POSTGRES = 'postgres';

    /**
     * Doctrine configuration for test.
     *
     * @var Configuration
     */
    private $configuration;

    /**
     * Class constructor.
     *
     * @param Configuration $configuration Loaded configuration
     */
    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * Load configuration by type.
     *
     * @param string $configurationType Configuration type, check in class constants
     *
     * @return void
     */
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
