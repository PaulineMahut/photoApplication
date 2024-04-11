<?php

namespace App\DataFixtures;

use App\Entity\Photo;
use App\Entity\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Cocur\Slugify\Slugify;



class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($j = 0; $j < 50; $j++) {
            $tag = new Tag();

            $slugify = new Slugify();

            $tagName = $faker->word();
            $tag->setName($tagName)
                ->setSlug($slugify->slugify($tagName)); // Utilisation de $slugger->slugify() au lieu de $slugify->slugify()

            for ($i = 0; $i < 50; $i++) {
                $photo = new Photo();

                $photo->setTitle($faker->sentence(3))
                    ->setDescription($faker->paragraph())
                    ->setPrice($faker->randomFloat(2, 10, 300))
                    ->setCreatedAt(new \DateTimeImmutable())
                    ->setUrl($faker->imageUrl(640, 480, 'animals', true))
                    ->setMetaInfo([]);

                $manager->persist($photo);
            }

            $manager->persist($tag);
        }


        $manager->flush();
    }
}
