<?php

namespace App\Tests;

use App\Entity\Categorie;
use App\Entity\Peinture;
use App\Entity\User;
use DateTime;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertNotContains;

class PeintureTest extends TestCase
{
    public function testtrue(): void
    {
        $peinture = new Peinture();
        $user = new User();
        $categorie = new Categorie();
        $date = new DateTime('now');

        $peinture->setNom('peinture')
                 ->setLargeur(100.22)
                 ->setHauteur(200.22)
                 ->setEnvente(true)
                 ->setPrix(500.22)
                 ->setDatepublication($date)
                 ->setDaterealisation($date)
                 ->setDescription('description')
                 ->setPortfolio(true)
                 ->setSlug('slug')
                 ->setFile('file')
                 ->setUser($user)
                 ->addCategorie($categorie);


        $this->assertTrue($peinture->getNom() === 'peinture');
        $this->assertTrue($peinture->getLargeur() == 100.22);
        $this->assertTrue($peinture->getHauteur() == 200.22);
        $this->assertTrue($peinture->isEnvente() === true);
        $this->assertTrue($peinture->getPrix() == 500.22);
        $this->assertTrue($peinture->getDatepublication() === $date);
        $this->assertTrue($peinture->getDaterealisation() === $date);
        $this->assertTrue($peinture->getDescription() === 'description');
        $this->assertTrue($peinture->isPortfolio() === true);
        $this->assertTrue($peinture->getSlug() === 'slug');
        $this->assertTrue($peinture->getFile() === 'file');
        $this->assertTrue($peinture->getUser() === $user);
        $this->assertContains($categorie, $peinture->getCategorie());
    }

    public function testfalse(): void
    {
        $peinture = new Peinture();
        $user = new User();
        $categorie = new Categorie();
        $date = new DateTime('now');

        $peinture->setNom('peinture')
                 ->setLargeur(100.22)
                 ->setHauteur(200.22)
                 ->setEnvente(true)
                 ->setPrix(500.22)
                 ->setDatepublication($date)
                 ->setDaterealisation($date)
                 ->setDescription('description')
                 ->setPortfolio(true)
                 ->setSlug('slug')
                 ->setFile('file')
                 ->setUser($user)
                 ->addCategorie($categorie);


        $this->assertFalse($peinture->getNom() === 'penture');
        $this->assertFalse($peinture->getLargeur() == 10.22);
        $this->assertFalse($peinture->getHauteur() == 20.22);
        $this->assertFalse($peinture->isEnvente() === false);
        $this->assertFalse($peinture->getPrix() == 50.22);
        $this->assertFalse($peinture->getDatepublication() === new DateTime());
        $this->assertFalse($peinture->getDaterealisation() === new DateTime());
        $this->assertFalse($peinture->getDescription() === 'dscription');
        $this->assertFalse($peinture->isPortfolio() === false);
        $this->assertFalse($peinture->getSlug() === 'sug');
        $this->assertFalse($peinture->getFile() === 'fie');
        $this->assertFalse($peinture->getUser() === new User());
        $this->assertNotContains(new Categorie(), $peinture->getCategorie());
    }

    public function testempty(): void
    {
        $peinture = new Peinture();
        

        


        $this->assertEmpty($peinture->getNom());
        $this->assertEmpty($peinture->getLargeur());
        $this->assertEmpty($peinture->getHauteur());
        $this->assertEmpty($peinture->isEnvente());
        $this->assertEmpty($peinture->getPrix());
        $this->assertEmpty($peinture->getDatepublication());
        $this->assertEmpty($peinture->getDaterealisation());
        $this->assertEmpty($peinture->getDescription());
        $this->assertEmpty($peinture->isPortfolio());
        $this->assertEmpty($peinture->getSlug());
        $this->assertEmpty($peinture->getFile());
        $this->assertEmpty($peinture->getUser());
        $this->assertEmpty($peinture->getCategorie());
    }
}
