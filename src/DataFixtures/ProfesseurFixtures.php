<?php

namespace App\DataFixtures;

use Faker\Factory;
use Faker\Generator;
use App\Entity\Professeur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProfesseurFixtures extends Fixture
{
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create("fr_Fr");
    }
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 5; $i++) {
            $professeur = new Professeur();
            $professeur->setNomComplet($this->faker->name());
            $professeur->setGrade($this->faker->postcode());
            $manager->persist($professeur);
        }
        $manager->flush();
    }
}
