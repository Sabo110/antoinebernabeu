<?php

namespace App\Service;

use App\Entity\Contact;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;


class EmailService
{
    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendemail(Contact $contact)
    {
        $email = (new TemplatedEmail())
        ->from($contact->getEmail())
        ->to('tes@gmail.com')
        ->subject('Contacter le peintre')

        // path of the Twig template to render
        ->htmlTemplate('emails/templateemail.html.twig')

        // pass variables (name => value) to the template
        ->context([
            'contact' => $contact,
            
        ]);

        $this->mailer->send($email);
    }
    
}
