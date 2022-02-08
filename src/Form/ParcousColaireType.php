<?php

namespace App\Form;

use App\Entity\ParcousColaire;
use App\Entity\Ecole;
use App\Entity\Niveau;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ParcousColaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('anneObtentionBac' , DateType::class)
            ->add('serie' , ChoiceType::class , [
                'choices'=>[
                    'A4'=>'A4', 
                    'G'=>'G', 
                    'C'=>'C', 
                    'D'=>'D', 
                    'A1'=>'A1', 
                    'A2'=>'A2', 
                    'autre'=>'autre'
                ],  
                'attr'=>['class'=>'form-control']
            ])
            ->add('mention' ,  ChoiceType::class , [
                'choices'=>[
                    'Exellent'=>'Exellent', 
                    'Trés-bien'=>'Trés-bien', 
                    'Bien'=>'Bien', 
                    'Assez-bien'=>'Assez-bien', 
                    'Passable'=>'Passable', 
                ] , 
                'attr'=>['class'=>'form-control']
            ])
            ->add('moyenne' , NumberType::class)

            ->add('imageFile' , VichImageType::class , [
                'required' => false,
                'allow_delete' => false,
            ])
            ->add('ecole' , EntityType::class , [
                "class"=> Ecole::class , 
                "choice_label"=>'libelle', 
                'attr'=>['class'=>'form-control']

            ]) 
            ->add('niveau' , EntityType::class , [
                "class"=> Niveau::class , 
                "choice_label"=>'libelle', 
                'attr'=>['class'=>'form-control']

            ]) 
            ->add('commentaire' , TextareaType::class)
           
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ParcousColaire::class,
        ]);
    }
}
