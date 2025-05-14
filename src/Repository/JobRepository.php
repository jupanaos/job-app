<?php

namespace App\Repository;

use App\Infrastructure\Job\Repository\JobRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Domain\Job\Model\Job;

/**
 * @extends ServiceEntityRepository<Job>
 */
class JobRepository extends ServiceEntityRepository implements JobRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Job::class);
    }

    public function read(int $id): Job
    {
        $job = $this->getEntityManager()->getReference($this->getClassName(), $id);

        return $job;
    }

    public function save(Job $job): void
    {
        $existingJob = $this->findOneBy(['reference' => $job->getReference()]);

        if (null !== $existingJob) {
            return;
        }

        $this->getEntityManager()->persist($job);
        $this->getEntityManager()->flush();
    }

}