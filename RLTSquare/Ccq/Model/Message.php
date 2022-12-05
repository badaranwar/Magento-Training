<?php

declare(strict_types=1);

namespace RLTSquare\Ccq\Model;

use RLTSquare\Ccq\Api\MessageInterface;

/**
 * class Message
 */
class Message implements MessageInterface
{
    /**
     * @var string
     */
    protected $message;

    /**
     * {@inheritdoc}
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * {@inheritdoc}
     */
    public function setMessage($message)
    {
        return $this->message = $message;
    }
}
