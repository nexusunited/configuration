<?php

namespace NxsSpryker\Zed\Configuration\Business\Model;

use Generated\Shared\Transfer\ConfigurationTransfer;
use NxsSpryker\Zed\Configuration\Persistence\ConfigurationRepositoryInterface;

class ConfigurationReader implements ConfigurationReaderInterface
{
    /**
     * @var \NxsSpryker\Zed\Configuration\Persistence\ConfigurationRepositoryInterface
     */
    private $repository;

    /**
     * @var \NxsSpryker\Zed\Configuration\Business\Model\ConfigurationValueResolverInterface
     */
    private $configurationValueResolver;

    /**
     * @param \NxsSpryker\Zed\Configuration\Persistence\ConfigurationRepositoryInterface $repository
     * @param \NxsSpryker\Zed\Configuration\Business\Model\ConfigurationValueResolverInterface $configurationValueResolver
     */
    public function __construct(
        ConfigurationRepositoryInterface $repository,
        ConfigurationValueResolverInterface $configurationValueResolver
    ) {
        $this->repository = $repository;
        $this->configurationValueResolver = $configurationValueResolver;
    }

    /**
     * @param string $key
     *
     * @return \Generated\Shared\Transfer\ConfigurationTransfer
     */
    public function getConfiguration(string $key): ConfigurationTransfer
    {
        $configurationValue = $this->configurationValueResolver->resolveConfigurationValue($key);
        $configurationTransfer = $this->repository->getConfiguration($key);
        if ($configurationTransfer->getValue() === null) {
            $configurationTransfer->setValue($configurationValue->getDefaultValue());
        }

        return $configurationTransfer;
    }
}
