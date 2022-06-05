<?php

namespace App\DataFixtures;

use App\Entity\Ac;
use App\Entity\Rp;
use Faker\Factory;
use Faker\Generator;
use App\Entity\Demande;
use App\Entity\Etudiant;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class DemandeFixtures extends Fixture
{
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create("fr_Fr");
    }
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 5; $i++) {
            $demande = new Demande();
            $demande->setAdresse($this->faker->address());
            $demande->setMotif($this->faker->text());
            $demande->setLibelle($this->faker->word());
            $manager->persist($demande);
            
            $etudiant = new Etudiant();
            $etudiant->setNomComplet($this->faker->name());
            $etudiant->setEmail($this->faker->email());
            $etudiant->setPassword($this->faker->password());
            $etudiant->setMatricule($this->faker->phoneNumber());
            $etudiant->setSexe("F");
            $etudiant->setAdresse($this->faker->address());
            $manager->persist($etudiant);

            $rp = new Rp();
            $rp->setNomComplet($this->faker->name());
            $rp->setEmail($this->faker->email());
            $rp->setPassword($this->faker->password());
            $manager->persist($rp);

            $ac = new Ac();
            $ac->setNomComplet($this->faker->name());
            $ac->setEmail($this->faker->email());
            $ac->setPassword($this->faker->password());
            $manager->persist($ac);
            
            $demande->setEtudiant($etudiant);
            $demande->setRp($rp);
            $demande->setAc($ac);
        }
        $manager->flush();
    }
}
