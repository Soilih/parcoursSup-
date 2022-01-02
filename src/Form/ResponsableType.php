<?php

namespace App\Form;

use App\Entity\Responsable;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ResponsableType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom' ,  TextType::class ,[
                'label' => 'votre nom ',
                'attr' => [
                    'placeholder' => 'saisir votre nom'
                ]
            ])
            ->add('prenom' ,  TextType::class ,[
                'label' => ' Votre prenom  ',
                'attr' => [
                    'placeholder' => 'saisir votre prénom'
                ]
            ])
            ->add('tel' , TelType::class ,[
                'label' => ' Votre telephone',
                'attr' => [
                    'placeholder' => 'saisir numero telephone'
                ]
            ])
            ->add('email' , EmailType::class ,[
                'label' => ' Votre email',
                'attr' => [
                    'placeholder' => 'saisir adresse email'
                ]
            ])
            ->add('proffession' , TextType::class ,[
                'label' => ' Votre proffession',
                'attr' => [
                    'placeholder' => 'saisir votre proffession '
                ]
            ])
            ->add('revenu' , NumberType::class , 
            [
                'label' => ' Votre revenu , Salaire mensuel',
                'attr' => [
                    'placeholder' => '0 KMF '
                ]
            ])
            ->add('adresse' ,  TextType::class , 
            [
                'label' => ' Votre adresse domicile actuel ',
                'attr' => [
                    'placeholder' => 'saisir votre adresse domicile'
                ]
            ]
            )
            ->add('lieunaissance' ,  TextType::class ,[
                'label' => ' Lieu de naissance ',
                'attr' => [
                    'placeholder' => 'saisir votre lieu de naissance  '
                ]
            ])
            ->add('activite' ,  TextType::class ,[
                'label' => ' Activité professionnelle actuelle ',
                'attr' => [
                    'placeholder' => 'saisir votre activité  '
                ]
            ])
           
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Responsable::class,
        ]);
    }
}
