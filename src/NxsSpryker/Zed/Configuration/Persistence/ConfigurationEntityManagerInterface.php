<?php

namespace NxsSpryker\Zed\Configuration\Persistence;

use Generated\Shared\Transfer\ConfigurationTransfer;

interface ConfigurationEntityManagerInterface
{
    /**
     * @param \Generated\Shared\Transfer\ConfigurationTransfer $configurationTransfer
     *
     * @return void
     */
    public function setConfigurationValue(ConfigurationTransfer $configurationTransfer): void;
}
