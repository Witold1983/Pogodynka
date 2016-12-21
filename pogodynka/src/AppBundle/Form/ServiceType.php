<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ServiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      
      $service = $builder->getData();
      
      $Post=array();
      foreach(explode("\n",$service->getPost()) as $row)
	$Post[]=$row;
    
      $Mapping=array();
      foreach(explode("\n",$service->getMapping()) as $row)
	$Mapping[]=$row;
    
      $builder
            ->add('url', UrlType::class)
            ->add('iconurl', UrlType::class)
            ->add('validate', TextType::class)
            ->add('service_name', TextType::class)
            ->add('post', CollectionType::class, array(
    // these options are passed to each "email" type
    'required'    => false,
    'allow_add' => true,
            'allow_delete' => true,
            
            'data' =>$Post )
    )
            
            ->add('mapping', CollectionType::class, array(
    // these options are passed to each "email" type
    'required'    => false,
    'allow_add' => true,
    'allow_delete' => true,
            
    'data' =>$Mapping )
    )
	    ->add('isActive', ChoiceType::class, array(
    'choices'  => array(
        'Główna' => true,
        'Alternatywna' => false,
    ),));
    }
  
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
           'data_class' => 'AppBundle\Entity\Services',
           'allow_extra_fields' => true
        ));
    }
}