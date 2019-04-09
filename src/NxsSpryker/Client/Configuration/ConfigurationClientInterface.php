<?php

namespace NxsSpryker\Client\Configuration;

use Generated\Shared\Transfer\ConfigurationTransfer;

interface ConfigurationClientInterface
{
    /**
     * @api
     *
     * @param \Generated\Shared\Transfer\ConfigurationTransfer $configurationTransfer
     *
     * @return \Generated\Shared\Transfer\ConfigurationTransfer|\Spryker\Shared\Kernel\Transfer\TransferInterface
     */
    public function getConfiguration(ConfigurationTransfer $configurationTransfer): ConfigurationTransfer;
}
