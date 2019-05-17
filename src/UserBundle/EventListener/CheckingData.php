<?php

namespace App\UserBundle\EventListener;

use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use App\Entity\User;

class CheckingData implements EventSubscriber
{
	public function getSubscribedEvents()
	{
		return array(
			'postPersist',
			'postUpdate',
		);
	}

	public function postPersist(LifecycleEventArgs $args)
	{
		$entity = $args->getObject();

		if (!$entity instanceof User) {
			return;
		}

		$entityManager = $args->getObjectManager();
		echo "Event listener luc insert data vao table user <br/>";
	}

	public function postUpdate(LifecycleEventArgs $args)
	{
		$entity = $args->getObject();

		if (!$entity instanceof User) {
			return;
		}

		$entityManager = $args->getObjectManager();
		echo "Event listener luc update data tren table user";
	}
}