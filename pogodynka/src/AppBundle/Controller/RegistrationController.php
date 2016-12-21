<?php

// src/AppBundle/Controller/RegistrationController.php
namespace AppBundle\Controller;

use AppBundle\Form\UserType;
use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class RegistrationController extends Controller
{
    /**
     * @Route("/register", name="user_registration")
     */
    
    public function registerAction(Request $request)
    {
        // 1) build the form
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $this->get('security.password_encoder')->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);

            // 4) save the User!
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);

            $message= "Dodano użytkownika ".$user->getUsername();
            $error='';
            
            try {
	      $em->flush();
	    }
	    catch( \Doctrine\DBAL\DBALException $e )
	    {
	      return $this->render(
		'registration/register.html.twig',
		['error'=>$e]);
	    }
	    
	    return $this->redirectToRoute('manager_users',['id'=>$user->getId()]);
        }

        return $this->render(
            'registration/register.html.twig',
	    ['form' => $form->createView(),
	     'error'=> '']
        );
    }
}