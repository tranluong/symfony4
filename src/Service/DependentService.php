<?php

namespace App\Service;

use App\Service\DiDemoService;

class DependentService
{
	private $di;

	public function __construct(DiDemoService $di)
	{
		$this->di = $di;
	}

	public function helloWorld($name)
	{
		return $this->di->helloWorld($name);
	}
}