<?php

declare(strict_types=1);

namespace App\Offer\UserInterface\Worker\Command;

use App\Offer\Application\Command\SynchronizeProductsCommand;
use App\Offer\UserInterface\Worker\Message\ProductCreatedMessage;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Messenger\MessageBusInterface;

final class SynchronizeErgonodeProductsCommand extends Command
{
    private SymfonyStyle $io;

    private const NAME = 'app:offer:synchronize-ergonode';
    private const SOURCE = 'ergonode';

    public function __construct(
        private MessageBusInterface $messageBus
    ) {
        parent::__construct(self::NAME);
    }

    protected function initialize(InputInterface $input, OutputInterface $output): void
    {
        $this->io = new SymfonyStyle($input, $output);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->messageBus->dispatch(new SynchronizeProductsCommand(Uuid::uuid4(), self::SOURCE));

        $this->io->success('Synchronization requested!');

        return Command::SUCCESS;
    }
}
