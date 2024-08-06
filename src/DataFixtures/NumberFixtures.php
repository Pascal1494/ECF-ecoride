<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class NumberFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $number = new Number();
        $number->setNumber(1);
        $number->setReference("number_1");
        $manager->persist($number);

        $number = new Number();
        $number->setNumber(2);
        $number->setReference("number_2");
        $manager->persist($number);

        $number = new Number();
        $number->setNumber(3);
        $number->setReference("number_3");
        $manager->persist($number);

        $number = new Number();
        $number->setNumber(4);
        $number->setReference("number_4");
        $manager->persist($number);

        $number = new Number();
        $number->setNumber(5);
        $number->setReference("number_5");
        $manager->persist($number);

        $number = new Number();
        $number->setNumber(6);
        $number->setReference("number_6");
        $manager->persist($number);

        $number = new Number();
        $number->setNumber(7);
        $number->setReference("number_7");
        $manager->persist($number);

        $number = new Number();
        $number->setNumber(8);
        $number->setReference("number_8");
        $manager->persist($number);

        $number = new Number();
        $number->setNumber(9);
        $number->setReference("number_9");
        $manager->persist($number);

        $number = new Number();
        $number->setNumber(10);
        $number->setReference("number_10");
        $number->persist($number);      
        $manager->flush();
    }
}