<?php

namespace NxsSpryker\Zed\Configuration\Business;

use NxsSpryker\Zed\Configuration\Business\Model\ConfigurationReader;
use NxsSpryker\Zed\Configuration\Business\Model\ConfigurationReaderInterface;
use NxsSpryker\Zed\Configuration\Business\Model\ConfigurationValueResolver;
use NxsSpryker\Zed\Configuration\Business\Model\ConfigurationValueResolverInterface;
use NxsSpryker\Zed\Configuration\Business\Model\ConfigurationWriter;
use NxsSpryker\Zed\Configuration\Business\Model\ConfigurationWriterInterface;
use NxsSpryker\Zed\Configuration\ConfigurationDependencyProvider;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \NxsSpryker\Zed\Configuration\Persistence\ConfigurationRepository getRepository()
 * @method \NxsSpryker\Zed\Configuration\Persistence\ConfigurationEntityManager getEntityManager()
 */
class ConfigurationBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \NxsSpryker\Zed\Configuration\Business\Model\ConfigurationReaderInterface
     */
    public function createConfigurationReader(): ConfigurationReaderInterface
    {
        return new ConfigurationReader($this->getRepository(), $this->createConfigurationValueResolver());
    }

    /**
     * @return \NxsSpryker\Zed\Configuration\Business\Model\ConfigurationWriterInterface
     */
    public function createConfigurationWriter(): ConfigurationWriterInterface
    {
        return new ConfigurationWriter($this->getEntityManager(), $this->createConfigurationValueResolver());
    }

    /**
     * @return \NxsSpryker\Zed\Configuration\Business\Model\ConfigurationValueResolverInterface
     */
    protected function createConfigurationValueResolver(): ConfigurationValueResolverInterface
    {
        return new ConfigurationValueResolver($this->getConfigurationValues());
    }

    /**
     * @return \NxsSpryker\Zed\Configuration\Communication\Plugin\ConfigurationValueInterface[]
     */
    private function getConfigurationValues(): array
    {
        return $this->getProvidedDependency(ConfigurationDependencyProvider::CONFIGURATION_VALUES);
    }
}
