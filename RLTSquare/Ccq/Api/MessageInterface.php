<?php

declare(strict_types=1);

namespace RLTSquare\Ccq\Api;

/**
 * class MessageInterface
 */
interface MessageInterface
{
    /**
     * @param string $message
     * @return void
     */
    public function setMessage($message);

    /**
     * @return string
     */
    public function getMessage();
}
