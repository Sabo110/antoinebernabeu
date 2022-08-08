<?php

namespace App\EventSubscriber;

use App\Entity\Blogpost;
use App\Entity\Peinture;
use DateTime;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\String\Slugger\SluggerInterface;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\Security;

class EasyAdminEventSubscriber implements EventSubscriberInterface
{
        private $slug;
        private $usercourant;

        public function __construct(SluggerInterface $sluggerInterface, Security $security)
        {
            $this->slug = $sluggerInterface;
            $this->usercourant = $security;
        }
         

       public static function getSubscribedEvents()
       {
            return [
                BeforeEntityPersistedEvent::class => 'setDateAndUser'
            ];
       }

       public function setDateAndUser(BeforeEntityPersistedEvent $event)
       {
            $entity = $event->getEntityInstance();
           

            if($entity instanceof Blogpost)
            {
                

                $now = new DateTime('now');
                $entity->setDatepublication($now);
                $user = $this->usercourant->getUser();
                $entity->setUser($user);
            }
            if($entity instanceof Peinture)
            {
                $now = new DateTime('now');
                $entity->setDatepublication($now);
                $user = $this->usercourant->getUser();
                $entity->setUser($user);
            }

            return;

            
       }

}