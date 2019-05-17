<?php

namespace App\UserBundle\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Role\Role;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{

	public function loginAction(AuthenticationUtils $authenticationUtils)
	{
//		UserPasswordEncoderInterface $encoder
//		$user = new User();
//		$plainPassword = '123456';
//		$encoded = $encoder->encodePassword($user, $plainPassword);
//		var_dump($encoded);die;

		// get the login error if there is one
		$error = $authenticationUtils->getLastAuthenticationError();

		// last username entered by the user
		$lastUsername = $authenticationUtils->getLastUsername();

		return $this->render('@User/User/login.html.twig', array(
			'last_username' => $lastUsername,
			'error'         => $error,
		));
	}
}