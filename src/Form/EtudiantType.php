<?php

namespace App\Form;

use App\Entity\Etudiant;
use  App\Entity\Pays;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class EtudiantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom' , TextType::class , [
                'label'=>'Nom de famille'
            ])
            ->add('prenom' , TextType::class)
            ->add('dateNaissance' ,  DateType::class , [
                'label'=>'Date de naissance'
            ])
            ->add('adresse' , TextareaType::class)
            ->add('lieuNaissance' ,  TextType::class , [
                'label'=>'Lieu de naissance'
            ])
            ->add('Nin' , TextType::class , [
                'label'=>"Numéro de pièce d'identité"
            ])
            ->add('imageFile' , VichImageType::class , [
                'label'=>"Photo d'identité" ,
                'mapped' =>  true , 
                'required' => false,
                'allow_delete' => false,
            ])
            ->add('nationalite' ,  TextType::class , [
                'label'=>'Nationalité actuelle'
            ])
            ->add('status', ChoiceType::class , [
                'choices'  => [
                    'celibataire' => 'celibataire',
                    'Marié(e)' => 'marié',
                    'Séparé(e)' => 'marié',
                    'Divorcé(e)' => 'Divorcé',
                    'Veuf(ve)' => 'Veuf'
                ], 
                'label' => 'Etat civil  ', 
                'attr' => ['class' => 'form-control']
            ])
            ->add('ile' , ChoiceType::class , [
                'choices'  => [
                    'Ngazidja' => 'Ngazidja',
                    'Anjuan' => 'Anjuan',
                    'Moheli' => 'Moh',
                ], 
                'label' => 'selectionner votre ile ', 
                'attr' => ['class' => 'form-control']

                ])
            ->add('dateValide' ,  DateType::class ,[
                'label'=>'Date de limite de validité'
            ] 
            )
            ->add('typeIdentite' , ChoiceType::class , [
                'choices'  => [
                    'Passport' => 'Passport',
                    'Titre de sejour' => 'Titre de sejour',
                    'Carte identité' => 'Carte identité',
                ], 
                'label' => "Type de pièce d'identité ", 
                'attr' => ['class' => 'form-control']
            ])
            ->add('paysDelivrance', TextType::class)
            ->add('sexe' , ChoiceType::class , [
                'choices'  => [
                    'Homme' => 'Homme',
                    'Femme' => 'Femme',
                ], 
                'label' => 'Sexe ', 
                'attr' => ['class' => 'form-control']
            ])
            ->add('datefin' , DateType::class , [
                'label'=>'Date de delivrance' ])
            ->add('activite' , TextType::class , [
                    'label'=>'Activité professionnelle actuelle' ])

            ->add('pays' , EntityType::class, [
                'class'=> Pays::class , 
                'choice_label'=>'libelle' ,
                'label' => 'pays de naissance' , 
                'attr'=>['class'=>'form-control']
                ])
            
              
           
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Etudiant::class,
        ]);
    }
}
