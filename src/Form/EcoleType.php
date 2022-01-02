<?php

namespace App\Form;

use App\Entity\Ecole;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EcoleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('libelle' ,  TextType::class)
            ->add('adresse' , TextareaType::class)
            ->add('telephone' , TelType::class)
            ->add('detail' , TextareaType::class )
            ->add('email' , EmailType::class)
            ->add('site' , TextType::class)
            ->add('NomChef' , TextType::class)
            ->add('TypeEcole' , ChoiceType::class , [  
                'choices'  => [
                    'privé' => 'privé',
                    'publique' => 'publique',
                ], 
                'label' => 'cet est ecole est du type : ', 
                'attr' => ['class' => 'form-control'],
            ])
            ->add('postal' , TextType::class)
            ->add('Fax' , TextType::class)
            ->add('Commune' , TextType::class)
            ->add('ile' , ChoiceType::class , [  
                'choices'  => [
                    'Ngazidja' => 'Ngazidja',
                    'Anjuan' => 'Ndzouani',
                    'Moheli' => 'Moheli',
                ], 
                'label' => 'selectionner votre ile ', 
                'attr' => ['class' => 'form-control'],
            ])
         
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Ecole::class,
        ]);
    }
}
