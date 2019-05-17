<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function index()
    {
    	//http://localhost:8000/user
    	$arr = [
		    [
			    'name' => 'luong$',
			    'phone' => 'xxxxxxxxx',
			    'email' => 'tester@gmail.com'
		    ],
		    [
			    'name' => 'An',
			    'phone' => 'yyyyyyyy',
			    'email' => 'an@gmail.com'
		    ],
		    [
			    'name' => 'Long',
			    'phone' => 'zzzzzzzz',
			    'email' => 'long@gmail.com'
		    ],
	    ];
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
	        'users' => $arr,
	        'price_product' => 2000,
	        'upperString' => 'hello'
        ]);
    }
}
