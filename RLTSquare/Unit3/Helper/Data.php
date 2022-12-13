<?php

declare(strict_types = 1);

namespace RLTSquare\Unit3\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

/**
 * class Data
 */
class Data extends AbstractHelper
{
    public const XML_PATH_USERNAME = 'unit3/settings/username';

    public const XML_PATH_PASSWORD = 'unit3/settings/password';

    public const XML_PATH_ENVIRONMENT_TYPE = 'unit3/settings/environment_type';

    /**
     * Get the username value.
     *
     * @return string
     */
    public function getUserName(): string
    {
        return (string)$this->scopeConfig->getValue(
            self::XML_PATH_USERNAME,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * Get the password value.
     *
     * @return string
     */
    public function getUserPassword(): string
    {
        return (string)$this->scopeConfig->getValue(
            self::XML_PATH_PASSWORD,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * Get the environment type value.
     *
     * @return string
     */
    public function getEnvironmentType(): string
    {
        return (string)$this->scopeConfig->getValue(
            self::XML_PATH_ENVIRONMENT_TYPE,
            ScopeInterface::SCOPE_STORE
        );
    }
}
