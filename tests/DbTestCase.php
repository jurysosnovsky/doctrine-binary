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

class DbTestCase extends TestCase
{
    public const CONFIG_TYPE = null;

    /**
     * @var EntityManager
     */
    public $entityManager;

    /**
     * @var Configuration
     */
    protected $configuration;

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

    public function assertDqlWithGeneratedSql($dql, $sql, $params = [])
    {
        $query = $this->entityManager->createQuery($dql);

        foreach ($params as $key => $value) {
            $query->setParameter($key, $value);
        }

        $generatedSql = $query->getSql();

        $this->assertEquals($sql, $generatedSql);
    }

    protected function loadConfig(string $configurationBame)
    {
        $loader = new ConfigurationLoader($this->configuration);
        $loader->load($configurationBame);
    }
}
