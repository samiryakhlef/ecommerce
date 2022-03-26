<?php

namespace App\DataFixtures;

use App\Entity\Categories;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class CategoriesFixtures extends Fixture
{
    private $counter = 1;

    public function __construct(private SluggerInterface $slugger){}

    public function load(ObjectManager $manager): void
    {
        $parent= $this->createCategory ('informatique',null,manager:$manager);
        
        $this->createCategory ('ordinateur portable',$parent,$manager);
        $this->createCategory ('ecran',$parent,$manager);
        $this->createCategory ('clavier',$parent,$manager);
        $this->createCategory ('souris',$parent,$manager);

        $parent= $this->createCategory ('logiciel informatique',null,manager:$manager);
        $this->createCategory ('windows',$parent,$manager);
        $this->createCategory ('linux',$parent,$manager);
        $this->createCategory ('mac',$parent,$manager);
    }

    public function createCategory(string $name, Categories $parent = null ,ObjectManager $manager): Categories
    {
        $category = new Categories();
        $category->setName($name);
        $category->setslug($this->slugger->slug($category->getName()));
        $category->setParent($parent);
        $manager->persist($category);

        $this->addReference('cat-'.$this->counter, $category);
        $this->counter++;

        $manager->flush();

        return $category;
    }

}
