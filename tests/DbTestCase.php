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
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Cache\Adapter\ArrayAdapter;

/**
 * Common test case class for testing database.
 *
 * @author Jury Sosnovsky <github@sosnoffsky.com>
 */
class DbTestCase extends TestCase
{
    /**
     * Configuration type, defined in child classes.
     */
    public const CONFIG_TYPE = null;

    /**
     * Entity manager of Doctrine fot testing.
     *
     * @var EntityManager
     */
    public $entityManager;

    /**
     * Configuration.
     *
     * @var Configuration
     */
    protected $configuration;

    /**
     * {@inheritDoc}
     */
    public function setUp(): void
    {
        $this->configuration = new Configuration();

        $queryCache = new ArrayAdapter();
        $metadataCache = new ArrayAdapter();

        $this->configuration->setMetadataCache($metadataCache);
        $driverImpl = ORMSetup::createDefaultAnnotationDriver([__DIR__.'/Entities']);
        $this->configuration->setMetadataDriverImpl($driverImpl);
        $this->configuration->setQueryCache($queryCache);
        $this->configuration->setProxyDir(__DIR__.'/Proxies');
        $this->configuration->setProxyNamespace('DoctrineBinary\Tests\Proxies');

        $this->configuration->setAutoGenerateProxyClasses(true);

        $configurationLoader = new ConfigurationLoader($this->configuration);
        $configurationLoader->load(static::CONFIG_TYPE);

        $connectionOptions = [
            'driver' => 'pdo_sqlite',
            'memory' => true,
        ];

        $this->entityManager = EntityManager::create($connectionOptions, $this->configuration);
    }

    /**
     * Asstert DQL query with expected SQL query.
     *
     * @param string $dql    DQL query
     * @param string $sql    Expected SQL result
     * @param array  $params Addition parameters
     *
     * @return void
     */
    public function assertDqlWithGeneratedSql(string $dql, string $sql, array $params = [])
    {
        $query = $this->entityManager->createQuery($dql);

        foreach ($params as $key => $value) {
            $query->setParameter($key, $value);
        }

        $generatedSql = $query->getSql();

        $this->assertEquals($sql, $generatedSql);
    }
}
