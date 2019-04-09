<?php

namespace NxsSpryker\Zed\Configuration\Business\Model;

use Generated\Shared\Transfer\ConfigurationTransfer;
use NxsSpryker\Zed\Configuration\Persistence\ConfigurationEntityManagerInterface;

class ConfigurationWriter implements ConfigurationWriterInterface
{
    /**
     * @var \NxsSpryker\Zed\Configuration\Persistence\ConfigurationEntityManagerInterface
     */
    private $entityManager;

    /**
     * @var \NxsSpryker\Zed\Configuration\Business\Model\ConfigurationValueResolverInterface
     */
    private $configurationValueResolver;

    /**
     * @param \NxsSpryker\Zed\Configuration\Persistence\ConfigurationEntityManagerInterface $entityManager
     * @param \NxsSpryker\Zed\Configuration\Business\Model\ConfigurationValueResolverInterface $configurationValueResolver
     */
    public function __construct(
        ConfigurationEntityManagerInterface $entityManager,
        ConfigurationValueResolverInterface $configurationValueResolver
    ) {
        $this->entityManager = $entityManager;
        $this->configurationValueResolver = $configurationValueResolver;
    }

    /**
     * @param \Generated\Shared\Transfer\ConfigurationTransfer $configurationTransfer
     *
     * @return void
     */
    public function setConfiguration(ConfigurationTransfer $configurationTransfer): void
    {
        $configurationValue = $this->configurationValueResolver->resolveConfigurationValue($configurationTransfer->getKey());
        if (!$configurationTransfer->getValue() && $configurationValue->isNullable() === false) {
            $configurationTransfer->setValue($configurationValue->getDefaultValue());
        }
        $this->entityManager->setConfigurationValue($configurationTransfer);
    }
}
