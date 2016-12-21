<?php

// src/AppBundle/Controller/SecurityController.php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class SecurityController extends Controller
{
    /**
     * @Route("pogodynka/login", name="login")
     */
    public function loginAction(Request $request)
    {
      $authenticationUtils = $this->get('security.authentication_utils');

      // get the login error if there is one
      $error = $authenticationUtils->getLastAuthenticationError();
     
      $securityContext = $this->container->get('security.authorization_checker');
      
if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
    $lastUsername  =$this->getUser()->getUsername();
    return $this->redirectToRoute('manager');
}
    else {
      // last username entered by the user
      //$lastUsername  = $this->get('security.last_username');
      // last username entered by the user
      $lastUsername = $authenticationUtils->getLastUsername();
      
      }
    
    return $this->render('security/login.html.twig', array(
	  'last_username' => $lastUsername,
	  'error'         => $error,
	  'city'	  => $request->get('city')
	));
      
    }
}