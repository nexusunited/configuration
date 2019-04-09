<?php

namespace NxsSpryker\Zed\Configuration\Business\Model;

use NxsSpryker\Zed\Configuration\Communication\Plugin\ConfigurationValueInterface;

interface ConfigurationValueResolverInterface
{
    /**
     * @param string $key
     *
     * @throws \NxsSpryker\Zed\Configuration\Business\Exception\ConfigurationValueException
     *
     * @return \NxsSpryker\Zed\Configuration\Communication\Plugin\ConfigurationValueInterface
     */
    public function resolveConfigurationValue(string $key): ConfigurationValueInterface;
}
