<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CarFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $car = new Car();
        $car->setModel("Renault");
        $car->setLicencePlate("AB-123-CD");
        $car->setCommercialDate(new \DateTimeImmutable('15-01-2020'));
        $car->setEnergy("Gazole");
        $car->setColor($this->getReference('color_1'));
        $car->setVehicleManufacturer($this->getReference('vehicle_manufacturer_1'));
        $car->setDriverCar($this->getReference('user_1'));
        $car->setNumberPlace($this->getReference('number_1'));
        $car->setIsAnimal(true);
        $manager->persist($Car);

        $car = new Car();
        $car->setModel("Peugeot");
        $car->setLicencePlate("EF-456-GH");
        $car->setCommercialDate(new \DateTimeImmutable('10-05-2019'));
        $car->setEnergy("Essence");
        $car->setColor($this->getReference('color_2'));
        $car->setVehicleManufacturer($this->getReference('vehicle_manufacturer_2'));
        $car->setDriverCar($this->getReference('user_2'));
        $car->setNumberPlace($this->getReference('number_2'));
        $car->setIsAnimal(false);
        $manager->persist($Car);

        $car = new Car();
        $car->setModel("Citroen");
        $car->setLicencePlate("IJ-789-KL");
        $car->setCommercialDate(new \DateTimeImmutable('20-08-2021'));
        $car->setEnergy("GPL");
        $car->setColor($this->getReference('color_3'));
        $car->setVehicleManufacturer($this->getReference('vehicle_manufacturer_3'));
        $car->setDriverCar($this->getReference('user_3'));
        $car->setNumberPlace($this->getReference('number_3'));
        $car->setIsAnimal(true);
        $manager->persist($car);

        $car = new Car();
        $car->setModel("Ford");
        $car->setLicencePlate("MN-012-OP");
        $car->setCommercialDate(new \DateTimeImmutable('05-03-2022'));
        $car->setEnergy("Electric");
        $car->setColor($this->getReference('color_4'));
        $car->setVehicleManufacturer($this->getReference('vehicle_manufacturer_4'));
        $car->setDriverCar($this->getReference('user_4'));
        $car->setNumberPlace($this->getReference('number_4'));
        $car->setIsAnimal(false);
        $manager->persist($car);

        $car = new Car();
        $car->setModel("Tesla");
        $car->setLicencePlate("QR-345-ST");
        $car->setCommercialDate(new \DateTimeImmutable('12-11-2023'));
        $car->setEnergy("Eletric");
        $car->setColor($this->getReference('color_5'));
        $car->setVehicleManufacturer($this->getReference('vehicle_manufacturer_5'));
        $car->setDriverCar($this->getReference('user_5'));
        $car->setNumberPlace($this->getReference('number_5'));
        $car->setIsAnimal(true);
        $manager->persist($car);
        

        $manager->flush();
    }
}