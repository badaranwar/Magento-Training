<?php

declare(strict_types=1);

namespace RLTSquare\Ccq\Cron;

use Psr\Log\LoggerInterface;

/**
 * class CustomCron
 */
class CustomCron
{
    /**
     * @var LoggerInterface
     */
    private LoggerInterface $logger;

    /**
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Cronjob Description
     *
     * @return void
     */
    public function execute(): void
    {
        $this->logger->info('hello world from rltsquare_hello_world cron job');
    }
}
