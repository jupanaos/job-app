<?php

namespace Domain\Job\Model;

use App\Repository\JobRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JobRepository::class)]
class Job
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(length: 255, unique: true)]
    private string $reference;

    #[ORM\Column(length: 255)]
    private string $title;

    private string $description;

    #[ORM\Column(length: 255)]
    private string $contract;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $url;

    private function __construct(
        string $reference,
        string $title,
        string $description,
        string $contract,
        ?string $url
    ) {
        $this->reference = $reference;
        $this->title = $title;
        $this->description = $description;
        $this->contract = $contract;
        $this->url = $url;
    }

    public static function create(
        string $reference,
        string $title,
        string $description,
        string $contract,
        ?string $url
    ): self {
        return new self(
            $reference,
            $title,
            $description,
            $contract,
            $url
        );
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getReference(): string
    {
        return $this->reference;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getContract(): string
    {
        return $this->contract;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }
}