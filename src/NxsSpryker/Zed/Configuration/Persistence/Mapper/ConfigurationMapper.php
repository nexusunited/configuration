<?php

namespace NxsSpryker\Zed\Configuration\Persistence\Mapper;

use Generated\Shared\Transfer\ConfigurationTransfer;
use Orm\Zed\Configuration\Persistence\NxsConfiguration;

class ConfigurationMapper implements ConfigurationMapperInterface
{
    /**
     * @param \Orm\Zed\Configuration\Persistence\NxsConfiguration|null $configuration
     *
     * @return \Generated\Shared\Transfer\ConfigurationTransfer
     */
    public function mapToTransfer(?NxsConfiguration $configuration): ConfigurationTransfer
    {
        $configurationTransfer = new ConfigurationTransfer();
        if (!$configuration) {
            return $configurationTransfer;
        }
        $configurationTransfer->fromArray($configuration->toArray(), true);

        return $configurationTransfer;
    }
}
