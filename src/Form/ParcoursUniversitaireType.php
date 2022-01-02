<?php

namespace App\Form;

use App\Entity\ParcoursUniversitaire;
use App\Entity\Universite;
use App\Entity\Niveau;
use App\Entity\Pays;
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


class ParcoursUniversitaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('AnneInscription' , DateType::class ) 
            ->add('filiere' ,  TextType::class , [
                "label"=> "Votre Filiere d'etude"
            ])
            ->add('mention' ,  ChoiceType::class , [
                'choices'=>[
                    'Très-bien'=>'Tres-bien', 
                    'Exellent'=>'Exellent' , 
                    'Bien'=>'Bien', 
                    'Assez-bien'=>'Assez-bien',
                    'Passable'=>"Passable"
                ] , 
                'attr'=>['class'=>'form-control'] , 
                "label"=> "Mention obtenu"
            ])
            ->add('fichierFile' , VichImageType::class , [
                "label"=> "Joindre une justificatif " ,
                    'label' => false,
                    'required' => false,
                    'allow_delete' => false,
            ])
            ->add('moyenne' , NumberType::class , [
                "label"=>"Moyenne obtenu"
            ])
            ->add('titreUniveriste' , TextType::class , [
                'label'=>'Université inscrit '
            ])
            ->add('niveau' , EntityType::class , [
                'class'=>Niveau::class , 
                'choice_label'=>'libelle' , 
                'attr'=>['class'=>'form-control'] ,
                'label'=>"Niveau d'etude"
            ]
            )
            // ->add('universite' , EntityType::class , [
            //     'class'=>Universite::class , 
            //     'choice_label'=>'titre' , 
            //     'attr'=>['class'=>'form-control']
            // ])
            ->add('pays' , EntityType::class , [
                'class'=>Pays::class , 
                'choice_label'=>'libelle' , 
                'attr'=>['class'=>'form-control']
            ])
            ->add('detail' ,  TextareaType::class)
         
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ParcoursUniversitaire::class,
        ]);
    }
}
