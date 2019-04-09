<?php

namespace NxsSpryker\Client\Configuration\Zed;

use Generated\Shared\Transfer\ConfigurationTransfer;
use Spryker\Client\ZedRequest\Stub\ZedRequestStub;

class ConfigurationStub extends ZedRequestStub implements ConfigurationStubInterface
{
    /**
     * @param \Generated\Shared\Transfer\ConfigurationTransfer $configurationTransfer
     *
     * @return \Generated\Shared\Transfer\ConfigurationTransfer|\Spryker\Shared\Kernel\Transfer\TransferInterface
     */
    public function getConfiguration(ConfigurationTransfer $configurationTransfer): ConfigurationTransfer
    {
        return $this->zedStub->call(
            '/configuration/gateway/get-configuration',
            $configurationTransfer
        );
    }
}
