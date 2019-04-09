<?php

namespace NxsSpryker\Client\Configuration;

use NxsSpryker\Client\Configuration\Zed\ConfigurationStub;
use NxsSpryker\Client\Configuration\Zed\ConfigurationStubInterface;
use Spryker\Client\Kernel\AbstractFactory;

class ConfigurationFactory extends AbstractFactory
{
    /**
     * @return \NxsSpryker\Client\Configuration\Zed\ConfigurationStubInterface
     */
    public function createZedStub(): ConfigurationStubInterface
    {
        return new ConfigurationStub($this->getZedRequestClient());
    }

    /**
     * @return \Spryker\Client\ZedRequest\ZedRequestClientInterface
     */
    protected function getZedRequestClient()
    {
        return $this->getProvidedDependency(ConfigurationDependencyProvider::CLIENT_ZED_REQUEST);
    }
}
