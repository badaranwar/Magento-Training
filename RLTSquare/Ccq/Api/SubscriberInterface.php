<?php

declare(strict_types=1);

namespace RLTSquare\Ccq\Api;

/**
 * class SubscriberInterface
 */
interface SubscriberInterface
{
    /**
     * @return void
     */
    public function processMessage(MessageInterface $message);
}
