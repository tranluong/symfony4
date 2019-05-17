<?php

namespace App\Controller;

use App\Kernel;
use App\Service\DependentService;
use App\Service\DiDemoService;
use Symfony\Component\Config\FileLocator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class DiController extends AbstractController
{
	/**
	 * @Route("/di_demo", name="di")
	 */
    public function index()
    {
    	//Link https://code.tutsplus.com/tutorials/examples-of-dependency-injection-in-php-with-symfony-components--cms-31293
    	/*Doan nay la goi thang vao fucntion cua class, chua co inject vao constructor*/
	    // init service container
//	    $containerBuilder = new ContainerBuilder();
//
//		// add service into the service container
//	    $containerBuilder->register('demo.service', DiDemoService::class);
//
//		// fetch service from the service container
//	    $demoService = $containerBuilder->get('demo.service');
//	    die($demoService->helloWorld('luong'));

	    ////////////////////////////////////////////////////////////////////////////////
	    /*Doan nay la goi thang vao fucntion cua class, da co inject vao constructor trong service*/

	    //init service container
//	    $containerBuilder = new ContainerBuilder();
//	    //Add service into the service container
//	    $containerBuilder->register('demo.service', DiDemoService::class);
//	    // add dependent service into the service container
//	    $containerBuilder->register('dependent.service', DependentService::class)
//	                     ->addArgument(new Reference('demo.service'));
//	    // fetch service from the service container
//	    $dependentService = $containerBuilder->get('dependent.service');
//	    die($dependentService->helloWorld('luong'));

	    ////////////////////////////////////////////////////////////////////////////////
	    /*Dynamically Load Services Using the YAML File*/
	    $path = $this->getParameter('path_root');
//	     die($path.'/config');
		//init service container
	    $containerBuilder = new ContainerBuilder();
	    //init yaml file loader
	    $loader = new YamlFileLoader($containerBuilder, new FileLocator($path.'/config'));
	    //Load service from services.yaml file
	    $loader->load('services.yaml');
	    //Fetch service from the service container
	    $serviceOne = $containerBuilder->get('dependent.service');
	    die($serviceOne->helloWorld('luong'));


        return $this->render('di/index.html.twig', [
            'controller_name' => 'DiController',
        ]);
    }
}
