<?php

namespace NxsSpryker\Zed\Configuration\Business\Model;

use Generated\Shared\Transfer\ConfigurationTransfer;

interface ConfigurationReaderInterface
{
    /**
     * @param string $key
     *
     * @return \Generated\Shared\Transfer\ConfigurationTransfer
     */
    public function getConfiguration(string $key): ConfigurationTransfer;
}
