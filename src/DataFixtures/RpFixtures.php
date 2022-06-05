<?php

namespace App\DataFixtures;

use Faker\Factory;
use Faker\Generator;
use App\Entity\Rp;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RpFixtures extends Fixture
{
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create("fr_Fr");
    }
    public function load(ObjectManager $manager): void
    {

        for ($i = 0; $i < 5; $i++) {
            $rp = new Rp();
            $rp->setNomComplet($this->faker->name());
            $rp->setEmail($this->faker->email());
            $rp->setPassword($this->faker->password());
            $manager->persist($rp);
        }
        $manager->flush();
    }
}
