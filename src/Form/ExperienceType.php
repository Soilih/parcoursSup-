<?php

namespace App\Form;

use App\Entity\Experience;
use App\Entity\Pays;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExperienceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('poste' ,  TextType::class , [
                'label'=>"Quelle poste occupez-vous ? "
            ])
            ->add('entreprise' ,  TextType::class , [
                "label"=>"Intitulé de l'entreprise "
            ])
        
            ->add('ville' , TextType::class , [
                "label"=>"Adresse de l'entreprise"
            ])

            ->add('pays' , EntityType::class , [
                'class'=> Pays::class , 
                'choice_label'=>'libelle' , 
                'attr'=>[
                    'class'=>'form-control'
                ] , 
                "label"=>"Dans quel pays avez-vous exercé ce travail ? "
            ])
            ->add('detail' ,  TextareaType::class  , [
                'label'=>"Description "
            ])
            ->add('dateExperience' , DateType::class  , [
                'label'=>'date de debut' , 
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
            ->add('datefin' , DateType::class  , [
                'label'=>'date de Fin' , 
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
            
         
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Experience::class,
        ]);
    }
}
