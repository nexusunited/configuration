<?php

namespace NxsSpryker\Zed\Configuration\Communication\Controller;

use Generated\Shared\Transfer\ConfigurationTransfer;
use Spryker\Zed\Customer\Communication\Controller\GatewayController as SprykerGatewayController;

/**
 * @method \NxsSpryker\Zed\Configuration\Business\ConfigurationFacade getFacade()
 */
class GatewayController extends SprykerGatewayController
{
    /**
     * @param \Generated\Shared\Transfer\ConfigurationTransfer $configurationTransfer
     *
     * @return \Generated\Shared\Transfer\ConfigurationTransfer
     */
    public function getConfigurationAction(ConfigurationTransfer $configurationTransfer): ConfigurationTransfer
    {
        return $this->getFacade()->getConfiguration($configurationTransfer->getKey());
    }
}
