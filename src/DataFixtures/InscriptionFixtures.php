<?php

namespace App\DataFixtures;

use App\Entity\Ac;
use Faker\Factory;
use Faker\Generator;
use App\Entity\Classe;
use App\Entity\Etudiant;
use App\Entity\Inscription;
use App\Entity\AnneeScolaire;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class InscriptionFixtures extends Fixture
{
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create("fr_Fr");
    }
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 5; $i++) {
            $inscription = new Inscription();
            $inscription->setLibelle($this->faker->word());
            $manager->persist($inscription);

            $classe = new Classe();
            $classe->setNiveau($this->faker->word());
            $manager->persist($classe);

            $annee = new AnneeScolaire;
            $annee->setLibelle($this->faker->year());
            $annee->setEtat("1");
            $manager->persist($annee);

            $ac = new Ac();
            $ac->setNomComplet($this->faker->name());
            $ac->setEmail($this->faker->email());
            $ac->setPassword($this->faker->password());
            $manager->persist($ac);

            $etudiant = new Etudiant();
            $etudiant->setNomComplet($this->faker->name());
            $etudiant->setEmail($this->faker->email());
            $etudiant->setPassword($this->faker->password());
            $etudiant->setMatricule($this->faker->phoneNumber());
            $etudiant->setSexe("F");
            $etudiant->setAdresse($this->faker->address());
            $manager->persist($etudiant);

            $inscription->setAnneeScolaire($annee);
            $inscription->setClasse($classe);
            $inscription->setEtudiant($etudiant);
            $inscription->setAc($ac);
            

            

            
        }
        $manager->flush();
    }
}
