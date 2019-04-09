<?php

namespace NxsSpryker\Shared\Config;

use Spryker\Zed\Kernel\Business\FacadeLocator;

trait PersistenceConfigTrait
{
    private static $bundle = 'Configuration';

    /**
     * @param string $key
     *
     * @return string|null
     */
    protected function getFromPersistence(string $key): ?string
    {
        return $this->getConfigurationFacade()->getConfiguration($key)->getValue();
    }

    /**
     * @return \Spryker\Zed\Kernel\Business\AbstractFacade|\NxsSpryker\Zed\Configuration\Business\ConfigurationFacadeInterface
     */
    private function getConfigurationFacade()
    {
        return $this->getFacadeLocator()->locate(PersistenceConfigTrait::$bundle);
    }

    /**
     * @return \Spryker\Zed\Kernel\Business\FacadeLocator
     */
    private function getFacadeLocator(): FacadeLocator
    {
        return new FacadeLocator();
    }
}
