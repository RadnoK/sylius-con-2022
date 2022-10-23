<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Symfony\Application;

use App\Shared\Application\Command;
use App\Shared\Application\CommandBus;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\MessageBusInterface;
use Throwable;

final class MessengerCommandBus implements CommandBus
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
    public function execute(Command $command): void
    {
        $this->commandBusLogger->info(\sprintf('Handling command %s', $command::class));

        try {
            $this->messageBus->dispatch($command);

            $this->commandBusLogger->info(\sprintf('Command %s executed', $command::class));
        } catch (Throwable $exception) {
            $this->commandBusLogger->error(\sprintf('Command %s failed', $command::class));

            throw $exception;
        }
    }
}
