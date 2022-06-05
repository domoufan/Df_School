<?php

namespace App\Entity;

use App\Repository\ProfesseurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfesseurRepository::class)]
class Professeur extends Personne
{

    #[ORM\Column(type: 'string', length: 50)]
    protected $grade;

    #[ORM\ManyToMany(targetEntity: Module::class, mappedBy: 'professeurs')]
    protected $modules;

    #[ORM\ManyToOne(targetEntity: Rp::class, inversedBy: 'professeurs')]
    protected $rp;

    #[ORM\ManyToOne(targetEntity: Ac::class, inversedBy: 'professeurs')]
    protected $ac;

    public function __construct()
    {
        $this->modules = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGrade(): ?string
    {
        return $this->grade;
    }

    public function setGrade(string $grade): self
    {
        $this->grade = $grade;

        return $this;
    }

    /**
     * @return Collection<int, Module>
     */
    public function getModules(): Collection
    {
        return $this->modules;
    }

    public function addModule(Module $module): self
    {
        if (!$this->modules->contains($module)) {
            $this->modules[] = $module;
            $module->addProfesseur($this);
        }

        return $this;
    }

    public function removeModule(Module $module): self
    {
        if ($this->modules->removeElement($module)) {
            $module->removeProfesseur($this);
        }

        return $this;
    }

    public function getRp(): ?Rp
    {
        return $this->rp;
    }

    public function setRp(?Rp $rp): self
    {
        $this->rp = $rp;

        return $this;
    }

    public function getAc(): ?Ac
    {
        return $this->ac;
    }

    public function setAc(?Ac $ac): self
    {
        $this->ac = $ac;

        return $this;
    }
}
