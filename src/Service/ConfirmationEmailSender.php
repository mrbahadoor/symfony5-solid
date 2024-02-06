<?php

namespace App\Service;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use App\Entity\User;

class ConfirmationEmailSender
{
    public function __construct(
        public readonly MailerInterface $mailer,
        public readonly RouterInterface $router,
    ) {}

    public function send(User $user): void
    {
        $confirmationLink = $this->router->generate('check_confirmation_link', [
            'token' => $user->getConfirmationToken(),
        ], UrlGeneratorInterface::ABSOLUTE_URL);

        $confirmationEmail = (new TemplatedEmail())
            ->from('staff@example.com')
            ->to($user->getEmail())
            ->subject('Confirm your account')
            ->htmlTemplate('emails/registration_confirmation.html.twig')
            ->context([
                'confirmationLink' => $confirmationLink
            ]);

        $this->mailer->send($confirmationEmail);

    }
}