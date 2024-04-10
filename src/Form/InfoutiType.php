<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InfoutiType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->setAction($this->router->generate('utiparid'))
        ->add('selectedUserId', ChoiceType::class, [
            'choices' => $options['utilisateurs'],
            'choice_label' => function(Utilisateur $utilisateur) {
                return $utilisateur->getNom() . ' ' . $utilisateur->getPrenom();
            },
            'choice_value' => 'id',
            'label' => 'Sélectionnez un utilisateur'
        ])
        ->add('submit', SubmitType::class, [
            'label' => 'Choisir'
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
