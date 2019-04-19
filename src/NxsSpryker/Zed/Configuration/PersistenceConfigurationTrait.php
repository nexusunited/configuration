<?php

namespace NxsSpryker\Zed\Configuration;

use Spryker\Zed\Kernel\Business\FacadeLocator;

trait PersistenceConfigurationTrait
{
    private static $bundle = 'Configuration';

    /**
     * @param string $key
     *
     * @return string|array|mixed
     */
    protected function getFromPersistence(string $key)
    {
        return $this->getConfigurationFacade()->getConfiguration($key)->getValue();
    }

    /**
     * @return \Spryker\Zed\Kernel\Business\AbstractFacade|\NxsSpryker\Zed\Configuration\Business\ConfigurationFacadeInterface
     */
    private function getConfigurationFacade()
    {
        return $this->getFacadeLocator()->locate(static::$bundle);
    }

    /**
     * @return \Spryker\Zed\Kernel\Business\FacadeLocator
     */
    private function getFacadeLocator(): FacadeLocator
    {
        return new FacadeLocator();
    }
}
