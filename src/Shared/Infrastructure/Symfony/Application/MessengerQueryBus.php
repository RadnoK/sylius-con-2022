<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Symfony\Application;

use App\Shared\Application\Query;
use App\Shared\Application\QueryBus;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;
use Throwable;

final class MessengerQueryBus implements QueryBus
{
    use HandleTrait;

    public function __construct(
        private LoggerInterface $queryBusLogger,
        MessageBusInterface $messageBus,
    ) {
        $this->messageBus = $messageBus;
    }

    /**
     * @throws Throwable
     */
    public function query(Query $query): mixed
    {
        $this->queryBusLogger->info(\sprintf('Handling query %s', $query::class));

        try {
            $result = $this->handle($query);

            $this->queryBusLogger->info(\sprintf('Query %s executed', $query::class));

            return $result;
        } catch (Throwable $exception) {
            $this->queryBusLogger->error(\sprintf('Query %s failed', $query::class));

            throw $exception;
        }
    }
}
