<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Symfony\Application;

use App\Shared\Application\Event;
use App\Shared\Application\EventBus;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\MessageBusInterface;
use Throwable;

final class MessengerEventBus implements EventBus
{
    public function __construct(
        private LoggerInterface $commandBusLogger,
        private MessageBusInterface $messageBus,
    ) { }

    /**
     * We can put here some custom logic in case of failing the execution or simple logging
     *
     * @throws Throwable
     */
    public function record(Event $event): void
    {
        $this->commandBusLogger->info(\sprintf('Handling event %s', $event::class));

        try {
            $this->messageBus->dispatch($event);

            $this->commandBusLogger->info(\sprintf('Event %s executed', $event::class));
        } catch (Throwable $exception) {
            $this->commandBusLogger->error(\sprintf('Event %s failed', $event::class));

            throw $exception;
        }
    }
}
