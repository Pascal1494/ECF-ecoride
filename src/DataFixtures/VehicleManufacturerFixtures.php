<?php

namespace App\DataFixtures;

use App\Entity\VehicleManufacturer;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class VehicleManufacturerFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $manufacturers = [
            'Renault',
            'Peugeot',
            'Citroen',
            'Ford',
            'Tesla'
        ];

        foreach ($manufacturers as $index => $name) {
            $constructor = new VehicleManufacturer();
            $constructor->setConstructor($name);
            $manager->persist($constructor);

            // Ajouter une référence pour utiliser plus tard si nécessaire
            $this->addReference("constructor_" . ($index + 1), $constructor);
        }

        $manager->flush();
    }
}