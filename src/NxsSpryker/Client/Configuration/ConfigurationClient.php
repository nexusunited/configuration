<?php

namespace NxsSpryker\Client\Configuration;

use Generated\Shared\Transfer\ConfigurationTransfer;
use NxsSpryker\Client\Configuration\Zed\ConfigurationStubInterface;
use Spryker\Client\Kernel\AbstractClient;

/**
 * @method \NxsSpryker\Client\Configuration\ConfigurationFactory getFactory()
 */
class ConfigurationClient extends AbstractClient implements ConfigurationClientInterface
{
    /**
     * @api
     *
     * @param \Generated\Shared\Transfer\ConfigurationTransfer $configurationTransfer
     *
     * @return \Generated\Shared\Transfer\ConfigurationTransfer|\Spryker\Shared\Kernel\Transfer\TransferInterface
     */
    public function getConfiguration(ConfigurationTransfer $configurationTransfer): ConfigurationTransfer
    {
        return $this->getZedStub()->getConfiguration($configurationTransfer);
    }

    /**
     * @return \NxsSpryker\Client\Configuration\Zed\ConfigurationStubInterface
     */
    protected function getZedStub(): ConfigurationStubInterface
    {
        return $this->getFactory()->createZedStub();
    }
}
