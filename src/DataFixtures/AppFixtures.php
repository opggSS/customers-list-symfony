<?php

namespace App\DataFixtures;
use Faker\Factory;
use App\Entity\Address ;
use App\Entity\Phone ;
use App\Entity\Customer ;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    protected $faker;
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        for ($i = 0; $i < 20; $i++) {

            $address = new Address();
            $address->setStreet($faker->address);
            $address->setCountry($faker->country);
            $address->setCity($faker->city);
            $address->setPostalCode($faker->postcode);

            $manager->persist($address);
            
            $customer = new Customer();
            $customer->setFirstName($faker->firstName);
            $customer->setLastName($faker->lastName);
            $customer->setEmail($faker->email);
            $customer->setAddress($address);
            $manager->persist($customer);

         
            $phone = new Phone();
            $phone->setType($faker->randomElement(['home', 'cell','fax']));
            $phone->setNumber(mt_rand(1111111111, 9999999999));
            $phone->setCustomer($customer);
            $manager->persist($phone);

           
        }

        $manager->flush();
    }
}
