<?php

namespace NxsSpryker\Zed\Configuration\Persistence;

use NxsSpryker\Zed\Configuration\Persistence\Mapper\ConfigurationMapper;
use NxsSpryker\Zed\Configuration\Persistence\Mapper\ConfigurationMapperInterface;
use Orm\Zed\Configuration\Persistence\NxsConfigurationQuery;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;

class ConfigurationPersistenceFactory extends AbstractPersistenceFactory
{
    /**
     * @return \Orm\Zed\Configuration\Persistence\NxsConfigurationQuery
     */
    public function createConfigurationQuery(): NxsConfigurationQuery
    {
        return NxsConfigurationQuery::create();
    }

    /**
     * @return \NxsSpryker\Zed\Persistence\Mapper\ConfigurationMapperInterface
     */
    public function createConfigurationMapper(): ConfigurationMapperInterface
    {
        return new ConfigurationMapper();
    }
}
