<?php

// src/AppBundle/Controller/RegistrationController.php
namespace AppBundle\Controller;

use AppBundle\Form\UserType;
use AppBundle\Form\CityType;
use AppBundle\Form\ServiceType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Constants\ErrorsConsts;

use AppBundle\Entity\User;
use AppBundle\Entity\City;
use AppBundle\Entity\Dane;
use AppBundle\Entity\Services;

class ManagerController extends Controller
{
    /**
     * @Route("/manager", name="show")
     */
    
    public function showAction(Request $request)
    {
    
	$services = $this->getDoctrine()->getRepository('AppBundle:Services')->findAll();
	
	$users = $this->getDoctrine()->getRepository('AppBundle:User')->findAll();
	
	$cities= $this->getDoctrine()->getRepository('AppBundle:City')->findAll();

	return $this->render(
            'manager/index.html.twig', 
            array('services' => $services,
		  'users' => $users,
		  'cities'=> $cities,
		  'error'=>'',
		  'message'=>$request->get('message'))
        );
    }

    /**
     * @Route("/manager/user", name="showUser")
     */
    
    public function showUserAction(Request $request)
    {
      if($id=$request->get('id')){
	$user = $this->getDoctrine()->getRepository('AppBundle:User')->findOneById($id);
	
	if ($user===null) 
	  return $this->redirectToRoute('manager',['message'=>'Nie znaleziono użytkownika w bazie #'.$id]);
	}
      else
        $user = new User();
        
      if ($request->isMethod('GET'))  
	switch($request->get('action')){
	  case 'drop':
	    if($id==$this->getUser()->getId())
	      return $this->redirectToRoute('manager',['message'=>'Nie możesz usunąć własnego konta']);
	      
            $em = $this->getDoctrine()->getManager();
	    $em->remove($user);
	    $em->flush();
	  
	    return $this->redirectToRoute('manager',['message'=>'Pomyślnie usunięto użytkownika '.$user->getUsername()]);
	    
	  default:
	}
        
	$form = $this->createForm(UserType::class, $user);
	
	$form->handleRequest($request);
	  
	  if ($form->isSubmitted() && $form->isValid()) {
	    
	    $user = $form->getData();
	    
            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $this->get('security.password_encoder')
                ->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);
	    
            // 4) save the User!
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
	    
            try {
	      $em->flush();
	    }
	    catch( \Doctrine\DBAL\DBALException $e )
	    {
	      $message='';
	      
	      if( \preg_match("/'.*' for key '(.*)'/Ui", $e->getMessage(), $match) )
		$message='Podano błędną wartość ' . substr($match[0],0,strpos($match[0],' for'));
		
	      return $this->render(
		'manager/register.html.twig',
		['form' => $form->createView(),
		 'id'=>$user->getId(),
		 'error'=>$message]);//$e->getMessage()]);
	    }
	    
	    
	    return $this->redirectToRoute('manager',['message'=>'Pomyślnie '.((($id===null)||($id=''))?'Dodano':'Edytowano').' użytkownika '.$user->getUsername()]);
        }
       
