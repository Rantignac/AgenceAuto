<?php

namespace App\DataFixtures;

use App\Entity\Offer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class OfferFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 100; $i++) {
            $offer = new Offer();
            $offer
                ->setTitle($faker->words(3,true))
                ->setDescription($faker->sentence(3,true))
                ->setMiles('20000')
                ->setColor('rouge')
                ->setPrice('10000')
                ->setCity($faker->city)
                ->setPostalCode($faker->postcode)
            ->setSold(false);
            $manager->persist($offer);


        }
        $manager->flush();

    }
}
