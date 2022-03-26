<?php

namespace App\DataFixtures;

use App\Entity\Products;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;

class ProductsFixtures extends Fixture
{


    public function __construct(private SluggerInterface $slugger)
    {
    }

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        $faker = \Faker\Factory::create('fr_FR');

        for ($i = 1; $i <= 5; $i++) {
            $product = new Products();
            $product->setName($faker->text(5));
            $product->setDescription($faker->text());
            $product->setSlug($this->slugger->slug($product->getName())->lower());
            $product->setPrice($faker->numberBetween(900, 150000));
            $product->setStock($faker->numberBetween(0, 10));

            // on va chercher une référence catégorie 
            $category = $this->getReference('cat-' . rand(1, 8));
            $product->setCategories($category);

            $this->addReference('prod-' . $i, $product);


            $manager->persist($product);
        }
        $manager->flush();
    }
}
