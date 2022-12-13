<?php

declare(strict_types=1);

namespace RLTSquare\Unit3\Block;

use Magento\Framework\Encryption\EncryptorInterface;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use RLTSquare\Unit3\Helper\Data;

/**
 * class Unit 3
 */
class Unit3 extends Template
{
    /**
     * @var Data
     */
    private Data $helper;

    /**
     * @var EncryptorInterface
     */
    private EncryptorInterface $encryptor;

    /**
     * @param Context $context
     * @param Data $helper
     * @param EncryptorInterface $encryptor
     */
    public function __construct(
        Context            $context,
        Data               $helper,
        EncryptorInterface $encryptor,
    ) {
        $this->helper = $helper;
        $this->encryptor = $encryptor;
        parent::__construct($context);
    }

    /**
     * @return string
     * Get username from system configurations
     */
    public function getUserName(): string
    {
        return $this->helper->getUserName();
    }

    /**
     * @return string
     * Get user decrypted password from system configurations
     */
    public function getUserPassword(): string
    {
        $password = $this->helper->getUserPassword();
        return $this->encryptor->decrypt($password);
    }

    /**
     * @return string
     * Get environment type from system configurations
     */
    public function getEnvironmentType(): string
    {
        return $this->helper->getEnvironmentType();
    }
}
