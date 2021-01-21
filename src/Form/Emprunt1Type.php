<?php

namespace App\Form;

use App\Entity\Emprunt;
use App\Entity\Livre;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Emprunt1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateRetour')
            ->add('dateEmprunt')
            ->add('emprunteur', EntityType::class, [
                'class' => User::class,
                'choice_label' => function($user) {
                    return "{$user->getName()} ({$user->getId()})";
                }])
            ->add('livre', EntityType::class, [
                'class' => Livre::class,
                'choice_label' => function($livre) {
                    return "{$livre->getTitre()} ({$livre->getId()})";
                },
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Emprunt::class,
        ]);
    }
}
