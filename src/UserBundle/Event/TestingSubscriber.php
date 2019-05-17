<?php

namespace App\UserBundle\Event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use App\UserBundle\Event\TestingEvent;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;

class TestingSubscriber implements EventSubscriberInterface
{
	public static function getSubscribedEvents()
	{
		return array(
			KernelEvents::RESPONSE => array(
				array('onKernelResponsePre', 10),
			),
			TestingEvent::NAME => 'onUserRegister',
		);
	}

	public function onKernelResponsePre(FilterResponseEvent $event)
	{
		//kich hoat su kien
		//echo('Event dc kich hoat');
	}

	public function onUserRegister(TestingEvent $event)
	{
		$event->stopPropagation();
	}

}