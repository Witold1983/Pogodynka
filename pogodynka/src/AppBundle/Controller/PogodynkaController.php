<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Common\Collections\ArrayCollection;

use AppBundle\Constants\ErrorsConsts;
use AppBundle\Entity\Dane;
use AppBundle\Entity\User;
use AppBundle\Entity\City;
use AppBundle\Entity\Services;
    
class PogodynkaController extends Controller
{
    /**
     * @Route("/pogodynka", name="homepage")
     */
    public function indexAction(Request $request)
    {
	global $given_city_name, $City, $data, $user_name;
	
	// last username entered by the user
	if($this->getUser() === null)
	  $user_name='';
	else  
	  $user_name = $this->getUser()->getUsername();
	
	function is_valid_data($doctrine){
	  global $request, $City, $given_city_name, $data, $user_name;
	
	  if(($given_city_name=$request->get('city'))=='')
	    return ErrorsConsts::WYBIERZ_MIASTO;
	  
	  if(($City = $doctrine->getRepository('AppBundle:City')->findOneBy(array('city_name'=>$given_city_name)))===null)
	    return ErrorsConsts::BRAK_MIASTA_W_BAZIE;
	  
    	  $fromDate=new \DateTime();
	  $fromDate->setTime(0,0);

	  $dzisiaj=$doctrine->getRepository('AppBundle:Dane')->findExpensesForDate($City->getName(),$fromDate, new \DateTime());
    	    
	  if(empty($dzisiaj)){
	  
	    $service = $doctrine->getRepository('AppBundle:Services')->findOneBy(['isActive'=>true]);
	    
	    if($service===null)
	      return ErrorsConsts::BRAK_USLUGI;
	      
	    $dane=$service->query($given_city_name);
	    
	    if($dane['dane'] === null)
	      return ErrorsConsts::BRAK_POLACZENIA;
	    
		$em = $doctrine->getManager();
		$em->persist($dane['dane']);
		
	    try {
	      $em->flush();
	    }
	    catch( \Doctrine\DBAL\DBALException $e )
	    {
	      $message='';
		
	      if( \preg_match("/'.*' for key '(.*)'/Ui", $e->getMessage(), $match) )
		$message='Podano błędną wartość ' . substr($match[0],0,strpos($match[0],' for'));
		
		return new Response('<div id="error">'.$e->getMessage().'</div>');
	    }  
	    
	    return false;
	  }
	  
	  return false; 
	}
	if($request->get('action')=='authorization_checker'){
	  return $this->render('pogodynka/menu.html.twig', [
	    'user_name'=>$user_name
	  ]);
	}
	// replace this example code with whatever you need
        if($request->get('action')=='get'){
	  
	  if($error=is_valid_data($this->getDoctrine())){
	    
	    switch($error){
	      case ErrorsConsts::BRAK_MIASTA_W_BAZIE: 
		$error=sprintf(ErrorsConsts::BRAK_MIASTA_W_BAZIE,$given_city_name);

	      case ErrorsConsts::BRAK_POLACZENIA: break;
	      case ErrorsConsts::BRAK_USLUGI: break;
	      default:
	        $error=ErrorsConsts::NIEZNANY_BLAD;
	    }
	    
	  }
	  $fromDate=new \DateTime();

	  date_sub($fromDate, date_interval_create_from_date_string('8 days'));
	  
	  if($City===null)
	    $data=[];
	  else  
	    $data = $this->getDoctrine()->getRepository('AppBundle:Dane')->findExpensesForDate($City->getName(),$fromDate, new \DateTime());
	  
	  return $this->render('pogodynka/results.html.twig', [
				   'data'=>$data,
				   'error'=>$error,
				   'city'=>$City
			      ]);
	  }
	else {
	  $w='';
	  $given_city_name='';
	  }
	   
	  return $this->render('pogodynka/index.html.twig', [
            'title'=>"Pogoda dla $given_city_name",
            'city'=>$given_city_name,
	    'user_name'=>$user_name,
            'error'=>'',
            'wether'=>$w
          ]);
    }
}
