<?php

namespace App\Service;

use App\Entity\Contact;
use DateTime;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;

class ContactService
{
    private $manager;
    // private $flashBagInterface;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->manager = $doctrine->getManager();
        // $this->flashBagInterface = $flashBagInterface;
    }
    

    public function PersitContact(Contact $contact): void
    {
        $contact->setDatecreation(new DateTime('now'));
        $this->manager->persist($contact);
        $this->manager->flush();
        // $this->flashBagInterface->add('success', 'Votre message à bien été envoyé');
        
    }
}