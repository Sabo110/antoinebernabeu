<?php

namespace App\Tests;

use App\Entity\Categorie;
use PHPUnit\Framework\TestCase;

class CategorieTest extends TestCase
{
    public function testtrue(): void
    {
       $categorie = new Categorie();

       $categorie->setNom('drame')
                 ->setDescription('une description')
                 ->setSlug('un slug');

        $this->assertTrue($categorie->getNom() === 'drame');
        $this->assertTrue($categorie->getDescription() === 'une description');
        $this->assertTrue($categorie->getSlug() === 'un slug');

    }

    public function testfalse(): void
    {
       $categorie = new Categorie();

       $categorie->setNom('drame')
                 ->setDescription('une description')
                 ->setSlug('un slug');

        $this->assertFalse($categorie->getNom() === 'drme');
        $this->assertFalse($categorie->getDescription() === 'une decription');
        $this->assertFalse($categorie->getSlug() === 'un slg');

    }

    public function testempty(): void
    {
       $categorie = new Categorie();

      

        $this->assertEmpty($categorie->getNom());
        $this->assertEmpty($categorie->getDescription());
        $this->assertEmpty($categorie->getSlug());

    }
}
