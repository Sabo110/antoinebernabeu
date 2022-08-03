<?php

namespace App\Tests;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testtrue(): void
    {
        $user = new User();

        $user->setEmail('samirphanuel@gmail.com')
             ->setPassword('password')
             ->setNom('yoba')
             ->setPrenom('jalloud')
             ->setTelephone('659182723')
             ->setApropos('je suis moi')
             ->setInstagram('instagram');
        
        $this->assertTrue($user->getEmail() === 'samirphanuel@gmail.com');
        $this->assertTrue($user->getPassword() === 'password');
        $this->assertTrue($user->getNom() === 'yoba');
        $this->assertTrue($user->getPrenom() === 'jalloud');
        $this->assertTrue($user->getTelephone() === '659182723');
        $this->assertTrue($user->getApropos() === 'je suis moi');
        $this->assertTrue($user->getInstagram() === 'instagram');
              
    }

    public function testfalse(): void
    {
        $user = new User();

        $user->setEmail('samirphanuel@gmail.com')
             ->setPassword('password')
             ->setNom('yoba')
             ->setPrenom('jalloud')
             ->setTelephone('659182723')
             ->setApropos('je suis moi')
             ->setInstagram('instagram');
        
        $this->assertFalse($user->getEmail() === 'samirpanuel@gmail.com');
        $this->assertFalse($user->getPassword() === 'passord');
        $this->assertFalse($user->getNom() === 'yoa');
        $this->assertFalse($user->getPrenom() === 'jaloud');
        $this->assertFalse($user->getTelephone() === '65182723');
        $this->assertFalse($user->getApropos() === 'je sus moi');
        $this->assertFalse($user->getInstagram() === 'instgram');
              
    }

    public function testempty(): void
    {
        $user = new User();

        $this->assertEmpty($user->getEmail());

        $this->assertEmpty($user->getNom());
        $this->assertEmpty($user->getPrenom());
        $this->assertEmpty($user->getTelephone());
        $this->assertEmpty($user->getApropos());
        $this->assertEmpty($user->getInstagram());
              
    }
}
