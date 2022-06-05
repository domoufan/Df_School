<?php

namespace App\DataFixtures;

use Faker\Factory;
use Faker\Generator;
use App\Entity\AnneeScolaire;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AnneeScolaireFixtures extends Fixture
{

    private Generator $faker ;

    public function __construct()
    {
        $this->faker = Factory::create("fr_F");
    }
    public function load(ObjectManager $manager): void
    {
        $annee = new AnneeScolaire;
        $annee->setLibelle($this->faker->year());
        $annee->setEtat("1");
        $manager->persist($annee);

        $manager->flush();
    }
}
