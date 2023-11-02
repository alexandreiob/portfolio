<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class DarkModeListener implements EventSubscriberInterface
{
    public function onKernelRequest(RequestEvent $event)
    {
        $request = $event->getRequest();

        // Récupère la valeur actuelle du mode sombre depuis la session ou les cookies
        $isDarkMode = $request->getSession()->get('isDarkMode', $request->cookies->get('darkMode', false));

        // Transmet l'état du mode sombre à toutes les vues Twig
        $request->attributes->set('isDarkMode', $isDarkMode);
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::REQUEST => 'onKernelRequest',
        ];
    }
}
