<?php

namespace App\DataFixtures;

use Faker\Factory;
use Faker\Generator;
use App\Entity\Etudiant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EtudiantFixtures extends Fixture
{
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create("fr_Fr");
    }
    public function load(ObjectManager $manager): void
    {

        for ($i = 0; $i < 5; $i++) {
            $etudiant = new Etudiant();
            $etudiant->setNomComplet($this->faker->name());
            $etudiant->setEmail($this->faker->email());
            $etudiant->setPassword($this->faker->password());
            $etudiant->setMatricule($this->faker->phoneNumber());
            $etudiant->setSexe("F");
            $etudiant->setAdresse($this->faker->address());
            $manager->persist($etudiant);
        }
        $manager->flush();
    }
}
