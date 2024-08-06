<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ColorFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $color = new Color();
        $color->setName("Rouge");
        $color->setReference("color_1");
        $manager->persist($Color);

        $color = new Color();
        $color->setName("Bleu");
        $color->setReference("color_2");
        $manager->persist($Color);

        $color = new Color();
        $color->setName("Vert");
        $color->setReference("color_3");
        $manager->persist($Color);

        $color = new Color();
        $color->setName("Jaune");
        $color->setReference("color_4");
        $manager->persist($Color);

        $color = new Color();
        $color->setName("Orange");
        $color->setReference("color_5");
        $manager->persist($Color);

        $color = new Color();
        $color->setName("Violet");
        $color->setReference("color_6");
        $manager->persist($Color);

        $color = new Color();
        $color->setName("Rose");
        $color->setReference("color_7");
        $manager->persist($Color);

        $color = new Color();
        $color->setName("Blanc");
        $color->setReference("color_8");
        $manager->persist($Color);

        $color = new Color();
        $color->setName("Noir");
        $color->setReference("color_9");
        $manager->persist($Color);

        $color = new Color();
        $color->setName("Gris");
        $color->setReference("color_10");
        $manager->persist($Color);

        $color = new Color();
        $color->setName("Marron");
        $color->setReference("color_11");
        $manager->persist($Color);

        $color = new Color();
        $color->setName("Beige");
        $color->setReference("color_12");
        $manager->persist($Color);

        $color = new Color();
        $color->setName("Cyan");
        $color->setReference("color_13");
        $manager->persist($Color);

        $color = new Color();
        $color->setName("Magenta");
        $color->setReference("color_14");
        $manager->persist($Color);
        
        $manager->flush();
    }
}