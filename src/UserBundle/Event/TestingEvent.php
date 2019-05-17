<?php

namespace App\UserBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use App\Entity\User;

class TestingEvent extends Event
{
	const NAME = 'user.testing';

	protected $user;

	public function __construct(User $user)
	{
		$this->user = $user;
	}

	public function getUser() {
		return $this->user;
	}
}