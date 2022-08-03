<?php

namespace App\Tests;

use App\Entity\Blogpost;
use App\Entity\User;
use DateTime;
use PHPUnit\Framework\TestCase;

class BlogpostTest extends TestCase
{
    public function testtrue(): void
    {
        $blogpost = new Blogpost();
        $date = new DateTime('now');
        $user = new User();

        $blogpost->setTitre('titre')
                 ->setContenu('contenu')
                 ->setSlug('slug')
                 ->setDatepublication($date)
                 ->setUser($user);

        $this->assertTrue($blogpost->getTitre() === 'titre');
        $this->assertTrue($blogpost->getContenu() === 'contenu');
        $this->assertTrue($blogpost->getSlug() === 'slug');
        $this->assertTrue($blogpost->getDatepublication() === $date);
        $this->assertTrue($blogpost->getUser() === $user);
    }

    public function testfalse(): void
    {
        $blogpost = new Blogpost();
        $date = new DateTime('now');
        $user = new User();

        $blogpost->setTitre('titre')
                 ->setContenu('contenu')
                 ->setSlug('slug')
                 ->setDatepublication($date)
                 ->setUser($user);

        $this->assertFalse($blogpost->getTitre() === 'tire');
        $this->assertFalse($blogpost->getContenu() === 'cotenu');
        $this->assertFalse($blogpost->getSlug() === 'slg');
        $this->assertFalse($blogpost->getDatepublication() === new DateTime());
        $this->assertFalse($blogpost->getUser() === new User());
    }

    public function testempty(): void
    {
        $blogpost = new Blogpost();
       

        $this->assertEmpty($blogpost->getTitre());
        $this->assertEmpty($blogpost->getContenu());
        $this->assertEmpty($blogpost->getSlug());
        $this->assertEmpty($blogpost->getDatepublication());
        $this->assertEmpty($blogpost->getUser());
    }
}
