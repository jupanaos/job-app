<?php

namespace App\Infrastructure\Job\Processor;

use Domain\Job\Model\Job;

final class JobProcessor implements JobProcessorInterface
{
    public function process(array $data): Job
    {
        return Job::create(
            reference: $data['id'],
            title: $data['intitule'] ?? '',
            description: $data['description'] ?? '',
            contract: $data['typeContrat'] ?? '',
            url: $data['contact']['urlPostulation'] ?? null
        );
    }

    public function processAll(array $datas): array
    {
        $jobs = [];
        foreach ($datas['resultats'] as $data) {
            if (!isset($data['id'])) {
                continue;
            }

            $jobs[] = $this->process($data);
        }

        return $jobs;
    }
}