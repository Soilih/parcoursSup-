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
            ->add('libelle' ,  TextType::class , [
                'label' => "Titre de l'etablissement"
            ])
            ->add('adresse' , TextareaType::class, [
                'label' => "Adresse complet de l'etablissement"
            ])
            ->add('telephone' , TelType::class , [
                'label' => "Numero de telephone "
            ])
            ->add('detail' , TextareaType::class , 
             [
                'label' => "A propos de l'etablissement"
            ])
            ->add('email' , EmailType::class , 
             [
                'label' => "Adresse email "
            ])
            ->add('site' , TextType::class, [
                'label' => "Lien du site web"
            ])
            ->add('NomChef' , TextType::class , [
                'label' => "Nom complet du responsable "
            ])
            ->add('TypeEcole' , ChoiceType::class , [ 
                
                'choices'  => [
                    'privé' => 'privé',
                    'publique' => 'publique',
                ], 
                'label' => 'cet est ecole est du type : ', 
                'attr' => ['class' => 'form-control'],
            ])
            ->add('postal' , TextType::class , [
                'label' => "Code postal"
            ])
            ->add('Fax' , TextType::class , [
                'label' => "Numero de telephone Fax"
            ])
            ->add('Commune' , TextType::class , [
                'label' => "L'etablissement se trouve dans quelle commune ? "
            ])
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
