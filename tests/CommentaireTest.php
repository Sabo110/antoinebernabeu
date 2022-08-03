<?php

namespace App\Tests;

use App\Entity\Blogpost;
use App\Entity\Commentaire;
use App\Entity\Peinture;
use DateTime;
use PHPUnit\Framework\TestCase;

class CommentaireTest extends TestCase
{
    public function testtrue(): void
    {
        $commentaire = new Commentaire();
        $date = new DateTime('now');
        $peinture = new Peinture();
        $blogpost = new Blogpost();

        $commentaire->setAuteur('auteur')
                    ->setEamil('email')
                    ->setContenu('contenu')
                    ->setDatecommentaire($date)
                    ->setPeinture($peinture)
                    ->setBlogpost($blogpost);

        $this->assertTrue($commentaire->getAuteur() === 'auteur');
        $this->assertTrue($commentaire->getEamil() === 'email');
        $this->assertTrue($commentaire->getContenu() === 'contenu');
        $this->assertTrue($commentaire->getDatecommentaire() === $date);
        $this->assertTrue($commentaire->getPeinture() === $peinture);
        $this->assertTrue($commentaire->getBlogpost() === $blogpost);
    }

    public function testfalse(): void
    {
        $commentaire = new Commentaire();
        $date = new DateTime('now');
        $peinture = new Peinture();
        $blogpost = new Blogpost();

        $commentaire->setAuteur('auteur')
                    ->setEamil('email')
                    ->setContenu('contenu')
                    ->setDatecommentaire($date)
                    ->setPeinture($peinture)
                    ->setBlogpost($blogpost);

        $this->assertFalse($commentaire->getAuteur() === 'ateur');
        $this->assertFalse($commentaire->getEamil() === 'emil');
        $this->assertFalse($commentaire->getContenu() === 'cotenu');
        $this->assertFalse($commentaire->getDatecommentaire() === new DateTime());
        $this->assertFalse($commentaire->getPeinture() === new Peinture());
        $this->assertFalse($commentaire->getBlogpost() === new Blogpost());
    }

    public function testempty(): void
    {
        $commentaire = new Commentaire();
       
        $this->assertEmpty($commentaire->getAuteur());
        $this->assertEmpty($commentaire->getEamil());
        $this->assertEmpty($commentaire->getContenu());
        $this->assertEmpty($commentaire->getDatecommentaire());
        $this->assertEmpty($commentaire->getPeinture());
        $this->assertEmpty($commentaire->getBlogpost());
    }
}
