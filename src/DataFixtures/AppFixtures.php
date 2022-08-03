<?php

namespace App\DataFixtures;

use App\Entity\Blogpost;
use App\Entity\Categorie;
use App\Entity\Peinture;
use App\Entity\User;
use Faker\Factory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{

    private $encoder;
    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager): void
    {   
        
        
        // creation d'une instance de faker
        $faker = Factory::create('fr_FR');

        $user = new User();

        $user->setEmail('samirphanuel@gmail.com')
             ->setPrenom($faker->firstName())
             ->setNom($faker->name())
             ->setTelephone($faker->phoneNumber())
             ->setApropos($faker->text(200))
             ->setInstagram('instagram');
             $password = $this->encoder->hashPassword($user, 'password');
             $user->setPassword($password);
             $manager->persist($user);


        for ($i=0; $i < 10; $i++) { 
            $blogpost = new Blogpost();

            $blogpost->setTitre($faker->words(3, true))
                     ->setDatepublication($faker->dateTimeBetween('-30 years', 'now'))
                     ->setContenu($faker->text(200))
                     ->setSlug($faker->slug(3))
                     ->setUser($user);
            $manager->persist($blogpost);
        }

        for ($j=0; $j < 5; $j++) { 
            $categorie = new Categorie();

            $categorie->setNom($faker->words(2, true))
                      ->setDescription($faker->words(10, true))
                      ->setSlug($faker->slug(2));
            $manager->persist($categorie);

            for ($k=0; $k < 2; $k++) { 
                $peinture = new Peinture();

                $peinture->setNom($faker->name())
                         ->setLargeur($faker->randomFloat(2, 20, 60))
                         ->setEnvente($faker->randomElement([true, false]))
                         ->setDaterealisation($faker->dateTimeBetween('-30 years', 'now'))
                         ->setDatepublication($faker->dateTimeBetween('-30 years', 'now'))
                         ->setDescription($faker->text(200))
                         ->setPortfolio($faker->randomElement([true, false]))
                         ->setSlug($faker->slug(2))
                         ->setFile('assets/images/f3.jpg')
                         ->addCategorie($categorie)
                         ->setPrix($faker->randomFloat(2, 100, 9999))
                         ->setUser($user);

                $manager->persist($peinture);

            }
        }


        $manager->flush();
    }
}
