<?php

namespace App\EventSubscriber;

use App\Repository\ArticleRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Twig\Environment;

class TwigEventSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private Environment $twig,
        private ArticleRepository $articleRepository
    ) {}

    public function onKernelController(ControllerEvent $event): void
    {
        $tags = $this->articleRepository->findAllUniqueTags();

        $this->twig->addGlobal('app_tags', $tags);
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::CONTROLLER => 'onKernelController',
        ];
    }
}
