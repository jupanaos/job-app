<?php

namespace App\Infrastructure\Job\Processor;

use Domain\Job\Model\Job;

interface JobProcessorInterface
{
    public function process(array $datas): Job;
}