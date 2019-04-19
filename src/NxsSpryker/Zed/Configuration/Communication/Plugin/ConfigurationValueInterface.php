<?php

namespace NxsSpryker\Zed\Configuration\Communication\Plugin;

interface ConfigurationValueInterface
{
    /**
     * @return string
     */
    public function getKey(): string;

    /**
     * @return mixed
     */
    public function getDefaultValue();

    /**
     * @return bool
     */
    public function isNullable(): bool;

    /**
     * @return bool
     */
    public function isSerializable(): bool;
}
