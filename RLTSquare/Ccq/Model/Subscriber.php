<?php

declare(strict_types=1);

namespace RLTSquare\Ccq\Model;

use RLTSquare\Ccq\Api\MessageInterface;
use RLTSquare\Ccq\Api\SubscriberInterface;

/**
 * class Subscriber
 */
class Subscriber implements SubscriberInterface
{
    /**
     * {@inheritdoc}
     */
    public function processMessage(MessageInterface $message)
    {
        echo 'Message received: ' . $message->getMessage() . PHP_EOL;
    }
}
