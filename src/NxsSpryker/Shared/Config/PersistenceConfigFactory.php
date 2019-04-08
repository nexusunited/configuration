<?php

namespace NxsSpryker\Shared\Config;

class PersistenceConfigFactory
{
    /**
     * @var array
     */
    protected static $loggers = [];

    /**
     * @var \Spryker\Shared\Log\Config\LoggerConfigInterface|null
     */
    protected static $loggerConfig = null;

    /**
     * @param \Spryker\Shared\Log\Config\LoggerConfigInterface|null $loggerConfig
     *
     * @return \Psr\Log\LoggerInterface|null
     */
    public static function getInstance(?LoggerConfigInterface $loggerConfig = null)
    {
        if ($loggerConfig === null) {
            if (!static::$loggerConfig) {
                static::$loggerConfig = static::createLoggerConfig();
            }

            $loggerConfig = static::$loggerConfig;
        }

        return static::createInstanceIfNotExists($loggerConfig);
    }

    /**
     * @param \Spryker\Shared\Log\Config\LoggerConfigInterface $loggerConfig
     *
     * @return \Psr\Log\LoggerInterface
     */
    protected static function createInstanceIfNotExists(LoggerConfigInterface $loggerConfig)
    {
        $channelName = $loggerConfig->getChannelName();

        if (!isset(static::$loggers[$channelName])) {
            $logger = new MonologLogger($channelName, $loggerConfig->getHandlers(), $loggerConfig->getProcessors());

            static::$loggers[$channelName] = $logger;
        }

        return static::$loggers[$channelName];
    }

    /**
     * @return \Spryker\Shared\Log\Config\LoggerConfigInterface
     */
    protected static function createLoggerConfig()
    {
        $loggerConfigLoader = new LoggerConfigLoader([
            static::createLoggerConfigLoaderYves(),
            static::createLoggerConfigLoaderZed(),
            static::createLoggerConfigLoaderDefault(),
        ]);

        return $loggerConfigLoader->getLoggerConfig();
    }

    /**
     * @return \Spryker\Shared\Log\LoggerConfig\LoggerConfigLoaderInterface|\Spryker\Shared\Log\LoggerConfig\LoggerConfigLoaderYves
     */
    protected static function createLoggerConfigLoaderYves()
    {
        return new LoggerConfigLoaderYves();
    }

    /**
     * @return \Spryker\Shared\Log\LoggerConfig\LoggerConfigLoaderInterface|\Spryker\Shared\Log\LoggerConfig\LoggerConfigLoaderZed
     */
    protected static function createLoggerConfigLoaderZed()
    {
        return new LoggerConfigLoaderZed();
    }

    /**
     * @return \Spryker\Shared\Log\LoggerConfig\LoggerConfigLoaderInterface|\Spryker\Shared\Log\LoggerConfig\LoggerConfigLoaderDefault
     */
    protected static function createLoggerConfigLoaderDefault()
    {
        return new LoggerConfigLoaderDefault();
    }
}
