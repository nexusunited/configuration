<?php

namespace NxsSpryker\Zed\Configuration\Persistence;

use Generated\Shared\Transfer\ConfigurationTransfer;
use Spryker\Zed\Kernel\Persistence\AbstractRepository;

/**
 * @method \NxsSpryker\Zed\Configuration\Persistence\ConfigurationPersistenceFactory getFactory()
 */
class ConfigurationRepository extends AbstractRepository implements ConfigurationRepositoryInterface
{
    /**
     * @param string $key
     *
     * @return \Generated\Shared\Transfer\ConfigurationTransfer
     */
    public function getConfiguration(string $key): ConfigurationTransfer
    {
        $configuration = $this->getFactory()
            ->createConfigurationQuery()
            ->filterByKey($key)
            ->findOne();

        return $this->getFactory()
            ->createConfigurationMapper()
            ->mapToTransfer($configuration)
            ->setKey($key);
    }
}
