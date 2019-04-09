<?php

namespace NxsSpryker\Zed\Configuration\Persistence;

use Generated\Shared\Transfer\ConfigurationTransfer;

interface ConfigurationRepositoryInterface
{
    /**
     * @param string $key
     *
     * @return \Generated\Shared\Transfer\ConfigurationTransfer
     */
    public function getConfiguration(string $key): ConfigurationTransfer;
}
