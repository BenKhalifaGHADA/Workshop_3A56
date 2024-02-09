<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: StudentRepository::class)]
class Student
{
   

    #[ORM\Id]
    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"Le numero d'inscripption est obligatoire")]
    private ?string $NSC = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Email obligatoire')]
    private ?string $Email = null;

    
    public function getNSC(): ?string
    {
        return $this->NSC;
    }

    public function setNSC(string $NSC): static
    {
        $this->NSC = $NSC;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): static
    {
        $this->Email = $Email;

        return $this;
    }
}
