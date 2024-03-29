<?php

namespace NxsSpryker\Zed\Configuration\Business;

use Generated\Shared\Transfer\ConfigurationTransfer;

interface ConfigurationFacadeInterface
{
    /**
     * @param string $key
     *
     * @return \Generated\Shared\Transfer\ConfigurationTransfer
     */
    public function getConfiguration(string $key): ConfigurationTransfer;

    /**
     * @param \Generated\Shared\Transfer\ConfigurationTransfer $configurationTransfer
     *
     * @return void
     */
    public function setConfiguration(ConfigurationTransfer $configurationTransfer): void;
}
