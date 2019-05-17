<?php

namespace App\Service;

class DiDemoService
{
	public function helloWorld($name)
	{
		$str = 'hello '.$name;
		return $str;
	}
}