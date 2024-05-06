<?php

namespace App\DataFixtures;

use App\Entity\Patient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class PatientFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $dateNow = new \DateTimeImmutable();

        for ($i = 0; $i < 5; $i++) {
            $patient = new Patient();
            $patient->setBirthdate($faker->dateTimeBetween('-80 years', '-2 years'));
            $patient->setLastName($faker->lastName);
            $patient->setFirstName($faker->firstName);
            $patient->setSlug($i);
            $patient->setCreatedAt($dateNow);
            $manager->persist($patient);
        }
        $manager->flush();
    }
}
