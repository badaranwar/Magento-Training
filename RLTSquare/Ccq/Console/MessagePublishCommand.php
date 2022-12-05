<?php

declare(strict_types=1);

namespace RLTSquare\Ccq\Console;

use Exception;
use Magento\Framework\MessageQueue\PublisherInterface;
use Psr\Log\LoggerInterface;
use RLTSquare\Ccq\Api\MessageInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * class MessagePublishCommand
 */
class MessagePublishCommand extends Command
{
    const COMMAND_QUEUE_MESSAGE_PUBLISH = 'rltsquare:hello:world';
    const MESSAGE_ARGUMENT = 'message';
    const TOPIC_ARGUMENT = 'topic';

    /**
     * @var PublisherInterface
     */
    protected PublisherInterface $publisher;

    /**
     * @var string
     */
    protected $message;

    /**
     * @var LoggerInterface
     */
    private LoggerInterface $logger;

    /**
     * @param PublisherInterface $publisher
     * @param MessageInterface $message
     * @param LoggerInterface $logger
     * @param $name
     */
    public function __construct(
        PublisherInterface $publisher,
        MessageInterface   $message,
        LoggerInterface    $logger,
        $name = null
    ) {
        $this->publisher = $publisher;
        $this->message = $message;
        $this->logger = $logger;
        parent::__construct($name);
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $message = $input->getArgument(self::MESSAGE_ARGUMENT);
        $topic = $input->getArgument(self::TOPIC_ARGUMENT);

        try {
            $this->message->setMessage($message);
            $this->publisher->publish($topic, $this->message);
            $output->writeln(sprintf('Published message "%s" to topic "%s"', $message, $topic));
            $this->logger->info('hello world from rltsquare_hello_world queue job ' . $message . ' ' . $topic);
        } catch (Exception $e) {
            $output->writeln($e->getMessage());
        }
    }

    /**
     * {@inheritdoc}
     * Configuring custom command to publish a message for a topic
     */
    protected function configure()
    {
        $this->setName(self::COMMAND_QUEUE_MESSAGE_PUBLISH);
        $this->setDescription('Publish a message to a topic');
        $this->setDefinition([
            new InputArgument(
                self::MESSAGE_ARGUMENT,
                InputArgument::REQUIRED,
                'Message'
            ),
            new InputArgument(
                self::TOPIC_ARGUMENT,
                InputArgument::REQUIRED,
                'Topic'
            ),
        ]);
        parent::configure();
    }
}
