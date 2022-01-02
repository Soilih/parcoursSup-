<?php

namespace App\Form;

use App\Entity\Composant;
use App\Entity\Universite;
use App\Entity\Pays;
use App\Entity\User;
use App\Entity\Flux;
use App\Entity\Niveau;
use App\Entity\TypeUniversite;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FluxType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('depart' ,  DateType::class , [
                'label'=>"Date depart pour tes etudes "
            ])
            ->add('dateArrive' ,  DateType::class , [
                'label'=>"Date d'arrivée au terrritoire "  
            ])
            ->add('filiere' ,  TextType::class , [
                'label'=>'Formation '
            ])
            ->add('composant' ,EntityType::class  ,[
                'label'=>'Selectionner le composant de ton domaine ', 
                'class'=> Composant::class , 
                'choice_label'=>'libelle' , 
                 'attr'=>['class' => 'form-control']
            ])
            ->add('typeUniversite' , EntityType::class  ,[
                'class'=> TypeUniversite::class , 
                'choice_label'=>'libelle' , 
                 'attr'=>['class' => 'form-control']
            ])
            ->add('diplome' ,  TextType::class , [
                'label'=>'Diplome obtenu '
            ])
            ->add('niveauActuel' ,  EntityType::class , [
                'class'=>Niveau::class , 
                'choice_label'=>'libelle', 
                'attr'=>['class'=>'form-control']
            ])
           
            ->add('titreUniversite' ,  TextType::class , [
                'label'=>"Nom de l'université d'etude "
            ]) 
            // ->add('universite' , EntityType::class , [
            //     'class'=>Universite::class , 
            //     'choice_label'=>'titre' , 
            //     'attr'=>['class'=>'form-control']
            // ])
            ->add('boursier' , ChoiceType::class  ,[
                'label'=>'Beneficiez-vous de la bourse durant tes etudes',
                'choices'=>[
                    'oui'=>'oui' , 
                    'non'=>'non'
                ] , 
                'attr'=>['class'=>'form-control']
            ])
            ->add('pays' ,  EntityType::class , [
                'class'=>Pays::class , 
                'choice_label'=>'libelle' , 
                'attr'=>['class'=>'form-control']
            ])
           
            ->add("job" , TextType::class , [
                'label'=>'Quel poste occupez-vous actuellement  ?' , 
               'attr'=>['placeholder'=>'Sinon saisir je suis sans activité proffessionnelle ']
            ])
            ->add('detail' , TextareaType::class  ,[
                'label'=>'Expliquez brievement le deroulement de tes etudes'
            ])
            ->add('suggestion' , TextareaType::class,[
                'label'=>'Citez quelles difficultés rencontreés durant tes etudes'

            ])
            
            ->add('projet' , TextareaType::class  ,[
                'label'=>'Avez-vous des projets pour votre pays ? '

            ])
            ->add('etudePoursuite' , TextareaType::class  ,[
                'label'=>'Souhaitez-vous poursuivre les etudes encore  ? si oui pourquoi ?'

            ])
           


            


            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Flux::class,
        ]);
    }
}
