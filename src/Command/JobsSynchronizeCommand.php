<?php

namespace App\Command;

use App\Infrastructure\JobETL;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:jobs:sync',
    description: 'Synchronize jobs from the API in database'
)]
final class JobsSynchronizeCommand extends Command
{
    public function __construct(
        private JobETL $etl,
    )
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->etl->run();

        return Command::SUCCESS;
    }
}