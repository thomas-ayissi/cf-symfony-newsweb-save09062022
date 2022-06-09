<?php

namespace App\Form;

use App\Entity\Thearticle;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ThearticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('thearticletitle')
            ->add('thearticleslug')
            ->add('thearticleresume')
            ->add('thearticletext')
            ->add('thearticledate')
            ->add('thearticleactivate')
            ->add('theuserIdtheuser')
            ->add('thecommentIdthecomment')
            ->add('theimageIdtheimage')
            ->add('thesectionIdthesection')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Thearticle::class,
        ]);
    }
}
