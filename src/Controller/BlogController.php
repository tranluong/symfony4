<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
	/**
	 * Matches /lists exactly
	 *
	 * @Route("/lists", name="lists_route")
	 */
	public function lists()
	{
		return new Response('<html><body>this is route with annotations no use param</body></html>');
	}

	/**
	 * Matches /show/*
	 *
	 * @Route("/show/{name}", name="show_name")
	 */
	public function show($name)
	{
		return new Response('<html><body>Hello: '.$name.'</body></html>');
	}
}