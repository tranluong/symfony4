<?php

namespace App\UserBundle\Controller;

use App\Entity\User;
use App\UserBundle\Event\TestingEvent;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\UserBundle\Event\TestingSubscriber;
use Symfony\Component\EventDispatcher\EventDispatcher;
use App\UserBundle\Form\UserType;
use App\UserBundle\Service\UpperCase;
use Knp\Component\Pager\PaginatorInterface;

class UserController extends AbstractController
{
	public function indexAction(UpperCase $case)
	{
		//Using service class
//		$str = new UpperCase();
		echo $case->upperCase('tran thanh luong');
		$number = random_int(0, 100);
		return new Response('<html><body>This is random number '.$number.'</body></html>');
	}

	public function loadAction(PaginatorInterface $paginator, Request $request)
	{
		$repository = $this->getDoctrine()->getManager()->getRepository(User::class);
//		$user = $repository->findAll();
		$queryBuilder = $repository->createQueryBuilder('bp');
		$query = $queryBuilder->getQuery();
		// 2 cau tren tuong duong voi findAll()
		$pagination = $paginator->paginate(
			$query, /* query NOT result */
			$request->query->getInt('page', 1)/*page number*/,
			10/*limit per page*/
		);

		return $this->render('@User/User/index.html.twig', array(
			'title' => 'Create form with formbuilderInterface',
//			'users'  => $user,
			'pagination' => $pagination
		));
	}

	public function shoppingAction()
	{
		$arr = [
			[
				'id'  => 1,
				'name' => 'Ao',
				'price' => '1000',
			],
			[
				'id' => 2,
				'name' => 'Quan',
				'price' => '2000',
			],
			[
				'id'  => 3,
				'name' => 'Giay',
				'price' => '4000',
			],
		];
		return $this->render('@User/User/shopping.html.twig', [
			'products' => $arr,
		]);
	}

	public function addCartAction(Request $request)
	{
		$session = $this->get( 'session' )->get( 'cart' );

		if (isset($session[$request->get('id')])) {
			$session[$request->get('id')]['quantity'] += 1;
		}else {

			$session[$request->get('id')] = [
				'idProduct'       => $request->get('id'),
				"nameProduct"     => $request->get('name'),
				"priceProduct"    => $request->get('price'),
				"quantity" => 1
			];
		}

		$this->get( 'session' )->set('cart', $session);
		//session_destroy();

		return $this->redirectToRoute('app_shopping', []);
	}

	public function viewCartAction()
	{
		$carts = $this->get( 'session' )->get( 'cart' );
		return $this->render('@User/User/view_cart.html.twig', array(
			'title' => 'View product on cart',
			'carts'  => $carts,
		));
	}

	public function removeCartAction($itemId)
	{
		$carts = $this->get( 'session' )->get( 'cart' );
//		foreach ($carts as $cart) {
//			if ($itemId == $carts['idProduct']) {
//				unset()
//			}
//		}

		unset($carts[$itemId]);
		$this->get('session')->set('cart', $carts);
		return $this->render('@User/User/view_cart.html.twig', array(
			'title' => 'View product on cart',
			'carts'  => $carts,
		));
	}

	public function updateCartAction()
	{
		//update bang jquery roi
	}

	public function updateQuantityCartAction(Request $request)
	{
		//Update quantity khi nguoi dung edit so luong tren trang view_cart
		$carts = $this->get( 'session' )->get( 'cart' );
		$id  = $request->get('id');
		$qty = $request->get('qty');
		$carts[$id]['quantity'] = $qty;
		$this->get('session')->set('cart', $carts);
		return new JsonResponse($carts);
	}

	public function addAction()
	{
		$entityManager = $this->getDoctrine()->getManager();

		//Testing event listener when insert db
		$user = new User();
		$user->setUsername('Test15');
		$user->setEmail('test15@sutrixsolutions.com');
		$user->setPass('123456');

		//Testing event
		$testingSubscriber = new TestingSubscriber();
		$dispatcher = new EventDispatcher();
		$dispatcher->addSubscriber($testingSubscriber);


		$entityManager->persist($user);

		$entityManager->flush();

		return new Response('<html><body><br/>User saved with ID '.$user->getId().' <br/></body></html>');

	}

	public function newAction(Request $request)
	{
		$user = new User();
		$form = $this->createForm(UserType::class, $user);
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			$entityManager = $this->getDoctrine()->getManager();
			$entityManager->persist($user);
			$entityManager->flush();
			$this->addFlash(
				'notice',
				'Your changes were saved!'
			);

			return $this->redirectToRoute('app_load_data', [
				//'id' => $product->getId()
			]);
		}

		return $this->render('@User/User/create.html.twig', array(
			'form' => $form->createView()
		));
	}

	public function editAction(Request $request, $id)
	{
//		echo $id;
		$user = $this->getDoctrine()->getRepository(User::class)->find($id);
		//echo $user->getEmail();
		$form = $this->createForm(UserType::class, $user);
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
//			$repository = $this->getDoctrine()->getRepository(User::class);
			$entityManager = $this->getDoctrine()->getManager();
			$entityManager->flush();
			$this->addFlash(
				'notice',
				'Edit successfully!'
			);

			return $this->redirectToRoute('app_load_data');
		}

		return $this->render('@User/User/edit.html.twig', array(
			'form' => $form->createView()
		));
	}

	public function destroyAction($id)
	{
		$entityManager = $this->getDoctrine()->getManager();
		$user = $entityManager->getRepository(User::class)->find($id);
		$entityManager->remove($user);
		$entityManager->flush();
		$this->addFlash(
			'notice',
			'Deleted successfully !'
		);

		return $this->redirectToRoute('app_load_data');

	}

}