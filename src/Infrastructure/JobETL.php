<?php

namespace App\Infrastructure;

use App\Infrastructure\Job\Connector\JobApiConnector;
use App\Infrastructure\Job\Processor\JobProcessor;
use App\Infrastructure\Job\Repository\JobRepositoryInterface;

final class JobETL
{
    public function __construct(
        private JobApiConnector $connector,
        private JobRepositoryInterface $repository,
        private JobProcessor $processor
    ){
    }

    public function run(): void
    {
        $apiJobs = $this->connector->getJobs();
        $jobs = $this->processor->processAll($apiJobs);

        foreach ($jobs as $job) {
            $this->repository->save($job);
        }

    }
}