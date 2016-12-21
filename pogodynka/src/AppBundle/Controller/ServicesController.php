<?php

// src/AppBundle/Controller/ServicesController.php
namespace AppBundle\Controller;

use AppBundle\Form\UserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Doctrine\Common\Collections\ArrayCollection;

use AppBundle\Entity\User;
use AppBundle\Entity\City;
use AppBundle\Entity\Services;

class ServicesController extends Controller
{
    /**
     * @Route("/register", name="user_registration")
     */
    
    public function showAction(Request $request)
    {
    
	$authenticationUtils = $this->get('security.authentication_utils');

	// get the login error if there is one
	$error = $authenticationUtils->getLastAuthenticationError();
      
	// last username entered by the user
	$lastUsername = $authenticationUtils->getLastUsername();

	if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) 
	  throw $this->createAccessDeniedException();
    
	$services = $this->getDoctrine()->getRepository('AppBundle:Services')->findAll();
	
	$users = $this->getDoctrine()->getRepository('AppBundle:User')->findAll();
	
	$cities= $this->getDoctrine()->getRepository('AppBundle:City')->findAll();
	
	return $this->render(
            'manager/index.html.twig', 
            array('services' => $services,
		  'users' => $users,
		  'cities'=> $cities,
		  'error'=>$error)
        );
    }
}