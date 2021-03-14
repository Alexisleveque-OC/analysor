<?php

namespace App\Form;

use App\Entity\Campaign;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CampaignType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('version')
            ->add('encodage')
            ->add('commentaire', TextareaType::class,[
                'attr' => [
                    'rows' => 10,
                    'cols' => 70,
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Campaign::class,
        ]);
    }
}
