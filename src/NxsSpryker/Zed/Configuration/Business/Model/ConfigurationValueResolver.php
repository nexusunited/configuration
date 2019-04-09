<?php

namespace NxsSpryker\Zed\Configuration\Business\Model;

use NxsSpryker\Zed\Configuration\Business\Exception\ConfigurationValueException;
use NxsSpryker\Zed\Configuration\Communication\Plugin\ConfigurationValueInterface;

class ConfigurationValueResolver implements ConfigurationValueResolverInterface
{
    /**
     * @var \NxsSpryker\Zed\Configuration\Communication\Plugin\ConfigurationValueInterface[]
     */
    private $configurationValues;

    /**
     * @param \NxsSpryker\Zed\Configuration\Communication\Plugin\ConfigurationValueInterface[] $configurationValues
     */
    public function __construct(array $configurationValues)
    {
        $this->configurationValues = $configurationValues;
    }

    /**
     * @param string $key
     *
     * @throws \NxsSpryker\Zed\Configuration\Business\Exception\ConfigurationValueException
     *
     * @return \NxsSpryker\Zed\Configuration\Communication\Plugin\ConfigurationValueInterface
     */
    public function resolveConfigurationValue(string $key): ConfigurationValueInterface
    {
        foreach ($this->configurationValues as $configurationValue) {
            if ($configurationValue->getKey() === $key) {
                return $configurationValue;
            }
        }

        throw new ConfigurationValueException(
            \sprintf(
                'Configuration with key "%s" is not found',
                $key
            )
        );
    }
}
