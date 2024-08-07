<?php

namespace App\DataFixtures;

use App\Entity\Number;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class NumberFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 10; $i++) {
            $number = new Number();
            $number->setNumber($i);
            $manager->persist($number);
            
            // Ajouter une référence pour utiliser plus tard si nécessaire
            $this->addReference("number_$i", $number);
        }

        $manager->flush();
    }
}