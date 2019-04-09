<?php

namespace NxsSpryker\Zed\Configuration\Business;

use Generated\Shared\Transfer\ConfigurationTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \NxsSpryker\Zed\Configuration\Business\ConfigurationBusinessFactory getFactory()
 */
class ConfigurationFacade extends AbstractFacade implements ConfigurationFacadeInterface
{
    /**
     * @param string $key
     *
     * @return \Generated\Shared\Transfer\ConfigurationTransfer
     */
    public function getConfiguration(string $key): ConfigurationTransfer
    {
        return $this->getFactory()->createConfigurationReader()->getConfiguration($key);
    }

    /**
     * @param \Generated\Shared\Transfer\ConfigurationTransfer $configurationTransfer
     *
     * @return void
     */
    public function setConfiguration(ConfigurationTransfer $configurationTransfer): void
    {
        $this->getFactory()->createConfigurationWriter()->setConfiguration($configurationTransfer);
    }
}
