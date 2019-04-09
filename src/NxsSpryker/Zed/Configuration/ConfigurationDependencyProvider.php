<?php

namespace NxsSpryker\Zed\Configuration;

use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class ConfigurationDependencyProvider extends AbstractBundleDependencyProvider
{
    public const CONFIGURATION_VALUES = 'CONFIGURATION_VALUES';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container[self::CONFIGURATION_VALUES] = function () {
            return $this->getConfigurationValues();
        };

        return $container;
    }

    /**
     * @return \NxsSpryker\Zed\Configuration\Communication\Plugin\ConfigurationValueInterface[]
     */
    protected function getConfigurationValues(): array
    {
        return [];
    }
}
