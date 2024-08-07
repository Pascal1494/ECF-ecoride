<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use DateTimeImmutable;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture 
/**
 * Loads user data fixtures into the database.
 *
 * This fixture creates 11 regular users and 4 employee users with randomly generated data.
 * The admin user is commented out, but can be uncommented and configured as needed.
 *
 * @param ObjectManager $manager The Doctrine object manager used to persist the user entities.
 */
{

    public function __construct(
        private UserPasswordHasherInterface $passwordEncoder,
      ) {
      }
    
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
        $birthDate = $faker->dateTimeBetween('-80 years', '-18 years');
        $admin->setBirthDate(DateTimeImmutable::createFromMutable($birthDate));
        $admin->setPseudo($faker->userName());
        dump($admin);
        $manager->persist($admin);
        
        for ($u=0; $u <11 ; $u++) { 
            $user = new User();
            $user->setEmail($faker->email());
            $user->setRoles(["ROLE_USER"]);
            $user->setPassword($this->passwordEncoder->hashPassword($user, "user"));
            $user->setFirstname($faker->firstName());
            // dd($user);
            $user->setLastname($faker->lastName());
            $user->setPhone($faker->phoneNumber());
            $user->setAdresse($faker->address());
            $user->setZipCode($faker->postcode());
            $user->setCountry($faker->country());
            $birthDate = $faker->dateTimeBetween('-80 years', '-18 years');
            $user->setBirthDate(DateTimeImmutable::createFromMutable($birthDate));
            $user->setPseudo($faker->userName());
            dump($user);
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
            $birthDate = $faker->dateTimeBetween('-80 years', '-18 years');
            $employe->setBirthDate(DateTimeImmutable::createFromMutable($birthDate));
            $employe->setPseudo($faker->userName());
            // dd($employe);
            $manager->persist($employe);
        }

        // $admin = new User();
        // $admin->setEmail($faker->email());
        // $admin->setRoles(["ROLE_ADMIN"]);
        // $admin->setPassword($this->passwordEncoder->hashPassword($admin, "admin"));
        // $admin->setFirstname("Jean");
        // $admin->setLastname("Sairien");
        // $admin->setPhone("0680436578");
        // $admin->setAdresse("12 rue de la Paix");
        // $admin->setZipCode("75000");
        // $admin->setCountry("Paris");
        // $admin->setBirthDate(new DateTimeImmutable);
        // $admin->setPseudo("Jsien");
        // dd($admin);
        // $manager->persist($admin);
        // dump($admin);
        // dump($user);
        // dd($employe);

        $manager->flush();
    }
}