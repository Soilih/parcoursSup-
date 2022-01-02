<?php

namespace App\Form;

use App\Entity\FluxSortant;
use App\Entity\Flux;
use App\Entity\Niveau;
use App\Entity\TypeUniversite;
use App\Entity\Composant;
use App\Entity\Pays;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FluxSortantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('bourse' , ChoiceType::class  ,[
                'label'=>'Beneficiez-vous de la bourse durant tes etudes',
                'choices'=>[
                'oui'=>'oui' , 
                'non'=>'non'
            ] , 
            'attr'=>['class'=>'form-control']
            ])
            ->add('priseCharche' , TextareaType::class , [
                'label'=>"Quels seront vos moyens d'existence"
            ])
            ->add('dateDepart' , DateType::class)
            ->add('universite' , TextType::class , [
                'label'=>"Titre de l'universite d'etude"
            ])
            ->add('filiere' , TextType::class , [
                'label'=>"Filiere d'etude"
            ] )
            ->add('adresse' , TextareaType::class , [
                'label'=>"Adresse du domicile (n°, rue, ville, code postal) à l'etranger"
            ])
            ->add('famille' , TextareaType::class , [
                'label'=>"Des membres de votre famille résident-ils à l'etranger"
            ])
            ->add('motivation' , TextareaType::class)
            ->add('suggeston' , TextareaType::class)
            ->add('pays' ,  EntityType::class , [
                'class'=>Pays::class , 
                'choice_label'=>'libelle' , 
                'attr'=>['class'=>'form-control']
            ])
            ->add('composant' , EntityType::class  ,[
                'label'=>'Selectionner le composant de ton domaine ', 
                'class'=> Composant::class , 
                'choice_label'=>'libelle' , 
                 'attr'=>['class' => 'form-control']
            ])
            ->add('niveau' , EntityType::class , [
                'class'=>Niveau::class , 
                'choice_label'=>'libelle', 
                'attr'=>['class'=>'form-control']
            ])
            ->add('typeUniversite' , EntityType::class  ,[
                'class'=> TypeUniversite::class , 
                'choice_label'=>'libelle' , 
                 'attr'=>['class' => 'form-control']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FluxSortant::class,
        ]);
    }
}
