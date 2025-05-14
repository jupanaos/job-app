<?php

namespace App\Infrastructure\Job\Repository;

use Domain\Job\Model\Job;

interface JobRepositoryInterface
{
    public function save(Job $job): void;
}