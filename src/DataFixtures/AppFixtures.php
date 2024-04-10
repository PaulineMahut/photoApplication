<?php

namespace App\DataFixtures;

use App\Entity\Photo;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for($i=0;$i<50;$i++) {
            $photo =new Photo();
            
            $photo->setTitle($faker->sentence(3))
            ->setDescription($faker->paragraph())
            ->setPrice($faker->randomFloat(2,10,300))
            ->setCreatedAt(new \DateTimeImmutable())
            ->setUrl($faker->imageUrl(640,480, 'animals', true))
            ->setMetaInfo([]);
            
            $manager->persist($photo);

        }

        $manager->flush();
    }
}
