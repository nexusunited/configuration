<?php

namespace NxsSpryker\Zed\Configuration\Persistence;

use Generated\Shared\Transfer\ConfigurationTransfer;
use Spryker\Zed\Kernel\Persistence\AbstractEntityManager;

/**
 * @method \NxsSpryker\Zed\Configuration\Persistence\ConfigurationPersistenceFactory getFactory()
 */
class ConfigurationEntityManager extends AbstractEntityManager implements ConfigurationEntityManagerInterface
{
    /**
     * @param \Generated\Shared\Transfer\ConfigurationTransfer $configurationTransfer
     *
     * @return void
     */
    public function setConfigurationValue(ConfigurationTransfer $configurationTransfer): void
    {
        $configuration = $this->getFactory()
            ->createConfigurationQuery()
            ->filterByKey($configurationTransfer->getKey())
            ->findOneOrCreate();
        $configuration->setValue($configurationTransfer->getValue());
        $configuration->save();
    }
}
