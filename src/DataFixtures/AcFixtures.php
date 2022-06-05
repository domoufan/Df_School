<?php

namespace App\DataFixtures;

use Faker\Factory;
use Faker\Generator;
use App\Entity\Ac;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AcFixtures extends Fixture
{
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create("fr_Fr");
    }
    public function load(ObjectManager $manager): void
    {

        for ($i = 0; $i < 5; $i++) {
            
            $ac = new Ac();
            $ac->setNomComplet($this->faker->name());
            $ac->setEmail($this->faker->email());
            $ac->setPassword($this->faker->password());
            $manager->persist($ac);
        }

        $manager->flush();
    }
}
