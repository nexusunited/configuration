<?php

namespace NxsSpryker\Zed\Configuration\Business\Model;

use Generated\Shared\Transfer\ConfigurationTransfer;

interface ConfigurationWriterInterface
{
    /**
     * @param \Generated\Shared\Transfer\ConfigurationTransfer $configurationTransfer
     *
     * @return void
     */
    public function setConfiguration(ConfigurationTransfer $configurationTransfer): void;
}
