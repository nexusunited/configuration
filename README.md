# NxsSpryker/Configuration #

Module is used to define configurations that are persisted into database.
Additionally PersistenceConfigruationTrait is provided to read the configuration in Zed and Client for Yves.

### Installation ###

```
composer require nxsspryker/configuration
```

To ***register configuration values*** override ConfigurationDependencyProvider:

```php
<?php

namespace Pyz\Zed\Configuration;

use NxsSpryker\Zed\Configuration\ConfigurationDependencyProvider as NxsConfigurationDependencyProvider;

class ConfigurationDependencyProvider extends NxsConfigurationDependencyProvider
{
    /**
     * @return \NxsSpryker\Zed\Configuration\Communication\Plugin\ConfigurationValueInterface[]
     */
    protected function getConfigurationValues(): array
    {
        return [
            // Your configuration value plugins go here
        ];
    }
}

```

### Usage ###

To ***create configuration value*** create a class implementing NxsSpryker\Zed\Configuration\Communication\Plugin\ConfigurationValueInterface
and register it in ConfigurationDependencyProvider. Example:

```php
<?php

namespace Pyz\Zed\Example\Communication\Plugin;

use NxsSpryker\Zed\Configuration\Communication\Plugin\ConfigurationValueInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

class DeliveryTimeFrameDelayDeviationConfigurationValue extends AbstractPlugin implements ConfigurationValueInterface
{
    /**
     * @return string
     */
    public function getKey(): string
    {
        return 'Some unique configuration value key as identifier';
    }

    /**
     * @return string
     */
    public function getDefaultValue(): string
    {
        return 'If no value is found this value will be returned';
    }

    /**
     * @return bool
     */
    public function isNullable(): bool
    {
        // If is nullable = false, null can be persisted
        // If is nullable = true, default value is returned on null
        return false;
    }
}

```

To ***get configuration value in Zed*** use PersistenceConfigurationTrait. Example:
```php
<?php

namespace Pyz\Zed\Example;

use NxsSpryker\Zed\Configuration\PersistenceConfigurationTrait;
use Spryker\Zed\Kernel\AbstractBundleConfig;

class ExampleConfig extends AbstractBundleConfig
{
    use PersistenceConfigurationTrait;

    /**
     * @return string|null
     */
    public function getExampleConfigurationValue(): ?string
    {
        return $this->getFromPersistence('Some unique configuration value key as identifier');
    }
}

```

To ***get configuration value in Zed*** use NxsSpryker\Client\Configuration\ConfigurationClient. Example:
```php
<?php

namespace Pyz\Yves\Example\Plugin;

use Generated\Shared\Transfer\ConfigurationTransfer;
use NxsSpryker\Client\Configuration\ConfigurationClient;
use Spryker\Yves\Kernel\AbstractPlugin;

/**
 * @method \Pyz\Yves\Example\ExampleFactory getFactory()
 */
class EmailChannelSubFormPlugin extends AbstractPlugin
{
    /**
     * @return string|null
     */
    public function getExampleConfigurationValue(): ?string
    {
        $configurationTransfer = new ConfigurationTransfer();
        $configurationTransfer->setKey('Some unique configuration value key as identifier');
        $configurationTransfer = $this->getConfigurationClient()->getConfiguration($configurationTransfer);
        
        return $configurationTransfer->getValue();
    }
    
    /**
    * @return \NxsSpryker\Client\Configuration\ConfigurationClient
    */
    private function getConfigurationClient(): ConfigurationClient
    {
        return $this->getFactory()->getConfigurationClient();
    }
}


```

To ***set configuration value*** use ConfigurationFacade. Example:
```php
<?php

namespace Pyz\Zed\Example\Business\Model;

use Generated\Shared\Transfer\ConfigurationTransfer;
use NxsSpryker\Zed\Configuration\Business\ConfigurationFacadeInterface;

class ExampleConfigurationHandler
{
    /**
     * @var \NxsSpryker\Zed\Configuration\Business\ConfigurationFacadeInterface
     */
    private $configurationFacade;

    /**
     * @param \NxsSpryker\Zed\Configuration\Business\ConfigurationFacadeInterface $configurationFacade
     */
    public function __construct(ConfigurationFacadeInterface $configurationFacade)
    {
        $this->configurationFacade = $configurationFacade;
    }

    /**
     * @return string|null
     */
    public function getSomeValue(): ?string
    {
        $config = $this->configurationFacade->getConfiguration('somevalue');

        return $config->getValue();
    }
    
    /**
     * @param string $someValue
     *
     * @return void
     */
    public function setSomeValue(string $someValue): void
    {
        $configurationTransfer = (new ConfigurationTransfer())
            ->setKey('somevalue')
            ->setValue($someValue);
        $this->configurationFacade->setConfiguration($configurationTransfer);
    }
}

```
