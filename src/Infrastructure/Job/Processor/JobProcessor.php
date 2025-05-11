<?php

namespace App\Infrastructure\Job\Processor;

use Domain\Job\Model\Job;

final class JobProcessor implements JobProcessorInterface
{
    public function process(array $datas): Job
    {
        foreach ($datas['resultats'] as $data) {
            // $elements[] = [
            //     'id'          => $data['id'] ?? null,
            //     'title'       => $data['intitule'] ?? '',
            //     'description' => $data['description'] ?? '',
            //     'contract'    => $data['typeContrat'] ?? '',
            //     'url'         => $data['contact']['urlPostulation'] ?? null,
            // ];

        }

        return Job::create(
            reference: $data['id'],
            title: $data['intitule'] ?? '',
            description: $data['description'] ?? '',
            contract: $data['typeContrat'] ?? '',
            url: $data['contact']['urlPostulation'] ?? null
        );

        // return $elements;
    }
}