	return $this->render(
            'manager/register.html.twig',
	    ['form' => $form->createView(),
	     'error'=> '',
	     'id'=>$user->getId()]);  
    }
    /**
     * @Route("/manager/services", name="showService")
     */
    
    public function showServiceAction(Request $request)
    {
      $services = $this->getDoctrine()->getRepository('AppBundle:Services')->findAll();
      
      if($id=$request->get('id')){
	$service = $this->getDoctrine()->getRepository('AppBundle:Services')->findOneById($id);
	
	if ($service===null) 
	  return $this->redirectToRoute('manager',['message'=>'Nie znaleziono usługi w bazie #'.$id]);
	}
      else
        $service = new Services();
        
      if ($request->isMethod('GET'))  
	if($request->get('action'))
	switch($request->get('action')){
	  case 'drop':
	    if(count($services)<2)
	      return $this->redirectToRoute('manager',['message'=>'Nie możesz usunąć jedynej usługi']);
	      
            $em = $this->getDoctrine()->getManager();
	    $em->remove($service);
	    $em->flush();
	  
	    return $this->redirectToRoute('manager',['message'=>'Pomyślnie usunięto usługę '.$service->getServiceName()]);
	    
	  case 'query':
	    
	    if($service===null)
	      return new Response ( '<div id="error">'.ErrorsConsts::BRAK_USLUGI.'</div>');
	      
	    $output=$service->query($request->get('cityname'));  
	    if($output['dane']===null)
	      return new Response ( '<div id="error">'.ErrorsConsts::BRAK_POLACZENIA);
	    
	  default:
	    return new Response ( '<div id="error">'.ErrorsConsts::NIEZNANY_BLAD.'</div>');
	}
	
	$form = $this->createForm(ServiceType::class, $service);
 	
	$form->handleRequest($request);
	
	$error='';
	
	if ($form->isSubmitted())
	  if( $form->isValid()) {
	    
	    $service = $form->getData();
	
            $em = $this->getDoctrine()->getManager();
            $em->persist($service);
	    
	    $service->setPost(implode("\n",$service->getPost()));
	    
	    $service->setMapping(implode("\n",$service->getMapping()));
	    
            try {
	      $em->flush();
	    }
	    catch( \Doctrine\DBAL\DBALException $e )
	    {
	      $message='';
		
	      if( \preg_match("/'.*' for key '(.*)'/Ui", $e->getMessage(), $match) )
		return new Response ('<div id="error">Podano błędną wartość ' . substr($match[0],0,strpos($match[0],' for')).'</div>');
		
	      return $this->render(
		'manager/services.html.twig',
		['form' => $form->createView(),
		 'services'=>$services,
		 'id'=>$service->getId(),
		 'error'=>$message]);//$e->getMessage()]);
	    }
	    
	    return $this->redirectToRoute('manager',['message'=>'Pomyślnie '.((($id===null)||($id=''))?'Dodano':'Edytowano').' usługę '.$service->getServiceName()]);
        }
        else 
	  foreach ($form->getErrors() as $key => $error) 
            $error = $error->getMessage();
	
      return $this->render(
            'manager/services.html.twig',
	    ['form' => $form->createView(),
	     'services'=>$services,
	     'error'=> $error,
	     'id'=>$service->getId()]);  
    }


    /**
     * @Route("/manager/cities", name="showCity")
     */
    
    public function showCityAction(Request $request)
    {
    
      if($id=$request->get('id')){
	$city = $this->getDoctrine()->getRepository('AppBundle:City')->findOneById($id);
	
	if ($city===null) 
	  return $this->redirectToRoute('manager',['message'=>'Nie znaleziono miasta w bazie #'.$id]);
	}
      else
        $city = new City();
        
      if ($request->isMethod('GET'))  
	if($request->get('action'))
	switch($request->get('action')){
	  case 'drop':
	  
            $em = $this->getDoctrine()->getManager();
	    $em->remove($city);
	    $em->flush();
	  
	    return $this->redirectToRoute('manager',['message'=>'Pomyślnie usunięto miasto '.$city->getName()]);
	    
	  case 'query':
	    
	    $service = $this->getDoctrine()->getRepository('AppBundle:Services')->findOneBy(['isActive'=>true]);
	    if($service === null)
	      return new Response('<div id="error">'.ErrorsConsts::BRAK_USLUGI.'</div>');
	
	    if($city===null)
	      return new Response ( '<div id="error">'. sprintf(ErrorsConsts::BRAK_MIASTA_W_BAZIE,'#'.$request->get('id')).'</div>');
	    
	    $dane=$service->query($request->get('cityname'));
	    
	    if($dane['dane']===null)
	      return new Response('<div id="error">'.ErrorsConsts::BRAK_POLACZENIA.'</div>');
	    
	    $city->setCityName($request->get('cityname'));
	    
	    $city->setCoordLon($dane['longitude'])
		 ->setCoordLat($dane['latitude'])
		 ->setCityCode(intval($dane['citycode']));
	    break;
	    
	  default:
	    die("".$request->get('action').$request->get('id'));
	}
	
	$form = $this->createForm(CityType::class, $city);
 	
	$form->handleRequest($request);
	
	$error='';
	
	if ($form->isSubmitted())
	  if( $form->isValid()) {
	    
	    $city = $form->getData();
	
            $em = $this->getDoctrine()->getManager();
            $em->persist($city);
	    
            try {
	      $em->flush();
	    }
	    catch( \Doctrine\DBAL\DBALException $e )
	    {
	      $message='';
		
	      if( \preg_match("/'.*' for key '(.*)'/Ui", $e->getMessage(), $match) )
		$message='Podano błędną wartość ' . substr($match[0],0,strpos($match[0],' for'));
		die("".$e->getMessage());
	      return $this->render(
		'manager/cities.html.twig',
		['form' => $form->createView(),
		 'id'=>$city->getId(),
		 'error'=>$message]);//$e->getMessage()]);
	    }
	    
	    return $this->redirectToRoute('manager',['message'=>'Pomyślnie '.((($id===null)||($id=''))?'Dodano':'Edytowano').' miasto '.$city->getName()]);
        }
        else 
	  foreach ($form->getErrors() as $key => $error) 
            $error = $error->getMessage();
	
      return $this->render(
            'manager/cities.html.twig',
	    ['form' => $form->createView(),
	     'error'=> $error,
	     'id'=>$city->getId()]);  
    }

}