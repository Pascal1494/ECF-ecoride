<?php

namespace App\DataFixtures;

use App\Entity\Color;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ColorFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $colors = [
            'Rouge',
            'Bleu',
            'Vert',
            'Jaune',
            'Noir',
            'Blanc',
            'Gris'
        ];

        foreach ($colors as $index => $colorName) {
            $color = new Color();
            $color->setColor($colorName);  
            $manager->persist($color);

            // J'ajoute une référence pour utiliser plus tard si nécessaire
            $this->addReference("color_" . ($index + 1), $color);
        }

        $manager->flush();
    }
}