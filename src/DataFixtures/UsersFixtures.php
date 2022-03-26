<?php

namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UsersFixtures extends Fixture
{

    public function __construct(
        private UserPasswordHasherInterface $passwordEncoder,
        private SluggerInterface $slugger
    ){}


    public function load(ObjectManager $manager): void
    {
        $admin = new Users();
        $admin->setEmail('admin@demo.fr');
        $admin->setFirstname('samir');
        $admin->setLastname('yakhlef');
        $admin->setAddress('1 rue de la paix');
        $admin->setZipcode('75000');
        $admin->setCity('paris');
        $admin->setPassword(
            $this->passwordEncoder->hashPassword($admin, 'admin'
        ));
        $admin->setRoles(['ROLE_ADMIN']);

        $manager->persist($admin);

        $faker = \Faker\Factory::create('fr_FR');

        for($i = 0; $i < 5; $i++){
            $user = new Users();
            $user->setEmail($faker->email);
            $user->setFirstname($faker->firstName);
            $user->setLastname($faker->lastName);
            $user->setAddress($faker->streetaddress);
            $user->setZipcode(str_replace(' ','', $faker->postcode));
            $user->setCity($faker->city);
            $user->setPassword(
                $this->passwordEncoder->hashPassword($user, 'user'
            ));

            $manager->persist($user);
        }
            
        $manager->flush();
    }
}
