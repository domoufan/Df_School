<?php

namespace App\DataFixtures;

use Faker\Factory;
use Faker\Generator;
use App\Entity\Classe;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;



class ClasseFixtures extends Fixture
{
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create("fr_Fr");
    }
    public function load(ObjectManager $manager): void
    {
       
        for ($i=1; $i < 4; $i++) {
            $classe = new Classe();
            $classe->setNiveau($this->faker->word());
            $manager->persist($classe);
        }
        
        $manager->flush();
    }
}
