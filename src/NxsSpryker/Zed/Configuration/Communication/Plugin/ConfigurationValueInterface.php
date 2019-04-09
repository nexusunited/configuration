<?php

namespace NxsSpryker\Zed\Configuration\Communication\Plugin;

interface ConfigurationValueInterface
{
    /**
     * @return string
     */
    public function getKey(): string;

    /**
     * @return string
     */
    public function getDefaultValue(): string;

    /**
     * @return bool
     */
    public function isNullable(): bool;
}
