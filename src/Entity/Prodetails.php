<?php

namespace App\Entity;

use App\Repository\ProdetailsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProdetailsRepository::class)]
class Prodetails
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $personne_id;

    #[ORM\Column(type: 'integer')]
    private $module_id;

    #[ORM\Column(type: 'integer')]
    private $classe_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPersonneId(): ?int
    {
        return $this->personne_id;
    }

    public function setPersonneId(int $personne_id): self
    {
        $this->personne_id = $personne_id;

        return $this;
    }

    public function getModuleId(): ?int
    {
        return $this->module_id;
    }

    public function setModuleId(int $module_id): self
    {
        $this->module_id = $module_id;

        return $this;
    }

    public function getClasseId(): ?int
    {
        return $this->classe_id;
    }

    public function setClasseId(int $classe_id): self
    {
        $this->classe_id = $classe_id;

        return $this;
    }
}
