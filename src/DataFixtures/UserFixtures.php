<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        
        $admin = new User();
        $admin->setEmail("admin@gmail.com");
        $admin->setRoles(["ROLE_ADMIN"]);
        $admin->setPassword($this->passwordEncoder->hashPassword($admin, "admin"));
        $admin->setFirstname($faker->firstName());
        $admin->setLastname($faker->lastName());
        $admin->setPhone($faker->phoneNumber());
        $admin->setAdresse($faker->address());
        $admin->setZipCode($faker->postcode());
        $admin->setCountry($faker->country());
        $admin->setBirthDate($faker->dateTimeThisCentury());
        $admin->setPseudo($faker->userName());
        $manager->persist($admin);
        
        for ($u=0; $u <11 ; $u++) { 
            $user = new User();
            $user->setEmail($faker->email());
            $user->setRoles(["ROLE_USER"]);
            $user->setPassword($this->passwordEncoder->hashPassword($user, "user"));
            $user->setFirstname($faker->firstName());
            $user->setLastname($faker->lastName());
            $user->setPhone($faker->phoneNumber());
            $user->setAdresse($faker->address());
            $user->setZipCode($faker->postcode());
            $user->setCountry($faker->country());
            $user->setBirthDate($faker->dateTimeThisCentury());
            $user->setPseudo($faker->userName());
            $manager->persist($user);
        }
        
        for ($e=0; $e <4 ; $e++) { 
            $employe = new User();
            $employe->setEmail($faker->email());
            $employe->setRoles(["ROLE_EMPLOYE"]);
            $employe->setPassword($this->passwordEncoder->hashPassword($employe, "employe"));
            $employe->setFirstname($faker->firstName());
            $employe->setLastname($faker->lastName());
            $employe->setPhone($faker->phoneNumber());
            $employe->setAdresse($faker->address());
            $employe->setZipCode($faker->postcode());
            $employe->setCountry($faker->country());
            $employe->setBirthDate($faker->dateTimeThisCentury());
            $employe->setPseudo($faker->userName());
            $manager->persist($employe);
        }

        $manager->flush();
    }
}