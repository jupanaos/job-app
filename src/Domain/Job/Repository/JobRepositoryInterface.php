<?php

namespace App\Domain\Job\Repository;

use Domain\Job\Model\Job;

interface JobRepositoryInterface
{
    public function save(Job $job): void;
}