<?php


namespace App\Subscribers;

use App\Entity\Post;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class PostSubscriber implements EventSubscriberInterface
{
    private $slugify;

    public function __construct(\Cocur\Slugify\SlugifyInterface $slugify)
    {
        $this->slugify = $slugify;
    }

    public static function getSubscribedEvents()
    {
        return [
            BeforeEntityPersistedEvent::class => ['setPostSlug'],
        ];
    }

    public function setPostSlug(BeforeEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if (!($entity instanceof Post)) {
            return;
        }

        $slug = $this->slugify->slugify($entity->getTitle());
        $entity->setSlug($slug);
        $entity->setCreatedAt(new \DateTime());
    }
}