<?php

namespace App\Form;

use App\Entity\Universite;
use App\Entity\TypeUniversite;
use App\Entity\Pays;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UniversiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre' , TextType::class , [
             'label'=>"Nom de l'universite" ] )
            ->add('detail' , TextareaType::class)
            ->add('adresse' , TextType::class)
            ->add('email' , EmailType::class)
            ->add('telephone' , TelType::class)
            ->add('site' , TextType::class)
            ->add('postal' , NumberType::class)
            ->add('ville' ,  TextType::class)
            ->add('responsable' ,  TextType::class)
            ->add('filiale' ,  TextType::class)
            ->add('pays' ,  EntityType::class , [
                "class"=>Pays::class , 
                'choice_label'=>'libelle' , 
                'attr'=>['class'=>'form-control']
            ])
            ->add('type'  , EntityType::class , [
                'class'=>TypeUniversite::class , 
                'choice_label'=>'libelle' , 
                 'attr'=>['class'=>'form-control']
            ] )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Universite::class,
        ]);
    }
}
